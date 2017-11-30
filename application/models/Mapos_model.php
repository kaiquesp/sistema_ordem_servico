<?php
class Mapos_model extends CI_Model {

    /**
     * author: Kaique Alves 
     * email: kaiqueexp@gmail.com
     * 
     */
    
    function __construct() {
        parent::__construct();
    }

    
    function get($table,$fields,$where='',$perpage=0,$start=0,$one=false,$array='array'){
        
        $this->db->select($fields);
        $this->db->from($table);
        $this->db->limit($perpage,$start);
        if($where){
            $this->db->where($where);
        }
        
        $query = $this->db->get();
        
        $result =  !$one  ? $query->result() : $query->row();
        return $result;
    }

    function getById($id){
        $this->db->from('usuarios');
        $this->db->select('usuarios.*, permissoes.nome as permissao');
        $this->db->join('permissoes', 'permissoes.idPermissao = usuarios.permissoes_id', 'left');
        $this->db->where('idUsuarios',$id);
        $this->db->limit(1);
        return $this->db->get()->row();
    }

    public function alterarSenha($newSenha,$oldSenha,$id){

        $this->db->where('idUsuarios', $id);
        $this->db->limit(1);
        $usuario = $this->db->get('usuarios')->row();

        $senha = $this->encryption->decrypt($usuario->senha);

        if($senha != $oldSenha){
            return false;
        }
        else{
            $this->db->set('senha',$this->encryption->encrypt($newSenha));
            $this->db->where('idUsuarios',$id);
            return $this->db->update('usuarios');    
        }

        
    }

    public function alterarFoto($nome){

        $this->db->set('foto', $nome); 
        $this->db->where('id', $id);
        return $this->db->update('usuarios'); 
    }

