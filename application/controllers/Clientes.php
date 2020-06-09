<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {

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
    public function base()
	{ 
        if ($this->Musuarios->logged_id()) {
		
        } else {
            redirect(base_url('index.php'));
        }
	}

	public function index() {
        if ($this->Musuarios->logged_id()) {
			//jika memang session sudah terdaftar, maka redirect ke halaman dahsboard
			$data = array();
			$data['scripts'] = array('clientes.js');
            $data['usuario'] = $this->session->userdata('usuario');     
			$data['nombre_completo'] = $this->session->userdata('nombre_completo'); 
			$where_comunidades = ' 1 = 1';
			$data['comunidades'] = $this->Mconexion->trae_comunidades($where_comunidades);  
			$where_paquetes = ' 1 = 1';
			$data['paquetes'] = $this->Mconexion->trae_paquetes($where_paquetes);  
			
            $this->load->view('vClientes',$data);
        } else {
            redirect(base_url('index.php'));
        }
	}
	
	public function guardar_cliente() {

		
		if ($this->Musuarios->logged_id()) {
			if($this->input->post('tipo')=='agregar_usuario'){		
				if($this->input->post('nombre')==''){
					echo 'nombre';
					die();
				} elseif ($this->input->post('primer_apellido')=='') {
					echo 'primer_apellido';
					die();
				} elseif ($this->input->post('celular')=='') {
					echo 'celular';
					die();
				} elseif ($this->input->post('domicilio')=='') {
					echo 'domicilio';
					die();
				}  elseif ($this->input->post('id_comunidad')=='none') {
					echo 'id_comunidad';
					die();
				} elseif ($this->input->post('id_paquete')=='none') {
					echo 'id_paquete';
					die();
				} else{			
					$guardar = array (
						'nombre' => $this->input->post('nombre'),
						'primer_apellido' => $this->input->post('primer_apellido'),
						'segundo_apellido' => $this->input->post('segundo_apellido'),
						'celular' => $this->input->post('celular'),
						'domicilio' => $this->input->post('domicilio'),
						'id_comunidad' => $this->input->post('id_comunidad'),
						'id_paquete' => $this->input->post('id_paquete'),
						'fecha_registro' => date("Y-m-d H:i:s",strtotime(date("d-m-Y H:i:s"))),
						);
			
					$cliente_guardado = $this->Mclientes->agrega_cliente($guardar);
			
					if ($cliente_guardado) {
						echo "Guardado";
					} else {
						echo "error";
						die();
					}
				}
			die();
			}
        } else {
            redirect(base_url('index.php'));
        }
	}

	public function trae_clientes() {
		
		if ($this->Musuarios->logged_id()) {
			$where = "";
			$datos = $this->Mclientes->trae_clientes($where);
			if($datos){
				foreach ($datos as $row) {
					$data[] = array(
						$row->nombre .' '. $row->primer_apellido .' '. $row->segundo_apellido,
						$this->Mconexion->trae_comunidad('id_comunidad = '.$row->id_comunidad)->nombre_comunidad,
						$row->celular,
						'<button type="button" id="btn_modifica_cliente" data-id="' . $row->id_cliente . '"  title="Modificar" class="tabledit-edit-button btn btn-sm btn-info" style="float: none; margin: 4px;"><span class="ti-pencil"></span></button>
						 <button type="button" id="btn_eliminar_cliente" data-id="' . $row->id_cliente . '" title="Eliminar" class="tabledit-delete-button btn btn-sm btn-danger" style="float: none; margin: 4px;"><span class="ti-trash"></span></button>'
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

	public function elimina_cliente()
    {
		
		if ($this->Musuarios->logged_id()) {
			$data =  array('visible' => '0' ,);
			$id_cliente = $this->input->post('id', TRUE);
			$this->Mclientes->elimina_cliente($id_cliente,$data);
			echo 'true';
        } else {
            redirect(base_url('index.php'));
        }
	}
	
	public function importar_cliente($id_data)
	{
		
		if ($this->Musuarios->logged_id()) {
			$where_id_cliente = 'id_cliente = '.$id_data;
			$cliente = $this->Mclientes->trae_cliente($where_id_cliente);
			$data = array();
			$data['nombre'] = $cliente[0]->nombre;
			$data['primer_apellido'] = $cliente[0]->primer_apellido;
			$data['segundo_apellido'] = $cliente[0]->segundo_apellido;
			$data['celular'] = $cliente[0]->celular;
			$data['domicilio'] = $cliente[0]->domicilio;
			$data['id_comunidad'] = $cliente[0]->id_comunidad;
			$data['id_paquete'] = $cliente[0]->id_paquete;
			$where_comunidades = ' 1 = 1';
			$data['comunidades'] = $this->Mconexion->trae_comunidades($where_comunidades);
			echo json_encode($data);
        } else {
            redirect(base_url('index.php'));
        }
	}

	public function modificar_cliente(){
		
		if ($this->Musuarios->logged_id()) {
			if($this->input->post('tipo')=='modificar_usuario'){		
				if($this->input->post('nombre_m')==''){
					echo 'nombre';
					die();
				} elseif ($this->input->post('primer_apellido_m')=='') {
					echo 'primer_apellido';
					die();
				} elseif ($this->input->post('celular_m')=='') {
					echo 'celular';
					die();
				} elseif ($this->input->post('domicilio_m')=='') {
					echo 'domicilio';
					die();
				}  elseif ($this->input->post('id_comunidad_m')=='none') {
					echo 'id_comunidad';
					die();
				} elseif ($this->input->post('id_paquete_m')=='none') {
					echo 'id_paquete';
					die();
				} else{			
					$modificar = array (
						'nombre' => $this->input->post('nombre_m'),
						'primer_apellido' => $this->input->post('primer_apellido_m'),
						'segundo_apellido' => $this->input->post('segundo_apellido_m'),
						'celular' => $this->input->post('celular_m'),
						'domicilio' => $this->input->post('domicilio_m'),
						'id_comunidad' => $this->input->post('id_comunidad_m'),
						'id_paquete' => $this->input->post('id_paquete_m')
						);
					$id = $this->input->post('id_cliente', TRUE);
					
					$cliente_modificado = $this->Mclientes->modifica_cliente($id,$modificar);
			
					if ($cliente_modificado) {
						echo "Modificado";
					} else {
						echo "error";
						die();
					}
				}
			die();
			}
        } else {
            redirect(base_url('index.php'));
        }
	}
    
}
