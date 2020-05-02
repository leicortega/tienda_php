<?php

require('conexion.php');
session_start();

extract($_REQUEST);

$conexion = conexion();
$data = array();

$sql = $conexion->prepare('SELECT * from categorias where id = :id');
$sql->bindParam(':id', $_REQUEST['id']);
$sql->execute();

if($sql->rowCount() > 0){
    $categoria = $sql->fetchAll();
    $data['status'] = 'ok';
    $data['result'] = $categoria;
}else{
    $data['status'] = 'err';
    $data['result'] = '';
}

//returns data as JSON format
echo json_encode($data);

?>


