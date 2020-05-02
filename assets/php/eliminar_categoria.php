<?php

require('conexion.php');
session_start();

extract($_REQUEST);

$conexion = conexion();

$sql = $conexion->prepare('DELETE from categorias where id = :id');
$sql->bindParam(':id', $_REQUEST['id']);
$sql->execute();

$count = $sql->rowCount();

if ($count == 1) {
    echo 1;
} else {
    echo 0;
}

?>