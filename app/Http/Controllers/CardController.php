<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;

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

    public function updateTitle(Request $request, $id)
    {
        $card = Card::find($id);
    
        if (!$card) {
            return response()->json(['success' => false, 'message' => 'Card not found'], 404);
        }
    
        $validatedData = $request->validate([
            'title' => 'required|string|max:255'
        ]);
    
        $card->title = $validatedData['title'];
        $card->save();
    
        return response()->json(['success' => true, 'message' => 'Title updated successfully']);
    }
    
    public function updateDescription(Request $request, $id)
    {
        $card = Card::find($id);
    
        if (!$card) {
            return response()->json(['success' => false, 'message' => 'Card not found'], 404);
        }
    
        $validatedData = $request->validate([
            'description' => 'required|string'
        ]);
    
        $card->description = $validatedData['description'];
        $card->save();
    
        return response()->json(['success' => true, 'message' => 'Description updated successfully']);
    }
    
    public function deleteData($id)
    {
        $card = card::find($id);
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
}
