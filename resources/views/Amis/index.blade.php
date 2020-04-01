@extends('layouts.app')


@section('content')

@php
    //Import de class User
    use App\User;
@endphp

    <link rel="stylesheet" type="text/css" href="{{ asset('/css/Amis_list.css') }}" >


    <div id="div_amis" class="container">

        <div id="div_add_friend">
            <form action="{{ route('Amis.store') }}" method="post">
                @csrf
                <label id="label_add_friend" for="input_friend_invite">Ajouter un amis:</label>
                <input id="input_friend_invite" class="form-control" type="text" name="name" placeholder="Pseudo ou Email" required>
                <input type="submit" placeholder="Envoyer demande" class="btn btn-success bouton-creation">
            </form>
        </div>
        <br>
        <table class="table table-striped">
            <tbody>
            @foreach ($name ?? '' as $data)
                <tr>
                    <td>
                        <img alt="Amis-avatar" src="/Images/Users/{{ User::where('name', $data)->first()->avatar }}" class="amis-avatar">
                    </td>
                    <td>
                        <h1 id="name_friend"> {{$data}} </h1>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
