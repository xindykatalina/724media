<?php
require 'Database.php';

if (!empty($_POST)) {
    $msg = '';
    $name = $_POST['name'];
    $last_name = $_POST['last_name'];
    $image = $_POST['image'];

    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if ($operacion == 'insert') {
        $sql = "INSERT INTO user (name, last_name, image, created_at)"
                . "VALUES(?,?,?,?.?)";
        $query = $pdo->prepare($sql);
        if ($query->execute(array($name, $last_name, $image, $created_at = date())) == false) {
            $msg = 'Error: ' . $query->errorCode();
        } else {
            $msg = 'Usuario creado';
        }
    } elseif ($operacion == 'delete') {
        $id_user = $_POST['id_user'];
        $sql = "DELETE FROM usuarios WHERE id_user = ?";
        $query = $pdo->prepare($sql);
        if ($query->execute(array($id_user)) == false) {
            $msg = 'Error: ' . $query->errorCode();
        } else {
            $msg = 'Usuario eliminado';
        }
    } elseif ($operacion == 'update') {
        $id_user = $_POST['id_user'];
        $sql = "UPDATE user  SET nombre = ?, direccion = ?, telefono = ?, email = ?, contrasena = ? WHERE id_user = ?";
        $query = $pdo->prepare($sql);
        if ($query->execute(array($nombre, $direccion, $telefono, $email, $pwd, intval($id_user))) == false) {
            $msg = 'Error: ' . $query->errorCode();
        } else {
            $msg = 'Usuario Actualizado';
        }
    }
    Database::disconnect();
    echo $msg;
}