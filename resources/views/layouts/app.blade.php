<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Icone -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d3e519991d.js" crossorigin="anonymous"></script>

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

    <script type="text/javascript">

        if(localStorage.getItem("text") == "brightness_3") {
            DarkReader.disable()
        } else if(localStorage.getItem("text") == "wb_sunny") {
            DarkReader.enable()
        }

        $(document).ready(function() {
            $('#sun').click(function(){
                if($('#sun').text() == 'brightness_3') {
                    DarkReader.enable()
                    $('#sun').text('wb_sunny');
                    localStorage.setItem("text","wb_sunny");
                } else if($('#sun').text() == 'wb_sunny') {
                    DarkReader.disable()
                    $('#sun').text('brightness_3');
                    localStorage.setItem("text","brightness_3");
                }
            });

            $('#sun').on('click', function() {
                localStorage.input = $(this).text();
            });

        });

    </script>

</head>

@php
use Illuminate\Support\Facades\Auth;
$current_user = Auth::user()
@endphp

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" id="header">
                <a class="navbar-brand navtitle" href="{{ url('/home') }}">
                    Todo List
                </a>
            <div class="container">
                <a class="navbar-brand navtitle" href="{{ url('/home') }}">
                    Accueil
                </a>
                <a class="navbar-brand navtitle" href="{{ url('/Todolist') }}">
                    My ToDo
                </a>
                <a class="navbar-brand navtitle" href="{{ url('/Amis') }}">
                    Mes Amis
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    </ul>

                </div>
            </div>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                @guest
                    @if(Route::has('register'))
                    @endif
                @else

                <div id="theme" class="btn-group">
                    <i id="sun" class="material-icons icone_darktheme"></i>
                </div>

                <div class="btn-group">
                    <i class="material-icons nav-link" id="icon_notif" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">notifications_none</i>
                    <div class="dropdown-menu dropdown-menu-left" id="list_notif">
                        <h6 class="dropdown-header">Demandes d'amis</h6>
                    </div>
                </div>
                @endguest

                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link navtitle" href="{{ route('login') }}">{{ __('auth.Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item navtitle">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('auth.Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a class="navtitle" href="{{ url('/Profil') }}">
                            <img alt="profil-picture" src="/Images/Users/{{ $current_user->avatar }}" id="img-profile">
                        </a>
                    </li>
                @endguest
            </ul>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

        <!-- Footer -->
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/footer.css') }}" >

        <div class="container-fluid" id="footer">
            <div class="row" >
                <div class="col col_foot" >
                    <p class="titrefooter">A propos</p>
                </div>
                <div class="col col_foot">
                    <p class="titrefooter">Nous suivre</p>
                    <i class="fab fa-facebook-square"></i>
                </div>
                <div class="col col_foot">
                    <p class="titrefooter">Localisation</p>
                    <div class="Adresse">
                        <i class="material-icons icone">place</i>
                        <span class="parafooter">5 Avenue des Champs-Elysées, 75008 Paris</span>
                    </div>
                </div>
                <div class="col col_foot">
                    <p class="titrefooter">Nous Contacter</p>

                    <div class="Contact_Formulaire">
                        <i class="material-icons icone">email</i>
                        <a href="{{ url('/Contact') }}" class="Formulaire_contact">Formulaire de contact</a>
                    </div>

                </div>
            </div>
        </div>

    </div>


    <!-- Script notifications -->
    <script type="text/javascript" src="{{ URL::asset('js/Notifications.js') }}"></script>

    <script type="text/javascript">
        $('#sun').text(localStorage.getItem("text"));
        if(localStorage.getItem("text") == null){
            $('#sun').text("brightness_3");
        }
    </script>

</body>
</html>
