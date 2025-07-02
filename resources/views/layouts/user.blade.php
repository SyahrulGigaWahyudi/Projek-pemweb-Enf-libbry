<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>ENF-Library | @yield('title', 'Pembaca')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="min-h-screen flex flex-col bg-gray-100 text-gray-800">

    <!-- ✅ Navbar -->
    <nav class="bg-blue-700 text-white shadow-md">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-6">
                <a href="{{ route('user.dashboard') }}" class="text-xl font-bold tracking-wide hover:underline">
                    📘 ENF-Library
                </a>
                <a href="{{ route('user.dashboard') }}" class="hover:underline">Dashboard</a>
                <a href="{{ route('user.books.index') }}" class="hover:underline">Daftar Buku</a>
                <a href="{{ route('user.bookmarks.index') }}" class="hover:underline">Bookmark</a>
                <a href="{{ route('user.notes.index') }}" class="hover:underline">Catatan</a>
                <a href="{{ route('user.recommendations.index') }}" class="hover:underline">Rekomendasi</a>
            </div>
            <div>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                   class="hover:underline">Logout</a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            </div>
        </div>
    </nav>

    <!-- ✅ Konten -->
    <main class="flex-1 px-6 py-10">
        @yield('content')
    </main>

    <!-- ✅ Footer -->
    <footer class="bg-blue-600 text-black text-sm text-center py-4">
        © {{ date('Y') }} Enf-Library. All rights reserved.
    </footer>

</body>
</html>
