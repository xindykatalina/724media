<?php
require 'database.php';

if (!empty($_POST)) {
    $msg = '';
    $name = $_POST['name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $image = $_POST['image'];
    $operacion = $_POST['operacion'];
    $pdo = database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if ($operacion == 'insert') {
        $sql = "INSERT INTO user (name, last_name, email, image)"
                . "VALUES(?,?,?,?)";
        $query = $pdo->prepare($sql);
        if ($query->execute(array($name, $last_name, $email,  $image)) == false) {
            $msg = 'Error: ' . $query->errorCode();
        } else {
            $msg = 'Usuario creado';
        }
    } elseif ($operacion == 'delete') {
        $id_user = $_POST['id_user'];
        $sql = "DELETE FROM user WHERE id_user = ?";
        $query = $pdo->prepare($sql);
        if ($query->execute(array($id_user)) == false) {
            $msg = 'Error: ' . $query->errorCode();
        } else {
            $msg = 'Usuario eliminado';
        }
    } elseif ($operacion == 'update') {
        $id_user = $_POST['id_user'];
        $sql = "UPDATE user  SET name = ?, last_name = ?, email = ?, image = ?  WHERE id_user = ? ";
        $query = $pdo->prepare($sql);
        if ($query->execute(array($name, $last_name, $email, $image, intval($id_user))) == false) {
            $msg = 'Error: ' . $query->errorCode();
        } else {
            $msg = 'Usuario Actualizado';
        }
    }
    database::disconnect();
    echo $msg;
}