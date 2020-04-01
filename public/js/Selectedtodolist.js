$(document).ready(function () {
    // Ajax Selection todolist à afficher
    div =  document.getElementById('Changer_nom_user');
    div.style.visibility = 'hidden';
    div.style.display = 'none';

    list_todolist();
    changer_nom_todolist();
    function list_todolist(){
    $.get('/todolist', function (response) {
        $id = response.id;
        $name = response.name;
        route_formulaire = response.route_formulaire;

        document.getElementById('list_todolist').innerHTML = '';
        var doc = document.getElementById('list_todolist');

        $id.forEach(element =>
            doc.innerHTML +='<div class="item" id"oui">'+
            '<form class="form-data" id="form-'+ element +'" method="post" data-route="'+route_formulaire+'">'+
            '<p>'+ $name[element]+'</p>' + 
            '<input name="name_todolist" value="'+ $name[element]+' " type="text" hidden>'+
            '<input name="id_todolist" value="'+element+'" type="text" hidden>'+
            '</form>'+
            '</div>',
        )
        $('.item').on("click",(function (){
            id_form = $(this).children().attr('id');
               var route = $('#' + id_form).data('route');
               div =  document.getElementById('Changer_nom_user');
               if(div.style.visibility == 'visible'){
                div.style.visibility = 'hidden';
                div.style.display ='none';
                document.getElementById('Titre_todolist').style.visibility = 'visible';
                document.getElementById('Titre_todolist').style.display = 'inline';
                }
                $.ajax({
                    type: 'POST',
                    url: route,
                    data: $('#' + id_form).serialize(),
                    success: function (Response) {
                        id_list = Response.id_todolist;
                        name_todolist = Response.name_todolist
                        $('#Titre_todolist').text(name_todolist);
                        $("#todolist").css('visibility', 'visible');
                        $('#Administration_Todolist').attr('value', id_list);
                        return id_list;
                    },
    
                });
        }));
    })
};


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


    /* Add l'amis a partager dans le form */
    $('#menu_amis_list').on('click', '.item_amis_share', function (e) {
        var ami_share = $(this).attr('id');
        var ami_name = $('#' +ami_share).text();
        /* id user */
        $('#input_share_id').attr('value', ami_share);
        /* name user */
        $('#input_share_name').attr('type', 'visible');
        $('#input_share_name').text(ami_name);

        $('#input_share_todolist_id').attr('value', id_list);


        e.preventDefault();
    });

    function changer_nom_todolist(){
    $('#Rename_Todo').click(function(){
        id_todolist = $(this).parent().attr('value');
        div =  document.getElementById('Changer_nom_user');
        $('#Id_todolist_changer').attr('value', id_todolist);
        name_todolist = document.getElementById('Titre_todolist').textContent;
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
                            list_todolist();
                            document.getElementById('Titre_todolist').style.display = 'inline';
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
});


