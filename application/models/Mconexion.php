<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mconexion extends CI_Model {
    function __construct()
    {
        parent::__construct();        
        $this->db = $this->load->database('admin', TRUE);        
        $this->db->query("SET lc_time_names = 'es_MX'");        
    }    
    
    function logged_id()
    {
        return $this->session->userdata('id_persona');
    } 
   
    function trae_comunidades($where){
        $this->db->select('id_comunidad, nombre_comunidad');
        $this->db->from('tbl_comunidades');
        $this->db->where('visible = 1');
        $this->db->order_by('nombre_comunidad','asc');
        if($where != NULL) {
            $this->db->where($where,NULL,FALSE);
        }
        $query = $this->db->get();
        return $query->result();
    }

    function trae_comunidad($where){
        $this->db->select('*');
        $this->db->from('tbl_comunidades');
        if ($where != NULL) {
            $this->db->where($where, NULL, FALSE);
        }
        $query = $this->db->get();
        return $query->row();  
    }

    function trae_paquetes($where){
        $this->db->select('id_paquete, paquete');
        $this->db->from('tbl_paquetes');
        $this->db->where('visible = 1');
        $this->db->order_by('paquete','asc');
        if($where != NULL) {
            $this->db->where($where,NULL,FALSE);
        }
        $query = $this->db->get();
        return $query->result();
    }

    function trae_paquete($where){
        $this->db->select('*');
        $this->db->from('tbl_paquetes');
        if ($where != NULL) {
            $this->db->where($where, NULL, FALSE);
        }
        $query = $this->db->get();
        return $query->row();  
    }

    function cantidad_todos_clientes(){
        $this->db->select('count(*) as total');
        $this->db->from('tbl_clientes');
        $this->db->where('visible = 1');
        $query = $this->db->get();
        return $query->result();
    }

    function cantidad_todos_clientes_pagaron(){
        $this->db->select('count(*) as total');
        $this->db->from('tbl_pagos');
        $this->db->where('id_estado_pago = 2');        
        $query = $this->db->get();
        return $query->result();
    }

    function cantidad_todos_clientes_por_pagar(){
        $this->db->select('count(*) as total');
        $this->db->from('tbl_pagos');
        $this->db->where('id_estado_pago = 1');  
        $query = $this->db->get();
        return $query->result();
    }

    function trae_pagos($where){
        $this->db->select('id_pago, id_cliente, MONTHNAME(fecha_registro) as mes, id_estado_pago, observacion');
        $this->db->from('tbl_pagos');
        $this->db->where('1 = 1');
        $this->db->order_by('id_estado_pago','asc');
        if($where != NULL) {
            $this->db->where($where,NULL,FALSE);
        }
        $query = $this->db->get();
        return $query->result();
    }

    function obtiene_cliente($where){
        $this->db->select('*');
        $this->db->from('tbl_clientes');
        if ($where != NULL) {
            $this->db->where($where, NULL, FALSE);
        }
        $query = $this->db->get();
        return $query->row();  
    }

    function obtiene_estado_pago($where){
        $this->db->select('*');
        $this->db->from('tbl_estado_pago');
        if ($where != NULL) {
            $this->db->where($where, NULL, FALSE);
        }
        $query = $this->db->get();
        return $query->row();  
    }
}