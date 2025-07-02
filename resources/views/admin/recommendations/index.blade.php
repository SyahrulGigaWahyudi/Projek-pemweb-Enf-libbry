@extends('layouts.admin')

@section('title', 'Rekomendasi Buku')

@section('content')
<div class="px-4">
    <h2 class="text-2xl font-bold mb-6 text-blue-800">📚 Rekomendasi Buku dari Pembaca</h2>

    @forelse ($recommendations as $recommendation)
        <div class="bg-white rounded-xl shadow p-6 mb-6">
            <div class="flex gap-6">
                {{-- ✅ Gambar Cover --}}
                @if ($recommendation->cover)
                    <img src="{{ asset('storage/' . $recommendation->cover) }}"
                         alt="Cover {{ $recommendation->title }}"
                         class="w-32 h-40 object-cover rounded">
                @else
                    <div class="w-32 h-40 bg-gray-200 flex items-center justify-center text-sm text-gray-500 rounded">
                        Tidak ada gambar
                    </div>
                @endif

                <div class="flex-1">
                    {{-- ✅ Info Buku --}}
                    <h3 class="text-xl font-semibold text-blue-700 mb-2">{{ $recommendation->title }}</h3>
                    <p class="text-sm text-gray-600 mb-1"><strong>Pengarang:</strong> {{ $recommendation->author }}</p>
                    <p class="text-sm text-gray-600 mb-1"><strong>Penerbit:</strong> {{ $recommendation->publisher ?? '-' }}</p>
                    <p class="text-sm text-gray-600 mb-1"><strong>Tahun Rilis:</strong> {{ $recommendation->year ?? '-' }}</p>
                    <p class="text-sm text-gray-600 mb-1"><strong>Deskripsi:</strong> 
                        {{ \Illuminate\Support\Str::limit($recommendation->description, 100) }}
                    </p>

                    <div class="flex justify-between items-center mt-4">
                        <p class="text-sm text-gray-500">
                            Dari: {{ $recommendation->user->name }} | 
                            {{ $recommendation->created_at->format('d M Y') }}
                        </p>

                        <div class="flex gap-4">
                            {{-- ✅ Toggle Lihat Selengkapnya --}}
                            <button onclick="toggleDetail({{ $recommendation->id }})"
                                    class="text-blue-600 hover:underline text-sm">
                                Lihat Selengkapnya
                            </button>

                            {{-- ✅ Tombol Hapus --}}
                            <form action="{{ route('admin.recommendations.destroy', $recommendation->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus rekomendasi ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline text-sm">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>

                    {{-- ✅ Deskripsi Lengkap (toggle) --}}
                    <div id="detail-{{ $recommendation->id }}" class="mt-4 hidden">
                        <p class="text-gray-700 whitespace-pre-line">{{ $recommendation->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <p class="text-gray-600">Belum ada rekomendasi buku dari pembaca.</p>
    @endforelse
</div>

{{-- ✅ Script Toggle --}}
<script>
    function toggleDetail(id) {
        const el = document.getElementById('detail-' + id);
        if (el) {
            el.classList.toggle('hidden');
        }
    }
</script>
@endsection
