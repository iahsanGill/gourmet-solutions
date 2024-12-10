<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'School Lunch Boxes Multan')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-gray-50 font-sans leading-normal tracking-normal">
    <nav class="bg-green-600 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-2xl font-bold">School Lunch Boxes</a>
            <div class="space-x-4">
                <a href="{{ route('home') }}" class="hover:text-green-200">Home</a>
                <a href="{{ route('services') }}" class="hover:text-green-200">Services</a>
                <a href="{{ route('menu') }}" class="hover:text-green-200">Menu</a>
                
                @auth
                    @if(auth()->user()->is_admin)
                        <a href="{{ route('admin.lunchboxes') }}" class="hover:text-green-200">Admin</a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="hover:text-green-200">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="hover:text-green-200">Login</a>
                @endauth
            </div>
        </div>
    </nav>

    <main class="container mx-auto mt-8 p-4">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="bg-green-800 text-white p-6 mt-8">
        <div class="container mx-auto text-center">
            <p>&copy; {{ date('Y') }} School Lunch Boxes Multan</p>
            <p class="mt-2">Variety, Health, and Freshness</p>
        </div>
    </footer>
</body>
</html>