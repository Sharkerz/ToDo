@extends('layouts.app')

@section('content')

@php
    //Import de class Auth
    use Illuminate\Support\Facades\Auth;
@endphp

    <!-- Styles -->
    <link href="{{ asset('css/Profil.css') }}" rel="stylesheet">

    <div id="div-profil" class="container">

        <div class="row">
            <div class="col" id="div-img">
                <img alt="profil-picture" src="{{asset('Images/Users/default.jpg')}}" id="image-profile">
            </div>

            <div class="col" id="ps">
                <div id="pseudo-lign">
                    <p class="lign">Bonjour</p>
                    <h3 class="lign" id="pseudo">{{ Auth::user()->name }}</h3>
                </div>
                <br>
                <p class="p-blue">Membre depuis le {{ Auth::user()->created_at }}</p>

            </div>
        </div>

        <div class="row" id="info">
            <div class="col">

            </div>
            <div class="col" id="infos">
                <hr>
            </div>
        </div>


    </div>

@endsection
