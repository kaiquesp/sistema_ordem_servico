<?php

class Produtos extends CI_Controller {
    
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

        $this->load->helper(array('form', 'codegen_helper'));
        $this->load->model('produtos_model', '', TRUE);
        $dados['menuProdutos'] = 'Produtos';
    }

    function index(){
	   $this->gerenciar();
    }

    function gerenciar(){
        
        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'vProduto')){
           $this->session->set_flashdata('error','Você não tem permissão para visualizar produtos.');
           redirect(base_url());
        }

        $this->load->library('table');
        $this->load->library('pagination');
        
        
        $config['base_url'] = base_url().'index.php/produtos/gerenciar/';
        $config['total_rows'] = $this->produtos_model->count('produtos');
        $config['per_page'] = 10;
        $config['next_link'] = 'Próxima';
        $config['prev_link'] = 'Anterior';
        $config['full_tag_open'] = '<div class="pagination alternate"><ul>';
        $config['full_tag_close'] = '</ul></div>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li><a style="color: #2D335B"><b>';
        $config['cur_tag_close'] = '</b></a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['first_link'] = 'Primeira';
        $config['last_link'] = 'Última';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        
        $this->pagination->initialize($config); 	

	    $dados['results'] = $this->produtos_model->get('produtos','idProdutos,descricao,unidade,precoCompra,precoVenda,estoque,estoqueMinimo','',$config['per_page'],$this->uri->segment(3));
       
	    $dados['tela'] = 'produtos/produtos';
       	$this->load->view('view_home',$dados);
       
		
    }
	
    function adicionar() {

        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'aProduto')){
           $this->session->set_flashdata('error','Você não tem permissão para adicionar produtos.');
           redirect(base_url());
        }

        $this->load->library('form_validation');
        $dados['custom_error'] = '';

        if ($this->form_validation->run('produtos') == false) {
            $dados['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
			
            $precoCompra = str_replace(",","", $this->input->post('precoCompra'));
			$precoVenda = str_replace(",","", $this->input->post('precoVenda'));

            $data = array(
                'descricao' => set_value('descricao'),
                'unidade' => set_value('unidade'),
                'precoCompra' => $precoCompra,
                'precoVenda' => $precoVenda,
                'estoque' => set_value('estoque'),
                'estoqueMinimo' => set_value('estoqueMinimo'),
                'saida' => set_value('saida'),
                'entrada' => set_value('entrada'),
            );

            if ($this->produtos_model->add('produtos', $data) == TRUE) {
                $this->session->set_flashdata('success','Produto adicionado com sucesso!');
                redirect(base_url() . 'index.php/produtos/adicionar/');
            } else {
                $dados['custom_error'] = '<div class="form_error"><p>An Error Occured.</p></div>';
            }
        }
        $dados['tela'] = 'produtos/adicionarProduto';
        $this->load->view('view_home', $dados);
     
    }

    function editar() {

        if(!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))){
            $this->session->set_flashdata('error','Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect('produtos');
        }

        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'eProduto')){
           $this->session->set_flashdata('error','Você não tem permissão para editar produtos.');
           redirect(base_url());
        }
        $this->load->library('form_validation');
        $dados['custom_error'] = '';

        if ($this->form_validation->run('produtos') == false) {
            $dados['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
            $precoCompra = $this->input->post('precoCompra');
            $precoCompra = str_replace(",","", $precoCompra);
            $precoVenda = $this->input->post('precoVenda');
            $precoVenda = str_replace(",", "", $precoVenda);
            $data = array(
                'descricao' => $this->input->post('descricao'),
                'unidade' => $this->input->post('unidade'),
                'precoCompra' => $precoCompra,
                'precoVenda' => $precoVenda,
                'estoque' => $this->input->post('estoque'),
                'estoqueMinimo' => $this->input->post('estoqueMinimo'),
                'saida' => set_value('saida'),
                'entrada' => set_value('entrada'),                
            );

            if ($this->produtos_model->edit('produtos', $data, 'idProdutos', $this->input->post('idProdutos')) == TRUE) {
                $this->session->set_flashdata('success','Produto editado com sucesso!');
                redirect(base_url() . 'produtos/editar/'.$this->input->post('idProdutos'));
            } else {
                $dados['custom_error'] = '<div class="form_error"><p>An Error Occured</p></div>';
            }
        }

        $dados['result'] = $this->produtos_model->getById($this->uri->segment(3));

        $dados['tela'] = 'produtos/editarProduto';
        $this->load->view('view_home', $dados);
     
    }


    function visualizar() {
        
        if(!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))){
            $this->session->set_flashdata('error','Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect('produtos');
        }
        
        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'vProduto')){
           $this->session->set_flashdata('error','Você não tem permissão para visualizar produtos.');
           redirect(base_url());
        }

        $dados['result'] = $this->produtos_model->getById($this->uri->segment(3));

        if($dados['result'] == null){
            $this->session->set_flashdata('error','Produto não encontrado.');
            redirect(base_url() . 'index.php/produtos/editar/'.$this->input->post('idProdutos'));
        }

        $dados['tela'] = 'produtos/visualizarProduto';
        $this->load->view('view_home', $dados);
     
    }
	
    function excluir(){

        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'dProduto')){
           $this->session->set_flashdata('error','Você não tem permissão para excluir produtos.');
           redirect(base_url());
        }

        
        $id =  $this->input->post('id');
        if ($id == null){

            $this->session->set_flashdata('error','Erro ao tentar excluir produto.');            
            redirect(base_url().'produtos/gerenciar/');
        }

        $this->db->where('produtos_id', $id);
        $this->db->delete('produtos_os');


        $this->db->where('produtos_id', $id);
        $this->db->delete('itens_de_vendas');
        
        $this->produtos_model->delete('produtos','idProdutos',$id);             
        

        $this->session->set_flashdata('success','Produto excluido com sucesso!');            
        redirect(base_url().'produtos/gerenciar/');
    }
}

