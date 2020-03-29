// $.ajaxSetup({
//     headers: {
//         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//     }
// });
//

$("#form-data").submit(function(e){
    alert('has been submitted');
        var route = $('#form-data').data('data');
        var form_data = $(this);

        $.ajax({
            type: 'POST',
            url: route,
            data: form_data.serialize(),
            dataType: 'json',
            success: function(Response) {
                alert(Response);
            },

        });

    e.preventDefault();

    });
