<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Us - Field Reservations</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased text-gray-800 bg-gray-900">
    
    <!-- Navbar -->
    <nav class="fixed top-0 w-full z-50 solid-nav transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ url('/') }}" class="font-bold text-2xl tracking-wider text-white hover:text-indigo-400 transition-colors">
                        KOORA<span class="text-indigo-500">.MA</span>
                    </a>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ url('/about') }}" class="text-white hover:text-indigo-400 font-medium transition-colors">About Us</a>
                    <a href="{{ url('/contact') }}" class="text-indigo-400 font-medium transition-colors">Contact</a>
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-white hover:text-indigo-400 font-medium transition-colors">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-white hover:text-indigo-400 font-medium transition-colors">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2.5 rounded-full font-medium transition-all transform hover:scale-105 shadow-lg shadow-indigo-500/30">
                                    Sign Up
                                </a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="relative pt-32 pb-20 px-4 sm:px-6 lg:px-8 min-h-screen flex items-center justify-center">
        <!-- Background Elements -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Us - Field Reservations</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased text-gray-800 bg-gray-900">
    
    <!-- Navbar -->
    <nav class="fixed top-0 w-full z-50 solid-nav transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ url('/') }}" class="font-bold text-2xl tracking-wider text-white hover:text-indigo-400 transition-colors">
                        KOORA<span class="text-indigo-500">.MA</span>
                    </a>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ url('/about') }}" class="text-white hover:text-indigo-400 font-medium transition-colors">About Us</a>
                    <a href="{{ url('/contact') }}" class="text-indigo-400 font-medium transition-colors">Contact</a>
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-white hover:text-indigo-400 font-medium transition-colors">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-white hover:text-indigo-400 font-medium transition-colors">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2.5 rounded-full font-medium transition-all transform hover:scale-105 shadow-lg shadow-indigo-500/30">
                                    Sign Up
                                </a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="relative pt-32 pb-20 px-4 sm:px-6 lg:px-8 min-h-screen flex items-center justify-center">
        <!-- Background Elements -->
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden -z-10">
            <div class="absolute top-[20%] left-[20%] w-[30%] h-[30%] bg-cyan-600/20 rounded-full blur-[100px]"></div>
            <div class="absolute bottom-[20%] right-[20%] w-[30%] h-[30%] bg-indigo-600/20 rounded-full blur-[100px]"></div>
        </div>

        <div class="w-full max-w-4xl">
     <!-- Hero Section -->
    <div class="relative z-10 py-20 text-center">
        <h1 class="text-5xl font-bold text-white mb-6">Get in <span class="text-emerald-400">Touch</span></h1>
        <p class="text-xl text-gray-300 max-w-2xl mx-auto">
            Have questions? We'd love to hear from you. Send us a message and we'll respond as soon as possible.
        </p>
    </div>

    <!-- Content Section -->
    <div class="relative z-10 pb-24">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="solid-card p-8 md:p-10 rounded-3xl">
                <form class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-400 mb-2">Name</label>
                            <input type="text" class="w-full bg-gray-900 border border-gray-700 rounded-lg px-4 py-3 text-white focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all" placeholder="John Doe">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-400 mb-2">Email</label>
                            <input type="email" class="w-full bg-gray-900 border border-gray-700 rounded-lg px-4 py-3 text-white focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all" placeholder="john@example.com">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-400 mb-2">Subject</label>
                        <input type="text" class="w-full bg-gray-900 border border-gray-700 rounded-lg px-4 py-3 text-white focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all" placeholder="How can we help?">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-400 mb-2">Message</label>
                        <textarea rows="4" class="w-full bg-gray-900 border border-gray-700 rounded-lg px-4 py-3 text-white focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all" placeholder="Your message..."></textarea>
                    </div>
                    <button type="submit" class="w-full py-4 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl font-bold text-lg transition-all transform hover:scale-[1.02] shadow-lg shadow-emerald-500/30">
                        Send Message
                    </button>
                </form>

                <div class="mt-10 pt-10 border-t border-gray-700 grid grid-cols-1 md:grid-cols-3 gap-6 text-center">
                    <div>
                        <div class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center text-emerald-400 mx-auto mb-3">
                            <i class="bi bi-envelope"></i>
                        </div>
                        <p class="text-gray-400 text-sm">support@koora.ma</p>
                    </div>
                    <div>
                        <div class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center text-teal-400 mx-auto mb-3">
                            <i class="bi bi-telephone"></i>
                        </div>
                        <p class="text-gray-400 text-sm">+212 600 000 000</p>
                    </div>
                    <div>
                        <div class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center text-green-400 mx-auto mb-3">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <p class="text-gray-400 text-sm">Casablanca, Morocco</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
