<?php

require('assets/php/secure_login.php');
require('assets/php/conexion.php');
$conexion = conexion();

?>


<!DOCTYPE html>
<html lang="es">

    <?php include('assets/php/includes/head.php'); ?>
    <!-- summernote -->
    <link rel="stylesheet" href="assets/plugins/summernote/summernote-bs4.css" />

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
                                                    <h4 class="page-title">Email Read</h4>
                                                    <ol class="breadcrumb">
                                                        <li class="breadcrumb-item"><a href="javascript:void(0);"><i class="mdi mdi-home-outline"></i></a></li>
                                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Email</a></li>
                                                        <li class="breadcrumb-item active">Email Read</li>
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

                                                <div id="mensajes"></div>
                                                <!-- Left sidebar -->
                                                <div class="email-leftbar card">
                                                    <!-- <a href="email-compose.html" class="btn btn-danger btn-block waves-effect waves-light">Compose</a> -->
                            
                                                    <?php 
                                                    $sql_correo = $conexion->prepare('SELECT * from correos c,usuarios u where c.id = '.$_GET['id'].' AND c.responsable = u.id');
                                                    $sql_correo->execute(); 
                                                    
                                                    $correo = $sql_correo->fetchAll();
                                                    $count_correos = $sql_correo->rowCount();
                                                    ?>

                                                    <div class="mail-list mt-4">
                                                        <a href="email-inbox.php" class="active"><i class="mdi mdi-email-outline mr-2"></i> Inbox</a>
                                                        <a href="email-contestados.php"><i class="mdi mdi-email-check-outline mr-2"></i>Contestados <span class="ml-1 float-right">(<?php print_r ($count_correos); ?>)</span></a>
                                                    </div>
                            
                                                </div>
                                                <!-- End Left sidebar -->
                        
                        
                                                <!-- Right Sidebar -->
                                                <div class="email-rightbar mb-3">
                                                    
                                                    <div class="card">
                                                        <div class="card-body">

                                                        <?php

                                                        foreach ($correo as $item) { ?>
                                                            <div class="media mb-4">
                                                                <img class="d-flex mr-3 rounded-circle thumb-md" src="assets/images/users/user-1.jpg" alt="Generic placeholder image">
                                                                <div class="media-body">
                                                                    <h4 class="font-14 m-0"><?php echo $item['nombre_cliente']; ?></h4>
                                                                    <small class="text-muted"><?php echo $item['correo_cliente']; ?></small><br>
                                                                    <small class="text-muted"><?php echo $item['telefono_cliente']; ?></small>
                                                                </div>
                                                            </div>
                        
                                                            <h4 class="mt-0 font-16"><?php echo $item['asunto']; ?></h4>
                        
                                                            <p><?php echo $item['mensaje']; ?></p>

                                                        <?php } ?>

                                                            <hr/>
                                                            <div class="row justify-content-center mb-5">
                                                                <div class="col-lg-5">
                                                                    <div class="text-center py-4">
                                                                        <div class="py-3">
                                                                            <i class="ti-comments text-danger h3"></i>
                                                                        </div>
                                                                        <h5>Responsable: <?php echo $correo[0][10]; ?></h5>
                                                                        <p class="text-muted"><?php echo $correo[0][7]; ?></p>
                                                                        <!-- <button type="button" class="btn btn-primary mt-1 mr-1 waves-effect waves-light">Email Us</button>
                                                                        <button type="button" class="btn btn-danger mt-1 waves-effect waves-light">Send us a tweet</button> -->
                                                                    </div>
                                                                </div>
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

        <!-- summernote -->
        <script src="assets/plugins/summernote/summernote-bs4.js"></script>
        
        <!-- Init -->
        <script src="assets/pages/email-summernote.init.js"></script>
        
    </body>

</html>