<?php

function conexion() {
    
    $dsn = 'mysql:dbname=tienda_php;host=127.0.0.1';
    $usuario = 'root';
    $contraseña = '';

    try {
        $pdo = new PDO($dsn, $usuario, $contraseña);
        return $pdo;
    } catch (PDOException $e) {
        echo 'Falló la conexión: ' . $e->getMessage();
    }

}

?>