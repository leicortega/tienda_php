<?php

require('assets/php/secure_login.php');

?>


<!DOCTYPE html>
<html lang="es">

    <?php include('assets/php/includes/head.php'); ?>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <?php include('assets/php/includes/header.php'); ?>
            <!-- Top Bar End -->

            <!-- ========== Left Sidebar Start ========== -->
            <?php include('assets/php/includes/menu.php'); ?>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-sm-6">
                                    <h4 class="page-title">Productos</h4>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);"><i class="mdi mdi-home-outline"></i></a></li>
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Extra Pages</a></li>
                                        <li class="breadcrumb-item active">Blank Page</li>
                                    </ol>
                                </div>
                                <div class="col-sm-6">
                                    <div class="float-right d-none d-md-block">
                                        <div class="dropdown">
                                            <button class="btn btn-primary dropdown-toggle arrow-none waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-xl" type="button">
                                                <i class="mdi mdi-plus mr-2"></i> Agregar Producto
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end row -->
                        </div>
                        <!-- end page-title -->

                        <!-- Inicio del espacio de trabajo -->
                        <div id="mensajes"></div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="mt-0 header-title">Bordered table</h4>
                                        <p class="text-muted mb-4">Add <code>.table-bordered</code> for borders on all sides of the table and cells.</p>    
                                        
<<<<<<< HEAD
                                        <div class="table-responsive " id="div_mostrar_tabla">
=======
                                        <div class="table-responsive" id="div_mostrar_tabla">
>>>>>>> e204af86f429db2d4ee3266e924fae982ab2f1ef
                                            
                                        </div>
        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- FIN del espacio de trabajo -->

                    </div>
                    <!-- container-fluid -->

                </div>
                <!-- content -->

                <footer class="footer">
                    © 2020 Veltrix <span class="d-none d-sm-inline-block"> - Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</span>.
                </footer>

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->

            <!-- MODAL PARA CREAR PRODUCTOS -->
            <div class="modal fade bs-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title mt-0" id="myExtraLargeModalLabel">Crear Producto</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form action="assets/php/agregar_producto.php" method="post" id="form_agregar_producto">
                                <div class="form-group row">
                                    <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="Ingrese el nombre" id="nombre" name="nombre">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="descripcion" class="col-sm-2 col-form-label">Descripcion</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="Ingrese la descripcion" id="descripcion" name="descripcion">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="precio" class="col-sm-2 col-form-label">Precio</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="number" placeholder="Ingrese el precio" id="precio" name="precio">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Categoria</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="categoria" name="categoria">
                                            <option>Seleccione la categoria</option>
                                            <option>Categoria 1</option>
                                            <option>Categoria 2</option>
                                            <option>Categoria 3</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <button class="btn btn-primary waves-effect waves-light" type="submit">Agregar</button>
                                </div>
                            </form>

                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->

        <!-- jQuery  -->
        <?php include('assets/php/includes/footer.php'); ?>
        
    </body>

</html>