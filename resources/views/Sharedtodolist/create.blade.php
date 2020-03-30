@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('/css/index.css') }}" >

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

@endsection
