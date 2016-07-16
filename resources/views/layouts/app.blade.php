<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Cave Manager</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ url ('css/style.css') }}">

</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">Accueil</a></li>
                    <li><a href="{{ url('/biblios') }}">Bibliographies</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Se connecter</a></li>
                        <li><a href="{{ url('/register') }}">S'enregistrer</a></li>
                    @else
                        <li>{{ Auth::user()->name }}</li>
                        <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Déconnexion</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- JavaScripts -->
    <script src="{{ url('js/jquery.js') }}"></script>
    <script src="{{ url('jquery-ui/jquery-ui.js') }}"></script>
</body>
</html>
