<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>ARO | Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="ARO" name="description" />
        <meta content="" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/favicon.ico">

        <!-- App css -->
        <link href="<?php echo base_url() ?>assets/css/bootstrap-dark.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/css/jquery-ui.min.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/css/metisMenu.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/css/app-dark.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body class="">
        
        <!-- Left Sidenav -->
        <div class="left-sidenav">           
            <!-- LOGO -->
            <div class="topbar-left">
                <a href="#" class="logo">
                    <span>
                        <img src="<?php echo base_url() ?>assets/images/logo-sm.png" alt="logo-small" class="logo-sm">
                    </span>
                    <span>
                        <img src="<?php echo base_url() ?>assets/images/logo.png" alt="logo-large" class="logo-lg logo-light">
                        <img src="<?php echo base_url() ?>assets/images/logo-dark.png" alt="logo-large" class="logo-lg logo-dark">
                    </span>
                </a>
            </div>
            <!--end logo--> 
            <div class="leftbar-profile p-3 w-100">
                <div class="media position-relative">
                    <div class="leftbar-user online">
                        <img src="<?php echo base_url() ?>assets/images/users/user-9.jpg" alt="" class="thumb-md rounded-circle"> 
                    </div>                                                         
                    <div class="media-body align-self-center text-truncate ml-3">                        
                        <h5 class="mt-0 mb-1 font-weight-semibold"><?php echo $nombre_completo?></h5>   
                        <p class="text-uppercase mb-0 font-12">Administrador</p>                                         
                    </div><!--end media-body-->
                </div>
            </div>
            <ul class="metismenu left-sidenav-menu slimscroll">
                <li class="menu-label">Menu</li>
                <li class="leftbar-menu-item">
                    <a href="javascript: void(0);" class="menu-link">
                        <i data-feather="headphones" class="align-self-center vertical-menu-icon icon-dual-vertical"></i>
                        <span>Dashboard</span>
                        <span class="menu-arrow">
                            <i class="mdi mdi-chevron-right"></i>
                        </span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li class="nav-item"><a class="nav-link" href="<?php echo base_url() ?>vertical-2/helpdesk-index.html"><i class="ti-control-record"></i>Usuarios</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo base_url() ?>helpdesk/helpdesk-teckets.html"><i class="ti-control-record"></i>Clientes</a></li>
                        
                    </ul>
                </li>
            </ul>
            
        </div>
        <!-- end left-sidenav-->

        <!-- Top Bar Start -->
        <div class="topbar">                  
            <!-- Navbar -->
            <nav class="navbar-custom">    
                <ul class="list-unstyled topbar-nav float-right mb-0"> 
                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false">
                            <img src="<?php echo base_url() ?>assets/images/users/user-4.jpg" alt="profile-user" class="rounded-circle" /> 
                            <span class="ml-1 nav-user-name hidden-sm"><?php echo $usuario;?> <i class="mdi mdi-chevron-down"></i> </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!--<a class="dropdown-item" href="#"><i class="dripicons-user text-muted mr-2"></i> Perfil</a>
                            <div class="dropdown-divider"></div>-->
                            <a class="dropdown-item" href="<?php echo base_url() ?>index.php/Usuarios/cerrar"><i class="dripicons-exit text-muted mr-2"></i> Salir</a>
                        </div>
                    </li>
                   
                </ul><!--end topbar-nav-->
    
                <ul class="list-unstyled topbar-nav mb-0">  
                    <li>
                        <a href="<?php echo base_url() ?>helpdesk/helpdesk-index.html">
                            <span class="responsive-logo">
                                <img src="<?php echo base_url() ?>assets/images/logo-sm.png" alt="logo-small" class="logo-sm align-self-center" height="34">
                            </span>
                        </a>                        
                    </li>                      
                    <li>
                        <button class="button-menu-mobile nav-link">
                            <i data-feather="menu" class="align-self-center"></i>
                        </button>
                    </li>
                </ul>
            </nav>
            <!-- end navbar-->
        </div>
        <!-- Top Bar End -->

        <div class="page-wrapper">

            <!-- Page Content-->
            <div class="page-content-tab">

                <div class="container-fluid">
                    <!-- Page-Title -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title-box">
                                <div class="float-right">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">ARO</a></li>
                                        <li class="breadcrumb-item active">Dashboard</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Dashboard</h4>
                            </div><!--end page-title-box-->
                        </div><!--end col-->
                    </div><!--end row-->
                    <!-- end page title end breadcrumb -->
                    <div class="row">
                        <div class="col-lg-9">  
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="mt-0 mb-2 header-title">Clientes</h5>
                                            <div class="media">
                                                <i data-feather="tag" class="align-self-center icon-lg icon-dual-warning"></i>                                     
                                                <div class="media-body align-self-center text-truncate ml-3">
                                                    <h2 class="font-40 m-0 font-weight-semibold">
                                                        198
                                                    </h2>                                                   
                                                </div><!--end media-body-->
                                            </div><!--end media-->
                                        </div><!--end card-body-->                                        
                                    </div><!--end card-->                                      
                                </div><!-- end col-->                                           
                            </div><!--end row-->
                        </div><!--end col-->                       
                    </div><!--end row-->
                </div><!-- container -->

                <footer class="footer text-center text-sm-left">
                    &copy; 2020 - 2021 ARO <span class="text-muted d-none d-sm-inline-block float-right">Crafted with <i class="mdi mdi-heart text-danger"></i> by Om@ru</span>
                </footer><!--end footer-->
            </div>
            <!-- end page content -->
        </div>
        <!-- end page-wrapper -->

        


        <!-- jQuery  -->
        <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/jquery-ui.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/metismenu.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/waves.js"></script>
        <script src="<?php echo base_url() ?>assets/js/feather.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/jquery.slimscroll.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/apex/apexcharts.min.js"></script>

        <!-- App js -->
        <script src="<?php echo base_url() ?>assets/js/app.js"></script>
        
    </body>

</html>