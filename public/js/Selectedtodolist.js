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
                    $('#todolist span').text('Affichage de la todolist avec id:' + id_list);
                    $("#todolist").css('visibility', 'visible')
                },

            });
            e.preventDefault();

    });

    $('div .item').click(function () {
        $('div .item').removeClass('selected');
        $(this).addClass('selected');
    });


   $('#bouton_partage').click(function(){
        $.get('/list_amis', function (response) {
            $amis = response.amis;
            $name = response.name;

            var doc = document.getElementById('menu_amis_list');

            $amis.forEach(element =>
                doc.innerHTML += '<a class="dropdown-item" href="#">' + $name[$amis] + '</a>'
            )
            });
        $("#partage").css('visibility', 'visible')

    });
});


