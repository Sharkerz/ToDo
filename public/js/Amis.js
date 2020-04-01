/* Supprimer un ami */
$(document).ready(function () {

    function sleep(ms) {
        return new Promise(resolve => setTimeout(resolve, ms))
    }

    async function alert() {
        $('.alert').alert();
        await sleep(5000);
        $('.alert').alert('close');
    }

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


/* Ajax supprimer amis */
// Route::post('/Delete_friend', 'AmisController@delete_friend')->name('Delete_friend');
