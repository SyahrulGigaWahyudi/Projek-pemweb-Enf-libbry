@extends('layouts.user')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-4">Rekomendasikan Buku</h2>

    {{-- Pesan sukses --}}
    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-3 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tampilkan error validasi --}}
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 mb-4 rounded">
            <ul class="list-disc ml-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form rekomendasi --}}
    <form action="{{ route('user.recommendations.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label for="title" class="block font-semibold">Judul Buku</label>
            <input type="text" name="title" id="title" class="w-full border rounded p-2" value="{{ old('title') }}" required>
        </div>

        <div class="mb-4">
            <label for="author" class="block font-semibold">Pengarang</label>
            <input type="text" name="author" id="author" class="w-full border rounded p-2" value="{{ old('author') }}">
        </div>

        <div class="mb-4">
            <label for="publisher" class="block font-semibold">Penerbit</label>
            <input type="text" name="publisher" id="publisher" class="w-full border rounded p-2" value="{{ old('publisher') }}">
        </div>

        <div class="mb-4">
            <label for="year" class="block font-semibold">Tahun Terbit</label>
            <input type="text" name="year" id="year" class="w-full border rounded p-2" value="{{ old('year') }}">
        </div>

        <div class="mb-4">
            <label for="description" class="block font-semibold">Deskripsi</label>
            <textarea name="description" id="description" rows="4" class="w-full border rounded p-2">{{ old('description') }}</textarea>
        </div>

        <div class="mb-4">
            <label for="cover" class="block font-semibold">Upload Gambar (Opsional)</label>
            <input type="file" name="cover" id="cover" class="w-full border p-2 bg-white">
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Kirim Rekomendasi
            </button>
        </div>
    </form>
</div>

{{-- Daftar rekomendasi sebelumnya (opsional) --}}
@if ($recommendations->count())
    <div class="max-w-4xl mx-auto mt-10">
        <h3 class="text-xl font-semibold mb-3">Rekomendasi yang Telah Dikirim</h3>
        <div class="grid md:grid-cols-2 gap-6">
            @foreach ($recommendations as $rec)
                <div class="bg-white rounded shadow p-4 flex gap-4">
                    @if ($rec->cover)
                        <img src="{{ asset('storage/' . $rec->cover) }}" alt="Cover" class="w-24 h-32 object-cover rounded">
                    @else
                        <div class="w-24 h-32 bg-gray-200 flex items-center justify-center text-sm text-gray-500 rounded">No Cover</div>
                    @endif
                    <div>
                        <h4 class="font-bold text-lg">{{ $rec->title }}</h4>
                        @if ($rec->author) <p><span class="font-semibold">Pengarang:</span> {{ $rec->author }}</p> @endif
                        @if ($rec->publisher) <p><span class="font-semibold">Penerbit:</span> {{ $rec->publisher }}</p> @endif
                        @if ($rec->year) <p><span class="font-semibold">Tahun:</span> {{ $rec->year }}</p> @endif
                        @if ($rec->description) <p class="mt-2 text-sm text-gray-700">{{ $rec->description }}</p> @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif
@endsection
