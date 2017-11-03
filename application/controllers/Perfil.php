<?php

class Perfil extends CI_Controller {
    

    /**
     * author: Kaique Alves 
     * email: kaiqueexp@gmail.com
     * 
     */
    
    function __construct() {

        parent::__construct();
        if( (!session_id()) || (!$this->session->userdata('logado'))){
			$this->session->set_flashdata('error','Sua sessao expirou, faça o login novamente!');
            redirect('login');
        }
    }

    function index(){
		$dados['tela'] = 'perfil/perfil';
        $this->load->view('view_home', $dados);
	}

	
}

