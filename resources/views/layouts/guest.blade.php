<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('koora.ma', 'koora.ma') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-100 antialiased">
    <!-- Background Gradient -->
    <div class="fixed inset-0 z-0 bg-gradient-to-br from-midnight via-gray-900 to-midnight-light"></div>
    
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 relative z-10">
        <div class="mb-8">
            <a href="/">
                <div class="font-bold text-4xl tracking-wider text-white drop-shadow-lg hover:scale-105 transition-transform duration-300">
                    KOORA<span class="text-neon-green">.MA</span>
                </div>
            </a>
        </div>
        <div class="w-full sm:max-w-md px-8 py-8 glass-dark shadow-2xl overflow-hidden sm:rounded-3xl border border-white/10 relative backdrop-blur-xl">
            <!-- Decorative glow -->
            <div class="absolute top-0 left-1/2 transform -translate-x-1/2 w-3/4 h-1 bg-gradient-to-r from-transparent via-neon-green to-transparent opacity-75 shadow-[0_0_15px_rgba(16,185,129,0.5)]"></div>
            {{ $slot }}
        </div>
    </div>
</body>
</html>
