<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Field Reservations - Play Like a Pro</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/welcome-3d.js'])
</head>
<body class="antialiased text-gray-800">
    
    <!-- 3D Background -->
    <div id="welcome-3d" class="fixed inset-0 z-0 bg-gradient-to-br from-midnight to-midnight-light"></div>

    <!-- Navbar -->
    <nav class="fixed top-0 w-full z-50 solid-nav transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex-shrink-0 flex items-center">
                    <a href="#" class="font-bold text-2xl tracking-wider text-white hover:text-neon-green transition-colors">
                        KOORA<span class="text-neon-green">.MA</span>
                    </a>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ url('/about') }}" class="text-white hover:text-neon-green font-medium transition-colors">About Us</a>
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
                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button class="text-white hover:text-neon-green focus:outline-none">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="relative z-10 flex flex-col justify-center items-center min-h-screen text-center px-4">
        <h1 class="text-5xl md:text-7xl font-extrabold text-white tracking-tight mb-6 drop-shadow-2xl">
            PLAY LIKE <span class="text-transparent bg-clip-text bg-gradient-to-r from-neon-green to-emerald-400">A PRO</span>
        </h1>
        <p class="text-lg md:text-xl text-gray-300 max-w-2xl mb-10 leading-relaxed">
            Experience the ultimate field reservation platform. Book your spot, gather your team, and dominate the game.
        </p>
        <div class="flex flex-col sm:flex-row gap-4">
            <a href="{{ route('register') }}" class="bg-neon-green hover:bg-emerald-600 text-white text-lg px-8 py-4 rounded-full font-bold transition-all transform hover:scale-105 shadow-xl shadow-emerald-500/40 flex items-center justify-center gap-2">
                <i class="bi bi-calendar-check"></i> Book Now
            </a>
            <a href="#features" class="bg-midnight-light hover:bg-gray-800 text-white text-lg px-8 py-4 rounded-full font-bold transition-all border border-gray-700 flex items-center justify-center gap-2">
                Explore Features
            </a>
        </div>
    </div>

    <!-- Features Section -->
    <div id="features" class="relative z-10 py-24 bg-midnight border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-white mb-4">Why Choose <span class="text-neon-green">KOORA.MA</span>?</h2>
                <p class="text-gray-400">Experience the future of sports reservation.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="solid-card p-8 rounded-2xl hover:border-neon-green transition-colors duration-300 group bg-midnight-light">
                    <div class="w-14 h-14 rounded-full bg-gray-800 flex items-center justify-center text-white mb-6 group-hover:bg-neon-green group-hover:text-white transition-colors">
                        <i class="bi bi-calendar-check text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Easy Booking</h3>
                    <p class="text-gray-400">Book your favorite field in seconds with our intuitive real-time reservation system.</p>
                </div>

                <!-- Feature 2 -->
                <div class="solid-card p-8 rounded-2xl hover:border-neon-green transition-colors duration-300 group bg-midnight-light">
                    <div class="w-14 h-14 rounded-full bg-gray-800 flex items-center justify-center text-white mb-6 group-hover:bg-neon-green group-hover:text-white transition-colors">
                        <i class="bi bi-trophy text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Tournaments</h3>
                    <p class="text-gray-400">Organize and join local tournaments. Climb the leaderboard and win prizes.</p>
                </div>

                <!-- Feature 3 -->
                <div class="solid-card p-8 rounded-2xl hover:border-neon-green transition-colors duration-300 group bg-midnight-light">
                    <div class="w-14 h-14 rounded-full bg-gray-800 flex items-center justify-center text-white mb-6 group-hover:bg-neon-green group-hover:text-white transition-colors">
                        <i class="bi bi-people text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Community</h3>
                    <p class="text-gray-400">Connect with other players, form teams, and share your passion for the game.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Gallery Section -->
    <div class="relative z-10 py-24 bg-midnight border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-white mb-4">Experience the <span class="text-neon-green">Game</span></h2>
                <p class="text-gray-400">Play on premium fields designed for champions.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="group relative overflow-hidden rounded-2xl aspect-[4/3] solid-card border-0">
                    <img src="{{ asset('images/field-1.png') }}" alt="Night Match" class="w-full h-full object-cover grayscale hover:grayscale-0 transition-all duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-80"></div>
                    <div class="absolute bottom-0 left-0 p-6 translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                        <h3 class="text-xl font-bold text-white mb-1">Night Match</h3>
                        <p class="text-gray-400 text-sm">Pro Lighting</p>
                    </div>
                </div>
                <div class="group relative overflow-hidden rounded-2xl aspect-[4/3] solid-card border-0">
                    <img src="{{ asset('images/field-2.png') }}" alt="Indoor Arena" class="w-full h-full object-cover grayscale hover:grayscale-0 transition-all duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-80"></div>
                    <div class="absolute bottom-0 left-0 p-6 translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                        <h3 class="text-xl font-bold text-white mb-1">Indoor Arena</h3>
                        <p class="text-gray-400 text-sm">Climate Controlled</p>
                    </div>
                </div>
                <div class="group relative overflow-hidden rounded-2xl aspect-[4/3] solid-card border-0">
                    <img src="{{ asset('images/field-3.png') }}" alt="Urban Rooftop" class="w-full h-full object-cover grayscale hover:grayscale-0 transition-all duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-80"></div>
                    <div class="absolute bottom-0 left-0 p-6 translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                        <h3 class="text-xl font-bold text-white mb-1">Urban Rooftop</h3>
                        <p class="text-gray-400 text-sm">City Views</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="relative z-10 bg-midnight-light text-white py-12 border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-4 md:mb-0">
                    <span class="font-bold text-2xl tracking-wider">KOORA<span class="text-neon-green">.MA</span></span>
                    <p class="text-gray-500 text-sm mt-2">© 2024 All rights reserved.</p>
                </div>
                <div class="flex space-x-6">
                    <a href="#" class="text-gray-400 hover:text-white transition-colors"><i class="bi bi-facebook text-xl"></i></a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors"><i class="bi bi-twitter text-xl"></i></a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors"><i class="bi bi-instagram text-xl"></i></a>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
