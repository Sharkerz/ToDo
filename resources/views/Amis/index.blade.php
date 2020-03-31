@extends('layouts.app')


@section('content')

@php
    //Import de class User
    use App\User;
@endphp

    <link rel="stylesheet" type="text/css" href="{{ asset('/css/index.css') }}" >

    <form action="{{ route('Amis.store') }}" method="post">
        @csrf
        <label for="NomAmis">Ajouter un amis:</label>
        <input type="text" name="name" placeholder="Pseudo" required> </br>
        <input type="submit" placeholder="Envoyer demande" class="btn btn-success bouton-creation">
    </form>

    <div>
        <h3> Liste d'amis: </h3>
            @foreach ($name ?? '' as $data)
            <h1> {{$data}} </h1>

            @endforeach
    </div>


@endsection
