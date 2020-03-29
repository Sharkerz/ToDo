$(document).ready(function () {

    $('.item').click(function (e) {

        id_form = $(this).children().attr('id');

           var route = $('#' + id_form).data('route');

            $.ajax({
                type: 'POST',
                url: route,
                data: $('#' + id_form).serialize(),
                success: function (Response) {
                    id_list = Response.id_todolist;
                    $('#todolist').text('Affichage de la todolist avec id:' + id_list);
                },

            });
            e.preventDefault();

    });
});


