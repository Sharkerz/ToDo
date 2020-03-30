$(document).ready(function () {

    /* Icone notification */
    $.get('/notifications-push', function (response) {
        if (response.notif === "yes") {
            $('#icon_notif').text('notifications_active')
        }
    });

    /* Liste des demandes d'amis reçus */
    $.get('/notifications', function (response) {
        $id = response.id;
        $name = response.name;

        var doc = document.getElementById('list_notif');

        $id.forEach(element =>
            doc.innerHTML += '<a class="dropdown-item" id="a_item_notif"> ' + $name[element] +

                                ' <div id="demande-amis">' +
                                    '<form method="post" >' +
                                        '<i id="aha" class="material-icons accepter-amis-btn" name="' + element + '">done</i> ' +
                                    '</form>' +

                                    '<form method="post" data-route="{{ route(\'refuserAmi\') }}">' +
                                        '<i class="material-icons refuser-amis-btn" name="' + element + '">clear</i> ' +
                                    '</form>' +
                                '</div>' +
                            '</a>'
        )
    });

    var $ = function (selector) {
        return document.querySelector(selector);
    };
    var link = $('#demande-amis')

    /* Bouton accepter */
    $('#aha').click(function (e) {
        alert('yo');
        $.ajax({
            type: 'POST',
            url: '/accepterAmi',
            data: $('this').serialize(),
            success: function (Response) {
                console.log(Response);
            },
        });
        e.preventDefault();
    });

    /* Bouton refuser */
    $('.refuser-ami').click(function (e) {
        $.ajax({
            type: 'POST',
            url: $(this).data('route'),
            data: $('this').serialize(),
            success: function (Response) {
                console.log(Response);
            },
        });
        e.preventDefault();
    });


    /* Laisser ouvert le dropdown après un clic */
    document.getElementById("list_notif").addEventListener("click", function(e) {
        e.stopPropagation();
    });

});
