<?php
class Clientes extends CI_Controller {
    
    /**
     * author: Ramon Silva 
     * email: silva018-mg@yahoo.com.br
     * 
     */
    
    function __construct() {
        parent::__construct();
            if( (!session_id()) || (!$this->session->userdata('logado'))){
                redirect('home/login');
            }
            $this->load->helper(array('codegen_helper'));
            $this->load->model('clientes_model','',TRUE);
            $dados['menuClientes'] = 'clientes';
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
        $this->load->library('form_validation');
        $dados['custom_error'] = '';
        if ($this->form_validation->run('clientes') == false) {
            $dados['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
            $data = array(
                'nomeCliente' => set_value('nomeCliente'),
                'documento' => set_value('documento'),
                'telefone' => set_value('telefone'),
                'celular' => $this->input->post('celular'),
                'email' => set_value('email'),
                'rua' => set_value('rua'),
                'numero' => set_value('numero'),
                'bairro' => set_value('bairro'),
                'cidade' => set_value('cidade'),
                'estado' => set_value('estado'),
                'cep' => set_value('cep'),
                'dataCadastro' => date('Y-m-d')
            );
            if ($this->clientes_model->add('clientes', $data) == TRUE) {
                $this->session->set_flashdata('success','Cliente adicionado com sucesso!');
                redirect(base_url() . 'index.php/clientes/adicionar/');
            } else {
                $dados['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }
        $dados['view'] = 'clientes/adicionarCliente';
        $this->load->view('tema/topo', $this->data);
    }
    function editar() {
        if(!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))){
            $this->session->set_flashdata('error','Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect('mapos');
        }
        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'eCliente')){
           $this->session->set_flashdata('error','Você não tem permissão para editar clientes.');
           redirect(base_url());
        }
        $this->load->library('form_validation');
        $dados['custom_error'] = '';
        if ($this->form_validation->run('clientes') == false) {
            $dados['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
            $data = array(
                'nomeCliente' => $this->input->post('nomeCliente'),
                'documento' => $this->input->post('documento'),
                'telefone' => $this->input->post('telefone'),
                'celular' => $this->input->post('celular'),
                'email' => $this->input->post('email'),
                'rua' => $this->input->post('rua'),
                'numero' => $this->input->post('numero'),
                'bairro' => $this->input->post('bairro'),
                'cidade' => $this->input->post('cidade'),
                'estado' => $this->input->post('estado'),
                'cep' => $this->input->post('cep')
            );
            if ($this->clientes_model->edit('clientes', $data, 'idClientes', $this->input->post('idClientes')) == TRUE) {
                $this->session->set_flashdata('success','Cliente editado com sucesso!');
                redirect(base_url() . 'index.php/clientes/editar/'.$this->input->post('idClientes'));
            } else {
                $dados['custom_error'] = '<div class="form_error"><p>Ocorreu um erro</p></div>';
            }
        }
        $dados['result'] = $this->clientes_model->getById($this->uri->segment(3));
        $dados['view'] = 'clientes/editarCliente';
        $this->load->view('tema/topo', $this->data);
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
                redirect(base_url().'index.php/clientes/gerenciar/');
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
            redirect(base_url().'index.php/clientes/gerenciar/');
    }
}