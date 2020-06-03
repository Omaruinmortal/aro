<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

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
	public function login() {
        $this->load->model("Musuarios");

        $usuario = $this->input->post('usuario');
        $contrasenia = $this->input->post('contrasenia');
        $where = "usuario like '" . $usuario . "' and contrasenia like '" . md5($contrasenia) . "' and visible = 1";

        $existe = $this->Musuarios->obtiene_usuario($where);
        
        if ($existe) {
			echo "correcto";
			$this->session->set_userdata('logeado',1);
			$this->session->set_userdata('id_persona', $existe->id_usuario);
			$this->session->set_userdata('usuario', $existe->usuario);
			$this->session->set_userdata('nombre_completo', $existe->nombre . " " . $existe->primer_apellido);

        }else{
			$this->session->sess_destroy();
            $this->session->set_userdata('logueado', 0);
            echo "incorrecto";
        }
	}

	public function cerrar() {
        $this->session->sess_destroy();
        $this->session->set_userdata('logueado', 0);
        redirect(base_url());
    }
}
