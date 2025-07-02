<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    public function index()
    {
        $bookmarks = Bookmark::with('book')->get();
        return view('bookmark', [
            'bookmarks' => $bookmarks
        ]);
    }

    public function store(Request $request)
    {
        Bookmark::create([
            'book_id' => (int) $request->id
        ]);

        return redirect('/bookmark');
    }
}
