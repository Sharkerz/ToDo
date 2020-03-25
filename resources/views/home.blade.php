@extends('layouts.app')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/home.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/index.css') }}" >
<div id="home">
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <table>
                        <thead>
                            <h2 id="test"> Liste de tes Todolist: </h2>
                        </thead>
                        <tbody >
                            @foreach($Todos as $Todo)
                                <div id=item >
                                    <p>{{$Todo->name}}<p></br>
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
