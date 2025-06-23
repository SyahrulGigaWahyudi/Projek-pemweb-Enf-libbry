<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
Route::get('/', function () {
    return view('home');
});

Route::resource('catatan', NoteController::class);