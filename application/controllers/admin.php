<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

        $this->load->model('login_model','login_model');

        if(isset($_SESSION['userLogin'])){
            if(strtoupper($_SESSION['userLogin']['tipoAcesso']) == 'USUARIO'){
                redirect('/usuario', 'refresh');
            }
        } else {
            redirect('/', 'refresh');
        }		
	}

	public function index()
	{
        $dados = array(
            'titulo' => 'Admin',
            'usuarios' => $this->login_model->get_usuarios_all()->result()
        );

        $this->load->view('admin/home', $dados);
	}

    public function inserir()
    {
        $dados = array(
            'titulo' => 'Admin - Inserir',
            'tiposPerfis' => $this->login_model->get_tiposPerfis_all()->result()
        );

        $this->load->view('admin/inserir', $dados);
    }

    public function inserirNovoUsuario()
    {
        $this->form_validation->set_rules('login', 'login', 'required|is_unique[usuario.login]');
        $this->form_validation->set_rules('perfil','perfil','required|is_natural');
        $this->form_validation->set_rules('senha1', 'senha2', 'required');
        $this->form_validation->set_rules('senha2', 'senha2', 'required|matches[senha1]');

        if($this->form_validation->run()==TRUE) {
            $dados = array(
                'login' => $this->input->post('login'),
                'senha' => md5($this->input->post('senha1')),
                'TipoPerfil' => $this->input->post('perfil')
                );

            $this->login_model->set_usuario($dados);

            $this->session->set_flashdata('usuarioOk','Usuario cadastrado!');

            redirect('admin/','refresh');
        } else {
            $dados = array(
                'titulo' => 'Admin - Inserir',
                'tiposPerfis' => $this->login_model->get_tiposPerfis_all()->result()
            );

            $this->load->view('admin/inserir', $dados);
        }            
    }

    public function editar()
    {
        $idUsuario = $this->uri->segment(3);

        if($idUsuario <> NULL){
            $dados = array(
                'titulo' => 'Admin - Alterar',
                'tiposPerfis' => $this->login_model->get_tiposPerfis_all()->result(),
                'usuario' => $this->login_model->get_usuario_byid($idUsuario)->row()
            );

            $this->load->view('admin/alterar', $dados);
        } else {
            redirect('admin','refresh');
        }
    }

    public function alterarUsuario(){
        $this->form_validation->set_rules('perfil','perfil','required|is_natural');
        $this->form_validation->set_rules('senha1', 'senha2', 'required');
        $this->form_validation->set_rules('senha2', 'senha2', 'required|matches[senha1]');

        $idUsuario = $this->uri->segment(3);

        if($this->form_validation->run()==TRUE) {
            $dados = array(
                'senha' => md5($this->input->post('senha1')),
                'TipoPerfil' => $this->input->post('perfil')
                );

            $this->login_model->update_usuario($dados, array('UsuarioID' => $idUsuario));

            $this->session->set_flashdata('usuarioOk','Usuario alterado!');

            redirect('admin/','refresh');
        } else {
            $dados = array(
                'titulo' => 'Admin - Alterar',
                'tiposPerfis' => $this->login_model->get_tiposPerfis_all()->result(),
                'usuario' => $this->login_model->get_usuario_byid($idUsuario)->row()
            );

            $this->load->view('admin/alterar', $dados);
        }
    }

    public function deletar()
    {
        $idUsuario = $this->uri->segment(3);

        if($idUsuario <> NULL){
            $dados = array(
                'titulo' => 'Admin - Deletar',
                'tiposPerfis' => $this->login_model->get_tiposPerfis_all()->result(),
                'usuario' => $this->login_model->get_usuario_byid($idUsuario)->row()
            );

            $this->load->view('admin/deletar', $dados);
        } else {
            redirect('admin','refresh');
        }
    }

    public function deletarUsuario()
    {
        $idUsuario = $this->uri->segment(3);

        if($idUsuario <> NULL){
            $this->login_model->delete_usuario(array('UsuarioID' => $idUsuario));

            $this->session->set_flashdata('usuarioOk','Usuario deletado!');
        } else {
            $this->session->set_flashdata('usuarioOk','Erro ao excluir usuário!');
        }

        redirect('admin/','refresh');
    }
}