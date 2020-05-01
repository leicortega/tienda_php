<?php

require('conexion.php');
session_start();

extract($_REQUEST);

$conexion = conexion();

$sql = $conexion->prepare('UPDATE productos set nombre = :nombre, descripcion = :descripcion, precio = :precio, categoria = :categoria where id = :id');
$sql->bindParam(':id', $_REQUEST['id_editar']);
$sql->bindParam(':nombre', $_REQUEST['nombre_editar']);
$sql->bindParam(':descripcion', $_REQUEST['descripcion_editar']);
$sql->bindParam(':precio', $_REQUEST['precio_editar']);
$sql->bindParam(':categoria', $_REQUEST['categoria_editar']);
$sql->execute();

$count = $sql->rowCount();

if ($count == 1) {
    echo 1;
} else {
    echo 0;
}

?>