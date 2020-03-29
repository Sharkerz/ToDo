@extends('layouts.app')

@section('content')

@php
    //Import de class User
    use App\User;

@endphp

<!-- Styles -->
<link href="{{ asset('css/Notifications.css') }}" rel="stylesheet">

    <div>

        <table>
            <thead>
                <tr>
                    <th colspan="3"> <h3> Demande d'amis: </h3> </th>
                </tr>
            </thead>

            <tbody>
                <tr>

                    @foreach ($list ?? '' as $data)
                        <td> {{ User::where('id', $data['user2'])->first()->name }} </td>
                        <td>Accepter</td>
                        <td>Refuser</td>
                    @endforeach

                </tr>
            </tbody>
        </table>



    </div>

@endsection
