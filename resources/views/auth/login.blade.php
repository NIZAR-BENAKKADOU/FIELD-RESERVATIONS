<x-guest-layout>
<link rel="stylesheet" href="{{asset('style.css')}}">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="ring">
    <i></i>
    <i></i>
    <i></i>
    <div class="login">
        <h2>Connexion</h2>
        <form action="{{ route('login') }}" method="POST" >
            @csrf
            @error('email')
                <div class="p-1 alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="inputBx">
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" class="block mt-1 w-full" placeholder="E-mail">
            </div>
            <div class="inputBx">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" class="block mt-1 w-full" placeholder="Mot de passe">
            </div>
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" name="remember">
                    <span class="ms-2 text-sm">{{ __('Remember me') }}</span>
                </label>
            </div>
            <div class="inputBx">
                <button class="btn btn-primary mt-4 w-100">Connexion</button>
            </div>
        </form>
        <div class="links">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">
                    {{ __('Mot de passe oublié') }}
                </a>
            @endif 
            <br>
            @if (Route::has('register'))
                <a href="{{ route('register') }}">
                    {{ __('S\'inscrire') }}
                </a>
            @endif
        </div>
    </div>
</div>
</x-guest-layout><x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="ring">
    <i></i>
    <i></i>
    <i></i>
    <div class="login">
        <h2>Connexion</h2>
        <form action="{{ route('login') }}" method="POST" >
            @csrf
            @error('email')
                <div class="p-1 alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="inputBx">
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" class="block mt-1 w-full" placeholder="E-mail">
            </div>
            <div class="inputBx">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" class="block mt-1 w-full" placeholder="Mot de passe">
            </div>
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" name="remember">
                    <span class="ms-2 text-sm">{{ __('Remember me') }}</span>
                </label>
            </div>
            <div class="inputBx">
                <button class="btn btn-primary mt-4 w-100">Connexion</button>
            </div>
        </form>
        <div class="links">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">
                    {{ __('Mot de passe oublié') }}
                </a>
            @endif 
            <br>
            @if (Route::has('register'))
                <a href="{{ route('register') }}">
                    {{ __('S\'inscrire') }}
                </a>
            @endif
        </div>
    </div>
</div>
</x-guest-layout>