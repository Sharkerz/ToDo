$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    /* Icone notification */
    function reload_icon() {
        $.get('/notifications-push', function (response) {
            if (response.notif === "yes") {
                $('#icon_notif').text('notifications_active')
            }
        });
    }
    reload_icon();

    /* Liste des demandes d'amis reçus */
    function reload_notif() {

        document.getElementById('list_notif').innerHTML = '<h6 class="dropdown-header">Demandes d\'amis</h6>';
        /* Liste demandes d'amis */
        $.get('/notifications', function (response) {
            $id = response.id;
            $name = response.name;

            var doc = document.getElementById('list_notif');

            $id.forEach(element =>
                doc.innerHTML += '<a class="dropdown-item" id="a_item_notif"> ' + $name[element] +
                                    '<div class="item_notif">' +
                                        '<form method="post">' +
                                            '<input value="' + element + '" name="id_ami" type="hidden">' +
                                            '<i class="material-icons accepter-amis-btn">done</i> ' +
                                        '</form>' +

                                        '<form method="post">' +
                                            '<input value="' + element + '" name="id_ami" type="hidden">' +
                                            '<i class="material-icons refuser-amis-btn" >clear</i> ' +
                                        '</form>' +
                                    '</div>' +
                                '</a>'
            )
        });

        /* Liste partage de TodoList */
        $.get('/notifications-todolist', function (response) {
            $id_shared = response.id;
            $name_shared = response.name;

            document.getElementById('list_notif').innerHTML += '<h6 class="dropdown-header">Partage de Todo </h6>';

            var doc = document.getElementById('list_notif');

            $id_shared.forEach(element =>
                doc.innerHTML += '<a class="dropdown-item" id="a_item_notif"> ' + $name_shared[element] +
                                    '<div class="item_notif">' +
                                        '<form method="post">' +
                                            '<input value="' + element + '" name="id_shared" type="hidden">' +
                                            '<i class="material-icons accepter-shared-btn">done</i> ' +
                                        '</form>' +

                                        '<form method="post">' +
                                            '<input value="' + element + '" name="id_shared" type="hidden">' +
                                            '<i class="material-icons refuser-shared-btn" >clear</i> ' +
                                        '</form>' +
                                    '</div>' +
                                    '</a>'
            )

        });


    }
    reload_notif();

    /* Bouton accepter ami */
    $('#list_notif').on('click', '.accepter-amis-btn', function (e) {
        var form = $(this).parent();
        $.ajax({
            type: 'POST',
            url: '/accepterAmi',
            data: form.serialize(),
            success: function (Response) {
                reload_notif();
                reload_icon();
            },
        });
        e.preventDefault();
    });

    /* Bouton refuser ami */
    $('#list_notif').on('click', '.refuser-amis-btn', function (e) {
        var form = $(this).parent();
        $.ajax({
            type: 'POST',
            url: '/refuserAmi',
            data: form.serialize(),
            success: function (Response) {
                reload_notif();
                reload_icon();
            },
        });
        e.preventDefault();
    });

    /* Bouton accepter partage */
    $('#list_notif').on('click', '.accepter-shared-btn', function (e) {
        var form = $(this).parent();
        $.ajax({
            type: 'POST',
            url: '/accepterShared',
            data: form.serialize(),
            success: function (Response) {
                reload_notif();
                reload_icon();
            },
        });
        e.preventDefault();
    });

    /* Bouton refuser partage */
    $('#list_notif').on('click', '.refuser-shared-btn', function (e) {
        var form = $(this).parent();
        $.ajax({
            type: 'POST',
            url: '/refuserShared',
            data: form.serialize(),
            success: function (Response) {
                reload_notif();
                reload_icon();
            },
        });
        e.preventDefault();
    });


    /* Laisser ouvert le dropdown après un clic */
    document.getElementById("list_notif").addEventListener("click", function(e) {
        e.stopPropagation();
    });

});
