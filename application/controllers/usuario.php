<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

        if(isset($_SESSION['userLogin'])){
            if(strtoupper($_SESSION['userLogin']['tipoAcesso']) == 'ADMIN'){
                redirect('/admin', 'refresh');
            }
        } else {
            redirect('/', 'refresh');
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