    function pesquisar($termo){
         $data = array();
         // buscando clientes
         $this->db->like('nomeCliente',$termo);
         $this->db->limit(5);
         $data['clientes'] = $this->db->get('clientes')->result();

         // buscando os
         $this->db->like('idOs',$termo);
         $this->db->limit(5);
         $data['os'] = $this->db->get('os')->result();

         // buscando produtos
         $this->db->like('descricao',$termo);
         $this->db->limit(5);
         $data['produtos'] = $this->db->get('produtos')->result();

         //buscando serviços
         $this->db->like('nome',$termo);
         $this->db->limit(5);
         $data['servicos'] = $this->db->get('servicos')->result();

         return $data;


    }

    
    function add($table,$data){
        $this->db->insert($table, $data);         
        if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;       
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

    function getOsAbertas(){
        $this->db->select('os.*, clientes.nomeCliente');
        $this->db->from('os');
        $this->db->join('clientes', 'clientes.idClientes = os.clientes_id');
        $this->db->where('os.status','Aberto');
        $this->db->limit(10);
        return $this->db->get()->result();
    }

    function getProdutosMinimo(){

        $sql = "SELECT * FROM produtos WHERE estoque <= estoqueMinimo LIMIT 10"; 
        return $this->db->query($sql)->result();

    }

    function getOsEstatisticas(){
        

        $sql = "SELECT (SELECT count(*) FROM os WHERE status = 'Orçamento' AND MONTH(dataInicial) = MONTH(CURDATE())) as orcamento, 
                    (SELECT count(*) FROM os WHERE status = 'Aberto' AND MONTH(dataInicial) = MONTH(CURDATE())) as aberto,
                    (SELECT count(*) FROM os WHERE status = 'Faturado' AND MONTH(dataInicial) = MONTH(CURDATE())) as faturado,
                    (SELECT count(*) FROM os WHERE status = 'Em Andamento' AND MONTH(dataInicial) = MONTH(CURDATE())) as andamento,
                    (SELECT count(*) FROM os WHERE status = 'Finalizado' AND MONTH(dataInicial) = MONTH(CURDATE())) as finalizado,
                    (SELECT count(*) FROM os WHERE status = 'Cancelado' AND MONTH(dataInicial) = MONTH(CURDATE())) as cancelado";
        return $this->db->query($sql)->result();
    }

    public function getEstatisticasFinanceiro(){
        $sql = "SELECT SUM(CASE WHEN baixado = 1 AND tipo = 'receita' THEN valor END) as total_receita, 
                       SUM(CASE WHEN baixado = 1 AND tipo = 'despesa' THEN valor END) as total_despesa,
                       SUM(CASE WHEN baixado = 0 AND tipo = 'receita' THEN valor END) as total_receita_pendente,
                       SUM(CASE WHEN baixado = 0 AND tipo = 'despesa' THEN valor END) as total_despesa_pendente FROM lancamentos WHERE MONTH(data_vencimento) = MONTH(CURDATE())";
        return $this->db->query($sql)->row();
    }


    public function getEmitente()
    {
        return $this->db->get('emitente')->result();
    }

    public function addEmitente($nome, $cnpj, $ie, $logradouro, $numero, $bairro, $cidade, $uf,$telefone,$email, $logo){
       
       $this->db->set('nome', $nome);
       $this->db->set('cnpj', $cnpj);
       $this->db->set('ie', $ie);
       $this->db->set('rua', $logradouro);
       $this->db->set('numero', $numero);
       $this->db->set('bairro', $bairro);
       $this->db->set('cidade', $cidade);
       $this->db->set('uf', $uf);
       $this->db->set('telefone', $telefone);
       $this->db->set('email', $email);
       $this->db->set('url_logo', $logo);
       return $this->db->insert('emitente');
    }


    public function editEmitente($id, $nome, $cnpj, $ie, $logradouro, $numero, $bairro, $cidade, $uf,$telefone,$email){
        
       $this->db->set('nome', $nome);
       $this->db->set('cnpj', $cnpj);
       $this->db->set('ie', $ie);
       $this->db->set('rua', $logradouro);
       $this->db->set('numero', $numero);
       $this->db->set('bairro', $bairro);
       $this->db->set('cidade', $cidade);
       $this->db->set('uf', $uf);
       $this->db->set('telefone', $telefone);
       $this->db->set('email', $email);
       $this->db->where('id', $id);
       return $this->db->update('emitente');
    }


    public function editLogo($id, $logo){
        
        $this->db->set('url_logo', $logo); 
        $this->db->where('id', $id);
        return $this->db->update('emitente'); 
         
    }

    public function check_credentials($user) {
        $this->db->where('login', $user);
        $this->db->where('situacao', 1);
        $this->db->limit(1);
        return $this->db->get('usuarios')->row();
    }

    public function check_email($email) {
        $this->db->where('email', $email);
        $this->db->limit(1);
        return $this->db->get('usuarios')->row();
    }

    public function gera_codigo($dados = NULL) {
        if ($dados !== NULL) {
            extract ( $dados );
            $this->db->insert ( 'codigos', array (
                'codigo'    => $dados['random'],
                'email'     => $dados['email'],
                'data'      => $dados['date'],
                'ip'        => $dados['ip'],
        ));
        }    
    }

    public function verifica_codigo($codigo){
        $this->db->where('codigo', $codigo);
        $this->db->limit(1);
        return $this->db->get('codigos')->row();
    }

    public function redefinir_senha($senha, $codigos, $email){
        $this->db->set('senha', $senha);
        $this->db->where('email', $email);
        return $this->db->update('usuarios');    
        
    }

    public function excluir_codigo($codigos){
        $this->db->where('codigo', $codigos);
        return $this->db->delete('codigos');
    }

    function addtimeline($timeline){
        $this->db->insert('timeline', $timeline);         
        if ($this->db->affected_rows() == '1')
        {
            return TRUE;
        }
        
        return FALSE;       
    }

    function getBytimeline($id){
        
        $this->db->select('*');
        $this->db->from('timeline');
        $this->db->where('usuario', $id);
        $this->db->order_by('idTimeline','desc');
        $this->db->limit(10);
        
        $query = $this->db->get();
        
        $result =  $query->result();
        return $result;
    }

}