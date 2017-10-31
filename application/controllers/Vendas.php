<?php

class Vendas extends CI_Controller {
    

    /**
     * author: Kaique Alves
     * email: kaiqueexp@gmail.com
     * 
     */
    
    function __construct() {
        parent::__construct();
        
        if( (!session_id()) || (!$this->session->userdata('logado'))){
            redirect('login');
        }
		
		$this->load->helper(array('form','codegen_helper'));
		$this->load->model('vendas_model','',TRUE);
		$dados['menuVendas'] = 'Vendas';
	}	
	
	function index(){
		$this->gerenciar();
	}

	function gerenciar(){
        
        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'vVenda')){
           $this->session->set_flashdata('error','Você não tem permissão para visualizar vendas.');
           redirect(base_url());
        }

		$dados['results'] = $this->vendas_model->get('vendas','*',$this->uri->segment(3));
       
	    $dados['tela'] = 'vendas/vendas';
       	$this->load->view('view_home',$dados);
      
		
    }
	
    function adicionar(){

        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'aVenda')){
          $this->session->set_flashdata('error','Você não tem permissão para adicionar Vendas.');
          redirect(base_url());
        }

        $this->load->library('form_validation');
        $dados['custom_error'] = '';
        
        if ($this->form_validation->run('vendas') == false) {
           $dados['custom_error'] = (validation_errors() ? true : false);
        } else {

            $dataVenda = $this->input->post('dataVenda');

            try {
                
                $dataVenda = explode('/', $dataVenda);
                $dataVenda = $dataVenda[2].'-'.$dataVenda[1].'-'.$dataVenda[0];


            } catch (Exception $e) {
               $dataVenda = date('Y/m/d'); 
            }

            $data = array(
                'dataVenda' => $dataVenda,
                'clientes_id' => $this->input->post('clientes_id'),
                'usuarios_id' => $this->input->post('usuarios_id'),
                'faturado' => 0
            );

            if (is_numeric($id = $this->vendas_model->add('vendas', $data, true)) ) {
                $this->session->set_flashdata('success','Venda iniciada com sucesso, adicione os produtos.');
                redirect('vendas/editar/'.$id);

            } else {
                
                $dados['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }
         
        $dados['tela'] = 'vendas/adicionarVenda';
        $this->load->view('view_home', $dados);
    }
    

    
    function editar() {

        if(!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))){
            $this->session->set_flashdata('error','Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect('home');
        }

        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'eVenda')){
          $this->session->set_flashdata('error','Você não tem permissão para editar vendas');
          redirect(base_url());
        }

        $verifica = $this->vendas_model->getById($this->uri->segment(3));


        if($verifica->faturado == '1'){
            $this->session->set_flashdata('error','Não é possível editar uma venda já faturada');
            redirect('vendas');
        }

        $this->load->library('form_validation');
        $dados['custom_error'] = '';

        if ($this->form_validation->run('vendas') == false) {
            $dados['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {

            $dataVenda = $this->input->post('dataVenda');

            try {
                
                $dataVenda = explode('/', $dataVenda);
                $dataVenda = $dataVenda[2].'-'.$dataVenda[1].'-'.$dataVenda[0];


            } catch (Exception $e) {
               $dataVenda = date('Y/m/d'); 
            }

            $data = array(
                'dataVenda' => $dataVenda,
                'usuarios_id' => $this->input->post('usuarios_id'),
                'clientes_id' => $this->input->post('clientes_id')
            );

            if ($this->vendas_model->edit('vendas', $data, 'idVendas', $this->input->post('idVendas')) == TRUE) {
                $this->session->set_flashdata('success','Venda editada com sucesso!');
                redirect(base_url() . 'vendas/editar/'.$this->input->post('idVendas'));
            } else {
                $dados['custom_error'] = '<div class="form_error"><p>Ocorreu um erro</p></div>';
            }
        }

        $dados['result'] = $this->vendas_model->getById($this->uri->segment(3));
        $dados['produtos'] = $this->vendas_model->getProdutos($this->uri->segment(3));
        $dados['tela'] = 'vendas/editarVenda';
        $this->load->view('view_home', $dados);
   
    }

    public function visualizar(){

        if(!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))){
            $this->session->set_flashdata('error','Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect('mapos');
        }
        
        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'vVenda')){
          $this->session->set_flashdata('error','Você não tem permissão para visualizar vendas.');
          redirect(base_url());
        }

        $dados['custom_error'] = '';
        $this->load->model('mapos_model');
        $dados['result'] = $this->vendas_model->getById($this->uri->segment(3));
        $dados['produtos'] = $this->vendas_model->getProdutos($this->uri->segment(3));
        $dados['emitente'] = $this->mapos_model->getEmitente();
        
        $dados['tela'] = 'vendas/visualizarVenda';
        $this->load->view('view_home', $dados);
       
    }

    public function imprimir(){
        
        if(!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))){
            $this->session->set_flashdata('error','Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect('mapos');
        }
        
        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'vVenda')){
            $this->session->set_flashdata('error','Você não tem permissão para visualizar vendas.');
            redirect(base_url());
        }

        $dados['custom_error'] = '';
        $this->load->model('mapos_model');
        $dados['result'] = $this->vendas_model->getById($this->uri->segment(3));
        $dados['produtos'] = $this->vendas_model->getProdutos($this->uri->segment(3));
        $dados['emitente'] = $this->mapos_model->getEmitente();
        
        $this->load->view('vendas/imprimirVenda', $dados);
        
    }
	
    public function excluir(){

        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'dVenda')){
          $this->session->set_flashdata('error','Você não tem permissão para excluir vendas');
          redirect(base_url());
        }
        
        $id =  $this->input->post('id');
        if ($id == null){

            $this->session->set_flashdata('error','Erro ao tentar excluir venda.');            
            redirect(base_url().'vendas/gerenciar/');
        }

        $this->db->where('vendas_id', $id);
        $this->db->delete('itens_de_vendas');

        $this->db->where('idVendas', $id);
        $this->db->delete('vendas');           

        $this->session->set_flashdata('success','Venda excluída com sucesso!');            
        redirect(base_url().'vendas/gerenciar/');

    }

    public function autoCompleteProduto(){
        
        if (isset($_GET['term'])){
            $q = strtolower($_GET['term']);
            $this->vendas_model->autoCompleteProduto($q);
        }

    }

    public function autoCompleteCliente(){

        if (isset($_GET['term'])){
            $q = strtolower($_GET['term']);
            $this->vendas_model->autoCompleteCliente($q);
        }

    }

    public function autoCompleteUsuario(){

        if (isset($_GET['term'])){
            $q = strtolower($_GET['term']);
            $this->vendas_model->autoCompleteUsuario($q);
        }

    }



    public function adicionarProduto(){

        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'eVenda')){
          $this->session->set_flashdata('error','Você não tem permissão para editar vendas.');
          redirect(base_url());
        }

        $this->load->library('form_validation');
        $this->form_validation->set_rules('quantidade', 'Quantidade', 'trim|required');
        $this->form_validation->set_rules('idProduto', 'Produto', 'trim|required');
        $this->form_validation->set_rules('idVendasProduto', 'Vendas', 'trim|required');
        
        if($this->form_validation->run() == false){
           echo json_encode(array('result'=> false)); 
        }
        else{

            $preco = $this->input->post('preco');
            $quantidade = $this->input->post('quantidade');
            $subtotal = $preco * $quantidade;
            $produto = $this->input->post('idProduto');
            $data = array(
                'quantidade'=> $quantidade,
                'subTotal'=> $subtotal,
                'produtos_id'=> $produto,
                'vendas_id'=> $this->input->post('idVendasProduto'),
            );

            if($this->vendas_model->add('itens_de_vendas', $data) == true){
                $sql = "UPDATE produtos set estoque = estoque - ? WHERE idProdutos = ?";
                $this->db->query($sql, array($quantidade, $produto));
                
                echo json_encode(array('result'=> true));
            }else{
                echo json_encode(array('result'=> false));
            }

        }
        
      
    }

    function excluirProduto(){

            if(!$this->permission->checkPermission($this->session->userdata('permissao'),'eVenda')){
              $this->session->set_flashdata('error','Você não tem permissão para editar Vendas');
              redirect(base_url());
            }

            $ID = $this->input->post('idProduto');
            if($this->vendas_model->delete('itens_de_vendas','idItens',$ID) == true){
                
                $quantidade = $this->input->post('quantidade');
                $produto = $this->input->post('produto');


                $sql = "UPDATE produtos set estoque = estoque + ? WHERE idProdutos = ?";

                $this->db->query($sql, array($quantidade, $produto));
                
                echo json_encode(array('result'=> true));
            }
            else{
                echo json_encode(array('result'=> false));
            }           
    }



    public function faturar() {

        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'eVenda')){
              $this->session->set_flashdata('error','Você não tem permissão para editar Vendas');
              redirect(base_url());
            }

        $this->load->library('form_validation');
        $dados['custom_error'] = '';
 

        if ($this->form_validation->run('receita') == false) {
            $dados['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {


            $vencimento = $this->input->post('vencimento');
            $recebimento = $this->input->post('recebimento');

            try {
                
                $vencimento = explode('/', $vencimento);
                $vencimento = $vencimento[2].'-'.$vencimento[1].'-'.$vencimento[0];

                if($recebimento != null){
                    $recebimento = explode('/', $recebimento);
                    $recebimento = $recebimento[2].'-'.$recebimento[1].'-'.$recebimento[0];

                }
            } catch (Exception $e) {
               $vencimento = date('Y/m/d'); 
            }

            $source = array('.', ',');
            $replace = array('', '.');

            $valor = str_replace($source, $replace, $this->input->post('valor'));

            $data = array(
                'descricao' => set_value('descricao'),
                'valor' => $valor,
                'clientes_id' => $this->input->post('clientes_id'),
                'data_vencimento' => $vencimento,
                'data_pagamento' => $recebimento,
                'baixado' => $this->input->post('recebido'),
                'cliente_fornecedor' => set_value('cliente'),
                'forma_pgto' => $this->input->post('formaPgto'),
                'tipo' => $this->input->post('tipo')
            );

            if ($this->vendas_model->add('lancamentos',$data) == TRUE) {
                
                $venda = $this->input->post('vendas_id');

                $this->db->set('faturado',1);
                $this->db->set('valorTotal',$this->input->post('valor'));
                $this->db->where('idVendas', $venda);
                $this->db->update('vendas');

                $this->session->set_flashdata('success','Venda faturada com sucesso!');
                $json = array('result'=>  true);
                echo json_encode($json);
                die();
            } else {
                $this->session->set_flashdata('error','Ocorreu um erro ao tentar faturar venda.');
                $json = array('result'=>  false);
                echo json_encode($json);
                die();
            }
        }

        $this->session->set_flashdata('error','Ocorreu um erro ao tentar faturar venda.');
        $json = array('result'=>  false);
        echo json_encode($json);
        
    }


}

