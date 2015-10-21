<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('login_model','login_model');
	}

	public function index()
	{

        if(isset($_SESSION['userLogin'])){
            if(strtoupper($_SESSION['userLogin']['tpuser']) == 'ADMIN'){
                redirect('Admin');
            } else {
                redirect('Usuario');
            }
        } else {
			$dados = array(
				'titulo' => 'CodeIgniter - CRUD - Autenticação'
				);

			$this->load->view('login', $dados);
		}
	}

	public function validacao()
	{		
		$this->form_validation->set_rules('usuario', 'usuario', 'required');
		$this->form_validation->set_rules('senha', 'senha', 'required');

		if($this->form_validation->run()==TRUE) {
			$usuario	= $this->input->post('usuario');
			$senha		= md5($this->input->post('senha'));

			$retorno = $this->login_model->get_user_byid( $usuario, $senha)->row();

			if($retorno != NULL){
				if($retorno->TipoPerfil == 1){
					$tipoAcesso = 'ADMIN';
				} else {
					$tipoAcesso = 'USUARIO';
				}

				$data = array(
					'usuario' => $retorno->LOGIN,
					'tipoAcesso' => $tipoAcesso
					);

				$this->session->set_userdata('userLogin', $data);

				if($tipoAcesso == 'ADMIN'){
					redirect('/admin','refresh');
				} else {
					redirect('/usuario','refresh');
				}
			} else {
				$this->session->set_flashdata('usuarioInvalido','Login ou senha inv&aacute;lido');
                redirect('/', 'refresh');
			}
		} else {
			$dados = array(
				'titulo' => 'CodeIgniter - CRUD - Autenticação'
				);

			$this->load->view('login', $dados);
		}
	}

    public function logout(){
        if(isset($_SESSION['userLogin'])){
            $this->session->unset_userdata('userLogin');
            redirect('/','refresh');
        }
    }
}