<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class NoteController extends Controller
{
    // Tampilkan semua catatan
    public function index()
    {
        $notes = Note::all();
        return view('catatan.index', compact('notes'));
    }

    // Tampilkan form tambah catatan
    public function create()
    {
        return view('catatan.create');
    }

    // Simpan catatan baru
    public function store(Request $request)
    {
        $request->validate([
            'bookTitle' => 'required',
            'content' => 'required',
        ]);

        Note::create([
            'bookTitle' => $request->bookTitle,
            'chapter'   => $request->chapter,
            'pages'     => $request->pages,
            'content'   => $request->content,
            'tags'      => $request->tags ? explode(',', $request->tags) : [],
        ]);

        return redirect()->route('catatan.index')->with('success', 'Catatan berhasil ditambahkan!');
    }

    // Tampilkan form edit
    public function edit($id)
    {
        $catatan = Note::findOrFail($id);
        return view('catatan.edit', compact('catatan'));
    }

    // Update catatan
    public function update(Request $request, $id)
    {
        $request->validate([
            'bookTitle' => 'required',
            'content' => 'required',
        ]);

        $note = Note::findOrFail($id);
        $note->update([
            'bookTitle' => $request->bookTitle,
            'chapter'   => $request->chapter,
            'pages'     => $request->pages,
            'content'   => $request->content,
            'tags'      => $request->tags ? explode(',', $request->tags) : [],
        ]);

        return redirect()->route('catatan.index')->with('success', 'Catatan berhasil diperbarui!');
    }

    // Hapus catatan
    public function destroy($id)
    {
        $note = Note::findOrFail($id);
        $note->delete();

        return redirect()->route('catatan.index')->with('success', 'Catatan berhasil dihapus.');
    }
}
