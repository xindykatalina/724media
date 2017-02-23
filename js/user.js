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
            data: {name: $('#name').val(), last_name: $('#last_name').val(), email: $('#email').val(),
                image: $('#image').val(), operacion: ope, id_user: id_u}
        }).done(function (msg) {
            alert(msg);
            if (msg == 'Usuario Actualizado') {
                $.ajax({
                    url: "user.php"
                }).done(function (html) {
                    //
                }).fail(function () {
                    alert('Error al cargar modulo');
                });
            } else {
                $('#alerta').hide();
                $('#name').val('');
                $('#email').val('');
                $('#last_name').val('');
                $('#image').val('');
                $("#targetLayer").html("No hay imagen");
                $("#userImage").val('');
            }
        }).fail(function () {
            alert("Error enviando los datos. Intente nuevamente");
        });
    });

    // Function Upload Image
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
                $("#image").val(data);
                $("#targetLayer").html("<img class='img-responsive img-rounded center-block' src='" + data + "'width='300px' height='300px' alt='Bruce Wayne' title='Bruce Wayne'/>");
                $("#image").html(data);
            },
            error: function() 
            {
                alert("Error al subir la imagen");
            }           
       });
    }));

});

// Validation exists image
var contenido = { 
    loadimage : function(imagen){
        if (imagen == 1) {
            $("#targetLayer").html("No hay imagen")
            } else {
            $("#targetLayer").html("<img class='img-responsive img-rounded center-block' src='" + imagen + "'width='300px' height='300px' alt='Bruce Wayne' title='Bruce Wayne'/>")
        }
    }
}

var img = $("#image").val();
    if (img != "") {
       contenido.loadimage(img) 
    }

