<?php

require('conexion.php');
session_start();

extract($_REQUEST);

$conexion = conexion();

$sql = $conexion->prepare('INSERT into productos values ("", :nombre, :descripcion, :precio, :categoria)');
$sql->bindParam(':nombre', $_REQUEST['nombre']);
$sql->bindParam(':descripcion', $_REQUEST['descripcion']);
$sql->bindParam(':precio', $_REQUEST['precio']);
$sql->bindParam(':categoria', $_REQUEST['categoria']);
$sql->execute();

$count = $sql->rowCount();

if ($count == 1) {
    echo 1;
} else {
    echo 0;
}

?>