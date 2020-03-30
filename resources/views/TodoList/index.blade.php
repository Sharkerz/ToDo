@extends('layouts.app')

@push('head')

    <meta name="csrf-token" content="{{ csrf_token() }}" />

@endpush

@section('content')

<div id="left_menu" class="left_menu">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/index.css') }}" >
    <h2> Liste de vos Todolist: </h2>
    <tbody>
        @foreach($Todos as $Todo)
            <div class="item">
                <form class="form-data" id="form-{{$Todo->id}}" method="post" data-route='{{ route('selectedtodolist') }}'>
                    {{ csrf_field() }}
                    <p>{{$Todo->name}}</p>
                    <input name="id_todolist" value="{{$Todo->id}}" type="text" hidden>
                </form>
            </div>
        @endforeach
    
    <div id="bouton_create">
        <i class="material-icons" id="btn-create" onclick="window.location.href='/Todolist/create'" id="icon_notif">add</i>
    </div></br></br>
    <h2> Liste des Todolist Partager avec vous : </h2>
    @foreach($sharedTodos as $sharedTodo)
            <div class="item">
                <form class="form-data" id="form-{{$Todo->id}}" method="post" data-route='{{ route('selectedtodolist') }}'>
                    <p>{{$sharedTodo->todolist->name}}</p>
                    <input name="id_todolist" value="{{$sharedTodo->todolist_id}}" type="text" hidden>
                </form>
            </div>
        @endforeach
    </tbody>
</div>

<div id="todolist" >
    <div id="bouton_partage">
        <i class="material-icons" id="btn-task" id="icon_notif">create</i>
    </div>
    <span ></span>

    <!-- Ajout d'une tache -->
    <form id="form-task">
        <i class="material-icons" id="btn-task" id="icon_notif">add</i>
        
        <input type="text" placeholder="Ajouter une tache">
        <div id="partage">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                        <h1>Partager votre Todolist</h1>
                            </div>
                                <form action="{{ route('Sharedtodolist.store') }}" method="post">  
                                    @csrf
                                    <label for="NomTodolist">Nom de la Todolist:</label>
                                    <input label="Nom de la Todolist:" type="text" name="name" required></br>
                                    <input type="submit" class="btn btn-success bouton-creation">
                                </form>

                            </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>

@endsection

<!-- JQuery et Ajax-->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>


<!-- Scripts ajax -->
<script type="text/javascript" src="{{ URL::asset('js/Selectedtodolist.js') }}"></script>
