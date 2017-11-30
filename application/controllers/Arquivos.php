<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Arquivos extends CI_Controller {

    /**
     * author: Kaique Alves 
     * email: kaiqueexp@gmail.com
     * 
     */

	public function __construct(){
		parent::__construct();

		if( (!session_id()) || (!$this->session->userdata('logado'))){
            redirect('login');
        }

        $this->load->helper(array('codegen_helper'));
        $this->load->model('arquivos_model','',TRUE);
        $dados['menuArquivos'] = 'Arquivos';
	}

    public function index(){
        $this->gerenciar();
    }
	public function gerenciar(){

        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'vArquivo')){
           $this->session->set_flashdata('error','Você não tem permissão para visualizar arquivos.');
           redirect(base_url());
        }
 
            
            $dados['results'] = $this->arquivos_model->get('documentos','idDocumentos,documento,descricao,file,path,url,cadastro,categoria,tamanho,tipo',$this->uri->segment(3));
  

       	$dados['tela'] = 'arquivos/arquivos';
		$this->load->view('view_home',$dados);
	}


	public function adicionar() {

        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'aArquivo')){
          $this->session->set_flashdata('error','Você não tem permissão para adicionar arquivos.');
          redirect(base_url());
        }

        $this->load->library('form_validation');
        $dados['custom_error'] = '';

        $this->form_validation->set_rules('nome', '', 'trim|required');


        if ($this->form_validation->run() == false) {
            $dados['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {

        	$arquivo = $this->do_upload();

        	$file = $arquivo['file_name'];
        	$path = $arquivo['full_path'];
        	$url = base_url().'assets/arquivos/'.date('d-m-Y').'/'.$file;
            $tamanho = explode(',', '.', $arquivo['file_size']);
        	$tipo = $arquivo['file_ext'];

        	$data = $this->input->post('data');

        	if($data == null){
        		$data = date('Y-m-d');
        	}
        	else{
        		$data = explode('/',$data);
        		$data = $data[2].'-'.$data[1].'-'.$data[0];
        	}

            $data = array(
                'documento' => $this->input->post('nome'),
                'descricao' => $this->input->post('descricao'),
                'file' => $file,
                'path' => $path,
                'url' => $url,
                'cadastro' => $data,
                'tamanho' => $tamanho1,
                'tipo' => $tipo
            );

            if ($this->arquivos_model->add('documentos', $data) == TRUE) {
                $this->session->set_flashdata('success','Arquivo adicionado com sucesso!');
                redirect(base_url() . 'arquivos/adicionar/');
            } else {
                $dados['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }

        $dados['tela'] = 'arquivos/adicionarArquivo';
        $this->load->view('view_home', $dados);

    }

    public function editar() {

        if(!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))){
            $this->session->set_flashdata('error','Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect('mapos');
        }
        
        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'eArquivo')){
          $this->session->set_flashdata('error','Você não tem permissão para editar arquivos.');
          redirect(base_url());
        }

        $this->load->library('form_validation');
        $dados['custom_error'] = '';

        $this->form_validation->set_rules('nome', '', 'trim|required');
        if ($this->form_validation->run() == false) {
            $dados['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {

            $data = $this->input->post('data');
            if($data == null){
                $data = date('Y-m-d');
            }
            else{
                $data = explode('/',$data);
                $data = $data[2].'-'.$data[1].'-'.$data[0];
            }

            $data = array(
                'documento' => $this->input->post('nome'),
                'descricao' => $this->input->post('descricao'),
                'cadastro' => $data,           
            );

            if ($this->arquivos_model->edit('documentos', $data, 'idDocumentos', $this->input->post('idDocumentos')) == TRUE) {
                $this->session->set_flashdata('success','Alterações efetuadas com sucesso!');
                redirect(base_url() . 'arquivos/editar/'.$this->input->post('idDocumentos'));
            } else {
                $dados['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }


        $dados['result'] = $this->arquivos_model->getById($this->uri->segment(3));
        $dados['tela'] = 'arquivos/editarArquivo';
        $this->load->view('view_home', $dados);

    }


    public function download($id = null){
    	
        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'vArquivo')){
          $this->session->set_flashdata('error','Você não tem permissão para visualizar arquivos.');
          redirect(base_url());
        }

    	if($id == null || !is_numeric($id)){
    		$this->session->set_flashdata('error','Erro! O arquivo não pode ser localizado.');
            redirect(base_url() . 'arquivos/');
    	}

    	$file = $this->arquivos_model->getById($id);

    	$this->load->library('zip');

    	$path = $file->path;

		$this->zip->read_file($path); 

		$this->zip->download('file'.date('d-m-Y-H.i.s').'.zip');
    }


    public function excluir(){
    	if(!$this->permission->checkPermission($this->session->userdata('permissao'),'dArquivo')){
          $this->session->set_flashdata('error','Você não tem permissão para excluir arquivos.');
          redirect(base_url());
        }

    	$id = $this->input->post('id');
    	if($id == null || !is_numeric($id)){
    		$this->session->set_flashdata('error','Erro! O arquivo não pode ser localizado.');
            redirect(base_url() . 'arquivos/');
    	}

    	$file = $this->arquivos_model->getById($id);

    	$this->db->where('idDocumentos', $id);
        
        if($this->db->delete('documentos')){

        	$path = $file->path;
	    	unlink($path);

	    	$this->session->set_flashdata('success','Arquivo excluido com sucesso!');
	        redirect(base_url() . 'arquivos/');
        }
        else{

        	$this->session->set_flashdata('error','Ocorreu um erro ao tentar excluir o arquivo.');
            redirect(base_url() . 'arquivos/');
        }


    }

    public function do_upload(){

        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'aArquivo')){
          $this->session->set_flashdata('error','Você não tem permissão para adicionar arquivos.');
          redirect(base_url());
        }
	
    	$date = date('d-m-Y');

		$config['upload_path'] = './assets/arquivos/'.$date;
	    $config['allowed_types'] = 'txt|jpg|jpeg|gif|png|pdf|PDF|JPG|JPEG|GIF|PNG';
	    $config['max_size']     = 0;
	    $config['max_width']  = '3000';
	    $config['max_height']  = '2000';
	    $config['encrypt_name'] = true;


		if (!is_dir('./assets/arquivos/'.$date)) {

			mkdir('./assets/arquivos/' . $date, 0777, TRUE);

		}

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			$this->session->set_flashdata('error','Erro ao fazer upload do arquivo, verifique se a extensão do arquivo é permitida.');
            redirect(base_url() . 'arquivos/adicionar/');
		}
		else
		{
			//$data = array('upload_data' => $this->upload->data());
			return $this->upload->data();
		}
	}

}

/* End of file arquivos.php */
/* Location: ./application/controllers/arquivos.php */