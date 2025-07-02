@extends('layouts.user')

@section('content')
    <h2 class="text-2xl font-bold mb-6">📚 Daftar Buku</h2>

    @if($books->count())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($books as $book)
                <div class="bg-white rounded-xl shadow hover:shadow-md transition duration-200 p-4 flex flex-col justify-between">
                    
                    {{-- ✅ Cover Gambar --}}
                    @if ($book->cover && file_exists(public_path('storage/' . $book->cover)))
                        <img src="{{ asset('storage/' . $book->cover) }}"
                             alt="{{ $book->title }}"
                             class="w-full h-48 object-cover rounded mb-4">
                    @else
                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center rounded mb-4 text-sm text-gray-500">
                            Tidak ada gambar
                        </div>
                    @endif

                    {{-- ✅ Info Buku --}}
                    <div>
                        <h3 class="text-lg font-semibold">{{ $book->title }}</h3>
                        <p class="text-sm text-gray-600 mt-1">Penulis: {{ $book->author }}</p>
                        <p class="text-sm text-gray-600">Penerbit: {{ $book->publisher }} ({{ $book->year }})</p>
                        <p class="mt-2 text-sm text-gray-700">{{ \Illuminate\Support\Str::limit($book->description, 100) }}</p>
                    </div>

                    {{-- ✅ Tombol Aksi --}}
                    <div class="mt-4 flex flex-col gap-2">
                        @if($book->read_link)
                            <a href="{{ $book->read_link }}" target="_blank"
                               class="inline-block text-center bg-green-600 hover:bg-green-700 text-white text-sm font-medium py-1.5 px-3 rounded">
                                📖 Baca Buku
                            </a>
                        @endif

                        {{-- Tombol Bookmark --}}
                        <form action="{{ route('user.bookmarks.store', $book->id) }}" method="POST">
                            @csrf
                            <button type="submit"
                                    class="w-full bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium py-1.5 px-3 rounded">
                                📌 Tambah Bookmark
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- ✅ Pagination --}}
        <div class="mt-8">
            {{ $books->links() }}
        </div>
    @else
        <p class="text-gray-500">Tidak ada buku yang tersedia.</p>
    @endif
@endsection
