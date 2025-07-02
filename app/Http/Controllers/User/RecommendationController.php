<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Recommendation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RecommendationController extends Controller
{
    /**
     * Tampilkan semua rekomendasi milik user saat ini.
     */
    public function index()
    {
        $recommendations = Recommendation::where('user_id', Auth::id())->latest()->get();
        return view('user.recommendations.index', compact('recommendations'));
    }

    /**
     * Simpan rekomendasi buku dari user.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'nullable|string|max:255',
            'publisher' => 'nullable|string|max:255',
            'year' => 'nullable|string|max:4',
            'description' => 'nullable|string',
            'cover' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $coverPath = null;

        if ($request->hasFile('cover')) {
            $coverPath = $request->file('cover')->store('recommendation_covers', 'public');
        }

        Recommendation::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'year' => $request->year,
            'description' => $request->description,
            'cover' => $coverPath,
        ]);

        return redirect()->route('user.recommendations.index')
                         ->with('success', 'Rekomendasi buku berhasil dikirim.');
    }
}
