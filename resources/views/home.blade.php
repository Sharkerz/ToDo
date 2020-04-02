@extends('layouts.app')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/home.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/index.css') }}" >

<div class="container" id="divcontain_home">
        <div class="row justify-content-center">
            <p id="bonjour_txt">Bonjour {{Auth::user()->name}},</p>
            <div class="col-md-8">
                <div class="card" id="home_liste_todo">
                    <table>
                        <thead>
                            <h2 id="test"> Liste de tes Todolist: </h2>
                        </thead>
                        <tbody >
                            @foreach($Todos as $Todo)
                                <div id=item >
                                    <p>{{$Todo->name}}</p></br>
                                    <p id="id_todolist" hidden>{{$Todo->id}}<p>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
