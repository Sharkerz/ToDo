@extends('layouts.app')


@section('content')

    <link rel="stylesheet" type="text/css" href="{{ asset('/css/index.css') }}" >

    <form action="{{ route('Amis.store') }}" method="post">
        @csrf
        <label for="NomAmis">Ajouter un amis:</label>
        <input type="text" name="name" placeholder="Pseudo" required> </br>
        <input type="submit" placeholder="Envoyer demande" class="btn btn-success bouton-creation">
    </form>

    <div>
        <h3> Liste d'amis: </h3>
            @foreach ($list ?? '' as $data)
            <h1> {{ User::where('id', $data['user2'])->first()->name }} </h1>

            @endforeach
    </div>


@endsection
