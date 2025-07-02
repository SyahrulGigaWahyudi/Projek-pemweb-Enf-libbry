@extends('layouts.user')

@section('content')
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-blue-700">📚 Selamat Datang di ENF-Library</h2>
        <p class="text-gray-600 mt-2">Temukan dan kelola buku favoritmu di sini!</p>
    </div>

    @if($books->count())
        <h3 class="text-xl font-semibold mb-4 text-gray-800">📌 Buku Terbaru</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($books as $book)
                <div class="bg-white rounded-xl shadow hover:shadow-md transition p-4">
                    {{-- Cover Buku --}}
                    @if ($book->cover && file_exists(public_path('storage/' . $book->cover)))
                        <img src="{{ asset('storage/' . $book->cover) }}"
                             alt="{{ $book->title }}"
                             class="w-full h-48 object-cover rounded mb-4">
                    @else
                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center rounded mb-4 text-gray-500 text-sm">
                            Tidak ada gambar
                        </div>
                    @endif

                    {{-- Informasi Buku --}}
                    <h4 class="text-lg font-bold text-gray-800">{{ $book->title }}</h4>
                    <p class="text-sm text-gray-600">Penulis: {{ $book->author }}</p>
                    <p class="text-sm text-gray-600 mb-2">Penerbit: {{ $book->publisher }} ({{ $book->year }})</p>
                    <p class="text-sm text-gray-700">{{ \Illuminate\Support\Str::limit($book->description, 80) }}</p>

                    {{-- Tautan --}}
                    @if($book->read_link)
                        <a href="{{ $book->read_link }}" target="_blank"
                           class="inline-block mt-3 text-sm text-blue-600 hover:underline">
                            📖 Baca Buku
                        </a>
                    @endif
                </div>
            @endforeach
        </div>
    @else
        <p class="text-gray-500">Tidak ada buku terbaru saat ini.</p>
    @endif
@endsection
