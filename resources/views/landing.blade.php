<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ENF-Library</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-gray-800 font-sans min-h-screen flex items-center justify-center">

    <div class="text-center space-y-8">
        <h1 class="text-4xl font-bold text-blue-700">📚 ENF-Library</h1>
        <p class="text-lg text-gray-600 max-w-xl mx-auto">
            Selamat datang di ENF-Library – platform baca buku digital melalui link pihak ketiga. Silakan login untuk mulai menjelajah koleksi buku kami.
        </p>

        <div class="flex flex-col md:flex-row justify-center gap-4">
            <a href="{{ route('login') }}"
               class="bg-blue-600 text-white px-6 py-3 rounded shadow hover:bg-blue-700 transition">
                Login User
            </a>

            <a href="{{ route('register') }}"
               class="bg-green-600 text-white px-6 py-3 rounded shadow hover:bg-green-700 transition">
                Register User
            </a>

            <a href="{{ route('admin.login') }}"
               class="bg-gray-800 text-white px-6 py-3 rounded shadow hover:bg-gray-900 transition">
                Login Admin
            </a>
        </div>
    </div>

</body>
</html>
