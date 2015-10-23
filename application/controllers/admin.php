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
        $this->form_validation->set_rules('login', 'login', 'required');
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

            $dados = array(
                'titulo' => 'Admin',
                'usuarios' => $this->login_model->get_usuarios_all()->result()
            );

            $this->load->view('admin/home', $dados);
        } else {
            $dados = array(
                'titulo' => 'Admin - Inserir',
                'tiposPerfis' => $this->login_model->get_tiposPerfis_all()->result()
            );

            $this->load->view('admin/inserir', $dados);
        }            
    }
}