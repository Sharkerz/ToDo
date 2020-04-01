$(document).ready(function () {
    $counter = 1;
    // Ajax Selection todolist à afficher
    $('.item').click(function (e) {
        id_form = $(this).children().attr('id');
           var route = $('#' + id_form).data('route');

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
            e.preventDefault();

    });

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

    $('#Rename_Todo').click(function(){
        id_todolist = $(this).parent().attr('value');
        console.log($counter);
        var doc = document.getElementById('Administration_Todolist');
        if($counter == 1){
            doc.innerHTML +='<form id="Changernametodolist"  class="Name_Todolist"  method"post">' +
                                '<input value="'+ id_todolist + '" name="id_todolist" type="hidden">' +
                                '<label> Nom de la Todolist :</label>'+
                                '<input  id="Changer_nom_todolist" name="name_todolist" ></n>' +
                                '</form>'+
                                '<button id="Changer_nom" class="btn btn-success bouton-creation">Valider</button>';

                document.getElementById('Changer_nom').addEventListener('click',function(){
                    var id_formulaire = document.getElementById('Changernametodolist').getAttribute('id');
                    console.log(id_formulaire);
                    $.ajax({
                        type: 'POST',
                        url: '/Changernametodolist',
                        data: $('#' + id_formulaire).serialize(),
                        success: function (Response) {
                            console.log(Response);
                        },
            
                    });
                });
                $counter == 0;
        }
        if($counter == 0){
            doc.innerHTML +='<>'; 
        }
    });
});


