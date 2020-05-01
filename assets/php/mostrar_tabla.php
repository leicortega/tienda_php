<?php

require('conexion.php');
session_start();

extract($_REQUEST);

$conexion = conexion();

$sql = $conexion->prepare('SELECT * from productos p, categorias c where p.categoria = c.id');
$sql->execute();

$datos = $sql->fetchAll();

?>
    
    <table class="table table-bordered mb-0">
        
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Precio</th>
                <th>Categoria</th>
                <th class="text-center"><i class="mdi mdi-settings mr-2"></i></th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($datos as $dato) { ?>
                <tr>
                    <th scope="row"><?php echo $dato['id']; ?></th>
                    <td><?php echo $dato['nombre']; ?></td>
                    <td><?php echo $dato['descripcion']; ?></td>
                    <td><?php echo $dato['precio']; ?></td>
                    <td><?php echo $dato[6]; ?></td>
                    <td class="text-center">
                        <button type="button" class="btn btn-warning waves-effect waves-light" onclick="editar(<?php echo $dato[0]; ?>)"><i class="mdi mdi-pencil"></i></button> 
                        <button type="button" class="btn btn-danger waves-effect waves-light" onclick="eliminar(<?php echo $dato[0]; ?>)"><i class="mdi mdi-delete"></i></button>
                    </td>
                </tr>
            <?php } ?>

        </tbody>

    </table>

<?php 

?>


