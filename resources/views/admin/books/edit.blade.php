@extends('layouts.admin')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Edit Buku</h2>

    <form action="{{ route('admin.books.update', $book->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="title" class="block font-medium">Judul</label>
            <input type="text" name="title" value="{{ old('title', $book->title) }}" class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label for="author" class="block font-medium">Penulis</label>
            <input type="text" name="author" value="{{ old('author', $book->author) }}" class="w-full border p-2 rounded">
        </div>

        <div>
            <label for="publisher" class="block font-medium">Penerbit</label>
            <input type="text" name="publisher" value="{{ old('publisher', $book->publisher) }}" class="w-full border p-2 rounded">
        </div>

        <div>
            <label for="year" class="block font-medium">Tahun Terbit</label>
            <input type="number" name="year" value="{{ old('year', $book->year) }}" class="w-full border p-2 rounded">
        </div>

        <div>
            <label for="read_link" class="block font-medium">Link Baca</label>
            <input type="url" name="read_link" value="{{ old('read_link', $book->read_link) }}" class="w-full border p-2 rounded">
        </div>

        <div>
            <label for="description" class="block font-medium">Deskripsi</label>
            <textarea name="description" rows="4" class="w-full border p-2 rounded">{{ old('description', $book->description) }}</textarea>
        </div>

        <div>
            <label for="cover" class="block font-medium">Ganti Cover (Opsional)</label>
            <input type="file" name="cover" class="w-full border p-2 rounded">
            @if($book->cover)
                <img src="{{ asset('storage/covers/' . $book->cover) }}" alt="Cover Buku" class="mt-2 w-32">
            @endif
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update</button>
    </form>
@endsection
