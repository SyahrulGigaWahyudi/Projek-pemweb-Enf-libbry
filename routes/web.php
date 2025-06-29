<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
Route::get('/', function () {
    return view('home');
});

Route::get('/ebook', [BookController::class, 'index']);

Route::resource('catatan', NoteController::class);