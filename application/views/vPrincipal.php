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
        
        <?php  foreach($scripts as $s):?>
           <script type='text/javascript' src = '<?php echo base_url() ?>js/<?php echo $s;?>'>
        <?php endforeach;?>
            </script>
        <script>
            var base_url = "http://<?php echo $_SERVER['HTTP_HOST'] ?>/aro";
        </script>

    </head>

    <body class="">
        
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
                                            <h5 class="mt-0 mb-2 header-title">Clientes registrados</h5>
                                            <div class="media">
                                                <i data-feather="users" class="align-self-center icon-lg icon-dual-purple"></i>                                     
                                                <div class="media-body align-self-center text-truncate ml-3">
                                                    <h2 class="font-40 m-0 font-weight-semibold">
                                                        <?php echo $todos_clientes[0]->total;;?>
                                                    </h2>                                                   
                                                </div><!--end media-body-->
                                            </div><!--end media-->
                                        </div><!--end card-body-->                                        
                                    </div><!--end card-->                                      
                                </div><!-- end col-->   
                                <div class="col-lg-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="mt-0 mb-2 header-title">Pagos del mes</h5>
                                            <div class="media">
                                                <i data-feather="users" class="align-self-center icon-lg icon-dual-success"></i>                                                                        
                                                <div class="media-body align-self-center text-truncate ml-3">
                                                    <h2 class="font-40 m-0 font-weight-semibold" id="pagados">
                                                        <?php echo $todos_clientes_pagaron[0]->total;;?>
                                                    </h2>                                                   
                                                </div><!--end media-body-->
                                            </div><!--end media-->
                                        </div><!--end card-body-->                                        
                                    </div><!--end card-->                                      
                                </div><!-- end col-->    
                                <div class="col-lg-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="mt-0 mb-2 header-title">Pendientes / Pago</h5>
                                            <div class="media">
                                            <i data-feather="users" class="align-self-center icon-lg icon-dual-pink"></i>                                                                         
                                                <div class="media-body align-self-center text-truncate ml-3">
                                                    <h2 class="font-40 m-0 font-weight-semibold" id="sinpagar">
                                                        <?php echo $todos_clientes_por_pagar[0]->total;;?>
                                                    </h2>                                                   
                                                </div><!--end media-body-->
                                            </div><!--end media-->
                                        </div><!--end card-body-->                                        
                                    </div><!--end card-->                                      
                                </div><!-- end col-->                                           
                            </div><!--end row-->
                        </div><!--end col-->                       
                    </div><!--end row-->
                    <div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-body">
								<h4 class="mt-0 header-title">Pagos mensuales</h4>								
                                <p class="text-muted mb-3">En esta area podemos administrar clientes del sistema.</p>
								<div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
									<div class="row">
										<div class="col-sm-12">
											<table id="datatable_clientes"
												class="table table-bordered dt-responsive nowrap dataTable no-footer dtr-inline"
												style="border-collapse: collapse; border-spacing: 0px; width: 100%;"
												role="grid" aria-describedby="datatable_info">
												<thead>
													<tr role="row">
														<th class="sorting_asc" aria-controls="datatable">
                                                            Nombre</th>														
														<th class="sorting" aria-controls="datatable">
															Fecha de Pago</th>
                                                        <th class="sorting" aria-controls="datatable">
															Comunidad</th>
                                                        <th class="sorting" aria-controls="datatable">
															Estado</th>
                                                        <th class="sorting" aria-controls="datatable">
															Observacion</th>
														<th class="sorting" aria-controls="datatable">
															</th>
													</tr>
												</thead>
											</table>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div> <!-- end col -->
				</div>
                </div><!-- container -->

                <footer class="footer text-center text-sm-left">
                    &copy; 2020 - 2021 ARO <span class="text-muted d-none d-sm-inline-block float-right">Crafted with <i class="mdi mdi-heart text-danger"></i> by Om@ru</span>
                </footer><!--end footer-->
            </div>
            <!-- end page content -->
        </div>
        <!-- end page-wrapper -->

        <div class="modal fade" id="mdl_pago_cliente"  aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
                    <div class="container-fluid">
                    <form method="post" id="frm_pago_cliente" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Agregar Pago</h5>
                            <button type="button" class="close" id="cerrar_modal_pago_x" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-3 col-form-label text-right">Nombre Cliente</label>
                                <div class="col-sm-6">
                                    <input class="form-control" type="hidden" id="id_pago" name="id_pago" autocomplete="off" readonly>
                                    
                                    <input class="form-control" type="text" id="nombre" name="nombre" autocomplete="off" readonly >
                                </div>
                            </div><div class="form-group row">
                                <label for="example-text-input" class="col-sm-3 col-form-label text-right">Subir comprobante</label>
                                <div class="col-sm-6">
                                    <input type="file" class="form-control" id="archivo_pago" name="archivo_pago" lang="es" data-max-size="2048">
                                    <div class="alert alert-danger" role="alert" id="noti_archivo_pago" style="display:none;"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-3 col-form-label text-right">Observaciones</label>
                                <div class="col-sm-6">
                                    <textarea class="form-control" name="observaciones" id="observaciones" cols="30" rows="10" onkeyup="javascript:this.value=this.value.toUpperCase();"></textarea>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-3 col-form-label text-right"></label>
                                <div class="col-sm-6">
                                <div class="alert alert-danger" role="alert" id="noti_pago_cliente" style="display:none;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            
                            <button type="button" id="close_modal_pago" class="btn btn-secondary " data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Agregar Pago</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="mdl_comprobante_pago"  aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
                    <div class="container-fluid">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Comprobante de pago</h5>
                            <button type="button" class="close" id="cerrar_modal_pago_x_comprobante" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-3 col-form-label text-right">Nombre Cliente</label>
                                <div class="col-sm-6">
                                    <input class="form-control" type="text" id="nombre_cliente" name="nombre_cliente" autocomplete="off" readonly >
                                </div>
                            </div>
                            <div class="form-group row">
                            <div class="col-sm-12">
                                    <center>
                                    <img src="" id="comprobante" alt="Comprobante" class="img-responsive" width="80%">
                                    </center>                                    
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            

                        </div>
                    </div>
                </div>
            </div>
        </div>


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

        <!-- Required datatable js -->
        <script src="<?php echo base_url(); ?>plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="<?php echo base_url(); ?>plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url(); ?>plugins/datatables/buttons.bootstrap4.min.js"></script>
        <script src="<?php echo base_url(); ?>plugins/datatables/jszip.min.js"></script>
        <script src="<?php echo base_url(); ?>plugins/datatables/pdfmake.min.js"></script>
        <script src="<?php echo base_url(); ?>plugins/datatables/vfs_fonts.js"></script>
        <script src="<?php echo base_url(); ?>plugins/datatables/buttons.html5.min.js"></script>
        <script src="<?php echo base_url(); ?>plugins/datatables/buttons.print.min.js"></script>
        <script src="<?php echo base_url(); ?>plugins/datatables/buttons.colVis.min.js"></script>
        <!-- Responsive examples -->
        <script src="<?php echo base_url(); ?>plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="<?php echo base_url(); ?>plugins/datatables/responsive.bootstrap4.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/pages/jquery.datatable.init.js"></script>

        <script>
            aro.principal.init_dashboard();
        </script>
        
    </body>

</html>