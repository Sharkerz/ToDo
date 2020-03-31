@extends('layouts.app')

@section('content')
    <!-- Styles -->
    <link href="{{ asset('css/Profil.css') }}" rel="stylesheet">

<div id="div-profil" class="container">

    <div class="row">
        <div class="col" id="div-img">
            <img alt="profil-picture" src="/Images/Users/{{ $user->avatar }}" id="image-profile">
        </div>
        <div class="col">
        <div id="pseudo-lign">
                    <p class="lign">Bonjour</p>
                    <h3 class="lign" id="pseudo">{{$user->name}}</h3>
                </div>
                <br>
                <p class="p-blue">Membre depuis le {{$user->created_at }}</p>

        </div>
    </div>

        <div class="col">
            <form action="{{ route('profil.update', ['user' => $user->id]) }}" method="post">
            @csrf
            <div class="row" id="info">
            <div class="col">

                <div id="select_avatar">
                    <form enctype="multipart/form-data" action="{{ route('Profil.update_avatar') }}" method="POST">
                        <label>Changer votre avatar: </label>
                        <input type="file" name="avatar">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <br>
                        <input type="submit" class="pull-right btn btn-primary">
                    </form>
                </div>

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
                        <div class="col" id="Update_Profil">
                            <input class="Update_Profil" type="text" name="name" value="{{ $user->name }}"  ></input></br>
                            <p>{{ $user->email }}</p>
                            <p>{{ $user->updated_at }}</p>
                        </div>
                    </div>
                </div>
                <input type='submit' class="btn btn-secondary" id="btn-modifier" value="Modifier"></input>
            </div>
        </div>
                    </div>
                </di>
            </div>
        </div>
    </div>
    </form>
</div>

@endsection
