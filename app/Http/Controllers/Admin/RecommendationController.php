<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Recommendation;

class RecommendationController extends Controller
{
    // Tampilkan semua rekomendasi
    public function index()
    {
        $recommendations = Recommendation::with('user')->latest()->get();
        return view('admin.recommendations.index', compact('recommendations'));
    }

    // Hapus rekomendasi tertentu
    public function destroy($id)
    {
        $recommendation = Recommendation::findOrFail($id);

        // ✅ Hapus gambar dari public/ jika ada
        if ($recommendation->cover && file_exists(public_path($recommendation->cover))) {
            unlink(public_path($recommendation->cover));
        }

        $recommendation->delete();

        return redirect()->route('admin.recommendations.index')
                         ->with('success', 'Rekomendasi berhasil dihapus.');
    }
}
