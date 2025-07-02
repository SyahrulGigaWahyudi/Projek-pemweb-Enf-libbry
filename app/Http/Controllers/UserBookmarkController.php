<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $bookmarks = $user->bookmarks()->with('book')->latest()->get();

        return view('user.bookmarks.index', compact('bookmarks'));
    }

    public function store(Book $book)
    {
        $user = auth()->user();

        if (! $user->bookmarks()->where('book_id', $book->id)->exists()) {
            $user->bookmarks()->create([
                'book_id' => $book->id,
            ]);
        }

        return back()->with('success', 'Buku berhasil ditambahkan ke bookmark.');
    }

    public function destroy(Book $book)
    {
        $user = auth()->user();
        $user->bookmarks()->where('book_id', $book->id)->delete();

        return back()->with('success', 'Buku berhasil dihapus dari bookmark.');
    }
}
