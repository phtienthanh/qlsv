<?php 
 
class Msinhvien extends CI_Model {
 
    protected $table = 'users';

    public function get_all_sinhvien($order=null) {

        $this->db->order_by('id', $order);
    
        $query = $this->db->get('users');
    
        $ar = $query->result_array();

        return $ar;

    }

    public function insert($data) {

        if (isset($data) && count($data) > 0) {

        	$this->load->database();

            if ($this->db->insert($this->table, $data)) {

                return true;
            
            } else {

                return false;
            
            }

        } else {

            return false;
            
        }
    
    }

    public function update($id, $data) {

        if (isset($id) && count($id) > 0) {
           
            $this->load->database();
            
            $this->db->where("id", $id);
             
            if ($this->db->update($this->table, $data)) {

                return true;

            } else {

                return flase;

            }

        } else {

            return false;
            
        }

    }
    
    public function get_data_sinhvien($element, $data) {

        if (isset($data) && count($data) > 0) {
        
            $this->load->database();

            $this->db->where($element, $data);

            $this->db->where("is_deleted", 0);

            return $this->db->get($this->table)->row_array();

        } else {

            return false;
            
        }

    }

}

?>
