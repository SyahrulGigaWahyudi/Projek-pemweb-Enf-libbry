@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-10">
    <h2 class="text-2xl font-bold text-blue-700 mb-6">Tambah Buku Baru</h2>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <strong>Terjadi kesalahan!</strong>
            <ul class="mt-2 list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Judul Buku</label>
            <input type="text" name="title" class="w-full border border-gray-300 px-4 py-2 rounded" value="{{ old('title') }}" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Pengarang</label>
            <input type="text" name="author" class="w-full border border-gray-300 px-4 py-2 rounded" value="{{ old('author') }}" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Penerbit</label>
            <input type="text" name="publisher" class="w-full border border-gray-300 px-4 py-2 rounded" value="{{ old('publisher') }}" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Tahun Terbit</label>
            <input type="number" name="year" class="w-full border border-gray-300 px-4 py-2 rounded" value="{{ old('year') }}" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Deskripsi Singkat</label>
            <textarea name="description" rows="4" class="w-full border border-gray-300 px-4 py-2 rounded">{{ old('description') }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Cover Buku</label>
            <input type="file" name="cover" class="w-full border border-gray-300 px-4 py-2 rounded">
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2">Link Baca (Pihak ke-3)</label>
            <input type="url" name="read_link" class="w-full border border-gray-300 px-4 py-2 rounded" value="{{ old('read_link') }}" required>
        </div>

        <div class="flex items-center justify-between">
            <a href="{{ route('admin.books.index') }}" class="text-gray-600 hover:underline">← Kembali</a>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Simpan Buku
            </button>
        </div>
    </form>
</div>
@endsection
