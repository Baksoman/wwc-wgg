<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\CardController;

Route::get('/', [CardController::class, 'index'])->name('cards_index');

Route::post('/insertData', [CardController::class, 'insertData'])->name('insertData');

Route::get('/viewData/{id}', [CardController::class, 'viewData'])->name('viewData');

// Route::post('/updateData/{id}', [CardController::class, 'updateData'])->name('updateData');
Route::put('/updateTitle/{id}', [CardController::class, 'updateTitle']);
Route::put('/updateDescription/{id}', [CardController::class, 'updateDescription']);

Route::get('/deleteData/{id}', [CardController::class, 'deleteData'])->name('deleteData');

Route::get('/cards', [CardController::class, 'searchCard'])->name('cards_index');

Route::post('/runSeeder', [CardController::class, 'runSeeder'])->name('runSeeder');