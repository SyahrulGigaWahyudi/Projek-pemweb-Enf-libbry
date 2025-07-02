@extends('layouts.user')

@section('content')
<div class="max-w-2xl mx-auto">
    <h2 class="text-2xl font-bold mb-6">Edit Catatan</h2>

    <form action="{{ route('user.notes.update', $note->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Judul Buku</label>
            <input type="text" name="title" id="title" value="{{ old('title', $note->title) }}" required
                   class="w-full border rounded p-2">
        </div>

        <div>
            <label for="page" class="block text-sm font-medium text-gray-700">Halaman</label>
            <input type="text" name="page" id="page" value="{{ old('page', $note->page) }}"
                   class="w-full border rounded p-2">
        </div>

        <div>
            <label for="chapter" class="block text-sm font-medium text-gray-700">Bab</label>
            <input type="text" name="chapter" id="chapter" value="{{ old('chapter', $note->chapter) }}"
                   class="w-full border rounded p-2">
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
            <textarea name="description" id="description" rows="4" class="w-full border rounded p-2">{{ old('description', $note->description) }}</textarea>
        </div>

        <div class="flex justify-end">
            <a href="{{ route('user.notes.index') }}" class="text-gray-600 hover:underline mr-4">Batal</a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
        </div>
    </form>
</div>
@endsection
