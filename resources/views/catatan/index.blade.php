@extends('layouts.master')

@section('content')
<style>
  h2 { font-size: 1.8rem; margin-bottom: 1rem; color: #2e3a59; }
  .top-bar {
    display: flex; justify-content: space-between; align-items: center;
    margin-bottom: 1.5rem;
  }
  .top-bar a {
    background-color: #2e3a59; color: white;
    padding: 10px 16px; text-decoration: none;
    border-radius: 4px;
  }
  .note-container {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 20px;
  }
  .note-card {
    background: white; border-radius: 8px; padding: 20px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
  }
  .note-card h3 { margin: 0 0 10px 0; color: #2e3a59; }
  .note-card p { margin: 5px 0; color: #555; }
  .tag {
    display: inline-block;
    background-color: #e0e7ff; color: #4f46e5;
    border-radius: 20px; padding: 3px 10px;
    font-size: 0.8em; margin: 2px 4px 0 0;
  }
  .action-buttons {
    margin-top: 10px; display: flex; gap: 10px;
  }
  .btn {
    padding: 6px 12px; border-radius: 4px; font-size: 0.9em;
    text-decoration: none; border: none; cursor: pointer;
  }
  .btn-edit { background-color: orange; color: black; }
  .btn-delete { background-color: crimson; color: white; }
</style>

<div class="top-bar">
  <h2>📚 Catatan Buku Saya</h2>
  <a href="{{ route('catatan.create') }}">+ Catatan Baru</a>
</div>

@if (session('success'))
  <p style="color: green;">{{ session('success') }}</p>
@endif

<div class="note-container">
  @forelse ($notes as $note)
    <div class="note-card">
      <h3>{{ $note->bookTitle }}</h3>
      @if ($note->chapter)
        <p><strong>Bab:</strong> {{ $note->chapter }}</p>
      @endif
      @if ($note->pages)
        <p><strong>Halaman:</strong> {{ $note->pages }}</p>
      @endif
      <p>{{ $note->content }}</p>

      <div>
        @foreach ($note->tags ?? [] as $tag)
          <span class="tag">{{ $tag }}</span>
        @endforeach
      </div>

      <div class="action-buttons">
        <a href="{{ route('catatan.edit', $note->id) }}" class="btn btn-edit">Edit</a>
        <form action="{{ route('catatan.destroy', $note->id) }}" method="POST" style="display:inline;">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-delete" onclick="return confirm('Hapus catatan ini?')">Hapus</button>
        </form>
      </div>
    </div>
  @empty
    <p>Belum ada catatan ditambahkan.</p>
  @endforelse
</div>
@endsection
