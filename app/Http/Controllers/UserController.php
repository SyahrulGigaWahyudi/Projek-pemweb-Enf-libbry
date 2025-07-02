<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Tampilkan Dashboard User dengan 8 buku terbaru
     */
    public function index()
    {
        $books = Book::latest()->take(8)->get();
        return view('user.dashboard', compact('books'));
    }

    /**
     * Tampilkan semua daftar buku (paginated)
     */
    public function books()
    {
        $books = Book::latest()->paginate(12);
        return view('user.books.index', compact('books'));
    }
}
