<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Note;

class NoteController extends Controller
{
    // ✅ Menampilkan semua catatan user
    public function index()
    {
        $notes = Note::where('user_id', auth()->id())->latest()->get();
        return view('user.notes.index', compact('notes'));
    }

    // ✅ Menyimpan catatan baru
    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'page' => 'nullable|string|max:50',
        'chapter' => 'nullable|string|max:50',
        'description' => 'nullable|string',
    ]);

    Note::create([
        'user_id' => auth()->id(),
        'title' => $request->title,
        'page' => $request->page,
        'chapter' => $request->chapter,
        'description' => $request->description, // ✅ WAJIB ADA
    ]);

    return redirect()->route('user.notes.index')->with('success', 'Catatan berhasil ditambahkan.');
}
    // ✅ Tampilkan form edit catatan
    public function edit($id)
    {
        $note = Note::where('user_id', auth()->id())->findOrFail($id);
        return view('user.notes.edit', compact('note'));
    }

    // ✅ Simpan hasil edit
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'page' => 'nullable|string|max:50',
            'chapter' => 'nullable|string|max:50',
            'description' => 'nullable|string',
        ]);

        $note = Note::where('user_id', auth()->id())->findOrFail($id);

        $note->update([
            'title' => $request->title,
            'page' => $request->page,
            'chapter' => $request->chapter,
            'description' => $request->description,
        ]);

        return redirect()->route('user.notes.index')->with('success', 'Catatan berhasil diperbarui.');
    }

    // ✅ Hapus catatan
    public function destroy($id)
    {
        $note = Note::where('user_id', auth()->id())->findOrFail($id);
        $note->delete();

        return redirect()->route('user.notes.index')->with('success', 'Catatan berhasil dihapus.');
    }
}
