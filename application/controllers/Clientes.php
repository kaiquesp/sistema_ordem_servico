<?php
class Clientes extends CI_Controller {
    
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
            $this->load->helper(array('codegen_helper'));
            $this->load->model('clientes_model','',TRUE);
            $this->load->model('mapos_model', '', TRUE);
            $dados['menuClientes'] = 'clientes';
            $this->load->helper('form');
	}	
	
	function index(){
		$this->gerenciar();
	}
	function gerenciar(){
        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'vCliente')){
           $this->session->set_flashdata('error','Você não tem permissão para visualizar clientes.');
           redirect(base_url());
        }	
        $this->load->model ( 'clientes_model' );
	    $dados['results'] = $this->clientes_model->get('clientes','idClientes,nomeCliente,nomefantasia,razaosocial,cnpj,cpf,telefone,celular,email,cep,rua,numero,complemento,bairro,cidade,estado',$this->uri->segment(3));
       
        $dados['tela'] = 'clientes/clientes';
        $this->load->view('view_home', $dados);
    }
	
    function adicionar() {
        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'aCliente')){
           $this->session->set_flashdata('error','Você não tem permissão para adicionar clientes.');
           redirect(base_url());
        }

            if ($this->input->post()) {
                $data = array(
                    'tipoCliente'           => $this->input->post('tipoCliente'),
                    'nomeCliente'           => $this->input->post('nomeCliente'),
                    'nomefantasia'          => $this->input->post('nomefantasia'),
                    'razaosocial'           => $this->input->post('razaosocial'),
                    'cnpj'                  => $this->input->post('cnpj'),
                    'cpf'                   => $this->input->post('cpf'),
                    'telefone'              => $this->input->post('telefone'),
                    'celular'               => $this->input->post('celular'),
                    'email'                 => $this->input->post('email'),
                    'cep'                   => $this->input->post('cep'),
                    'rua'                   => $this->input->post('endereco'),
                    'numero'                => $this->input->post('numero'),
                    'complemento'           => $this->input->post('complemento'),
                    'bairro'                => $this->input->post('bairro'),
                    'cidade'                => $this->input->post('cidade'),
                    'estado'                => $this->input->post('estado'),
                    'veiculo'               => $this->input->post('veiculo'),
                    'placa'                 => $this->input->post('placa'),
                    'km'                    => $this->input->post('km'),
                    'dataCadastro'          => date('Y-m-d')
                );

                $session = $this->session->userdata();
                $id = $session['id'];

                $timeline = array(
                    'titulo'                => 'Criação de novo cliente',
                    'conteudo'                => 'Cadastro do cliente ' .$this->input->post('nomeCliente'),
                    'cor'                   => 'bg-blue',
                    'data'                  => date('Y-m-d'),
                    'icone'                 => 'fa fa-users',
                    'usuario'               => $id
                );


                if ($this->clientes_model->add('clientes', $data) == TRUE) {
                    $this->session->set_flashdata('success','Cliente adicionado com sucesso!');

                    $this->mapos_model->addtimeline($timeline);

                    redirect(base_url() . 'clientes/adicionar/');
                } else {
                    $dados['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
                }
            }
        
        $dados['tela'] = 'clientes/adicionarCliente';
        $this->load->view('view_home', $dados);
    }
    function editar() {

        if(!$this->uri->segment(3)){
            $this->session->set_flashdata('error','Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect('clientes');
        }

        
            if($this->input->post()){
            $data = array(
                'tipoCliente'           => $this->input->post('tipoCliente'),
                'nomeCliente'           => $this->input->post('nomeCliente'),
                'nomefantasia'          => $this->input->post('nomefantasia'),
                'razaosocial'           => $this->input->post('razaosocial'),
                'cnpj'                  => $this->input->post('cnpj'),
                'cpf'                   => $this->input->post('cpf'),
                'telefone'              => $this->input->post('telefone'),
                'celular'               => $this->input->post('celular'),
                'email'                 => $this->input->post('email'),
                'cep'                   => $this->input->post('cep'),
                'rua'                   => $this->input->post('endereco'),
                'numero'                => $this->input->post('numero'),
                'complemento'           => $this->input->post('complemento'),
                'bairro'                => $this->input->post('bairro'),
                'cidade'                => $this->input->post('cidade'),
                'veiculo'               => $this->input->post('veiculo'),
                'placa'                 => $this->input->post('placa'),
                'km'                    => $this->input->post('km'),                
                'estado'                => $this->input->post('estado')
            );
            if ($this->clientes_model->edit('clientes', $data, 'idClientes', $this->input->post('idClientes')) == TRUE) {
                $this->session->set_flashdata('success','Cliente editado com sucesso!');
                redirect(base_url() . 'clientes/editar/'.$this->input->post('idClientes'));
            } else {
                $dados['custom_error'] = '<div class="form_error"><p>Ocorreu um erro</p></div>';
            }
        }
        $dados['result'] = $this->clientes_model->getById($this->uri->segment(3));
        $dados['tela'] = 'clientes/editarCliente';
        $this->load->view('view_home', $dados);
    }
    public function visualizar(){
        if(!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))){
            $this->session->set_flashdata('error','Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect('home');
        }
        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'vCliente')){
           $this->session->set_flashdata('error','Você não tem permissão para visualizar clientes.');
           redirect(base_url());
        }
        $dados['custom_error'] = '';
        $dados['result'] = $this->clientes_model->getById($this->uri->segment(3));
        $dados['results'] = $this->clientes_model->getOsByCliente($this->uri->segment(3));
        $dados['tela'] = 'clientes/visualizar';
        $this->load->view('view_home', $dados);
        
    }
	
    public function excluir(){
            
            if(!$this->permission->checkPermission($this->session->userdata('permissao'),'dCliente')){
               $this->session->set_flashdata('error','Você não tem permissão para excluir clientes.');
               redirect(base_url());
            }
            
            $id =  $this->input->post('id');
            if ($id == null){
                $this->session->set_flashdata('error','Erro ao tentar excluir cliente.');            
                redirect(base_url().'clientes/gerenciar/');
            }
            //$id = 2;
            // excluindo OSs vinculadas ao cliente
            $this->db->where('clientes_id', $id);
            $os = $this->db->get('os')->result();
            if($os != null){
                foreach ($os as $o) {
                    $this->db->where('os_id', $o->idOs);
                    $this->db->delete('servicos_os');
                    $this->db->where('os_id', $o->idOs);
                    $this->db->delete('produtos_os');
                    $this->db->where('idOs', $o->idOs);
                    $this->db->delete('os');
                }
            }
            // excluindo Vendas vinculadas ao cliente
            $this->db->where('clientes_id', $id);
            $vendas = $this->db->get('vendas')->result();
            if($vendas != null){
                foreach ($vendas as $v) {
                    $this->db->where('vendas_id', $v->idVendas);
                    $this->db->delete('itens_de_vendas');
                    $this->db->where('idVendas', $v->idVendas);
                    $this->db->delete('vendas');
                }
            }
            //excluindo receitas vinculadas ao cliente
            $this->db->where('clientes_id', $id);
            $this->db->delete('lancamentos');
            $this->clientes_model->delete('clientes','idClientes',$id); 
            $this->session->set_flashdata('success','Cliente excluido com sucesso!');            
            redirect(base_url().'clientes/gerenciar/');
    }
}