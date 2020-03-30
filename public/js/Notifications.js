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
                                    // '<form>' +
                                    // '<input value="' + element + '" type="hidden">' +
                                    '<i id="accepter-amis" class="material-icons">done</i> ' +
                                    '<i id="refuser-amis" class="material-icons">clear</i> ' +
                                    // '</form' +
                                '</div>' +
                            '</a>'
        )
    });


    /* Laisser ouvert le dropdown après un clic */
    document.getElementById("list_notif").addEventListener("click", function(e) {
        e.stopPropagation();
    });

});
