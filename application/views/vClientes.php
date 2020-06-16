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
					<div class="col-11">
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
														<th class="sorting_asc" aria-controls="datatable">
                                                            Nombre</th>														
														<th class="sorting" aria-controls="datatable">
															Zona</th>
                                                        <th class="sorting" aria-controls="datatable">
															Celular</th>
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
						<button type="button" class="close" id="cerrar_modal" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group row">
							<label for="example-text-input" class="col-sm-3 col-form-label text-right">Nombre</label>
							<div class="col-sm-6">
								<input class="form-control" type="text" id="nombre" name="nombre" autocomplete="off" onkeyup="javascript:this.value=this.value.toUpperCase();">
							</div>
						</div>
						<div class="form-group row">
							<label for="example-text-input" class="col-sm-3 col-form-label text-right">Primer Apellido</label>
							<div class="col-sm-6">
								<input class="form-control" type="text" id="primer_apellido" name="primer_apellido" autocomplete="off" onkeyup="javascript:this.value=this.value.toUpperCase();">
							</div>
						</div>
						<div class="form-group row">
							<label for="example-text-input" class="col-sm-3 col-form-label text-right">Segundo Apellido</label>
							<div class="col-sm-6">
								<input class="form-control" type="text" id="segundo_apellido" name="segundo_apellido" autocomplete="off" onkeyup="javascript:this.value=this.value.toUpperCase();">
							</div>
						</div>
						<div class="form-group row">
							<label for="example-text-input" class="col-sm-3 col-form-label text-right">Celular</label>
							<div class="col-sm-6">
								<input class="form-control" type="text" id="celular" name="celular" autocomplete="off" onkeyup="javascript:this.value=this.value.toUpperCase();">
							</div>
						</div>
						<div class="form-group row">
							<label for="example-text-input" class="col-sm-3 col-form-label text-right">Domicilio</label>
							<div class="col-sm-6">
								<input class="form-control" type="text" id="domicilio" name="domicilio" autocomplete="off" onkeyup="javascript:this.value=this.value.toUpperCase();">
							</div>
						</div>
						<div class="form-group row">
							<label for="example-date-input" class="col-sm-3 col-form-label text-right">Fecha de Instalación</label>
							<div class="col-sm-6">
								<input class="form-control" type="date" value="<?php echo  date("Y-m-d");;?>" id="fecha_instalacion" name="fecha_instalacion">
							</div>
						</div>
						<div class="form-group row">
							<label for="example-text-input" class="col-sm-3 col-form-label text-right">Colonia</label>
							<div class="col-sm-6">
							<select class="form-control" id="id_comunidad" name="id_comunidad">
								<option value="0" selected="selected">-- Seleccione una opción --</option>
								<?php foreach ($comunidades as $key => $var) { ?>
									<option value="<?php echo $var->id_comunidad; ?>"><?php echo $var->nombre_comunidad; ?></option>
								<?php } ?>
							</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="example-text-input" class="col-sm-3 col-form-label text-right">Mac Address</label>
							<div class="col-sm-6">
								<input class="form-control" type="text" id="mac_antena_cliente" name="mac_antena_cliente" maxlength="17" autocomplete="off" onkeyup="javascript:this.value=this.value.toUpperCase();">
							</div>
						</div>
						<div class="form-group row">
							<label for="example-text-input" class="col-sm-3 col-form-label text-right">Antena conectada a:</label>
							<div class="col-sm-6">
							<select class="form-control" id="id_antena_ap" name="id_antena_ap">
								<option value="0" selected="selected">-- Seleccione una opción --</option>
								<?php foreach ($antenas_ap as $key => $var) { ?>
									<option value="<?php echo $var->id_antena_ap; ?>"><?php echo $var->nombre_antena_ap; ?></option>
								<?php } ?>
							</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="example-text-input" class="col-sm-3 col-form-label text-right">Paquete</label>
							<div class="col-sm-6">
							<select class="form-control" id="id_paquete" name="id_paquete">
								<option value="0" selected="selected">-- Seleccione una opción --</option>
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
						
						<button type="button" id="close_modal_cliente" class="btn btn-secondary " data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Agregar</button>
					</div>
				</form>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="mdl_modificar_usuario"  aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
	<div class="modal-content">
				<div class="container-fluid">
				<form action="<?php echo base_url() ?>/Clientes/modificar_cliente" method="_POST" id="frm_modificar_cliente">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Modificar Cliente</h5>
						<button type="button" class="close" id="cerrar_modal_m" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group row">
							<label for="example-text-input" class="col-sm-3 col-form-label text-right">Nombre</label>
							<div class="col-sm-6">
								<input class="form-control" type="hidden" id="id_cliente" name="id_cliente"  autocomplete="off" onkeyup="javascript:this.value=this.value.toUpperCase();">	
								<input class="form-control" type="text" id="nombre_m" name="nombre_m" autocomplete="off" onkeyup="javascript:this.value=this.value.toUpperCase();">
							</div>
						</div>
						<div class="form-group row">
							<label for="example-text-input" class="col-sm-3 col-form-label text-right">Primer Apellido</label>
							<div class="col-sm-6">
								<input class="form-control" type="text" id="primer_apellido_m" name="primer_apellido_m" autocomplete="off" onkeyup="javascript:this.value=this.value.toUpperCase();">
							</div>
						</div>
						<div class="form-group row">
							<label for="example-text-input" class="col-sm-3 col-form-label text-right">Segundo Apellido</label>
							<div class="col-sm-6">
								<input class="form-control" type="text" id="segundo_apellido_m" name="segundo_apellido_m" autocomplete="off" onkeyup="javascript:this.value=this.value.toUpperCase();">
							</div>
						</div>
						<div class="form-group row">
							<label for="example-text-input" class="col-sm-3 col-form-label text-right">Celular</label>
							<div class="col-sm-6">
								<input class="form-control" type="text" id="celular_m" name="celular_m" autocomplete="off" onkeyup="javascript:this.value=this.value.toUpperCase();">
							</div>
						</div>
						<div class="form-group row">
							<label for="example-text-input" class="col-sm-3 col-form-label text-right">Domicilio</label>
							<div class="col-sm-6">
								<input class="form-control" type="text" id="domicilio_m" name="domicilio_m" autocomplete="off" onkeyup="javascript:this.value=this.value.toUpperCase();">
							</div>
						</div>
						<div class="form-group row">
							<label for="example-date-input" class="col-sm-3 col-form-label text-right">Fecha de Instalación</label>
							<div class="col-sm-6">
								<input class="form-control" type="date" id="fecha_instalacion_m" name="fecha_instalacion_m">
							</div>
						</div>
						<div class="form-group row">
							<label for="example-text-input" class="col-sm-3 col-form-label text-right">Colonia</label>
							<div class="col-sm-6">
							<select class="form-control" id="id_comunidad_m" name="id_comunidad_m">
								<option value="0" selected="selected">-- Seleccione una opción --</option>
								<?php foreach ($comunidades as $key => $var) { ?>
									<option value="<?php echo $var->id_comunidad; ?>"><?php echo $var->nombre_comunidad; ?></option>
								<?php } ?>
							</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="example-text-input" class="col-sm-3 col-form-label text-right">Mac Address</label>
							<div class="col-sm-6">
								<input class="form-control" type="text" id="mac_antena_cliente_m"  name="mac_antena_cliente_m" maxlength="17" autocomplete="off" onkeyup="javascript:this.value=this.value.toUpperCase();">
							</div>
						</div>
						<div class="form-group row">
							<label for="example-text-input" class="col-sm-3 col-form-label text-right">Antena conectada a:</label>
							<div class="col-sm-6">
							<select class="form-control" id="id_antena_ap_m" name="id_antena_ap_m">
								<option value="0" selected="selected">-- Seleccione una opción --</option>
								<?php foreach ($antenas_ap as $key => $var) { ?>
									<option value="<?php echo $var->id_antena_ap; ?>"><?php echo $var->nombre_antena_ap; ?></option>
								<?php } ?>
							</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="example-text-input" class="col-sm-3 col-form-label text-right">Paquete</label>
							<div class="col-sm-6">
							<select class="form-control" id="id_paquete_m" name="id_paquete_m">
								<option value="0" selected="selected">-- Seleccione una opción --</option>
								<?php foreach ($paquetes as $key => $var) { ?>
									<option value="<?php echo $var->id_paquete; ?>"><?php echo $var->paquete; ?></option>
								<?php } ?>
							</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="example-text-input" class="col-sm-3 col-form-label text-right"></label>
							<div class="col-sm-6">
							<div class="alert alert-danger" role="alert" id="noti_modificar_cliente" style="display:none;"></div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						
						<button type="button" id="close_modal_cliente_m" class="btn btn-secondary " data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Modificar</button>
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
		aro.clientes.submit_modificar();
    </script>

</body>

</html>
