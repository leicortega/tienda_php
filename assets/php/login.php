<?php

require('conexion.php');
session_start();

extract($_REQUEST);
$password = MD5($_REQUEST['password']);

$conexion = conexion();

$sql = $conexion->prepare('SELECT * from usuarios where id = :id and password = :psw');
$sql->bindParam(':id', $_REQUEST['identificacion']);
$sql->bindParam(':psw', $password);
$sql->execute();

$count = $sql->rowCount();

if ($count == 1) {
    $_SESSION['user'] = $_REQUEST['identificacion'];
    echo 1;
} else {
    echo 0;
}


?>