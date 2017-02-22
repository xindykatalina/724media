$(document).ready(function () {
    $('#alerta').hide();
    $('#formulario').submit(function (event) {
        event.preventDefault();
        var ope = 'insert';
        var id_u = '';
        if ($('#id_user').length > 0) {
            if ($('#id_user').val() !== '') {
                ope = 'update';
                id_u = $('#id_user').val();
            }
        }
        $.ajax({
            type: "POST",
            url: "php/modeluser.php",
            data: {name: $('#name').val(), last_name: $('#last_name').val(),
                image: $('#image').val(), operacion: ope, id_user: id_u}
        }).done(function (msg) {
            alert(msg);
            if (msg == 'Usuario Actualizado') {
                $.ajax({
                    url: "user.php"
                }).done(function (html) {
                    //$('#contenido').html(html);
                }).fail(function () {
                    alert('Error al cargar modulo');
                });
            } else {
                $('#alerta').hide();
                $('#name').val('');
                $('#last_name').val('');
                $('#image').val('');
            }
        }).fail(function () {
            alert("Error enviando los datos. Intente nuevamente");
        });
    });


    $("#uploadForm").on('submit',(function(e) {
        e.preventDefault();
        $.ajax({
            url: "upload.php",
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function(data)
            {
            $("#targetLayer").html(data);
            },
            error: function() 
            {
            }           
       });
    }));

});
