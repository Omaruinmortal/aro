<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Musuarios extends CI_Model {
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

    function obtiene_usuario($where){
        $this->db->select('*');
        $this->db->from('tbl_usuarios');
        if ($where != NULL) {
            $this->db->where($where, NULL, FALSE);
        }
        $query = $this->db->get();
        return $query->row();  
    }
    
    function agrega_cliente($serv = array()){        
        $this->db->trans_begin();    
        $this->db->insert('ind_recetas', $serv);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $id = $this->db->insert_id();
            $this->db->trans_commit();
            return $id;
        }
    }

    
    /*
    function agrega_bitacora_acceso($serv = array()){        
        $this->db->trans_begin();    
        $this->db->insert('bitacora_accesos', $serv);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $id = $this->db->insert_id();
            $this->db->trans_commit();
            return $id;
        }
    }

    function actualiza_usuario($serv = array(), $where){
        $this->db->trans_begin();
        $this->db->where($where);
        $this->db->update('tablero_persona', $serv);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            
            return true;
        }
    }
    */
}