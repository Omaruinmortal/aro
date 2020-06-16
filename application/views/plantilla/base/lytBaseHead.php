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

        <!-- DataTables -->
        <link href="<?php echo base_url() ?>plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"
            type="text/css" />
        <link href="<?php echo base_url() ?>plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet"
            type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="<?php echo base_url() ?>plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet"
            type="text/css" />
            
        <!-- App css -->
        <link href="<?php echo base_url() ?>assets/css/bootstrap-dark.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/css/jquery-ui.min.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/css/metisMenu.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/css/app-dark.min.css" rel="stylesheet" type="text/css" />

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        
        
        <?php if (isset($scripts)) : foreach ($scripts as $js) : ?>
        <script src="<?php echo base_url() . "js/{$js}.js" ?>?filever=<?php echo time() ?>"  language="JavaScript" type="text/javascript"></script>
        <?php endforeach;
        endif; ?>
        <script>
            var base_url = "http://<?php echo $_SERVER['HTTP_HOST'] ?>/aro";
        </script>

    </head>

    <body class="">
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
        <?php $this->load->view('secciones/vMenuLateral'); ?>