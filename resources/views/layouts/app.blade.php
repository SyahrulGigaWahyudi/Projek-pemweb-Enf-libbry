<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Dashboard - ENF-Library</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen">

    <!-- Navbar (dibuat lebih rapi dan konsisten di seluruh halaman) -->
    <nav class="bg-blue-600 text-white px-10 py-4 shadow-md">
        <div class="flex justify-between items-center">
            <div class="flex items-center space-x-6">
                <h1 class="text-xl font-bold tracking-wide">📘 ENF-Library</h1>
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

    <!-- Content -->
    <main class="container mx-auto px-6 py-10">
        @yield('content')
    </main>

</body>
</html>
