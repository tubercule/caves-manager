<!DOCTYPE html>
<html lang="fr">
<head>
    <link href='https://fonts.googleapis.com/css?family=Lato:400,400italic,700,700italic,900' rel='stylesheet' type='text/css'>
    <meta charset="utf-8">
    <title>Cave Manager</title>

    <link rel="stylesheet" href="{{ url ('css/default.css') }}">
    <link rel="stylesheet" href="{{ url ('css/style.css') }}">

</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">Accueil</a></li>
                    <li><a href="{{ url('/cave') }}">Sites</a></li>
                    <li><a href="{{ url('/period') }}">Périodes</a></li>
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

    <div class="content">
        @yield('content')
    </div>
    <!-- JavaScripts -->
    <script src="{{ url('js/jquery.min.js') }}"></script>
    <script src="{{ url('jquery-ui/jquery-ui.js') }}"></script>
    <script src="{{ url('js/app.js') }}"></script>
</body>
</html>
