<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    public function index()
    {
        $bookmarks = auth()->user()->bookmarks()->latest()->get();
        return view('user.bookmarks.index', compact('bookmarks'));
    }

    public function store(Book $book)
    {
        $user = auth()->user();

        if (!$user->bookmarks->contains($book->id)) {
            $user->bookmarks()->attach($book->id);
        }

        return back()->with('success', 'Buku ditambahkan ke bookmark.');
    }

    public function destroy(Book $book)
    {
        auth()->user()->bookmarks()->detach($book->id);

        return back()->with('success', 'Buku dihapus dari bookmark.');
    }
}
