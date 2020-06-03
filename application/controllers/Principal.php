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
	}

	public function index()
	{
       

        if ($this->Musuarios->logged_id()) {
			//jika memang session sudah terdaftar, maka redirect ke halaman dahsboard
            $data = array();
            $data['usuario'] = $this->session->userdata('usuario');     
            $data['nombre_completo'] = $this->session->userdata('nombre_completo'); 
            $this->load->view('vPrincipal',$data);
        } else {
            $this->load->view('login');
        }
	}
}
