<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation de terrain de foot</title>

    <link rel="stylesheet" href="{{ asset('welcome.css') }}">
</head>

<body>
@if (Route::has('login'))
<header class="navbar">
    <div class="brand-title">koora.ma</div>
    <a href="#" class="toggle-button" id="toggle-button">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
    </a>
    <nav class="navbar-links" id="navbar-links">
        <ul>
            @auth
            <li><a href="{{ url('/dashboard') }}">Tableau de bord</a></li>
            @else
            <li><a href="{{ route('login') }}">Se connecter</a></li>
            @if (Route::has('register'))
            <li><a href="{{ route('register') }}">Réserver</a></li>
            @endif
            @endauth
            <li><a href="#">Contact</a></li>
        </ul>
    </nav>
</header>
@endif
<div class="container">
    <div class="content">
        <h1>Réservation de terrain de foot</h1>
        <p>Réservez facilement votre terrain de foot pour une partie en famille ou entre amis. Explorez nos tarifs et disponibilités en ligne.</p>
        <div class="buttons">
            <a href="{{ route('register') }}" button id="reserveButton">Réserver maintenant</button></a>
            <a href="{{ route('register') }}" button id="reserveButton">make your life easy just from home</button></a>
        </div>
    </div>
    <div class="contenir-card">
        <div class="card">
            <img src="image/adarissa.jpeg" alt="Image Description">
            <div class="card-content">
                <h2>adarissa</h2>
                <a href="{{ route('register') }}"><button id="reserveButton">Réserver maintenant</button></a>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('toggle-button').addEventListener('click', function () {
            document.getElementById('navbar-links').classList.toggle('active');
        });
    </script>
</div>

</body>

</html>
