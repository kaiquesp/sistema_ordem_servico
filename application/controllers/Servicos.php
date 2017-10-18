<?php

class Servicos extends CI_Controller {
    

    /**
     * author: Ramon Silva 
     * email: silva018-mg@yahoo.com.br
     * 
     */
    
    function __construct() {
        parent::__construct();
        if( (!session_id()) || (!$this->session->userdata('logado'))){
            redirect('login');
        }

        $this->load->helper(array('form', 'codegen_helper'));
        $this->load->model('servicos_model', '', TRUE);
    }
	
	function index(){
		$this->gerenciar();
	}

	function gerenciar(){
        
        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'vServico')){
           $this->session->set_flashdata('error','Você não tem permissão para visualizar serviços.');
           redirect(base_url());
        }	

		$dados['results'] = $this->servicos_model->get('servicos','idServicos,nome,descricao,preco',$this->uri->segment(3));
       
	    $dados['tela'] = 'servicos/servicos';
       	$this->load->view('view_home',$dados);

       
		
    }
	
    function adicionar() {
        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'aServico')){
           $this->session->set_flashdata('error','Você não tem permissão para adicionar serviços.');
           redirect(base_url());
        }

        $this->load->library('form_validation');
        $dados['custom_error'] = '';

        if ($this->form_validation->run('servicos') == false) {
            $dados['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
            $preco = $this->input->post('preco');
            $preco = str_replace(",","", $preco);

            $data = array(
                'nome' => set_value('nome'),
                'descricao' => set_value('descricao'),
                'preco' => $preco
            );

            if ($this->servicos_model->add('servicos', $data) == TRUE) {
                $this->session->set_flashdata('success', 'Serviço adicionado com sucesso!');
                redirect(base_url() . 'servicos/adicionar/');
            } else {
                $dados['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }
        $dados['tela'] = 'servicos/adicionarServico';
        $this->load->view('view_home', $dados);

    }

    function editar() {
        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'eServico')){
           $this->session->set_flashdata('error','Você não tem permissão para editar serviços.');
           redirect(base_url());
        }
        $this->load->library('form_validation');
        $dados['custom_error'] = '';

        if ($this->form_validation->run('servicos') == false) {
            $dados['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
            $preco = $this->input->post('preco');
            $preco = str_replace(",","", $preco);
            $data = array(
                'nome' => $this->input->post('nome'),
                'descricao' => $this->input->post('descricao'),
                'preco' => $preco
            );

            if ($this->servicos_model->edit('servicos', $data, 'idServicos', $this->input->post('idServicos')) == TRUE) {
                $this->session->set_flashdata('success', 'Serviço editado com sucesso!');
                redirect(base_url() . 'index.php/servicos/editar/'.$this->input->post('idServicos'));
            } else {
                $dados['custom_error'] = '<div class="form_error"><p>Ocorreu um errro.</p></div>';
            }
        }

        $dados['result'] = $this->servicos_model->getById($this->uri->segment(3));

        $dados['view'] = 'servicos/editarServico';
        $this->load->view('tema/topo', $this->data);

    }
	
    function excluir(){

        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'dServico')){
           $this->session->set_flashdata('error','Você não tem permissão para excluir serviços.');
           redirect(base_url());
        }
       
        
        $id =  $this->input->post('id');
        if ($id == null){

            $this->session->set_flashdata('error','Erro ao tentar excluir serviço.');            
            redirect(base_url().'index.php/servicos/gerenciar/');
        }

        $this->db->where('servicos_id', $id);
        $this->db->delete('servicos_os');

        $this->servicos_model->delete('servicos','idServicos',$id);             
        

        $this->session->set_flashdata('success','Serviço excluido com sucesso!');            
        redirect(base_url().'index.php/servicos/gerenciar/');
    }
}

