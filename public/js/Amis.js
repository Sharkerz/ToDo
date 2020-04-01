/* Supprimer un ami */
$(document).ready(function () {


    $('#confirm_delete_friend').click(function () {
        $.ajax({
            type: 'POST',
            url: '/Delete_friend',
            data: $('#form_delete_friend').serialize(),
            success: function (Response) {
                document.getElementById('friend-1').innerHTML = '';
            },
        });
    })

});


/* Ajax supprimer amis */
// Route::post('/Delete_friend', 'AmisController@delete_friend')->name('Delete_friend');
