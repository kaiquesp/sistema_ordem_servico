<?php

class Usuarios extends CI_Controller {
    

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
        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'cUsuario')){
          $this->session->set_flashdata('error','Você não tem permissão para configurar os usuários.');
          redirect(base_url());
        }

        $this->load->helper(array('form', 'codegen_helper'));
        $this->load->model('usuarios_model', '', TRUE);
        $this->data['menuUsuarios'] = 'Usuários';
        $this->data['menuConfiguracoes'] = 'Configurações';
    }

    function index(){
		$this->gerenciar();
	}

	function gerenciar(){
        
        $this->load->model ( 'usuarios_model' );
        $resultadousuario = $this->usuarios_model->get ();
        $dados['resultadousuario'] = $resultadousuario;
       
        $dados['tela'] = 'usuarios/usuarios';
        $this->load->view('view_home', $dados);

    }
	
    function adicionar(){  
             
		$dados['custom_error'] = '';
		  
        $this->load->library('encryption');
        $this->encryption->initialize(array('driver' => 'mcrypt'));

        if ($this->input->post ()) {
            $dadosusuario['nome'] = $this->input->post('nome');
            $dadosusuario['email'] = $this->input->post('email');
            $dadosusuario['telefone'] = $this->input->post('telefone');
            $dadosusuario['celular'] = $this->input->post('celular');
            $dadosusuario['login'] = $this->input->post('login');
            $dadosusuario['senha'] = $this->encryption->encrypt($this->input->post('senha'));
            $dadosusuario['situacao'] = $this->input->post('situacao');
            $dadosusuario['permissoes_id'] = $this->input->post('permissoes_id');
            $dadosusuario['dataCadastro'] = date('Y-m-d');					
            
            $this->load->model('usuarios_model');
            $resultadousuario = $this->usuarios_model->add($dadosusuario);

            if($resultadousuario){
                $dados['custom_error'] = 'Usuário cadastrado com sucesso';
            }else{
                $dados['custom_error'] = 'Erro ao cadastrar Úsuário';
            }
        }    
			
        
        $this->load->model('permissoes_model');
        $dados['permissoes'] = $this->permissoes_model->getActive('permissoes','permissoes.idPermissao,permissoes.nome');   
		$dados['tela'] = 'usuarios/adicionarUsuario';
        $this->load->view('view_home', $dados);
   
       
    }	
    
    function editar(){  
        
        if(!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))){
            $this->session->set_flashdata('error','Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect('mapos');
        }

        $this->load->library('form_validation');    
		$this->data['custom_error'] = '';
        $this->form_validation->set_rules('nome', 'Nome', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('telefone', 'Telefone', 'trim|required');
        $this->form_validation->set_rules('situacao', 'Situação', 'trim|required');
        $this->form_validation->set_rules('permissoes_id', 'Permissão', 'trim|required');

        if ($this->form_validation->run() == false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);

        } else
        { 

            if ($this->input->post('idUsuarios') == 1 && $this->input->post('situacao') == 0)
            {
                $this->session->set_flashdata('error','O usuário super admin não pode ser desativado!');
                redirect(base_url().'index.php/usuarios/editar/'.$this->input->post('idUsuarios'));
            }

            $senha = $this->input->post('senha'); 
            if($senha != null){

                $this->load->library('encryption');
                $this->encryption->initialize(array('driver' => 'mcrypt'));

                $senha = $this->encryption->encrypt($senha);

                $data = array(
                        'nome' => $this->input->post('nome'),
                        'rg' => $this->input->post('rg'),
                        'cpf' => $this->input->post('cpf'),
                        'rua' => $this->input->post('rua'),
                        'numero' => $this->input->post('numero'),
                        'bairro' => $this->input->post('bairro'),
                        'cidade' => $this->input->post('cidade'),
                        'estado' => $this->input->post('estado'),
                        'email' => $this->input->post('email'),
                        'senha' => $senha,
                        'telefone' => $this->input->post('telefone'),
                        'celular' => $this->input->post('celular'),
                        'situacao' => $this->input->post('situacao'),
                        'permissoes_id' => $this->input->post('permissoes_id')
                );
            }  

            else{

                $data = array(
                        'nome' => $this->input->post('nome'),
                        'rg' => $this->input->post('rg'),
                        'cpf' => $this->input->post('cpf'),
                        'rua' => $this->input->post('rua'),
                        'numero' => $this->input->post('numero'),
                        'bairro' => $this->input->post('bairro'),
                        'cidade' => $this->input->post('cidade'),
                        'estado' => $this->input->post('estado'),
                        'email' => $this->input->post('email'),
                        'telefone' => $this->input->post('telefone'),
                        'celular' => $this->input->post('celular'),
                        'situacao' => $this->input->post('situacao'),
                        'permissoes_id' => $this->input->post('permissoes_id')
                );

            }  

           
			if ($this->usuarios_model->edit('usuarios',$data,'idUsuarios',$this->input->post('idUsuarios')) == TRUE)
			{
                $this->session->set_flashdata('success','Usuário editado com sucesso!');
				redirect(base_url().'index.php/usuarios/editar/'.$this->input->post('idUsuarios'));
			}
			else
			{
				$this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro</p></div>';

			}
		}

		$this->data['result'] = $this->usuarios_model->getById($this->uri->segment(3));
        $this->load->model('permissoes_model');
        $this->data['permissoes'] = $this->permissoes_model->getActive('permissoes','permissoes.idPermissao,permissoes.nome'); 

		$this->data['view'] = 'usuarios/editarUsuario';
        $this->load->view('tema/topo',$this->data);
			
      
    }
	
    public function excluir(){

            $ID =  $this->uri->segment(3);
            $this->usuarios_model->delete('usuarios','idUsuarios',$ID);             
            redirect(base_url().'index.php/usuarios/gerenciar/');
    }
}

