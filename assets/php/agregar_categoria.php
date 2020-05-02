<?php

require('conexion.php');
session_start();

extract($_REQUEST);

$conexion = conexion();

$sql = $conexion->prepare('INSERT into categorias values ("", :nombre)');
$sql->bindParam(':nombre', $_REQUEST['nombre_categoria']);
$sql->execute();

$count = $sql->rowCount();

if ($count == 1) {
    echo 1;
} else {
    echo 0;
}

?>