<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('login_model','login_model');
	}

	public function index()
	{
		$dados = array(
			'titulo' => 'CodeIgniter - CRUD - Autenticação'
			);

		$this->load->view('login', $dados);	
	}

	public function validacao()
	{		
		$this->form_validation->set_rules('usuario', 'usuario', 'required');
		$this->form_validation->set_rules('senha', 'senha', 'required');

		if($this->form_validation->run()==TRUE) {
			$usuario	= $this->input->post('usuario');
			$senha		= md5($this->input->post('senha'));

			$retorno = $this->login_model->get_user_byid( $usuario, $senha);				

		} else {
			$dados = array(
				'titulo' => 'CodeIgniter - CRUD - Autenticação'
				);

			$this->load->view('login', $dados);
		}
	}
}