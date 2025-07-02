<?php


use App\Http\Controllers\BookController;
use App\Http\Controllers\Bookmark;
use App\Http\Controllers\BookmarkController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('home');
});


Route::get('/ebook', [BookController::class, 'index']);
Route::post('/bookmark/{id}', [BookmarkController::class, 'store'])->name('add-bookmark');

Route::resource('catatan', NoteController::class);

Route::get('/dashboard', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::get('/bookmark', [BookmarkController::class, 'index']);

Route::resource('catatan', NoteController::class);

Route::get('/rekomendasi', function () {
    return view('rekomendasi');
})->name('rekomendasi');