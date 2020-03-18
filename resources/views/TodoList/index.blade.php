@extends('layouts.app')

@section('content')
    <p> Liste de tes Todolist: </p>

@foreach($Todos as $Todo)
        <tr>
            <th>{{$Todo->name}}</th>
        </tr>
    @endforeach

@endsection
