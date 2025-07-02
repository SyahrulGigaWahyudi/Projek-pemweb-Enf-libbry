<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Recommendation;
use Illuminate\Support\Facades\Storage;

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

        // Hapus gambar cover jika ada
        if ($recommendation->cover && Storage::disk('public')->exists($recommendation->cover)) {
            Storage::disk('public')->delete($recommendation->cover);
        }

        $recommendation->delete();

        return redirect()->route('admin.recommendations.index')
                         ->with('success', 'Rekomendasi berhasil dihapus.');
    }
}
