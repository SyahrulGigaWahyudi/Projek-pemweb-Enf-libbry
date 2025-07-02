@extends('layouts.user')

@section('content')
<div class="container mx-auto px-6 py-10">
    <h2 class="text-2xl font-bold text-blue-700 mb-4">Selamat datang di ENF-Library!</h2>
    <p class="text-gray-600 mb-6">Nikmati koleksi buku digital dan fitur seperti bookmark, catatan pribadi, dan rekomendasi buku.</p>

    <h3 class="text-xl font-semibold text-blue-600 mb-3">📚 Buku Terbaru</h3>
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse ($books as $book)
            <div class="bg-white shadow rounded-lg overflow-hidden">
                @if($book->cover)
                    <img src="{{ asset('storage/' . $book->cover) }}" alt="{{ $book->title }}" class="w-full h-48 object-cover">
                @endif
                <div class="p-4">
                    <h4 class="text-lg font-bold text-gray-800">{{ $book->title }}</h4>
                    <p class="text-sm text-gray-600">by {{ $book->author }}</p>
                    <a href="{{ $book->read_link }}" target="_blank" class="mt-2 inline-block text-sm text-blue-600 hover:underline">Baca Sekarang</a>
                </div>
            </div>
        @empty
            <p class="text-gray-500">Belum ada buku yang tersedia.</p>
        @endforelse
    </div>
</div>
@endsection
