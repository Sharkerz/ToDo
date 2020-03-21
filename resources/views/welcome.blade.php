<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

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
                font-size: 75px;
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

            h2 {
                font-family: 'Crimson Text', serif;
            }

            .between {
                margin-bottom: 90px;
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
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title between">
                    <h2> Todo List </h2>
                </div>

                <div class="desc">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <br/> In a justo ultrices, dignissim leo vitae, placerat augue.</p>
                </div>

            </div>
        </div>
        <div class="footer">

        </div>

    </body>

</html>
