$(document).ready(function () {

    $.get('/notifications-push', function (response) {
        if (response.notif === "yes") {
            $('#icon_notif').text('notifications_active')
        }
    });

    $.get('/notifications', function (response) {
        $id = response.id;
        $name = response.name;

        var doc = document.getElementById('list_notif');

        $id.forEach(element =>
            doc.innerHTML += '<a class="dropdown-item"> ' + $name[element] +
                ' <div id="demande-amis"><i id="accepter-amis" class="material-icons">done</i> ' +
                '<i id="refuser-amis" class="material-icons">clear</i> </div></a>'
        )
    });

});
