$(document).ready(function () {

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
                    $('#todolist span').text(name_todolist);
                    $("#todolist").css('visibility', 'visible')
                },

            });
            e.preventDefault();

    });

    $('div .item').click(function () {
        $('div .item').removeClass('selected');
        $(this).addClass('selected');
    });

    function load_amis() {
        document.getElementById('menu_amis_list').innerHTML = '';
        $.get('/list_amis', function (response) {
            $id = response.amis;
            $name = response.name;

            var doc = document.getElementById('menu_amis_list');

            $id.forEach(element =>
                doc.innerHTML += '<a class="dropdown-item" href="#">' + $name[element] + '</a>'
            )
            });
        $("#partage").css('visibility', 'visible')};
    // Récupération de la liste d'amis pour pouvoir partager avec eux
   $('#Partager_todo').click(function(){
        load_amis();
    });
});


