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

    public function get_usuarios_all(){
        return $this->db->get('Usuario');
    }

    public function get_tiposPerfis_all(){
        return $this->db->get('TipoPerfis');
    }

    public function set_usuario($dados=NULL){
        if($dados <> NULL){
            $this->db->insert('usuario',$dados);
        }
    }
}