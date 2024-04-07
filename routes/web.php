<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


//web route

// Route::get('/homepage',[HomeController::class,'view'])->name('home');
Route::get('/home',[NoteController::class,'view'])->name('home')->middleware('auth');
Route::get('/note',[NoteController::class,'note'])->name('note')->middleware('auth');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Define a POST route for creating a new note
//api route
Route::post('/notes', [NoteController::class, 'store'])->name('notes.store');
Route::get('/notes/{id}', [NoteController::class, 'edit'])->name('edit')->middleware('auth');

Route::post('/notes/{id}/update', [NoteController::class, 'update'])->name('notes.updat')->middleware('auth');

Route::delete('/notes/{id}', [NoteController::class, 'destroy'])->name('notes.destroy')->middleware('auth');
// Route::get('/search-paginate', [NoteController::class, 'paginate'])->name('search.paginate');


require __DIR__.'/auth.php';
