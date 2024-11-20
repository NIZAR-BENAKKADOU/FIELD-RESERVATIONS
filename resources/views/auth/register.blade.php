<x-guest-layout>
    <!-- Session Status -->
    <link rel="stylesheet" href="{{asset('style.css')}}">
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="ring">
        <i></i>
        <i></i>
        <i></i>
        <div class="login">
            <h2>Inscription</h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- nom -->
                <div class="inputBx">
                    <label for="nom">Nom d'utilisateur</label>
                    <input id="nom" class="block mt-1 w-full" type="text" name="nom" :value="old('nom')" required autofocus />
                    <x-input-error :messages="$errors->get('nom')" class="mt-2" />
                </div>

                <!-- Email -->
                <div class="inputBx">
                    <label for="email">E-mail</label>
                    <input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="inputBx">
                    <label for="password">Mot de passe</label>
                    <input id="password" class="block mt-1 w-full" type="password" name="password" required />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="inputBx">
                    <label for="password_confirmation">Confirmer le mot de passe</label>
                    <input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="inputBx">
                    <button class="btn btn-primary mt-4 w-100">{{ __('S\'inscrire') }}</button>
                </div>
            </form>

            <div class="links">
                @if (Route::has('login'))
                    <a href="{{ route('login') }}">
                        {{ __('Déjà inscrit?') }}
                    </a>
                @endif
            </div>
        </div>
    </div>
</x-guest-layout>