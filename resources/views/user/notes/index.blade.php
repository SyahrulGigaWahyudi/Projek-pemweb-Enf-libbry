@extends('layouts.user')

@section('title', 'Catatan')

@section('content')
<section class="w-full max-w-4xl text-left mx-auto">
    {{-- ✅ Judul dan Tombol Tambah (judul kiri, tombol kanan) --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
        <h2 class="text-2xl font-bold text-blue-800 mb-2 md:mb-0">📖 Catatan Bacaan Pribadi</h2>
        <button onclick="toggleForm()" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded font-medium w-max">
            ➕ Tambah Catatan
        </button>
    </div>

    {{-- ✅ Notifikasi --}}
    @if (session('success'))
        <div class="mb-4 bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded">
            {{ session('success') }}
        </div>
    @endif

    {{-- ✅ Form Tambah Catatan --}}
    <div id="note-form" class="bg-white p-6 rounded shadow mb-10 hidden">
        <form action="{{ route('user.notes.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="title" class="block text-sm font-semibold mb-1">Judul Buku</label>
                    <input type="text" name="title" id="title" required
                           class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-400">
                </div>
                <div>
                    <label for="chapter" class="block text-sm font-semibold mb-1">Bab</label>
                    <input type="text" name="chapter" id="chapter"
                           class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-400">
                </div>
                <div>
                    <label for="page" class="block text-sm font-semibold mb-1">Halaman</label>
                    <input type="text" name="page" id="page"
                           class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-400">
                </div>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-semibold mb-1">Deskripsi Catatan</label>
                <textarea name="description" id="description" rows="4"
                          class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-400"
                          placeholder="Tulis catatan atau ringkasan bacaan di sini..."></textarea>
            </div>

            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded font-semibold">
                💾 Simpan Catatan
            </button>
        </form>
    </div>

    {{-- ✅ Daftar Catatan --}}
    @if ($notes->isEmpty())
        <p class="text-gray-600">Belum ada catatan.</p>
    @else
        <div class="grid md:grid-cols-2 gap-6">
            @foreach ($notes as $note)
                <div class="bg-white shadow-md rounded-xl p-5">
                    <h3 class="text-lg font-bold text-blue-800 mb-1">{{ $note->title }}</h3>
                    <p class="text-sm text-gray-600">Bab {{ $note->chapter ?? '-' }}</p>
                    <p class="text-sm text-gray-600 mb-2">Halaman: {{ $note->page ?? '-' }}</p>
                    <p class="text-gray-700 text-sm mb-4">{{ $note->description ?? '-' }}</p>

                    <div class="flex gap-2">
                        <a href="{{ route('user.notes.edit', $note->id) }}"
                           class="bg-blue-600 hover:bg-blue-700 text-white text-sm px-4 py-1.5 rounded-md">
                            ✏️ Edit
                        </a>
                        <form action="{{ route('user.notes.destroy', $note->id) }}" method="POST"
                              onsubmit="return confirm('Yakin ingin menghapus catatan ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="bg-red-600 hover:bg-red-700 text-white text-sm px-4 py-1.5 rounded-md">
                                🗑️ Hapus
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</section>

{{-- ✅ Script Toggle Form --}}
<script>
    function toggleForm() {
        const form = document.getElementById('note-form');
        form.classList.toggle('hidden');
        form.scrollIntoView({ behavior: 'smooth' });
    }
</script>
@endsection
