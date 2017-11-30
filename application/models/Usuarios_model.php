<?php
class Usuarios_model extends CI_Model {


    /**
     * author: Kaique Alves 
     * email: kaiqueexp@gmail.com
     * 
     */
    
    function __construct() {
        parent::__construct();
    }
	
	public function check_dados($mail,$usuario) {
		$this->db->where('login', $user);
        $this->db->where('situacao', 1);
        $this->db->limit(1);
        return $this->db->get('usuarios')->row();
    }

    public function check_credentials($email) {
        $this->db->where('email', $email);
        $this->db->where('login', $login);
        return $this->db->get('usuarios')->row();
    }

    

    function get($perpage=0,$start=0,$one=false){
        
        $this->db->from('usuarios');
        $this->db->select('usuarios.*, permissoes.nome as permissao');
        $this->db->limit($perpage,$start);
        $this->db->join('permissoes', 'usuarios.permissoes_id = permissoes.idPermissao', 'left');
  
        $query = $this->db->get();
        
        $result =  !$one  ? $query->result() : $query->row();
        return $result;
    }

     function getAllTipos(){
        $this->db->where('situacao',1);
        return $this->db->get('tiposUsuario')->result();
    }

    function getById($id){
        $this->db->where('idUsuarios',$id);
        $this->db->limit(1);
        return $this->db->get('usuarios')->row();
    }
    
    function add($dados = NULL){
        if ($dados !== NULL) {
            extract ( $dados );
            $this->db->insert ( 'usuarios', array (
                'nome'          => $dados ['nome'],
                'email'         => $dados ['email'],
                'telefone'      => $dados ['telefone'],
                'celular'       => $dados ['celular'],
                'login'         => $dados ['login'],
                'senha'         => $dados ['senha'],
                'situacao'      => $dados ['situacao'],
                'permissoes_id' => $dados ['permissoes_id'],
                'dataCadastro'  => $dados ['dataCadastro'],
                'foto'          => $dados ['foto']
                ) );
            return true;
        } else {
            return false;
        }
    }
    
    function edit($table,$data,$fieldID,$ID){
        $this->db->where($fieldID,$ID);
        $this->db->update($table, $data);

        if ($this->db->affected_rows() >= 0)
		{
			return TRUE;
		}
		
		return FALSE;       
    }
    
    function delete($table,$fieldID,$ID){
        $this->db->where($fieldID,$ID);
        $this->db->delete($table);
        if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;        
    }   
	
	function count($table){
		return $this->db->count_all($table);
	}

        function editFoto($table,$data,$id){
        $this->db->where('idUsuarios', $id);
        $this->db->update($table, $data);

        if ($this->db->affected_rows() >= 0)
        {
            return TRUE;
        }
        
        return FALSE;       
    }
}