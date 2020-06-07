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
            $this->load->view('login');
        }
	}

	public function trae_pagos() {
		if ($this->Musuarios->logged_id()) {
			$where = "";
			$datos = $this->Mconexion->trae_pagos($where);
			if($datos){
				foreach ($datos as $row) {
					$data[] = array(
						$this->Mconexion->obtiene_cliente("id_cliente = " . $row->id_cliente)->nombre.' '.
						$this->Mconexion->obtiene_cliente("id_cliente = " . $row->id_cliente)->primer_apellido.' '.
						$this->Mconexion->obtiene_cliente("id_cliente = " . $row->id_cliente)->segundo_apellido,
						$row->mes,
						$this->Mconexion->obtiene_estado_pago("id_estado_pago = " . $row->id_estado_pago)->estado_pago .' | $'.$this->Mconexion->trae_paquete("id_paquete = " . $this->Mconexion->obtiene_cliente("id_cliente = " . $row->id_cliente)->id_paquete)->precio,
						$row->observacion,																					
						'<button type="button" id="btn_pagado_pago" data-id="' . $row->id_pago . '"  title="Pagado" class="tabledit-edit-button btn btn-sm btn-success" style="float: none; margin: 4px;"><i class="fas fa-check"></i></button>
						<button type="button" id="btn_modifica_pago" data-id="' . $row->id_pago . '" title="No pagado" class="tabledit-delete-button btn btn-sm btn-danger" style="float: none; margin: 4px;"><i class="fas fa-chevron-left"></i></button>'
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
            $this->load->view('login');
        }
	}
}
