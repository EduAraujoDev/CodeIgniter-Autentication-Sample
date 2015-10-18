<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
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
		$this->form_validation->set_rules('login', 'login', 'required');
		$this->form_validation->set_rules('senha', 'senha', 'required');

		if($this->form_validation->run()==TRUE) {

		} else {
			$dados = array(
				'titulo' => 'CodeIgniter - CRUD - Autenticação'
				);

			$this->load->view('login', $dados);
		}
	}
}