<?php
$operacion = '';
require 'php/database.php';

$name = '';
$last_name = '';
$image = '';


if (!empty($_POST)) {

    $operacion = $_POST['operacion'];
    if ($operacion == 'update') {

        $pdo = database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $id_user = $_POST['id_user'];

        $sql = "SELECT * FROM user WHERE id_user = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id_user));
        $data = $q->fetch(PDO::FETCH_ASSOC);

        $name = $data['name'];
        $last_name = $data['last_name'];
        $image = $data['image'];
    }
    //$msg = '';
}
?>
<link href="css/user.css" rel="stylesheet" type="text/css"/>
<script src="js/user.js" type="text/javascript"></script>

<div class="div_usu">

    <form id="formulario" class="form-horizontal" role="form" >
        <div id="alerta" class="alert alert-danger" role="alert"></div>
        <?php if ($operacion == 'update') {
            ?>
            <label for="id_user" >ID:</label>
            <input id="id_user" name="id_user" type="text" class="form-control" disabled value="<?php echo $id_user; ?>"/>
            <?php
        }
        ?>
        <label for="name" >Nombre:</label>
        <input id="name" name="name" type="text" class="form-control" placeholder="name" required value="<?php echo $name; ?>"/>
        <label for="last_name" >Apelido:</label>
        <input id="last_name" name="last_name" type="text" class="form-control" placeholder="Apellido" value="<?php echo $last_name; ?>"/>
        <label for="image" >Imagen:</label>
        <input id="image" name="image" type="text" class="form-control" placeholder="Imagen" required value="<?php echo $image; ?>"/>
        <br/>
        <input type="submit" value="Guardar" class="btn btn-primary"/>
        <a href="index.php" class="btn btn-primary"></i> Regresar</a>
    </form>
</div>