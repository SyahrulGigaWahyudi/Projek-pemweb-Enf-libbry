<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - ENF-Library</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen flex flex-col">

    <!-- Navbar -->
    <nav class="bg-blue-600 text-white px-6 py-4 shadow">
        <div class="flex justify-between items-center">
            <!-- Kiri: Logo -->
            <div class="font-bold text-lg">
                ENF-Library - Admin
            </div>

            <!-- Tengah: Menu -->
            <div class="space-x-4">
                <a href="{{ route('admin.dashboard') }}" class="hover:underline">Dashboard</a>
                <a href="{{ route('admin.books.index') }}" class="hover:underline">Kelola Buku</a>
                <a href="{{ route('admin.recommendations.index') }}" class="hover:underline">Rekomendasi Buku</a>
            </div>

            <!-- Kanan: Logout -->
            <div>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="hover:underline">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <main class="w-full px-6 py-10">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-blue-600 text-center text-sm text-black py-4 mt-auto">
        © {{ date('Y') }} Enf-Library. All rights reserved.
    </footer>

</body>
</html>
