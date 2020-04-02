/* Supprimer un ami */
$(document).ready(function () {


    function sleep(ms) {
        return new Promise(resolve => setTimeout(resolve, ms))
    }

    async function alert_success() {
        $('#alert_success_friend').show();
        await sleep(4000);
        $('#alert_success_friend').hide();
    }

    $('#confirm_delete_friend').click(function () {
        $.ajax({
            type: 'POST',
            url: '/Delete_friend',
            data: $('#form_delete_friend').serialize(),
            success: function (Response) {
                document.getElementById('friend-1').innerHTML = '';
                alert_success();
            },
        });
    })

});

