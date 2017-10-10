<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Conecte_model extends CI_Model {

    /**
     * author: Ramon Silva 
     * email: silva018-mg@yahoo.com.br
     * 
     */
    
    function add($table,$data,$returnId = false){
        $this->db->insert($table, $data);
        if ($this->db->affected_rows() == '1')
        {
            if($returnId == true){
                return $this->db->insert_id($table);
            }
            return TRUE;
        }

        return FALSE;
    }

    public function getLastOs($cliente){
        
        $this->db->where('clientes_id',$cliente);
        $this->db->limit(5);

        return $this->db->get('os')->result();
    }   

    public function getLastCompras($cliente){
        
        $this->db->select('vendas.*,usuarios.nome');
        $this->db->from('vendas');
        $this->db->join('usuarios', 'usuarios.idUsuarios = vendas.usuarios_id');
        $this->db->where('clientes_id',$cliente);
        $this->db->limit(5);

        return $this->db->get()->result();
    }


    public function getCompras($table,$fields,$where='',$perpage=0,$start=0,$one=false,$array='array',$cliente){
        
        $this->db->select($fields);
        $this->db->from($table);
        $this->db->join('usuarios', 'vendas.usuarios_id = usuarios.idUsuarios', 'left');
        $this->db->where('clientes_id', $cliente);
        $this->db->limit($perpage,$start);
        if($where){
            $this->db->where($where);
        }
        
        $query = $this->db->get();
        
        $result =  !$one  ? $query->result() : $query->row();
        return $result;
    }


    public function getOs($table,$fields,$where='',$perpage=0,$start=0,$one=false,$array='array',$cliente){
        
        $this->db->select($fields);
        $this->db->from($table);
        $this->db->join('usuarios', 'os.usuarios_id = usuarios.idUsuarios', 'left');
        $this->db->where('clientes_id', $cliente);
        $this->db->limit($perpage,$start);
        $this->db->order_by('idOs', 'desc');
        if($where){
            $this->db->where($where);
        }
        
        $query = $this->db->get();
        
        $result =  !$one  ? $query->result() : $query->row();
        return $result;
    }

    public function count($table,$cliente){
        $this->db->where('clientes_id', $cliente);
        return $this->db->count_all_results($table);
    }

    public function getDados(){
        
        $this->db->where('idclientes',$this->session->userdata('cliente_id'));
        $this->db->limit(1);
        return $this->db->get('clientes')->row();
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

}

/* End of file conecte_model.php */
/* Location: ./application/models/conecte_model.php */