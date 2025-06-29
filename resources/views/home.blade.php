@extends('layouts.master')

@section('content')
<style>
  main { padding: 2em; }
  section { margin-top: 2em; }
  button {
    padding: 10px 20px;
    font-size: 1em;
    cursor: pointer;
    background-color: #2e3a59;
    color: white;
    border: none;
    border-radius: 4px;
  }
  ul { list-style: none; padding: 0; }
  ul li::before { content: "✔️ "; }
</style>

<main>
  <h2>Haii! Selamat Datang di Enf-Library 😄</h2>
  <p>
    Selamat datang di dunia baca digital! Enf-Library hadir buat kamu yang suka cari referensi, e-book,
    atau sekadar nyimpen bacaan favorit. Scroll aja menu di atas, dan temuin fitur-fitur kece yang siap
    nemenin perjalanan belajarmu ✨📚.
  </p>

  <section>
    <h3>Tentang Enf-Library</h3>
    <p>
      Enf-Library adalah platform perpustakaan digital yang dirancang khusus untuk mahasiswa Kampus Nurul Fikri.
      Enf-Library tuh tempat nongki-nongki digital buat para mahasiswa yang pengen baca buku tapi gak mau ribet.
      Mau cari e-book? Ada. Mau nulis catatan sambil rebahan? Bisa. Bookmark buku favorit biar gak ilang? Jelas.
      Pokoknya, ini bukan sekadar perpustakaan... ini tempat kamu nemuin inspirasi di tiap scroll.
    </p>
  </section>

  <section>
    <h3>Fitur Unggulan</h3>
    <ul>
      <li>Koleksi Buku Digital Lengkap</li>
      <li>Akses Online</li>
      <li>Upload E-book</li>
      <li>Simpan Bookmark dan Buat Catatan</li>
      <li>Rekomendasi Otomatis Berdasarkan Minat</li>
    </ul>
  </section>

  <section>
    <a href="{{ url('/koleksi') }}">
      <button>Klik Disini Untuk Jelajahi Koleksi Buku</button>
    </a>
  </section>

  <section>
    <blockquote style="font-style: italic; color: #555;">
      "Membaca adalah jendela dunia, dan Enf-Library adalah kuncinya." – Mahasiswa NF
    </blockquote>
  </section>
</main>
@endsection
