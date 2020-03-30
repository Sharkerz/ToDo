$(document).ready(function () {

    $.get('/notifications-push', function (response) {
        if (response.notif === "yes") {
            $('#icon_notif').text('notifications_active')
        }
    })

    $

});
