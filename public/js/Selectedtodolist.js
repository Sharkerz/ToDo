$(document).ready(function () {
    // Ajax Selection todolist à afficher
    div =  document.getElementById('Changer_nom_user');
    div.style.visibility = 'hidden';
    div.style.display = 'none';


    function update_tasks(id){
        $.ajax({
            type: 'post',
            url: '/update_tasks',
            data: $('#tasks-'+id).serialize(),
            success: function (answer) {
                task = answer.task;
                $('#form-'+task.todolist_id).trigger('click');
            }
        })
    }

    function delete_task(id){
        $.ajax({
            type: 'post',
            url: '/delete_task',
            data: $('#tasks-'+id).serialize(),
            success: function (answer) {
                task = answer.task;
                $('#form-'+task.todolist_id).trigger('click');
            }
        })
    }
    function create_task(params){
        $.ajax({
            type: 'post',
            url: '/create_task',
            data: params,
            success: function (answer) {
                task = answer.task;
                $('#form-'+params.list_id).trigger('click');
            }
        })
    }

    function delete_todo(params){
        $.ajax({
            type: 'post',
            url: '/delete_todo',
            data: params,
            success: function (answer) {
               window.location.reload();
            }
        })
    }



    list_todolist();
    changer_nom_todolist();
    function list_todolist(){
    $.get('/todolist', function (response) {
        $id = response.id;
        $name = response.name;
        $route_formulaire = response.route_formulaire;

        document.getElementById('list_todolist').innerHTML = '';
        var doc = document.getElementById('list_todolist');

        $id.forEach(element =>
            doc.innerHTML +='<div class="item">'+
            '<form class="form-data" id="form-'+ element +'" method="post" data-route="'+ $route_formulaire+'">'+
            '<p>'+ $name[element]+'</p>' +
            '<input name="name_todolist" value="'+ $name[element]+' " type="text" hidden>'+
            '<input name="id_todolist" value="'+element+'" type="text" hidden>'+
            '</form>'+
            '</div>',
        )
                })
            };

    $.get('/sharedtodolist', function (response) {
        $id = response.id;
        $name = response.name;
        $route_formulaire = response.route_formulaire;
        $permissions = response.permissions;


        document.getElementById('list_sharedtodolist').innerHTML = '';
        var doc = document.getElementById('list_sharedtodolist');

        $id.forEach(element =>
            doc.innerHTML +='<div class="item">'+
            '<form class="form-data" id="form-'+ element +'" method="post" >'+
            '<p>'+ $name[element]+'</p>' +
            '<input  class="name" name="name_todolist" value="'+ $name[element]+' " type="text" hidden>'+
            '<input class="id" name="id_todolist" value="'+element+'" type="text" hidden>'+
            '<input class="permissions" value="' +$permissions[element] +'" type="text" hidden>'+
            '</form>'+
            '</div>',
        )
        $('.item').on('click','.form-data',(function (){
            id_form = $(this).attr('id');
            recu_permissions =  $(this).children('.permissions').attr('value');
            document.getElementById('create_task').innerHTML= '';
            if(recu_permissions != 'read'){
                id_todolist = $('#'+ id_form +' input[name=id_todolist]').val()
                document.getElementById('create_task').innerHTML ='<form id="form_create">'+
                    '<input  class="name form-control" id="content_task" placeholder="Ajouter une tâche." type="text">'+
                    '<input class="id" id="id_todolist" value="'+id_todolist+'" type="text" hidden>'+
                    '<button class="create_task")>Créer une tache</button>'
                    '</form>';
                $('.create_task').on('click',function(e){
                    list_id = $('#id_todolist').val();
                    content = $('#content_task').val();
                    params ={'list_id' : list_id,'content' : content};
                    create_task(params);
                    e.preventDefault();

                });
            }
               var route = $('#' + id_form).data('route');
               div =  document.getElementById('Changer_nom_user');
               if(div.style.visibility == 'visible'){
                div.style.visibility = 'hidden';
                div.style.display ='none';
                document.getElementById('Titre_todolist').style.visibility = 'visible';
                document.getElementById('Titre_todolist').style.display = 'inline';
                }
                $.ajax({
                    type: 'post',
                    url: '/selectedtodolist',
                    data: $('#' + id_form).serialize(),
                    success: function (answer) {
                        id = answer.id_todolist;
                        name = answer.name_todolist;
                        tasks = answer.tasks;
                        contenu = answer.content;
                        finished = answer.finished;
                        document.getElementById('tasks_inprogress').innerHTML='<span class="task_title">Taches en cours : </span>';
                        document.getElementById('tasks_finished').innerHTML='<span class="task_title">Taches terminées : </span>';
                        tasks.forEach(function (element)
                        {
                            additional_content = '';

                            if(recu_permissions != 'read'){
                                if(finished[element] =='0'  ){
                                    container = document.getElementById('tasks_inprogress')
                                    Task_progres = "Taches en Cours";
                                    // additional_content = '<button class="" data-id="'+element+'")>Valider la tache</button>'

                                }
                                else{
                                    container =  document.getElementById('tasks_finished');
                                    additional_content = '<div class="delete_task" data-id="'+element+'")><i class="material-icons btn_delete_task">close</i></div>'
                                    Task_progres = "Taches terminées";
                                }
                            }
                            else
                            {
                                if(finished[element] =='0'  ){
                                    container = document.getElementById('tasks_inprogress');
                                    Task_progres = "Taches en Cours";
                                }
                                else{
                                    container =  document.getElementById('tasks_finished');
                                    Task_progres = "Taches terminées";
                                }
                            }
                            container.innerHTML +='<div class="update_task task_todo" data-id="'+element+'">'+
                                '<form class="form-data" id="tasks-'+ element +'" method="post" >'+
                                '<p class="todolist_element">'+ contenu[element]+'</p>'+additional_content+
                                '<input class="id" name="id_task" value="'+element+'" type="text" hidden>'+
                                '<input class="etat_task" value="' +finished[element] +'" type="text" hidden>'+
                                '</form>'+
                                '</div>'

                        });
                        $('.update_task').on('click',function(e){
                            task_id = $(this).attr('data-id');
                            update_tasks(task_id);
                            e.preventDefault();

                        });
                        $('.delete_task').on('click',function(e){
                            task_id = $(this).attr('data-id');
                            delete_task(task_id);
                            e.preventDefault();

                        });
                        if(recu_permissions == 'read'){
                            document.getElementById('Delete_Todo').style.display = 'none';
                            document.getElementById('Rename_Todo').style.display = 'none';
                            document.getElementById('Partager_todo').style.display = 'none';
                        }
                        else{
                            document.getElementById('Delete_Todo').style.display = 'inline';
                            document.getElementById('Delete_Todo').setAttribute('data-todolist',id);
                            document.getElementById('Rename_Todo').style.display = 'inline';
                            document.getElementById('Partager_todo').style.display = 'inline';
                        }
                        $('#Titre_todolist').text(name);
                        $("#todolist").css('visibility', 'visible');
                        $('#Administration_Todolist').attr('value', id);
                        return id;
                    },

                })
               ;;
        }));
    })

    $('div .item').click(function () {
        $('div .item').removeClass('selected');
        $(this).addClass('selected');
    });


    function load_amis() {
        $.get('/list_amis', function (response) {
            var id = response.amis;
            var name = response.name;

            var doc = document.getElementById('menu_amis_list');

            doc.innerHTML = '';

            id.forEach(element =>
                doc.innerHTML += '<a class="dropdown-item item_amis_share" id="' + element + '" href="#" name="' + element + '">' + name[element] + '</a>'
            );
        });
    }

    // Récupération de la liste d'amis pour pouvoir partager avec eux
   $('#Partager_todo').click(function(){
        load_amis();
       $("#partage").css('visibility', 'visible')
    });

    /* Bouton fermer la fenetre partager la todolist */
    $('#Close_Partage').click(function(){
        $("#partage").css('visibility', 'hidden')
    });

    $('#Delete_Todo').on('click',function(e){
        id_todo = $(this).attr('data-todolist');
        id ={'todolist_id' : id_todo};
        delete_todo(id);
    });

    /* Add l'amis a partager dans le form */
    $('#menu_amis_list').on('click', '.item_amis_share', function (e) {
        var ami_share = $(this).attr('id');
        var ami_name = $('#' +ami_share).text();
        /* id user */
        $('#input_share_id').attr('value', ami_share);
        /* name user */
        $('#input_share_name').attr('type', 'visible');
        $('#input_share_name').text(ami_name);

        $('#input_share_todolist_id').attr('value', id);


        e.preventDefault();
    });

    function changer_nom_todolist(){
    $('#Rename_Todo').click(function(){
        id_todolist = $(this).parent().attr('value');
        div =  document.getElementById('Changer_nom_user');
        $('#Id_todolist_changer').attr('value', id_todolist);
        name_todolist = document.getElementById('Titre_todolist').textContent;
        document.getElementById('Rename_Todo').style.visibility = 'hidden';
        if(div.style.visibility == 'hidden'){
            document.getElementById('Titre_todolist').style.visibility = 'hidden';
            document.getElementById('Titre_todolist').style.display = 'none';
            div.style.visibility = 'visible';
            div.style.display = 'inline';
            $('#Changer_nom_todolist').attr('value', name_todolist);
                document.getElementById('Changer_nom').addEventListener('click',function(){
                    var id_formulaire = document.getElementById('Changernametodolist').getAttribute('id');
                    $.ajax({
                        type: 'POST',
                        url: '/Changernametodolist',
                        data: $('#' + id_formulaire).serialize(),
                        success: function (Response) {
                            name_todolist = Response.name;
                            $('#Titre_todolist').text(name_todolist);
                            $("#todolist").css('visibility', 'visible');
                            var formulaire = document.getElementById('test');
                            div.style.visibility = 'hidden';
                            div.style.display ='none';
                            document.getElementById('Titre_todolist').style.visibility = 'visible';
                            document.getElementById('Titre_todolist').style.display = 'inline';
                            list_todolist();
                            document.getElementById('Rename_Todo').style.visibility = 'visible';
                        },
                    });
                });
            }
            else{
                div.style.visibility = 'hidden';
                div.style.display ='none';
                document.getElementById('Titre_todolist').style.visibility = 'visible';
                document.getElementById('Titre_todolist').style.display = 'inline';
            }
    });
    };
    function taksk_todolist(){
        $.get('/selectedtodolist', function (response) {
            id = response.id;
            name = response.name;
            $route_formulaire = response.route_formulaire;
            $permissions = response.permissions;


            document.getElementById('list_sharedtodolist').innerHTML = '';
            var doc = document.getElementById('list_sharedtodolist');

            $id.forEach(element =>
                doc.innerHTML +='<div class="item">'+
                '<form class="form-data" id="form-'+ element +'" method="post" data-route="'+$route_formulaire+'">'+
                '<p>'+ $name[element]+'</p>' +
                '<input  class="name" name="name_todolist" value="'+ $name[element]+' " type="text" hidden>'+
                '<input class="id" name="id_todolist" value="'+element+'" type="text" hidden>'+
                '<input class="permissions" value="' +$permissions[element] +'" type="text" hidden>'+
                '</form>'+
                '</div>',
            )})
        }
    })

