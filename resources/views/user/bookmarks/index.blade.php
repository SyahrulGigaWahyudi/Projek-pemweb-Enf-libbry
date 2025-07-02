@extends('layouts.user')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Buku yang Telah Dibookmark</h2>

    @if($bookmarks->count())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($bookmarks as $book)
                <div class="bg-white p-4 rounded shadow">
                    @if ($book->cover)
                        <img src="{{ asset($book->cover) }}" alt="{{ $book->title }}" class="w-full h-48 object-cover rounded mb-3">
                    @endif
                    <h3 class="text-lg font-semibold">{{ $book->title }}</h3>
                    <p class="text-sm text-gray-600">Penulis: {{ $book->author }}</p>
                    <p class="text-sm text-gray-600">Penerbit: {{ $book->publisher }} ({{ $book->year }})</p>
                    <form action="{{ route('user.bookmarks.destroy', $book->id) }}" method="POST" class="mt-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline text-sm">Hapus Bookmark</button>
                    </form>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-gray-500">Belum ada buku yang dibookmark.</p>
    @endif
@endsection
