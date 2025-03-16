<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;
use Database\Seeders\CardSeeder;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class CardController extends Controller
{
    public function index()
    {
        $card_data = Card::all();
        return view('cards_index', compact('card_data'));
    }

    public function insertData(Request $request)
    {
        $messages = [
            'title.string' => 'The title must be a valid text.',
            'title.max' => 'The title may not be greater than 50 characters.',

            'description.string' => 'The description must be a valid text.',
            'description.max' => 'The description may not be greater than 255 characters.',

            'picture.mimes' => 'The picture must be a file of type: jpg, jpeg, png.',
            'picture.max' => 'The picture size may not be greater than 2MB.',
        ];

        $validated = $request->validate([
            'title' => 'required|string|max:50',
            'description' => 'required|string|max:255',
            'picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ], $messages);

        $card = new Card();
        $card->title = $request->input('title');
        $card->description = $request->input('description');

        if ($request->hasFile('picture')) {
            $imageName = time() . '_' . $request->file('picture')->getClientOriginalName();
            $request->file('picture')->move(public_path('card_pictures'), $imageName);
            $card->picture = $imageName;
        }

        $card->colorTitle = $request->input('colorTitle');
        $card->colorDesc = $request->input('colorDesc');
        $card->colorBg = $request->input('colorBg');

        $card->save();
        //dd($card);
        return redirect()->route('cards_index')->with('successInsert', 'Card Generated Successfully');
    }


    public function viewData($id)
    {
        $card = card::find($id);
        return view('viewData', compact('card'));
    }

    // public function updateData(Request $request, $id)
    // {
    //     $card = card::find($id);
    //     $card->title = request('title');
    //     $card->description = request('description');
    //     $card->picture = request('picture');
    //     $card->save();
    //     return redirect()->route('cards_index')->with('successUpdate', 'Card Updated Successfully');
    // }

    public function updatePicture(Request $request, $id)
    {
        $card = Card::find($id);
    
        if (!$card) {
            return response()->json(['success' => false, 'message' => 'Card not found'], 404);
        }
    
        $messages = [
            'picture.image' => 'The file must be an image.',
            'picture.mimes' => 'The image must be a file of type: jpg, jpeg, png.',
            'picture.max' => 'The image size must not exceed 2MB.'
        ];
    
        $validator = Validator::make($request->all(), [
            'picture' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ], $messages);
    
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()->all()
            ], 422);
        }
    
        if ($card->picture && !str_contains($card->picture, 'dummy_pict/')) {
            $oldPhotoPath = public_path('card_pictures/' . $card->picture);
            if (File::exists($oldPhotoPath)) {
                File::delete($oldPhotoPath);
            }
        }
    
        $newPhoto = $request->file('picture');
        $newPhotoName = time() . '_' . $newPhoto->getClientOriginalName();
        $newPhoto->move(public_path('card_pictures'), $newPhotoName);
    
        $card->picture = $newPhotoName;
        $card->save();
    
        return response()->json([
            'success' => true,
            'message' => 'Picture updated successfully',
            'newPhoto' => $newPhotoName
        ]);
    }

    public function updateTitle(Request $request, $id)
    {
        $card = Card::find($id);

        if (!$card) {
            return response()->json(['success' => false, 'message' => 'Card not found'], 404);
        }

        $messages = [
            'title.max' => 'The title may not be greater than 50 characters.',
        ];

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:50'
        ], $messages);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()->all()
            ], 422);
        }

        $card->title = $request->title;
        $card->save();

        return response()->json(['success' => true, 'message' => 'Title updated successfully']);
    }

    public function updateDescription(Request $request, $id)
    {
        $card = Card::find($id);

        if (!$card) {
            return response()->json(['success' => false, 'message' => 'Card not found'], 404);
        }

        $messages = [
            'description.max' => 'The description may not be greater than 255 characters.',
        ];

        $validator = Validator::make($request->all(), [
            'description' => 'required|string|max:255'
        ], $messages);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()->all()
            ], 422);
        }

        $card->description = $request->description;
        $card->save();

        return response()->json(['success' => true, 'message' => 'Description updated successfully']);
    }

    public function deleteData($id)
    {
        $card = card::find($id);

        if ($card) {
            if ($card->picture) {
                $photoPath = public_path('card_pictures/' . $card->picture);
                if (File::exists($photoPath)) {
                    File::delete($photoPath);
                }
            }
        }
        $card->delete();
        return redirect()->route('cards_index')->with('successDelete', 'Card Deleted Successfully');
    }

    public function searchCard(Request $request)
    {
        $query = card::query();

        if ($request->has('search')) {
            $searchTerm = '%' . $request->search . '%';

            $query->where('title', 'LIKE', $searchTerm)
                ->orWhere('description', 'LIKE', $searchTerm);
        }

        $card_data = $query->get();

        return view('cards_index', compact('card_data'));
    }

    public function runSeeder(Request $request)
    {
        $count = intval($request->input('count', 1));

        if ($count < 1 || $count > 10) {
            return response()->json(['message' => 'Please enter a number between 1 and 10'], 400);
        }

        // DB::table('cards')->truncate(); 

        (new CardSeeder())->run($count);

        return response()->json(['message' => "$count cards seeded successfully!"]);
    }
};
