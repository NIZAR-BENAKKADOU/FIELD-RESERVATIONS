<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About Us - Field Reservations</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased text-white bg-midnight">
    
    <!-- Navbar -->
    <nav class="fixed top-0 w-full z-50 solid-nav transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ url('/') }}" class="font-bold text-2xl tracking-wider text-white hover:text-neon-green transition-colors">
                        KOORA<span class="text-neon-green">.MA</span>
                    </a>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ url('/about') }}" class="text-neon-green font-medium transition-colors">About Us</a>
                    <a href="{{ url('/contact') }}" class="text-white hover:text-neon-green font-medium transition-colors">Contact</a>
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-white hover:text-neon-green font-medium transition-colors">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-white hover:text-neon-green font-medium transition-colors">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="bg-neon-green hover:bg-emerald-600 text-white px-5 py-2.5 rounded-full font-medium transition-all transform hover:scale-105 shadow-lg shadow-emerald-500/30">
                                    Sign Up
                                </a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    <!-- Footer -->
    <footer class="bg-midnight-light text-white py-12 border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p class="text-gray-500">© 2024 Koora.ma. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>
