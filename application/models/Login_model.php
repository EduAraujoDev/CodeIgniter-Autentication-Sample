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

    public function get_usuario_byid($id=NULL)
    {
        if($id <> NULL){
            $this->db->where('UsuarioID',$id);
            $this->db->limit(1);

            return $this->db->get('Usuario');
        } else {
            return NULL;
        }
    }

    public function get_usuarios_all()
    {
        return $this->db->get('Usuario');
    }

    public function get_tiposPerfis_all()
    {
        return $this->db->get('TipoPerfis');
    }

    public function set_usuario($dados=NULL)
    {
        if($dados <> NULL){
            $this->db->insert('usuario',$dados);
        }
    }

    public function update_usuario($dados=NULL,$condicao=NULL)
    {
        if($dados <> null && $condicao <> NULL){
            $this->db->update('Usuario',$dados, $condicao);
        }
    }

    public function delete_usuario($condicao=NULL)
    {
        if($condicao <> NULL){
            $this->db->delete("Usuario",$condicao);
        }
    }
}