@extends('layouts.app')


@section('content')

    <link rel="stylesheet" type="text/css" href="{{ asset('/css/index.css') }}" >

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
                    <td>{{$Todo->user_id}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
