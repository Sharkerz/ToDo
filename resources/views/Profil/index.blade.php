@extends('layouts.app')

@section('content')
    <!-- Styles -->
    <link href="{{ asset('css/Profil.css') }}" rel="stylesheet">

    <div id="div-profil" class="container">

        <div class="row">
            <div class="col" id="div-img">
                <img alt="profil-picture" src="{{asset('Images/Users/default.jpg')}}" id="image-profile">
            </div>

            <div class="col">

                <div id="div-btn">
                    <button type="button" class="btn btn-secondary" id="btn-modifier" onclick="window.location.href='/Profil/{{$user->id}}/edit'">Modifier</button>
                    <button type="button" class="btn btn-secondary" id="btn-modifier" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Se déconnecter</button>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                </div>

                <div id="pseudo-lign">
                    <p class="lign">Bonjour</p>
                    <h3 class="lign" id="pseudo">{{$user->name}}</h3>
                </div>
                <br>
                <p class="p-blue">Membre depuis le {{$user->created_at }}</p>

            </div>
        </div>

        <div class="row" id="info">
            <div class="col">

            </div>
            <div class="col" id="infos">
                <hr>
                <div>
                    <div class="row" id="div-info">
                        <div class="col categorie">
                            <p>Pseudo</p>
                            <p>E-mail</p>
                            <p>Dernières modifications</p>
                        </div>
                        <div class="col">
                            <p>{{ $user->name }}</p>
                            <p>{{ $user->email }}</p>
                            <p>{{ $user->updated_at }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection
