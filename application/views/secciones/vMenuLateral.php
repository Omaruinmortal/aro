        <!-- Left Sidenav -->
        <div class="left-sidenav">           
            <!-- LOGO -->
            <div class="topbar-left">
                <a href="<?php echo base_url() ?>index.php/Principal" class="logo">
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
                        <!--<li class="nav-item"><a class="nav-link" href="#"><i class="ti-control-record"></i>Usuarios</a></li>-->
                        <li class="nav-item"><a class="nav-link" href="<?php echo base_url() ?>index.php/Clientes"><i class="ti-control-record"></i>Clientes</a></li>
                        
                    </ul>
                </li>
            </ul>
            
        </div>
        <!-- end left-sidenav-->
