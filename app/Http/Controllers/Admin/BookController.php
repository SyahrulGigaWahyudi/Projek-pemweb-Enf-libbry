<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::latest()->paginate(10);
        return view('admin.books.index', compact('books'));
    }

    public function create()
    {
        return view('admin.books.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'year' => 'required|digits:4|integer',
            'description' => 'nullable|string',
            'cover' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'read_link' => 'required|url',
        ]);

        if ($request->hasFile('cover')) {
            $filename = time() . '_' . $request->file('cover')->getClientOriginalName();
            $request->file('cover')->move(public_path('covers'), $filename);
            $validated['cover'] = 'covers/' . $filename; // Simpan path relatif ke public
        }

        Book::create($validated);

        return redirect()->route('admin.books.index')->with('success', 'Buku berhasil ditambahkan.');
    }

    public function edit(Book $book)
    {
        return view('admin.books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'year' => 'required|digits:4|integer',
            'description' => 'nullable|string',
            'cover' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'read_link' => 'required|url',
        ]);

        if ($request->hasFile('cover')) {
            // Hapus cover lama jika ada
            if ($book->cover && file_exists(public_path($book->cover))) {
                unlink(public_path($book->cover));
            }

            $filename = time() . '_' . $request->file('cover')->getClientOriginalName();
            $request->file('cover')->move(public_path('covers'), $filename);
            $validated['cover'] = 'covers/' . $filename;
        }

        $book->update($validated);

        return redirect()->route('admin.books.index')->with('success', 'Buku berhasil diperbarui.');
    }

    public function destroy(Book $book)
    {
        // Hapus file cover jika ada
        if ($book->cover && file_exists(public_path($book->cover))) {
            unlink(public_path($book->cover));
        }

        $book->delete();

        return redirect()->route('admin.books.index')->with('success', 'Buku berhasil dihapus.');
    }
}
