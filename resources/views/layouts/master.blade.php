<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gourmet Lunch Solutions')</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mobile.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @stack('styles')
</head>
<body>
    <header>
        <h1>Gourmet Lunch Solutions</h1>
        <div class="header-anchor-buttons">
            @guest
                <a href="{{ route('login') }}">Log In</a>
            @else
                <a href="{{ route('admin.dashboard') }}">My Dashboard</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">Log Out</button>
                </form>
            @endguest
        </div>
        <nav>
            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/about') }}">About Us</a></li>
                <li><a href="{{ url('/browse') }}">Browse</a></li>
                <li>
                    <a href="{{ route('register') }}" 
                       class="@auth disabled-link @endauth"
                       @auth onclick="return false;" @endauth>
                        Register
                    </a>
                </li>
            </ul>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <div class="footer-content">
            <p>Follow Us:</p>
            <div class="social-icons">
                <a href="https://www.facebook.com/gourmetlunch" target="_blank" aria-label="Facebook"><i class="fab fa-facebook"></i></a>
                <a href="https://twitter.com/gourmetlunch" target="_blank" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                <a href="https://www.instagram.com/gourmetlunch" target="_blank" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                <a href="https://www.linkedin.com/gourmetlunch" target="_blank" aria-label="LinkedIn"><i class="fab fa-linkedin"></i></a>
            </div>
            <p class="copyright">&copy; 2024 Gourmet Lunch Solutions. All Rights Reserved.</p>
        </div>
        <div class="text-style-buttons">
            <button id="change-text-style">Change Text Style</button>
            <button id="reset-text-style">Reset Text Style</button>
            <button id="toggle-background">Change Background</button>
        </div>
    </footer>

    <script src="{{ asset('js/scripts.js') }}"></script>
    @stack('scripts')
</body>
</html>
