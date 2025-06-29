<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Enf-Library</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    html, body {
      height: 100%;
      margin: 0;
      display: flex;
      flex-direction: column;
      font-family: Arial, sans-serif;
    }
    header, footer {
      background-color: #2e3a59;
      color: white;
      padding: 1rem;
      text-align: center;
    }
    nav a {
      color: white;
      margin: 0 1em;
      text-decoration: none;
    }
    main {
      flex: 1;
      padding: 2rem;
      background-color: #f8f9fa;
    }
  </style>
</head>
<body>

  <header>
    <h1>📚 Enf-Library</h1>
    <nav>
      <a href="{{ url('/') }}">Beranda</a>
      <a href="/ebook">E-Book & Artikel</a>
      <a href="/bookmark">Bookmark</a>
      <a href="{{ route('catatan.index') }}">Catatan</a>
      <a href="/rekomendasi">Rekomendasi</a>
    </nav>
  </header>

  <main>
    @yield('content')
  </main>

  <footer>
    <p>© 2023 Enf-Library. All rights reserved.</p>
  </footer>

</body>
</html>