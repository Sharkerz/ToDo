@extends('layouts.app')


@section('content')

    <link rel="stylesheet" type="text/css" href="{{ asset('/css/index.css') }}" >
    <div class="row justify-content-center">
            <button onclick="window.location.href='/Todolist/create'" id="btn-create" type="button" class="btn btn-success bouton-creation">Créer une Todolist</button>
        </div>
    <h1> Liste de tes Todolist: </h1>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Owner</th>
            </tr>
        </thead>

        <tbody>
            @foreach($Todos as $Todo)
                <tr>
                    <td>{{$Todo->name}}</td>
                    <td>{{$Todo->user->name}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
