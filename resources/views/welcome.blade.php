<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Üdvözlő oldal</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md text-center">
        <h1 class="text-2xl font-bold mb-6">Üdvözöllek!</h1>

        @if (auth()->check())
            <!-- Bejelentkezett felhasználó üdvözlése -->
            <p class="text-gray-700 mb-4">Szia, <span class="font-semibold">{{ auth()->user()->username }}</span>!</p>

            <!-- Kijelentkezési gomb -->
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="bg-red-600 text-white py-2 px-4 rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                    Kijelentkezés
                </button>
            </form>
        @else
            <!-- Bejelentkezés és regisztráció linkjei -->
            <p class="text-gray-700">
                <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-500">Bejelentkezés</a> |
                <a href="{{ route('register.create') }}" class="text-indigo-600 hover:text-indigo-500">Regisztráció</a>
            </p>
            <p>
                <a href="{{ route('auth.google') }} " class="text-indigo-600 hover:text-indigo-500">Bejelentkezés Google-fiókkal</a>
            </p>

        @endif
    </div>
</body>
</html>