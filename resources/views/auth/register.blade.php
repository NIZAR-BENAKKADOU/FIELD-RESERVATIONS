<x-guest-layout>
    <div class="text-center mb-8">
        <h2 class="text-3xl font-bold text-white mb-2">Join the Game</h2>
        <p class="text-gray-400">Create your account and start booking.</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-6">
        @csrf

        <!-- Name -->
        <div>
            <label for="nom" class="block text-sm font-medium text-gray-300 mb-2">Full Name</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="bi bi-person text-gray-400"></i>
                </div>
                <input id="nom" class="w-full bg-midnight border border-gray-700 rounded-lg pl-10 pr-4 py-3 text-white focus:ring-2 focus:ring-neon-green focus:border-transparent transition-all placeholder-gray-600" type="text" name="nom" :value="old('nom')" required autofocus autocomplete="name" placeholder="John Doe" />
            </div>
            <x-input-error :messages="$errors->get('nom')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-300 mb-2">Email Address</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="bi bi-envelope text-gray-400"></i>
                </div>
                <input id="email" class="w-full bg-midnight border border-gray-700 rounded-lg pl-10 pr-4 py-3 text-white focus:ring-2 focus:ring-neon-green focus:border-transparent transition-all placeholder-gray-600" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="you@example.com" />
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
                <input id="password" class="w-full bg-midnight border border-gray-700 rounded-lg pl-10 pr-4 py-3 text-white focus:ring-2 focus:ring-neon-green focus:border-transparent transition-all placeholder-gray-600" type="password" name="password" required autocomplete="new-password" placeholder="••••••••" />
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-300 mb-2">Confirm Password</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="bi bi-shield-lock text-gray-400"></i>
                </div>
                <input id="password_confirmation" class="w-full bg-midnight border border-gray-700 rounded-lg pl-10 pr-4 py-3 text-white focus:ring-2 focus:ring-neon-green focus:border-transparent transition-all placeholder-gray-600" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="••••••••" />
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <button type="submit" class="w-full py-3 bg-neon-green hover:bg-emerald-600 text-white rounded-xl font-bold text-lg transition-all transform hover:scale-[1.02] shadow-lg shadow-emerald-500/30 flex items-center justify-center gap-2">
            <i class="bi bi-person-plus"></i> {{ __('Sign Up') }}
        </button>

        <p class="text-center text-gray-400 text-sm mt-6">
            Already have an account? 
            <a href="{{ route('login') }}" class="text-neon-green hover:text-emerald-400 font-medium transition-colors">Log in</a>
        </p>
    </form>
</x-guest-layout>