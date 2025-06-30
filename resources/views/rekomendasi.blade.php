@extends('layouts.master')

@push('styles')
<style>
    html, body {
    background-color: #f1f3f5;
    font-family: 'Segoe UI', sans-serif;
  }

  main { padding: 2em; }
  section { margin-top: 2em; }

  ul { list-style: none; padding: 0; }
  ul li::before { content: "✔️ "; }

  .recommendation-form {
    max-width: 600px;
    margin: 50px auto;
    padding: 30px;
    background-color: #ffffff;
    border-radius: 16px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
  }

  .recommendation-form h2 {
    text-align: center;
    margin-bottom: 25px;
    color: #0d6efd;
  }

  .form-label {
    font-weight: 600;
  }

  .btn-primary {
    width: 100%;
    padding: 10px;
    font-weight: bold;
    background-color: #2e3a59;
    color: white;
    border: none;
    border-radius: 4px;
  }
</style>
@endpush

@section('content')
<main>
    <div class="recommendation-form">
    <h2>Rekomendasikan Buku</h2>
    <form action="#" method="post">
      <div class="mb-3">
        <label for="judul" class="form-label">Judul Buku</label>
        <input type="text" class="form-control" id="judul" name="judul" required>
      </div>

      <div class="mb-3">
        <label for="pengarang" class="form-label">Pengarang</label>
        <input type="text" class="form-control" id="pengarang" name="pengarang" required>
      </div>

      <div class="mb-3">
        <label for="penerbit" class="form-label">Penerbit</label>
        <input type="text" class="form-control" id="penerbit" name="penerbit">
      </div>

      <div class="mb-3">
        <label for="tahun" class="form-label">Tahun Terbit</label>
        <input type="number" class="form-control" id="tahun" name="tahun" min="1000" max="2099">
      </div>

      <div class="mb-3">
        <label for="alasan" class="form-label">Alasan Rekomendasi</label>
        <textarea class="form-control" id="alasan" name="alasan" rows="4" required></textarea>
      </div>

      <button type="submit" class="btn btn-primary">Kirim Rekomendasi</button>
    </form>
  </div>
</main>
@endsection 