<?php
$operacion = '';
require 'php/database.php';

$name = '';
$last_name = '';
$email = '';
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
        $email = $data['email'];
        $image = $data['image'];
    }
}
?>
<link href="css/user.css" rel="stylesheet" type="text/css"/>
<script src="js/user.js" type="text/javascript"></script>
<div class="containers">
    <div class="row">
        <div class="pull-right">
            <a href="index.php" class=""><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Regresar</a>
        </div>
        <div class="col-sm-6 col-md-6">
            <form id="formulario" class="form-horizontal" role="form">
                <div class="form-group">
                    <label for="name" class="control-label col-xs-2">Nombre:</label>
                    <div class="col-xs-10">
                        <input type="name" id="name" name="name" class="form-control" required placeholder="Nombre" value="<?php echo $name; ?>" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label for="last_name" class="control-label col-xs-2">Apellido:</label>
                    <div class="col-xs-10">
                        <input type="name" id="last_name" name="last_name" class="form-control"  required placeholder="Apellido" value="<?php echo $last_name; ?>" disabled>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="control-label col-xs-2">Email:</label>
                    <div class="col-xs-10">
                        <input type="name" id="email" name="email" class="form-control" required placeholder="Email" value="<?php echo $email; ?>" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label for="image" class="control-label col-xs-2">Imagen:</label>
                    <div class="col-xs-10">
                        <div id="targetLayer">No Image</div>
                        <input type="hidden" id="image" name="image" class="form-control" placeholder="Imagen" value="<?php echo $image; ?>">
                    </div>
                </div>                      
            </form>
        </div>
    </div>
</div>