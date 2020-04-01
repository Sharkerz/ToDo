@extends('layouts.app')


@section('content')

@php
    //Import de class User
    use App\User;
@endphp

    <link rel="stylesheet" type="text/css" href="{{ asset('/css/Amis_list.css') }}" >

    <form action="{{ route('Amis.store') }}" method="post">
        @csrf
        <label for="NomAmis">Ajouter un amis:</label>
        <input type="text" name="name" placeholder="Pseudo" required> </br>
        <input type="submit" placeholder="Envoyer demande" class="btn btn-success bouton-creation">
    </form>

    <div id="div_amis" class="container">
        <h3> Liste d'amis: </h3>
            @foreach ($name ?? '' as $data)
                <div class="item_ami">
                    <img alt="Amis-avatar" src="/Images/Users/{{ User::where('name', $data)->first()->avatar }}" class="amis-avatar">
                    <h1> {{$data}} </h1>
                </div>
            @endforeach
    </div>


@endsection
