<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Crimson+Text|Work+Sans:400,700" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-image:url("/Images/background.png");
                background-size: auto;
                background-repeat: no-repeat;
                color: #ffffff;
                font-family: 'Work Sans', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 5px;
            }

            .links > a {
                color: #ffffff;
                padding: 0 25px;
                font-size: 15px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            h1 {
                font-family: 'Crimson Text', serif;
                font-size: 80px;
            }

            .between {
                margin-bottom: 80px;
            }

            .desc p {
                font-size: 30px;
                line-height: 200%;
                margin: 0 0 0 0;
                padding: 0;
            }

            .footer {
                background-color: black;
                width: 100%;
                height: 10%;
                opacity: 0.45;
                text-align: center;
            }

            .footer p {
                color: white;
                font-size: 22px;
            }

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">{{ __('auth.Login') }}</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">{{ __('auth.Register') }}</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title between">
                    <h1> Todo List </h1>
                </div>

                <div class="desc">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <br/> In a justo ultrices, dignissim leo vitae, placerat augue.</p>
                </div>

            </div>
        </div>
        <div class="container-fluid footer">
            <div class="row">
                <div class="col">
                    <p>One of three columns </p>
                </div>
                <div class="col">
                    <p>One of three columns </p>
                </div>
                <div class="col">
                    <p>One of three columns </p>
                </div>
            </div>
        </div>

    </body>

</html>
