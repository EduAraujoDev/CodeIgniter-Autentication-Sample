<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {
    public function get_user_byid($usuario=NULL,$senha=NULL)
    {
        if($usuario <> null && $senha<>null){
            $this->db->where('login', $usuario);
            $this->db->where('senha', $senha);
            $this->db->limit(1);

            return $this->db->get('Usuario');
        } else {
            return NULL;
        }
    }
}