@extends('layouts.app')

@push('head')

    <meta name="csrf-token" content="{{ csrf_token() }}" />

@endpush

@section('content')
<div id="left_menu" class="left_menu">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/index.css') }}" >
    <h2> Liste de tes Todolist: </h2>
    <tbody>
        @foreach($Todos as $Todo)
            <div id="item">
                <form id="form-data" method="post" action='{{ route('selectedtodolist') }}'>
                    {{ csrf_field() }}

                    <input name="id_todolist" value="{{$Todo->id}}" type="text">
                    <button type="submit"></button>
                </form>
            </div>
        @endforeach
    </tbody>
    <div id="bouton_create">
        <button onclick="window.location.href='/Todolist/create'" id="btn-create" type="button" class="btn btn-success bouton-creation"><i class="material-icons">add</i></button>
    </div>
</div>

<div id="todolist" >
    <span > It works </span>
</div>

@endsection

<!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<!-- Scripts ajax -->
<script type="text/javascript" src="{{ URL::asset('js/Selectedtodolist.js') }}"></script>
