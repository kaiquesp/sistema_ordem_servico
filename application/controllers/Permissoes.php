<?php

class Permissoes extends CI_Controller {
    

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

      if(!$this->permission->checkPermission($this->session->userdata('permissao'),'cPermissao')){
        $this->session->set_flashdata('error','Você não tem permissão para configurar as permissões no sistema.');
        redirect(base_url());
      }

      $this->load->helper(array('form', 'codegen_helper'));
      $this->load->model('permissoes_model', '', TRUE);
      $dados['menuConfiguracoes'] = 'Permissões';
  }
	
	function index(){
		$this->gerenciar();
	}

	function gerenciar(){

		 $dados['results'] = $this->permissoes_model->get('permissoes','idPermissao,nome,data,situacao',$this->uri->segment(3));
       
	    $dados['tela'] = 'permissoes/permissoes';
       	$this->load->view('view_home',$dados);

       
		
    }
	
    function adicionar() {

        $this->load->library('form_validation');
        $dados['custom_error'] = '';

        $this->form_validation->set_rules('nome', 'Nome', 'trim|required');
        if ($this->form_validation->run() == false) {
            $dados['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
            
            $nomePermissao = $this->input->post('nome');
            $cadastro = date('Y-m-d');
            $situacao = 1;

            $permissoes = array(

                  'aCliente' => $this->input->post('aCliente'),
                  'eCliente' => $this->input->post('eCliente'),
                  'dCliente' => $this->input->post('dCliente'),
                  'vCliente' => $this->input->post('vCliente'),

                  'aProduto' => $this->input->post('aProduto'),
                  'eProduto' => $this->input->post('eProduto'),
                  'dProduto' => $this->input->post('dProduto'),
                  'vProduto' => $this->input->post('vProduto'),

                  'aServico' => $this->input->post('aServico'),
                  'eServico' => $this->input->post('eServico'),
                  'dServico' => $this->input->post('dServico'),
                  'vServico' => $this->input->post('vServico'),

                  'aOs' => $this->input->post('aOs'),
                  'eOs' => $this->input->post('eOs'),
                  'dOs' => $this->input->post('dOs'),
                  'vOs' => $this->input->post('vOs'),

                  'aVenda' => $this->input->post('aVenda'),
                  'eVenda' => $this->input->post('eVenda'),
                  'dVenda' => $this->input->post('dVenda'),
                  'vVenda' => $this->input->post('vVenda'),

                  'aArquivo' => $this->input->post('aArquivo'),
                  'eArquivo' => $this->input->post('eArquivo'),
                  'dArquivo' => $this->input->post('dArquivo'),
                  'vArquivo' => $this->input->post('vArquivo'),

                  'aLancamento' => $this->input->post('aLancamento'),
                  'eLancamento' => $this->input->post('eLancamento'),
                  'dLancamento' => $this->input->post('dLancamento'),
                  'vLancamento' => $this->input->post('vLancamento'),

                  'cUsuario' => $this->input->post('cUsuario'),
                  'cEmitente' => $this->input->post('cEmitente'),
                  'cPermissao' => $this->input->post('cPermissao'),
                  'cBackup' => $this->input->post('cBackup'),

                  'rCliente' => $this->input->post('rCliente'),
                  'rProduto' => $this->input->post('rProduto'),
                  'rServico' => $this->input->post('rServico'),
                  'rOs' => $this->input->post('rOs'),
                  'rVenda' => $this->input->post('rVenda'),
                  'rFinanceiro' => $this->input->post('rFinanceiro'),

            );
            $permissoes = serialize($permissoes);

            $data = array(
                'nome' => $nomePermissao,
                'data' => $cadastro,
                'permissoes' => $permissoes,
                'situacao' => $situacao
            );

            if ($this->permissoes_model->add('permissoes', $data) == TRUE) {

                $this->session->set_flashdata('success', 'Permissão adicionada com sucesso!');
                redirect(base_url() . 'index.php/permissoes/adicionar/');
            } else {
                $dados['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }

        $dados['tela'] = 'permissoes/adicionarPermissao';
        $this->load->view('view_home', $dados);

    }

    function editar() {

        
        $this->load->library('form_validation');
        $dados['custom_error'] = '';

        $this->form_validation->set_rules('nome', 'Nome', 'trim|required');
        if ($this->form_validation->run() == false) {
            $dados['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
            
            $nomePermissao = $this->input->post('nome');
            $situacao = $this->input->post('situacao');
            $permissoes = array(

                  'aCliente' => $this->input->post('aCliente'),
                  'eCliente' => $this->input->post('eCliente'),
                  'dCliente' => $this->input->post('dCliente'),
                  'vCliente' => $this->input->post('vCliente'),

                  'aProduto' => $this->input->post('aProduto'),
                  'eProduto' => $this->input->post('eProduto'),
                  'dProduto' => $this->input->post('dProduto'),
                  'vProduto' => $this->input->post('vProduto'),

                  'aServico' => $this->input->post('aServico'),
                  'eServico' => $this->input->post('eServico'),
                  'dServico' => $this->input->post('dServico'),
                  'vServico' => $this->input->post('vServico'),

                  'aOs' => $this->input->post('aOs'),
                  'eOs' => $this->input->post('eOs'),
                  'dOs' => $this->input->post('dOs'),
                  'vOs' => $this->input->post('vOs'),

                  'aVenda' => $this->input->post('aVenda'),
                  'eVenda' => $this->input->post('eVenda'),
                  'dVenda' => $this->input->post('dVenda'),
                  'vVenda' => $this->input->post('vVenda'),

                  'aArquivo' => $this->input->post('aArquivo'),
                  'eArquivo' => $this->input->post('eArquivo'),
                  'dArquivo' => $this->input->post('dArquivo'),
                  'vArquivo' => $this->input->post('vArquivo'),

                  'aLancamento' => $this->input->post('aLancamento'),
                  'eLancamento' => $this->input->post('eLancamento'),
                  'dLancamento' => $this->input->post('dLancamento'),
                  'vLancamento' => $this->input->post('vLancamento'),

                  'cUsuario' => $this->input->post('cUsuario'),
                  'cEmitente' => $this->input->post('cEmitente'),
                  'cPermissao' => $this->input->post('cPermissao'),
                  'cBackup' => $this->input->post('cBackup'),

                  'rCliente' => $this->input->post('rCliente'),
                  'rProduto' => $this->input->post('rProduto'),
                  'rServico' => $this->input->post('rServico'),
                  'rOs' => $this->input->post('rOs'),
                  'rVenda' => $this->input->post('rVenda'),
                  'rFinanceiro' => $this->input->post('rFinanceiro'),

            );
            $permissoes = serialize($permissoes);

            $data = array(
                'nome' => $nomePermissao,
                'permissoes' => $permissoes,
                'situacao' => $situacao
            );

            if ($this->permissoes_model->edit('permissoes', $data, 'idPermissao', $this->input->post('idPermissao')) == TRUE) {
                $this->session->set_flashdata('success', 'Permissão editada com sucesso!');
                redirect(base_url() . 'permissoes/editar/'.$this->input->post('idPermissao'));
            } else {
                $dados['custom_error'] = '<div class="form_error"><p>Ocorreu um errro.</p></div>';
            }
        }

        $dados['result'] = $this->permissoes_model->getById($this->uri->segment(3));

        $dados['tela'] = 'permissoes/editarPermissao';
        $this->load->view('view_home', $dados);

    }
	
    function desativar(){
        
        $id =  $this->input->post('id');
        var_dump($id);
        die;
        if ($id == null){
            $this->session->set_flashdata('error','Erro ao tentar desativar permissão.');            
            redirect(base_url().'permissoes/gerenciar/');
        }
        $data = array(
          'situacao' => false
        );
        if($this->permissoes_model->edit('permissoes',$data,'idPermissao',$id)){
          $this->session->set_flashdata('success','Permissão desativada com sucesso!');  
        }
        else{
          $this->session->set_flashdata('error','Erro ao desativar permissão!', $id);  
        }         
        
                  
        redirect(base_url().'permissoes/gerenciar/');
    }
}


/* End of file permissoes.php */
/* Location: ./application/controllers/permissoes.php */
