<?php

require('assets/php/secure_login.php');
require('assets/php/conexion.php');
$conexion = conexion();

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
                                        <h4 class="page-title">Inbox</h4>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="javascript:void(0);"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item"><a href="javascript:void(0);">Email</a></li>
                                            <li class="breadcrumb-item active">Inbox</li>
                                        </ol>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="float-right d-none d-md-block">
                                            <div class="dropdown">
                                                <button class="btn btn-primary dropdown-toggle arrow-none waves-effect waves-light" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="mdi mdi-settings mr-2"></i> Settings
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <a class="dropdown-item" href="#">Something else here</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#">Separated link</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end row -->
                            </div>
                            <!-- end page-title -->

                            <div class="row">
                                <div class="col-12">
                                    <!-- Left sidebar -->
                                    <div class="email-leftbar card">
                                        <!-- <a href="email-compose.html" class="btn btn-danger btn-block waves-effect waves-light">Compose</a> -->
            
                                        <div class="mail-list mt-4">
                                            <a href="email-inbox.php" class="active"><i class="mdi mdi-email-outline mr-2"></i> Inbox <span class="ml-1 float-right">(18)</span></a>
                                            <a href="email-contestados.php"><i class="mdi mdi-email-check-outline mr-2"></i>Contestados</a>
                                        </div>
            
                                    </div>
                                    <!-- End Left sidebar -->
            
            
                                    <!-- Right Sidebar -->
                                    <div class="email-rightbar mb-3">
                                        
                                        <div class="card">
                                            
                                            <ul class="message-list">

                                                <?php

                                                $sql_correos = $conexion->prepare('SELECT * from correos where ISNULL(respuesta)');
                                                $sql_correos->execute();

                                                $correos = $sql_correos->fetchAll();

                                                foreach ($correos as $correo) { ?>
                                                    <li>
                                                        <div class="col-mail col-mail-1">
                                                            <div class="checkbox-wrapper-mail">
                                                                <input type="checkbox" id="chk19">
                                                                <label for="chk19" class="toggle"></label>
                                                            </div>
                                                            <a href="email-read.php?id=<?php echo $correo['id']; ?>" class="title"><?php echo $correo['nombre_cliente']; ?></a><span class="star-toggle far fa-eye"></span>
                                                        </div>
                                                        <div class="col-mail col-mail-2">
                                                            <a href="email-read.php?id=<?php echo $correo['id']; ?>" class="subject"><?php echo $correo['asunto']; ?></span>
                                                            </a>
                                                            <div class="date"><?php echo $correo['fecha']; ?></div>
                                                        </div>
                                                    </li>
                                                <?php }

                                                ?>
            
                                            </ul>
            
                                        </div> <!-- card -->
            
                                        <div class="row">
                                            <div class="col-7">
                                                Showing 1 - 20 of 1,524
                                            </div>
                                            <div class="col-5">
                                                <div class="btn-group float-right">
                                                    <button type="button" class="btn btn-sm btn-success waves-effect"><i class="fa fa-chevron-left"></i></button>
                                                    <button type="button" class="btn btn-sm btn-success waves-effect"><i class="fa fa-chevron-right"></i></button>
                                                </div>
                                            </div>
                                        </div>
            
                                    </div> <!-- end Col-9 -->
            
                                </div>
            
                            </div><!-- End row -->

                        </div>
                        <!-- container-fluid -->

                    </div>
                    <!-- content -->

                    <footer class="footer">
                        © 2019 Veltrix <span class="d-none d-sm-inline-block"> - Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</span>.
                    </footer>

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->

        <!-- jQuery  -->
        <?php include('assets/php/includes/footer.php'); ?>
            
    </body>

</html>