<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', "EndoSkull")</title>
    <link rel="icon" href="{{ asset("img/EndoSkull-01-noBG-carre.ico") }}">
    <link rel="stylesheet" href="{{ asset("css/default.css")}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600700;900&display=swap" rel="stylesheet">
    <script src="{{ asset("js/main.js")}}" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>
<body>
    <div class="head">
        <div class="head-img">
            <img src="{{asset("img/EndoSkull-texte.png")}}" alt="Texte EndoSkull">
        </div>
        <div class="nav">
            <a href="/">Acceuil</a>
            <a href="/news">News</a>
            <a href="/wiki">Wiki</a>
            <a href="https://shop.endoskull.fr" class="shop">Boutique</a>
        </div>
        <div class="ip">
            <div>
                <h2>Rejoins nous !</h2>
                <input class="ip-input" type="button" value="mc.endoskull.fr">
            </div>
        </div>
    </div>
    <div class="home">
        <div class="home-filter">
            <div class="home-content">
                <div class="home-logo">
                    <img src="{{asset("img/EndoSkull-01-noBG-carre.png")}}" width="500px" alt="Logo EndoSkull">
                </div>
                <div class="welcome">
                    <h1>Bienvenue</h1>
                    <h3>EndoSkull est un serveur mini jeux où vous pourrez jouer à du Bedwars (mode goulag) et du PvpKit</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="media">

        <div class="discord">
            <a href="/discord" target="_blank"><i class="bi bi-discord rainbow rainbow-1" style="font-size: 3em"></i></a>
            <h3>Rejoins notre discord !</h3>
        </div>
        <div class="minecraft">
            <?php
                $online_count = \App\Http\Controllers\HomeController::onlinePlayers();
            ?>
            @if($online_count > 1)
                <h4>Il y a {{ $online_count }} joueurs en ligne</h4>
            @else
                <h4>Il y a {{ $online_count }} joueur en ligne</h4>
            @endif
        </div>
        <div class="twitter">
            <h3>Suis-nous sur twitter !</h3>
            <a href="/twitter" target="_blank"><i class="bi bi-twitter" style="font-size: 3em"></i></a>
        </div>
    </div>
    <div class="transition"></div>
    <div class="content">
        @yield('content')
    </div>


    <div class="transition-reverse"></div>
    <div class="foot">
        <div class="foot-text">
            <h3>Copyright © {{ date("Y") }} EndoSkull - Tous droits réservés.</h3>
            <h3>Mise en ligne et développé par @BebeDlaStreat</h3>
            <h3>EndoSkull n'est pas affilié à Mojang, AB.</h3>
        </div>
    </div>
</body>
</html>
