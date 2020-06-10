<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    public function __construct()
	{
		parent::__construct();
		$this->load->model('Musuarios');
		$this->load->model('Mclientes');
		$this->load->model('Mconexion');
		$this->load->library('upload');
	}

	public function base()
	{ 
        if ($this->Musuarios->logged_id()) {
		
        } else {
            redirect(base_url('index.php'));
        }
	}

	public function index()
	{ 
        if ($this->Musuarios->logged_id()) {
			//jika memang session sudah terdaftar, maka redirect ke halaman dahsboard
			$data = array();
			$data['scripts'] = array('principal.js');
			$data['usuario'] = $this->session->userdata('usuario');     
			$data['nombre_completo'] = $this->session->userdata('nombre_completo'); 
			$data['todos_clientes'] = $this->Mconexion->cantidad_todos_clientes();
			$data['todos_clientes_pagaron'] = $this->Mconexion->cantidad_todos_clientes_pagaron();
			$data['todos_clientes_por_pagar'] = $this->Mconexion->cantidad_todos_clientes_por_pagar();
            $this->load->view('vPrincipal',$data);
        } else {
			redirect(base_url('index.php'));	
        }
	}

	public function trae_pagos() {
		if ($this->Musuarios->logged_id()) {
			$where = "";
			$datos = $this->Mconexion->trae_pagos($where);
			if($datos){
				foreach ($datos as $row) {
					$boton_pago = '';
					$boton_revert_pago = '';
					if($row->id_estado_pago == 1){
						$boton_pago = '<button type="button" id="btn_pagado_pago" data-id="' . $row->id_pago . '"  title="Pagado" class="tabledit-edit-button btn btn-sm btn-success" style="float: none; margin: 4px;"><i class="fas fa-check"></i></button>';
						$comprobante = $this->Mconexion->obtiene_estado_pago("id_estado_pago = " . $row->id_estado_pago)->estado_pago .' | $'.$this->Mconexion->trae_paquete("id_paquete = " . $this->Mconexion->obtiene_cliente("id_cliente = " . $row->id_cliente)->id_paquete)->precio;
					}
					if($row->id_estado_pago == 2){
						$boton_revert_pago = '<button type="button" id="btn_modifica_pago" data-id="' . $row->id_pago . '" title="No pagado" class="tabledit-delete-button btn btn-sm btn-danger" style="float: none; margin: 4px;"><i class="fas fa-chevron-left"></i></button>';						
						$comprobante = $this->Mconexion->obtiene_estado_pago("id_estado_pago = " . $row->id_estado_pago)->estado_pago .' | $'.$this->Mconexion->trae_paquete("id_paquete = " . $this->Mconexion->obtiene_cliente("id_cliente = " . $row->id_cliente)->id_paquete)->precio.'<button type="button" id="comprobante_pago" data-id="' . $row->id_pago . '" title="Comprobante" class="tabledit-delete-button btn btn-sm btn-warning" style="float: none; margin: 4px;"><i class="far fa-image"></i></button>';
					}

					
					$data[] = array(
						$this->Mconexion->obtiene_cliente("id_cliente = " . $row->id_cliente)->nombre.' '.
						$this->Mconexion->obtiene_cliente("id_cliente = " . $row->id_cliente)->primer_apellido.' '.
						$this->Mconexion->obtiene_cliente("id_cliente = " . $row->id_cliente)->segundo_apellido,
						strtoupper($row->mes),
						$this->Mconexion->trae_comunidad("id_comunidad = ". $this->Mconexion->obtiene_cliente("id_cliente = " . $row->id_cliente)->id_comunidad)->nombre_comunidad,
						$comprobante,
						$row->observacion,																		
						$boton_pago.''.$boton_revert_pago,
					);
				}
				$result = array(
					"data" => $data
				);
			}else{
				$result = array(
					"data" => 0
				);
			}
			echo json_encode($result);
		
        } else {
            redirect(base_url('index.php'));
        }
	}

	public function importa_pago_mensual($id_data){
		if ($this->Musuarios->logged_id()) {

			$where_id_pago = 'id_pago = '.$id_data;
			$pago = $this->Mconexion->trae_pago($where_id_pago);
			$where_id_cliente = 'id_cliente = '.$pago->id_cliente;
			$cliente = $this->Mclientes->trae_cliente($where_id_cliente);
			$data = array();
			$data['nombre'] = $cliente[0]->nombre;
			$data['primer_apellido'] = $cliente[0]->primer_apellido;
			$data['segundo_apellido'] = $cliente[0]->segundo_apellido;
			$data['comprobante_pago'] = $pago->comprobante_pago;
			
			
			echo json_encode($data);
            
        } else {
            redirect(base_url('index.php'));
        }
	}

	public function realiza_pago () {
		if ($this->Musuarios->logged_id()) {
			$data =  array();
			$id_pago = $this->input->post('id_pago', TRUE);
			$observaciones = $this->input->post('observaciones', TRUE);
			$id_usuario = $this->session->userdata('id_persona');
			
			if(isset($_FILES["archivo_pago"]["name"])) 
				{			
				$config['upload_path']      = './assets/pagos';
				$config['allowed_types']    = 'gif|jpg|png';
				$config['max_size']         = '2048';
				$config['encrypt_name']     = true;
				$config['remove_spaces']    = true;
				$this->load->library("upload",$config);
						
				$this->upload->initialize($config);
				
				if($this->upload->do_upload('archivo_pago')){
					$data = $this->upload->data();			;
					$sql =  array('comprobante_pago' => $data['file_name'],
								'observacion' => $observaciones,
								'id_estado_pago' => 2,
								'id_usuario_registro' => $id_usuario,
								);
					
					$res = $this->Mconexion->carga_pago($id_pago,$sql);
					
					if($res == true){
						echo 'OK';
					}
				}else{
					echo 'falta_comprobante'.$this->input->post('archivo_pago');
					die();
				}
			}
            
        } else {
            redirect(base_url('index.php'));
        }
	}

	public function revertir_pago($id_data){
		if ($this->Musuarios->logged_id()) {

			echo 'OK';
            
        } else {
            redirect(base_url('index.php'));
        }
	}
}
