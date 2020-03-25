@extends('layouts.app')


@section('content')
<div id="left_menu" class="left_menu">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/index.css') }}" >
    <h2> Liste de tes Todolist: </h2>
    <tbody>
        @foreach($Todos as $Todo)
            <div id=item >
               <p>{{$Todo->name}}<p></br>
            </div>
        @endforeach
    </tbody>
    <div id="bouton_create">
            <button onclick="window.location.href='/Todolist/create'" id="btn-create" type="button" class="btn btn-success bouton-creation"><i class="material-icons">add</i></button>
        </div>
<div>
@endsection
