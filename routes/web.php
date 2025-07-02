<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\User\BookmarkController;
use App\Http\Controllers\User\NoteController;
use App\Http\Controllers\User\RecommendationController as UserRecommendationController;
use App\Http\Controllers\Admin\RecommendationController as AdminRecommendationController;

// =======================
// HALAMAN LANDING
// =======================
Route::get('/', function () {
    return view('landing');
});

// =======================
// AUTHENTICATION (Laravel Breeze)
// =======================
require __DIR__ . '/auth.php';

// =======================
// REDIRECT DASHBOARD SESUAI ROLE
// =======================
Route::get('/dashboard', function () {
    return redirect()->route(
        auth()->user()->role === 'admin' ? 'admin.dashboard' : 'user.dashboard'
    );
})->middleware(['auth'])->name('dashboard');

// =======================
// PROFILE (User & Admin)
// =======================
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// =======================
// USER (PEMBACA)
// =======================
Route::middleware(['auth'])->prefix('user')->name('user.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');

    // Daftar Buku
    Route::get('/books', [UserController::class, 'books'])->name('books.index');

    // Bookmark Buku
    Route::get('/bookmarks', [BookmarkController::class, 'index'])->name('bookmarks.index');
    Route::post('/bookmarks/{book}', [BookmarkController::class, 'store'])->name('bookmarks.store');
    Route::delete('/bookmarks/{book}', [BookmarkController::class, 'destroy'])->name('bookmarks.destroy');

    // Catatan Pribadi (CRUD)
    Route::get('/notes', [NoteController::class, 'index'])->name('notes.index');
    Route::post('/notes', [NoteController::class, 'store'])->name('notes.store');
    Route::get('/notes/{note}/edit', [NoteController::class, 'edit'])->name('notes.edit');
    Route::put('/notes/{note}', [NoteController::class, 'update'])->name('notes.update');
    Route::delete('/notes/{note}', [NoteController::class, 'destroy'])->name('notes.destroy');

    // Rekomendasi Buku ke Admin
    Route::get('/recommendations', [UserRecommendationController::class, 'index'])->name('recommendations.index');
    Route::post('/recommendations', [UserRecommendationController::class, 'store'])->name('recommendations.store');
});

// =======================
// ADMIN
// =======================

// Form Login Admin
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');

// Dashboard Admin & Kelola Data
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    // Kelola Buku (CRUD)
    Route::resource('/books', BookController::class);

    // Melihat & Menghapus Rekomendasi dari Pembaca
    Route::get('/recommendations', [AdminRecommendationController::class, 'index'])->name('recommendations.index');
    Route::delete('/recommendations/{id}', [AdminRecommendationController::class, 'destroy'])->name('recommendations.destroy');
});
