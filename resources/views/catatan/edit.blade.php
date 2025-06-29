@extends('layouts.master')

@section('content')
<style>
  .form-container {
    max-width: 700px; margin: 0 auto; background: white;
    padding: 2em; border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
  }
  h2 { font-size: 1.8rem; margin-bottom: 1rem; color: #2e3a59; }
  label { display: block; margin-top: 1em; font-weight: bold; color: #333; }
  input, textarea {
    width: 100%; padding: 10px; margin-top: 0.5em;
    border-radius: 4px; border: 1px solid #ccc;
  }
  textarea { resize: vertical; min-height: 120px; }
  .btn {
    margin-top: 1.5em; padding: 10px 20px; border-radius: 4px;
    background-color: #2e3a59; color: white; border: none;
    cursor: pointer;
  }
  .btn-cancel { background-color: crimson; margin-left: 10px; }
</style>

<div class="form-container">
  <h2>✏️ Edit Catatan</h2>

  <form method="POST" action="{{ route('catatan.update', $catatan->id) }}">
    @csrf
    @method('PUT')

    <label>Judul Buku</label>
    <input type="text" name="bookTitle" value="{{ $catatan->bookTitle }}" required>

    <label>Bab</label>
    <input type="text" name="chapter" value="{{ $catatan->chapter }}">

    <label>Halaman</label>
    <input type="text" name="pages" value="{{ $catatan->pages }}">

    <label>Isi Catatan</label>
    <textarea name="content" required>{{ $catatan->content }}</textarea>

    <label>Tags (pisahkan dengan koma)</label>
    <input type="text" name="tags" value="{{ implode(',', $catatan->tags ?? []) }}">

    <button type="submit" class="btn">Update</button>
    <a href="{{ route('catatan.index') }}" class="btn btn-cancel">Batal</a>
  </form>
</div>
@endsection
