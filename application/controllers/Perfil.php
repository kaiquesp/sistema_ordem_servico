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
        $this->load->model('usuarios_model','',TRUE);
        $this->load->model('Mapos_model','',TRUE);
    }

    function index(){
       $this->load->model ( 'mapos_model' );
       $session = $this->session->userdata();
        $id = $session['id'];
        $dados['result'] = $this->mapos_model->getBytimeline($id);

		$dados['tela'] = 'perfil/perfil';
        $this->load->view('view_home', $dados);
	}

    public function adicionarFoto() {

            $arquivo = $this->do_upload();

            
            $id = $this->input->post('usuarioId');
            

            $file = $arquivo['file_name'];
            $data = array(
                'foto' => $file,
            );

            if ($this->usuarios_model->editFoto('usuarios', $data, $id) == TRUE) {
                $this->session->set_flashdata('success','Arquivo adicionado com sucesso!');
                redirect(base_url() . 'perfil/');
            } else {
                $this->session->set_flashdata('error','Erro ao alterar a foto!');
                redirect(base_url() . 'perfil/');
            }

        $this->data['tela'] = 'perfil/perfil';
        $this->load->view('home', $this->data);

    }

    public function do_upload(){

        $config['upload_path'] = './assets/foto/';
        $config['allowed_types'] = 'txt|jpg|jpeg|gif|png|pdf|PDF|JPG|JPEG|GIF|PNG';
        $config['max_size']     = 0;
        $config['max_width']  = '3000';
        $config['max_height']  = '2000';
        $config['encrypt_name'] = true;


        if (!is_dir('./assets/foto/')) {

            mkdir('./assets/foto/', 0777, TRUE);

        }

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload())
        {
            $error = array('error' => $this->upload->display_errors());

            $this->session->set_flashdata('error','Erro ao fazer upload do arquivo, verifique se a extensão do arquivo é permitida.');
            redirect(base_url() . 'perfil');
        }
        else
        {
            //$data = array('upload_data' => $this->upload->data());
            return $this->upload->data();
        }
    }
	
}

