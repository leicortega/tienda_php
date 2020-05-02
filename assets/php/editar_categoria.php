<?php

require('conexion.php');
session_start();

extract($_REQUEST);

$conexion = conexion();

$sql = $conexion->prepare('UPDATE categorias set nombre = :nombre where id = :id');
$sql->bindParam(':id', $_REQUEST['id_editar_categoria']);
$sql->bindParam(':nombre', $_REQUEST['nombre_editar_categoria']);
$sql->execute();

$count = $sql->rowCount();

if ($count == 1) {
    echo 1;
} else {
    echo 0;
}

?>