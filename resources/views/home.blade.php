@extends('layouts.app')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/home.css') }}" >

<div class="container" id="divcontain_home">
    <p id="bonjour_txt">Bonjour {{Auth::user()->name}},</p>
    <div id="dashboard">
        <div class="row">
            <div class="col">
                <div class="card dash" id="dash_amis" onclick="window.location.href='/Amis'">
                    <h3 id="text_dashboard" class="text_dashboard"> Vous avez <br> {{ $nbr_Amis }} Amis </h3>
                </div>
            </div>
            <div class="col">
                <div class="card dash" id="dash_todo" onclick="window.location.href='/Todolist'">
                    <h3 id="text_dashboard" class="text_dashboard">Vous avez créé <br> {{ $nbr_Todos }} Todolists </h3>
                </div>
            </div>
            <div class="col">
                <div class="card dash" id="dash_notif">
                    <h3 id="text_dashboard" class="text_dashboard">{{ $nbr_notif }} notifications <br> en attente </h3>
                </div>
            </div>
        </div>
    </div>

                <div class="card" id="home_liste_todo">
                        <div id="header_todo_acceuil">
                            <span id="titre_todolist_acceuil"> Liste de tes Todolist: </span>
                                <i class="ajout_todo"><i class="material-icons"  id="btn-task" id="icon_notif" onclick="window.location.href='/Todolist/create'">add</i></i>
                        </div>
                            @foreach($Todos as $Todo)
                                <div class="item">
                                    <div  class="item_todolist_acceuil" id="form-{{$Todo->id}}" onclick="window.location.href='/Todolist?id={{$Todo->id}}'">
                                        <form>
                                            <p class="Text_todo_acceuil">{{$Todo->name}}</p>
                                            <input id="id_todolist"  value="{{$Todo->id}}" hidden>
                                        </form>
                                    </div>
                                    <div class ="Delete_todolist">
                                        <i class="delete_todo" id="trash_btn"><i class="material-icons"  id="btn-task" id="icon_notif" onclick="delete_todo('{{$Todo->id}}')">delete</i></i>
                                    </div>
                                </div>
                            @endforeach
                </div>
</div>

@endsection

<script >
   function delete_todo(id){

    $.ajax({
            type: 'post',
            url: '/delete_todo',
            data: {'todolist_id' :id},
            success: function (answer) {
                console.log(answer);
               window.location.reload();
            }
        })
   }
</script>
