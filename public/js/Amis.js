/* Supprimer un ami */
$(document).ready(function () {

    function sleep(ms) {
        return new Promise(resolve => setTimeout(resolve, ms))
    }

    async function alert() {
        await sleep(2000);
        document.getElementById('alert_success_friend').setAttribute('visibility', 'visible');
        $('.alert').alert();
        await sleep(5000);
        $('.alert').alert('close');
    }
    alert();

    $('#confirm_delete_friend').click(function () {
        $.ajax({
            type: 'POST',
            url: '/Delete_friend',
            data: $('#form_delete_friend').serialize(),
            success: function (Response) {
                document.getElementById('friend-1').innerHTML = '';
                alert();
            },
        });
    })

});

