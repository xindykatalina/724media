$(document).ready(function () {
    $('#btn_usuarios').click(function () {
        $.ajax({
            url: "user.php"
        }).done(function (html) {
            $('#contenido').html(html);
        }).fail(function () {
            alert('Error al cargar modulo');
        });
    });
});
function editar(id) {
    console.log('idd', id);
    $.ajax({
        type: "POST",
        url: "user.php",
        data: {operacion: 'update', id_user: id}
    }).done(function (html) {
        $('#contenido').html(html);
    }).false(function () {
        alert('Error al cargar modulo');
    });
}
function eliminar(id, este) {
    $.ajax({
        type: "POST",
        url: "php/modeluser.php",
        data: {id_user: id, operacion: "delete"}
    }).done(function (msg) {
        //alert(msg);
        $(este).parent().parent().remove();
    }).fail(function () {
        alert("Error enviando los datos. Intente nuevamente");
    });
}
