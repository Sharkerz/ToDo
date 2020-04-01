@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('/css/create_todo.css') }}" >

<div id="divcontain_create_todo">
    <div id="window_create_todo"class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>Création d'une Todolist</h1>
                    </div>
                    <form action="{{ route('Todolist.store') }}" method="post">
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


@endsection
