<<<<<<< HEAD
<table class="table table-bordered mb-0">
        
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>First Name</th>
                                                        <th>Last Name</th>
                                                        <th>Username</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>Mark</td>
                                                        <td>Otto</td>
                                                        <td>@mdo</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">2</th>
                                                        <td>Jacob</td>
                                                        <td>Thornton</td>
                                                        <td>@fat</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">3</th>
                                                        <td>Larry</td>
                                                        <td>the Bird</td>
                                                        <td>@twitter</td>
                                                    </tr>
                                                </tbody>
                                            </table>
=======
<?php

require('conexion.php');
session_start();

extract($_REQUEST);

$conexion = conexion();

$sql = $conexion->prepare('SELECT * from productos');
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
                    <td><?php echo $dato['categoria']; ?></td>
                    <td class="text-center">
                        <button type="button" class="btn btn-warning waves-effect waves-light"><i class="mdi mdi-pencil"></i></button> 
                        <button type="button" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-delete"></i></button>
                    </td>
                </tr>
            <?php } ?>

        </tbody>

    </table>

<?php 

?>


>>>>>>> e204af86f429db2d4ee3266e924fae982ab2f1ef
