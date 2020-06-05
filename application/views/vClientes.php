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

    <?php  foreach($scripts as $s):?>
           <script type='text/javascript' src = '<?php echo base_url() ?>js/<?php echo $s;?>'>
        <?php endforeach;?>
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
					<img src="<?php echo base_url() ?>assets/images/logo.png" alt="logo-large"
						class="logo-lg logo-light">
					<img src="<?php echo base_url() ?>assets/images/logo-dark.png" alt="logo-large"
						class="logo-lg logo-dark">
				</span>
			</a>
		</div>
		<!--end logo-->
		<div class="leftbar-profile p-3 w-100">
			<div class="media position-relative">
				<div class="leftbar-user online">
					<img src="<?php echo base_url() ?>assets/images/users/user-9.jpg" alt=""
						class="thumb-md rounded-circle">
				</div>
				<div class="media-body align-self-center text-truncate ml-3">
					<h5 class="mt-0 mb-1 font-weight-semibold"><?php echo $nombre_completo?></h5>
					<p class="text-uppercase mb-0 font-12">Administrador</p>
				</div>
				<!--end media-body-->
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
					<li class="nav-item"><a class="nav-link" href="#"><i class="ti-control-record"></i>Usuarios</a></li>
					<li class="nav-item"><a class="nav-link" href="<?php echo base_url() ?>index.php/Clientes"><i
								class="ti-control-record"></i>Clientes</a></li>

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
					<a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown"
						href="#" role="button" aria-haspopup="false" aria-expanded="false">
						<img src="<?php echo base_url() ?>assets/images/users/user-4.jpg" alt="profile-user"
							class="rounded-circle" />
						<span class="ml-1 nav-user-name hidden-sm"><?php echo $usuario;?> <i
								class="mdi mdi-chevron-down"></i> </span>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<!--<a class="dropdown-item" href="#"><i class="dripicons-user text-muted mr-2"></i> Perfil</a>
                            <div class="dropdown-divider"></div>-->
						<a class="dropdown-item" href="<?php echo base_url() ?>index.php/Usuarios/cerrar"><i
								class="dripicons-exit text-muted mr-2"></i> Salir</a>
					</div>
				</li>

			</ul>
			<!--end topbar-nav-->

			<ul class="list-unstyled topbar-nav mb-0">
				<li>
					<a href="#">
						<span class="responsive-logo">
							<img src="<?php echo base_url() ?>assets/images/logo-sm.png" alt="logo-small"
								class="logo-sm align-self-center" height="34">
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
									<li class="breadcrumb-item active">Clientes</li>
								</ol>
							</div>
							<h4 class="page-title">CLIENTES</h4>
						</div>
						<!--end page-title-box-->
					</div>
					<!--end col-->
				</div>
				<!--end row-->
				<!-- end page title end breadcrumb -->
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-body">
                            <button type="button" id="agrega_usuario" class="btn btn-gradient-primary px-4 btn-rounded float-right"><i class="mdi mdi-account-multiple-plus-outline"></i></button>
								<h4 class="mt-0 header-title">Administración de Clientes</h4>								
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
														<th class="sorting_asc" tabindex="0" aria-controls="datatable"
															rowspan="1" colspan="1" style="width: 129px;"
															aria-sort="ascending"
															aria-label="Name: activate to sort column descending">Nombre
														</th>
														<th class="sorting" tabindex="0" aria-controls="datatable"
															rowspan="1" colspan="1" style="width: 202px;"
															aria-label="Position: activate to sort column ascending">
															Zona</th>
														<th class="sorting" tabindex="0" aria-controls="datatable"
															rowspan="1" colspan="1" style="width: 93px;"
															aria-label="Office: activate to sort column ascending">
															Celular</th>
														<th class="sorting" tabindex="0" aria-controls="datatable"
															rowspan="1" colspan="1" style="width: 61px;"
															aria-label="Salary: activate to sort column ascending">
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
				<!--end row-->
			</div><!-- container -->

			<footer class="footer text-center text-sm-left">
				&copy; 2020 - 2021 ARO <span class="text-muted d-none d-sm-inline-block float-right">Crafted with <i
						class="mdi mdi-heart text-danger"></i> by Om@ru</span>
			</footer>
			<!--end footer-->
		</div>
		<!-- end page content -->
	</div>
	<!-- end page-wrapper -->

    <!-- Large modal -->
 
	<div class="modal fade" id="mdl_agrega_usuario"  aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
	<div class="modal-content">
				<div class="container-fluid">
				<form action="<?php echo base_url() ?>/Clientes/guardar_cliente" method="_POST" id="frm_agrega_cliente">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Agregar Cliente</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group row">
							<label for="example-text-input" class="col-sm-3 col-form-label text-right">Nombre</label>
							<div class="col-sm-6">
								<input class="form-control" type="text" id="nombre" name="nombre" autocomplete="off">
							</div>
						</div>
						<div class="form-group row">
							<label for="example-text-input" class="col-sm-3 col-form-label text-right">Primer Apellido</label>
							<div class="col-sm-6">
								<input class="form-control" type="text" id="primer_apellido" name="primer_apellido" autocomplete="off">
							</div>
						</div>
						<div class="form-group row">
							<label for="example-text-input" class="col-sm-3 col-form-label text-right">Segundo Apellido</label>
							<div class="col-sm-6">
								<input class="form-control" type="text" id="segundo_apellido" name="segundo_apellido" autocomplete="off">
							</div>
						</div>
						<div class="form-group row">
							<label for="example-text-input" class="col-sm-3 col-form-label text-right">Telefono (Casa)</label>
							<div class="col-sm-6">
								<input class="form-control" type="text" id="telefono" name="telefono" autocomplete="off">
							</div>
						</div>
						<div class="form-group row">
							<label for="example-text-input" class="col-sm-3 col-form-label text-right">Celular</label>
							<div class="col-sm-6">
								<input class="form-control" type="text" id="celular" name="celular" autocomplete="off">
							</div>
						</div>
						<div class="form-group row">
							<label for="example-text-input" class="col-sm-3 col-form-label text-right">Domicilio</label>
							<div class="col-sm-6">
								<input class="form-control" type="text" id="domicilio" name="domicilio" autocomplete="off">
							</div>
						</div>
						<div class="form-group row">
							<label for="example-text-input" class="col-sm-3 col-form-label text-right">Colonia</label>
							<div class="col-sm-6">
							<select class="form-control" id="id_comunidad" name="id_comunidad">
								<option value="none" selected="selected">-- Seleccione una opción --</option>
								<?php foreach ($comunidades as $key => $var) { ?>
									<option value="<?php echo $var->id_comunidad; ?>"><?php echo $var->nombre_comunidad; ?></option>
								<?php } ?>
							</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="example-text-input" class="col-sm-3 col-form-label text-right">Colonia</label>
							<div class="col-sm-6">
							<select class="form-control" id="id_paquete" name="id_paquete">
								<option value="none" selected="selected">-- Seleccione una opción --</option>
								<?php foreach ($paquetes as $key => $var) { ?>
									<option value="<?php echo $var->id_paquete; ?>"><?php echo $var->paquete; ?></option>
								<?php } ?>
							</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="example-text-input" class="col-sm-3 col-form-label text-right"></label>
							<div class="col-sm-6">
							<div class="alert alert-danger" role="alert" id="noti_agrega_cliente" style="display:none;"></div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Agregar</button>
					</div>
				</form>
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
		aro.clientes.init_clientes();
		aro.clientes.boton_agregar();
		aro.clientes.submit_guarda();
    </script>

</body>

</html>
