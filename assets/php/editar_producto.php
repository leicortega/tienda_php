<?php

require('conexion.php');
date_default_timezone_set('America/Bogota');
session_start();

extract($_REQUEST);

$conexion = conexion();

// Subir la imagen al servidor
if (!isset($_FILES['imagen'])){
    $sql = $conexion->prepare('UPDATE productos set nombre = :nombre, descripcion = :descripcion, precio = :precio, categoria = :categoria where id = :id');
    $sql->bindParam(':id', $_REQUEST['id']);
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
} else{
    
    if ($_FILES['imagen']['size'] > 2097152) {   // Validamos que el tamaño de la imagen no sea mayor a 2MB, si exede el tamaño devuelve un 0
        echo 0;
    } else {
        // Validamos que el tipo de la imagen sea JPG, PNG o JPEG, en caso de no ser asi, devuelve un 0
        if (!($_FILES['imagen']['type'] =="image/jpg" || $_FILES['imagen']['type'] =="image/png" || $_FILES['imagen']['type'] =="image/jpeg")) {
            echo 0;
        } else {
            $date = getdate();                                // Tomamos la fecha para crear un nombre unico para la imagen
            $ext = explode(".", $_FILES['imagen']['name']);   // obtenemos la extension (.jpg) de la imagen
            $extension = strtolower($ext[1]);                 // pasamos la extension a minuscilas
            // creamos el nuevo nombre para la imagen, este nombre es unico teniendo en cuenta la fecha, hora y segundos actual.
            $imagen_nuevo_nombre_editar = 'imagen_'.$date['year'].$date['mon'].$date['mday'].$date['hours'].$date['minutes'].$date['seconds'].'.'.$extension; 
    
            // Movemos la imagen de la ubicacion temporal a la carpeta destino (assets/images/productos)
            if (move_uploaded_file($_FILES['imagen']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/tienda_php/assets/images/productos/'.$imagen_nuevo_nombre_editar)) {
                
                $sql_produc = $conexion->prepare('SELECT * FROM productos  where id = :id');
                $sql_produc->bindParam(':id', $_REQUEST['id']);
                $sql_produc->execute();
                $datos_producto = $sql_produc->fetchAll();
                unlink($_SERVER['DOCUMENT_ROOT'].'/tienda_php/assets/images/productos/'.$datos_producto[0]['imagen']);
                

                // Si no ocurrieron errores al mover la imagen hacemos el edicion a la base de datos
                $sql = $conexion->prepare('UPDATE productos set nombre = :nombre, descripcion = :descripcion, precio = :precio, categoria = :categoria,imagen = :imagen where id = :id');
                $sql->bindParam(':id', $_REQUEST['id']);
                $sql->bindParam(':nombre', $_REQUEST['nombre']);
                $sql->bindParam(':descripcion', $_REQUEST['descripcion']);
                $sql->bindParam(':precio', $_REQUEST['precio']);
                $sql->bindParam(':categoria', $_REQUEST['categoria']);
                $sql->bindParam(':imagen', $imagen_nuevo_nombre_editar);
                $sql->execute();
            
                $count = $sql->rowCount();
            
                if ($count == 1) {
                    echo 1;
                } else {
                    echo 0;
                }
            } 
        }
        
    }
    
}



?>