<?php

require('conexion.php');
session_start();

extract($_REQUEST);

$conexion = conexion();
$data = array();

$sql = $conexion->prepare('SELECT * from productos where id = :id');
$sql->bindParam(':id', $_REQUEST['id']);
$sql->execute();

if($sql->rowCount() > 0){
    $producto = $sql->fetchAll();
    $data['status'] = 'ok';
    $data['result'] = $producto;
}else{
    $data['status'] = 'err';
    $data['result'] = '';
}

//returns data as JSON format
echo json_encode($data);

?>


