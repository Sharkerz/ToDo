@extends('layouts.app')


@section('content')
<div id="left_menu" class="left_menu">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/index.css') }}" >
    <h2> Liste de tes Todolist: </h2>
    <tbody>
        @foreach($Todos as $Todo)
            <div id="item" >
                <p>{{$Todo->name}}</p></br>
                <p id="id_todolist" hidden>{{$Todo->id}}</p>
            </div>
        @endforeach
    </tbody>
    <div id="bouton_create">
            <button onclick="window.location.href='/Todolist/create'" id="btn-create" type="button" class="btn btn-success bouton-creation"><i class="material-icons">add</i></button>
        </div>
<div>

<script>
    console.log(document.getElementById("item"));
    document.getElementById("item").addEventListener("mouseover", mouseOver);
    document.getElementById("item").addEventListener("mouseout", mouseOver);
    
function mouseOver() {
  document.getElementById("item").style.color = "red";
}

function mouseOut() {
  document.getElementById("item").style.color = "black";
}
</script>
@endsection