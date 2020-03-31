<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Icone -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/header.css') }}" rel="stylesheet">
    <link href="{{ asset('css/card-notifs.css') }}" rel="stylesheet">

    <!-- JQuery et Ajax-->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <!-- Dark mode -->
    <script src = "https://unpkg.com/darkreader@4.9.2/darkreader.js"></script>

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" id="header">
            <a class="navbar-brand" href="{{ url('/home') }}">
                Todo List
            </a>
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    Accueil
                </a>
                <a class="navbar-brand" href="{{ url('/Todolist') }}">
                    My ToDo
                </a>
                <a class="navbar-brand" href="{{ url('/Amis') }}">
                    Mes Amis
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="btn-group">
                            <i class="material-icons" id="icon_notif" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">notifications_none</i>
                            <div class="dropdown-menu" id="list_notif">
                            </div>
                        </div>

                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('auth.Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('auth.Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a href="{{ url('/Profil') }}">
                                    <img alt="profil-picture" src="{{asset('Images/Users/default.jpg')}}" id="img-profile">
                                </a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

        <!-- Footer -->
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/footer.css') }}" >

        <div class="container-fluid" id="footer">
            <div class="row">
                <div class="col">
                    <p class="titrefooter">A propos</p>
                </div>
                <div class="col">
                    <p class="titrefooter">Mon compte</p>
                </div>
                <div class="col">
                    <p class="titrefooter">Nous suivre</p>
                </div>
                <div class="col">
                    <p class="titrefooter">Nous Contacter</p>
                    <div class="flex">
                        <div class="colonne">
                            <i class="material-icons icone">place</i>
                            <i class="material-icons icone">email</i>
                        </div>
                        <div class="colonne">
                            <p class="parafooter">5 Avenue des Champs-Elysées, 75008 Paris</p>
                            <a href="{{ url('/Contact') }}" class="parafooter">Formulaire de contact</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <!-- Script notifications -->
    <script type="text/javascript" src="{{ URL::asset('js/Notifications.js') }}"></script>

    <script type="text/javascript">
        DarkReader.disable({
            brightness: 100,
            contrast: 90,
            sepia: 10
        });
    </script>

</body>
</html>
