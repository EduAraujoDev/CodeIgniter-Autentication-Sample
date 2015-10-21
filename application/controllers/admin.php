<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

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
        );

        $this->load->view('admin/home', $dados);	
	}
}