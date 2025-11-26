<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="text-center mb-8">
        <h2 class="text-3xl font-bold text-white mb-2">Welcome Back</h2>
        <p class="text-gray-400">Sign in to continue your streak.</p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-300 mb-2">Email Address</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="bi bi-envelope text-gray-400"></i>
                </div>
                <input id="email" class="w-full bg-midnight border border-gray-700 rounded-lg pl-10 pr-4 py-3 text-white focus:ring-2 focus:ring-neon-green focus:border-transparent transition-all placeholder-gray-600" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="you@example.com" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-sm font-medium text-gray-300 mb-2">Password</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="bi bi-lock text-gray-400"></i>
                </div>
                <input id="password" class="w-full bg-midnight border border-gray-700 rounded-lg pl-10 pr-4 py-3 text-white focus:ring-2 focus:ring-neon-green focus:border-transparent transition-all placeholder-gray-600" type="password" name="password" required autocomplete="current-password" placeholder="••••••••" />
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between">
            <label for="remember_me" class="inline-flex items-center cursor-pointer group">
                <input id="remember_me" type="checkbox" class="rounded bg-midnight border-gray-700 text-neon-green shadow-sm focus:ring-neon-green transition-colors" name="remember">
                <span class="ms-2 text-sm text-gray-400 group-hover:text-white transition-colors">{{ __('Remember me') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-sm text-neon-green hover:text-emerald-400 transition-colors" href="{{ route('password.request') }}">
                    {{ __('Forgot password?') }}
                </a>
            @endif
        </div>

        <button type="submit" class="w-full py-3 bg-neon-green hover:bg-emerald-600 text-white rounded-xl font-bold text-lg transition-all transform hover:scale-[1.02] shadow-lg shadow-emerald-500/30 flex items-center justify-center gap-2">
            <i class="bi bi-box-arrow-in-right"></i> {{ __('Log in') }}
        </button>

        <p class="text-center text-gray-400 text-sm mt-6">
            Don't have an account? 
            <a href="{{ route('register') }}" class="text-neon-green hover:text-emerald-400 font-medium transition-colors">Sign up</a>
        </p>
    </form>
</x-guest-layout>