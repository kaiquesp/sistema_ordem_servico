<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {


    /**
     * author: Kaique Alves
     * email: kaiqueexp@gmail.com
     * 
     */
    
    public function __construct() {
        parent::__construct();
        $this->load->model('mapos_model','',TRUE);
        $this->load->helper('string');
        $this->load->library('email');
        $this->email->initialize();

        $this->load->library('encryption');
        $this->encryption->initialize(array('driver' => 'mcrypt'));
    }

    public function index() {
        if( (!session_id()) || (!$this->session->userdata('logado'))){
            $this->session->set_flashdata('error','Sua sessao expirou, faça o login novamente!');
            redirect('login');
        }

        $dados['ordens'] = $this->mapos_model->getOsAbertas();
        $dados['produtos'] = $this->mapos_model->getProdutosMinimo();
        $dados['os'] = $this->mapos_model->getOsEstatisticas();
        $dados['estatisticas_financeiro'] = $this->mapos_model->getEstatisticasFinanceiro();
        $this->load->view('view_home', $dados);
      
    }

    public function minhaConta() {
        if( (!session_id()) || (!$this->session->userdata('logado'))){
            $this->session->set_flashdata('error','Sua sessao expirou, faça o login novamente!');
            redirect('login');
        }

        $this->data['usuario'] = $this->mapos_model->getById($this->session->userdata('id'));
        $this->data['view'] = 'minhaConta';
        $this->load->view('tema/topo',  $this->data);
     
    }

    public function alterarDados() {
        if( (!session_id()) || (!$this->session->userdata('logado'))){
            $this->session->set_flashdata('error','Sua sessao expirou, faça o login novamente!');
            redirect('login');
        }

        $this->load->library('encryption');
        $this->encryption->initialize(array('driver' => 'mcrypt'));
        
        $oldSenha = $this->input->post('oldSenha');
        $senha = $this->input->post('novaSenha');
        $result = $this->mapos_model->alterarSenha($senha,$oldSenha,$this->session->userdata('id'));
        if($result){
            $this->session->set_flashdata('success','Senha Alterada com sucesso!');
            redirect(base_url() . '/perfil');
        }
        else{
            $this->session->set_flashdata('error','Ocorreu um erro ao tentar alterar a senha!');
            redirect(base_url() . 'perfil');
            
        }
    }

    public function pesquisar() {
        if( (!session_id()) || (!$this->session->userdata('logado'))){
            $this->session->set_flashdata('error','Sua sessao expirou, faça o login novamente!');
            redirect('login');
        }
        
        $termo = $this->input->get('termo');

        $data['results'] = $this->mapos_model->pesquisar($termo);
        $this->data['produtos'] = $data['results']['produtos'];
        $this->data['servicos'] = $data['results']['servicos'];
        $this->data['os'] = $data['results']['os'];
        $this->data['clientes'] = $data['results']['clientes'];
        $this->data['view'] = 'pesquisa';
        $this->load->view('tema/topo',  $this->data);
      
    }

    public function login(){
        
        $this->load->view('login');
        
    }
    public function sair(){
        $this->session->sess_destroy();
        redirect('login');
    }


    public function verificarLogin(){
        
        header('Access-Control-Allow-Origin: '.base_url());
        header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
        header('Access-Control-Max-Age: 1000');
        header('Access-Control-Allow-Headers: Content-Type');
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('user','Login','required|trim');
        $this->form_validation->set_rules('senha','Senha','required|trim');
        if ($this->form_validation->run() == false) {
            $json = array('result' => false, 'message' => validation_errors());
            echo json_encode($json);
        }
        else {
            $user = $this->input->post('user');
            $password = $this->input->post('senha');
            $this->load->model('Mapos_model');
            $user = $this->Mapos_model->check_credentials($user);

            if($user){

                $this->load->library('encryption');
                $this->encryption->initialize(array('driver' => 'mcrypt'));
                $password_stored =  $this->encryption->decrypt($user->senha);

                if($password == $password_stored){
                    $session_data = array('nome' => $user->nome, 'email' => $user->email, 'login' => $user->login, 'telefone' => $user->telefone, 'celular' => $user->celular, 'id' => $user->idUsuarios,'permissao' => $user->permissoes_id, 'foto' => $user->foto, 'logado' => TRUE);
                    $this->session->set_userdata($session_data);
                    $json = array('result' => true);
                    echo json_encode($json);
                }
                else{
                    $json = array('result' => false, 'message' => 'Os dados de acesso estão incorretos.');
                    echo json_encode($json);
                }
            }
            else{
                $json = array('result' => false, 'message' => 'Usuário não encontrado, verifique se suas credenciais estão corretas.');
                echo json_encode($json);
            }
        }
        die();
    }


    public function backup(){

        if( (!session_id()) || (!$this->session->userdata('logado'))){
            $this->session->set_flashdata('error','Sua sessao expirou, faça o login novamente!');
            redirect('login');
        }

        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'cBackup')){
           $this->session->set_flashdata('error','Você não tem permissão para efetuar backup.');
           redirect(base_url());
        }

        
        
        $this->load->dbutil();
        $prefs = array(
                'format'      => 'zip',
                'foreign_key_checks' => false,
                'filename'    => 'backup'.date('d-m-Y').'.sql'
              );

        $backup = $this->dbutil->backup($prefs);

        $this->load->helper('file');
        write_file(base_url().'backup/backup.zip', $backup);

        $this->load->helper('download');
        force_download('backup'.date('d-m-Y H:m:s').'.zip', $backup);
    }


    public function emitente(){   

        if( (!session_id()) || (!$this->session->userdata('logado'))){
            $this->session->set_flashdata('error','Sua sessao expirou, faça o login novamente!');
            redirect('login');
        }

        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'cEmitente')){
           $this->session->set_flashdata('error','Você não tem permissão para configurar emitente.');
           redirect(base_url());
        }

        $dados['menuConfiguracoes'] = 'Configuracoes';
        $dados['dados'] = $this->mapos_model->getEmitente();
        $dados['tela'] = 'home/emitente';
        $this->load->view('view_home',$dados);
    }

    function do_upload(){

        if( (!session_id()) || (!$this->session->userdata('logado'))){
            $this->session->set_flashdata('error','Sua sessao expirou, faça o login novamente!');
            redirect('login');
        }

        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'cEmitente')){
           $this->session->set_flashdata('error','Você não tem permissão para configurar emitente.');
           redirect(base_url());
        }

        $this->load->library('upload');

        $image_upload_folder = FCPATH . 'assets/uploads';

        if (!file_exists($image_upload_folder)) {
            mkdir($image_upload_folder, DIR_WRITE_MODE, true);
        }

        $this->upload_config = array(
            'upload_path'   => $image_upload_folder,
            'allowed_types' => 'png|jpg|jpeg|bmp',
            'max_size'      => 2048,
            'remove_space'  => TRUE,
            'encrypt_name'  => TRUE,
        );

        $this->upload->initialize($this->upload_config);

        if (!$this->upload->do_upload()) {
            $upload_error = $this->upload->display_errors();
            print_r($upload_error);
            exit();
        } else {
            $file_info = array($this->upload->data());
            return $file_info[0]['file_name'];
        }

    }


    public function cadastrarEmitente() {

        if( (!session_id()) || (!$this->session->userdata('logado'))){
            $this->session->set_flashdata('error','Sua sessao expirou, faça o login novamente!');
            redirect('login');
        }

        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'cEmitente')){
           $this->session->set_flashdata('error','Você não tem permissão para configurar emitente.');
           redirect(base_url());
        }

        $this->load->library('form_validation');
        $this->form_validation->set_rules('nome','Razão Social','required|trim');
        $this->form_validation->set_rules('cnpj','CNPJ','required|trim');
        $this->form_validation->set_rules('ie','IE','required|trim');
        $this->form_validation->set_rules('logradouro','Logradouro','required|trim');
        $this->form_validation->set_rules('numero','Número','required|trim');
        $this->form_validation->set_rules('bairro','Bairro','required|trim');
        $this->form_validation->set_rules('cidade','Cidade','required|trim');
        $this->form_validation->set_rules('uf','UF','required|trim');
        $this->form_validation->set_rules('telefone','Telefone','required|trim');
        $this->form_validation->set_rules('email','E-mail','required|trim');


        

        if ($this->form_validation->run() == false) {
            
            $this->session->set_flashdata('error','Campos obrigatórios não foram preenchidos.');
            redirect(base_url().'emitente');
            
        } 
        else {

            $nome = $this->input->post('nome');
            $cnpj = $this->input->post('cnpj');
            $ie = $this->input->post('ie');
            $logradouro = $this->input->post('logradouro');
            $numero = $this->input->post('numero');
            $bairro = $this->input->post('bairro');
            $cidade = $this->input->post('cidade');
            $uf = $this->input->post('uf');
            $telefone = $this->input->post('telefone');
            $email = $this->input->post('email');
            $image = $this->do_upload();
            $logo = base_url().'assets/uploads/'.$image;


            $retorno = $this->mapos_model->addEmitente($nome, $cnpj, $ie, $logradouro, $numero, $bairro, $cidade, $uf,$telefone,$email, $logo);
            if($retorno){

                $this->session->set_flashdata('success','As informações foram inseridas com sucesso.');
                redirect(base_url().'home/emitente');
            }
            else{
                $this->session->set_flashdata('error','Ocorreu um erro ao tentar inserir as informações.');
                redirect(base_url().'home/emitente');
            }
            
        }
    }


    public function editarEmitente() {

        if( (!session_id()) || (!$this->session->userdata('logado'))){
            $this->session->set_flashdata('error','Sua sessao expirou, faça o login novamente!');
            redirect('login');
        }

        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'cEmitente')){
           $this->session->set_flashdata('error','Você não tem permissão para configurar emitente.');
           redirect(base_url());
        }

        $this->load->library('form_validation');
        $this->form_validation->set_rules('nome','Razão Social','required|trim');
        $this->form_validation->set_rules('cnpj','CNPJ','required|trim');
        $this->form_validation->set_rules('ie','IE','required|trim');
        $this->form_validation->set_rules('logradouro','Logradouro','required|trim');
        $this->form_validation->set_rules('numero','Número','required|trim');
        $this->form_validation->set_rules('bairro','Bairro','required|trim');
        $this->form_validation->set_rules('cidade','Cidade','required|trim');
        $this->form_validation->set_rules('uf','UF','required|trim');
        $this->form_validation->set_rules('telefone','Telefone','required|trim');
        $this->form_validation->set_rules('email','E-mail','required|trim');


        

        if ($this->form_validation->run() == false) {
            
            $this->session->set_flashdata('error','Campos obrigatórios não foram preenchidos.');
            redirect(base_url().'home/emitente');
            
        } 
        else {

            $nome = $this->input->post('nome');
            $cnpj = $this->input->post('cnpj');
            $ie = $this->input->post('ie');
            $logradouro = $this->input->post('logradouro');
            $numero = $this->input->post('numero');
            $bairro = $this->input->post('bairro');
            $cidade = $this->input->post('cidade');
            $uf = $this->input->post('uf');
            $telefone = $this->input->post('telefone');
            $email = $this->input->post('email');
            $id = $this->input->post('id');


            $retorno = $this->mapos_model->editEmitente($id, $nome, $cnpj, $ie, $logradouro, $numero, $bairro, $cidade, $uf,$telefone,$email);
            if($retorno){

                $this->session->set_flashdata('success','As informações foram alteradas com sucesso.');
                redirect(base_url().'home/emitente');
            }
            else{
                $this->session->set_flashdata('error','Ocorreu um erro ao tentar alterar as informações.');
                redirect(base_url().'home/emitente');
            }
            
        }
    }


    public function editarLogo(){
        
        if( (!session_id()) || (!$this->session->userdata('logado'))){
            $this->session->set_flashdata('error','Sua sessao expirou, faça o login novamente!');
            redirect('login');
        }

        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'cEmitente')){
           $this->session->set_flashdata('error','Você não tem permissão para configurar emitente.');
           redirect(base_url());
        }

        $id = $this->input->post('id');
        if($id == null || !is_numeric($id)){
           $this->session->set_flashdata('error','Ocorreu um erro ao tentar alterar a logomarca.');
           redirect(base_url().'home/emitente'); 
        }
        $this->load->helper('file');
        delete_files(FCPATH .'assets/uploads/');

        $image = $this->do_upload();
        $logo = base_url().'assets/uploads/'.$image;

        $retorno = $this->mapos_model->editLogo($id, $logo);
        if($retorno){

            $this->session->set_flashdata('success','As informações foram alteradas com sucesso.');
            redirect(base_url().'home/emitente');
        }
        else{
            $this->session->set_flashdata('error','Ocorreu um erro ao tentar alterar as informações.');
            redirect(base_url().'home/emitente');
        }

    }

    public function reset_pass(){
        $this->load->view('view_reset_pass');
    }

    public function reset_pass_enviar_link(){

        $email = $this->input->post('email');
        $this->load->model('Mapos_model');
        $email = $this->Mapos_model->check_email($email);

        $str = "AaBbCcDdEeFfGghHiIjJkKlLMmNnOoPpQqRrSsTtUuVvxXWwYyZz1234567890";
        $codigo = str_shuffle($str);

        $dados['nome'] = $email->nome;
        $dados['email'] = $email->email;
        $dados['login'] = $email->login;
        $dados['ip'] =  $_SERVER["REMOTE_ADDR"];
        $dados['random'] = $codigo;
        $dados['date'] = date('Y-m-d H:m:s');

        if($email){
            $this->email->from("contato@japacar.tecnologia.ws", 'Sistema JapaCar');
            $this->email->subject("Vamos alterar a senha?");
            $this->email->reply_to("contato@japacar.tecnologia.ws");
            $this->email->to($email->email); 
            $this->email->message($this->load->view('email_template/email_recupera_senha', $dados, TRUE));
            $this->email->send();

            $codigo = $this->Mapos_model->gera_codigo($dados);

            $this->session->set_flashdata('success','<p>Uma mensagem foi enviada para o e-mail principal da conta.</p>
                                            <p>Clique no link informado para redefinir a senha de acesso.</p>

                                            <p>Caso o e-mail não esteja em sua caixa de entrada, verifique as pastas de Spam, Lixo, Social e outras.</p>');
            redirect(base_url().'home/reset_pass');
        }else{
            $this->session->set_flashdata('error','<p>E-mail não existe em nosso banco de dados.</p>');
            redirect(base_url().'home/reset_pass');
        }


        
    }

    public function change_password(){
        $codigo = $this->uri->segment(3);

        $verifica = $this->mapos_model->verifica_codigo($codigo);

        $email = $verifica->email;

        if($verifica){

            if($this->input->post('senha')){
                $senha = $this->encryption->encrypt($this->input->post('senha'));
                $codigos = $codigo;

                $resultadoAlteraSenha = $this->mapos_model->redefinir_senha($senha,$codigos, $email);

                if($resultadoAlteraSenha){
                    $this->mapos_model->excluir_codigo($codigos);
                    $this->session->set_flashdata('success','<p>Senha alterada com sucesso.</p>');
                    redirect(base_url().'login');
                }else{
                    $this->session->set_flashdata('error','<p>Falha ao alterar a senha.</p>');
                    redirect(base_url());
                }
            }

            
        }else{
            $this->session->set_flashdata('error','<p>Token não existe, ou já está expirado.</p>');
        }
           $this->load->view('change_password');
    }

}
