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

        <script>
            aro.principal.init_dashboard();
        </script>
        
