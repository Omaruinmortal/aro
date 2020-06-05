<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mclientes extends CI_Model {
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

    
    function agrega_cliente($serv = array()){        
        $this->db->trans_begin();    
        $this->db->insert('tbl_clientes', $serv);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $id = $this->db->insert_id();
            $this->db->trans_commit();
            return $id;
        }
    }

    function trae_clientes($where){
        $this->db->select('*');
        $this->db->from('tbl_clientes');
        $this->db->where('visible = 1');
        $this->db->order_by('fecha_registro','desc');
        if($where != NULL) {
            $this->db->where($where,NULL,FALSE);
        }
        $query = $this->db->get();
        return $query->result();
    }

}