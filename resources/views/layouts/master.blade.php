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
      position: relative;
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
    .auth-buttons {
      position: absolute;
      top: 1rem;
      right: 1rem;
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }
    .auth-buttons a,
    .auth-buttons button {
      background-color: white;
      color: #2e3a59;
      padding: 8px 14px;
      border: none;
      border-radius: 5px;
      font-weight: bold;
      cursor: pointer;
      text-decoration: none;
    }
    .auth-username {
      color: #ffffff;
      margin-right: 0.5rem;
      font-weight: normal;
    }
  </style>
  @stack('styles')
</head>

<body>

  <header>
    <h1>📚 Enf-Library</h1>
    <nav>
      <a href="{{ url('/') }}">Beranda</a>
      <a href="/ebook">E-Book & Artikel</a>
      <a href="/bookmark">Bookmark</a>
      <a href="{{ route('catatan.index') }}">Catatan</a>
      <a href="{{ route('rekomendasi') }}">Rekomendasi</a>
    </nav>

    {{-- Tombol Login / Register / Logout --}}
    <div class="auth-buttons">
      @guest
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Register</a>
      @endguest

      @auth
        <span class="auth-username">👋 Halo, {{ Auth::user()->name }}</span>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit">Logout</button>
        </form>
      @endauth
    </div>
  </header>

  <main>
    @yield('content')
  </main>

  <footer>
    <p>© 2023 Enf-Library. All rights reserved.</p>
  </footer>

</body>
</html>
