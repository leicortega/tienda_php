<?php

require('conexion.php');
session_start();

extract($_REQUEST);

$conexion = conexion();

// Operacion para tomar el inicio de la consulta 
$inicio = ($_REQUEST['page'] - 1) * 5;

$sql = $conexion->prepare('SELECT * from productos p, categorias c where p.categoria = c.id order by p.id '.$_REQUEST['order'].' limit '.$inicio.', 5');
$sql->execute();
$datos = $sql->fetchAll();

// Consulta para obtener el total de los registros para hayar el numero de paginas
$sql_item = $conexion->prepare('SELECT * from productos p, categorias c where p.categoria = c.id');
$sql_item->execute();
$cont = $sql_item->rowCount();  //variable con que contiene la cantidad de registros

$num_item = ceil($cont / 5);    //Operacion para hayar el numero de paginas. funcion ceil() obtiene el valor entero del numero
if ($num_item == 0) {           //Si el numero de paginas es 0, le asignamos el valor de 1
  $num_item = 1;
}

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
                    <th scope="row"><?php echo $dato[0]; ?></th>
                    <td><?php echo $dato[1]; ?></td>
                    <td><?php echo $dato['descripcion']; ?></td>
                    <td><?php echo $dato['precio']; ?></td>
                    <td><?php echo $dato[7]; ?></td>
                    <td class="text-center">
                        <button type="button" class="btn btn-warning waves-effect waves-light" onclick="editar(<?php echo $dato[0]; ?>)"><i class="mdi mdi-pencil"></i></button> 
                        <button type="button" class="btn btn-danger waves-effect waves-light" onclick="eliminar(<?php echo $dato[0]; ?>)"><i class="mdi mdi-delete"></i></button>
                    </td>
                </tr>
            <?php } ?>

        </tbody>

    </table>

    <nav aria-label="..." class="text-center mt-3">
        <ul class="pagination">
            <li class="page-item <?php echo $_REQUEST['page'] > 1 ? '' : 'disabled'; ?>">
                <!-- Cuando de clic en atras llamamos la funcion mostrar_tabla y le restamos 1 -->
                <a class="page-link" href="#" tabindex="-1" onclick="mostrar_tabla(<?php echo ($_REQUEST['page'] - 1); ?>, 'desc')">Atras</a>
            </li>

            <!-- Ciclo for para mostrar la cantidad de paginas o numeros en el paginador -->
            <?php 
            
            if ($num_item > 5) {                    // Si el numero de items del paginador es mayor a 5 entonces num_item_paginador sera igual a 5
                $num_item_paginador = 5;
            } else {                                // Si el numero de items del paginador es menor que 6 entonces num_item_paginador sera igual a num_item
                $num_item_paginador = $num_item;
            }

            if ($_REQUEST['page'] > 3) {                      // Si la pagina actual es mayor a 3 entonces 
                $j = $_REQUEST['page'] - 2;                   // Variable j tendra el inicio del ciclo for asignandole el numero de la pagina actual - 2
                $num_item_paginador = $_REQUEST['page'] + 2;  // El numero final del cliclo for (num_item_paginador) sera igual a la pagina actual + 2
                if ($num_item_paginador > $num_item) {        // Si el numero final del ciclo for es mayor al numero de paginas entonces
                    $num_item_paginador = $num_item;          // El numero final del ciclo for sera igual al numero total de items
                }
            } else {        
                $j = 1;                                       // Si el numero de la pagina actual es menor a 4 entonces el ciclo for inicia en 1
            }

            for ($i = $j; $i <= $num_item_paginador; $i++) {  ?>
                <!-- Agregamos la funcion mostrar_tabla con el valor de la variable i del ciclo for -->
                <li class="page-item <?php echo $i == $_REQUEST['page'] ? 'active' : ''; ?>"><a class="page-link" href="#" onclick="mostrar_tabla(<?php echo ($i); ?>, 'desc')"><?php echo$i; ?></a></li>
            <?php } ?>

            <!-- Cuando de clic en Siguiente llamamos la funcion mostrar_tabla y le sumamos 1 -->
            <li class="page-item <?php echo $_REQUEST['page'] == $num_item ? 'disabled' : ''; ?>">
                <a class="page-link" href="#" onclick="mostrar_tabla(<?php echo ($_REQUEST['page'] + 1); ?>, 'desc')">Siguiente</a>
            </li>
        </ul>
    </nav>

<?php 

?>


