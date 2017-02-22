$(document).ready(function () {
    $('#alerta').hide();
    $('#formulario').submit(function (event) {
        event.preventDefault();
        /*if ($('#pwd').val() !== $('#pwd2').val()) {
            $('#alerta').show();
            $('#alerta').text('Las contraseñas no considen');
            $('#pwd').focus();
            return;
        }*/
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
                    $('#contenido').html(html);
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
});

(function() {
    $('#upload_imagen').ajaxForm({
        beforeSend : function() {
            $('#loading').html("<i class='fa fa-circle-o-notch fa-spin'></i> Cargando...");
        },
        success : function(response) {

            if(response.success == true){
                var imagen = response.url;
                $('#loading').hide();
                $("#image").html("<img src='" + imagen + "'width='200px' height='200px'/>");
                $("#imagen_user").val(imagen);

            }else{
                $('#loading').hide();
                alertify.error("No hay respuesta del servidor - Consulte al administrador. "+response.errors)
            }
        }
    });

})();


var contenido = { 
    loadimage : function(imagen){
        if (imagen == 1) {
            $("#image").html("No hay imagen")
            } else {
            $("#image").html("<img src='" + imagen + "'width='200px' height='200px'/>")
        }
    }

}

var img = $("#imagen_user").val();
if (img != "") {
   contenido.loadimage(img) 
}

