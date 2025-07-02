@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-10">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-blue-700">Daftar Buku</h2>
        <a href="{{ route('admin.books.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + Tambah Buku
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-4 py-2 text-left">Cover</th>
                    <th class="px-4 py-2 text-left">Judul</th>
                    <th class="px-4 py-2 text-left">Author</th>
                    <th class="px-4 py-2 text-left">Penerbit</th>
                    <th class="px-4 py-2 text-left">Tahun</th>
                    <th class="px-4 py-2 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($books as $book)
                    <tr class="border-b">
                        <td class="px-4 py-2">
                            @if ($book->cover)
                                <img src="{{ asset('storage/' . $book->cover) }}" alt="Cover" class="w-16 h-20 object-cover rounded">
                            @else
                                <span class="text-gray-500">Tidak ada</span>
                            @endif
                        </td>
                        <td class="px-4 py-2">{{ $book->title }}</td>
                        <td class="px-4 py-2">{{ $book->author }}</td>
                        <td class="px-4 py-2">{{ $book->publisher }}</td>
                        <td class="px-4 py-2">{{ $book->year }}</td>
                        <td class="px-4 py-2 space-x-2">
                            <a href="{{ route('admin.books.edit', $book->id) }}" class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('admin.books.destroy', $book->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus buku ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-4 text-center text-gray-500">Belum ada buku.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $books->links() }}
    </div>
</div>
@endsection
