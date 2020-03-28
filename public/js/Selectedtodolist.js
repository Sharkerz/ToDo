$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


$("#tosubmit").click(function(e){

        e.preventDefault();
        console.log("hello");

    var pass= {'_token':$('meta[name="csrf-token"]').attr('content'),
        'id_todolist': 'id_todolist',
    };

        $.ajax({
            type: "POST",
            url: '{{url("/selectedtodolist")}}',
            data: pass,
            dataType: 'json',
            success: function(data) {
                alert('hi');
            },
            error:function (XMLHttpRequest, textStatus, errorThrown){
                alert("error: "+ textStatus);
            }
        })
            .done((data) => {
                console.log('hello du done');
            })
    });
