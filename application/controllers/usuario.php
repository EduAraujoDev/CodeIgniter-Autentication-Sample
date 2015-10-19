<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

        if(isset($_SESSION['userLogin'])){

        } else {
            redirect('login');
        }
	}

	public function index()
	{
        $dados = array(
            'titulo' => 'Usuario',
        );

        $this->load->view('usuario/home', $dados);	
	}
}