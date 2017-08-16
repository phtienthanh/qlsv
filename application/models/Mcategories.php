<?php 
 
class Mcategories extends CI_Model {
 
    protected $table = 'categories';

    public function get_all() {
    
        $query = $this->db->get('categories');
    
        $ar = $query->result_array();

        return $ar;

    }

    public function get_categories($id) {
        
        $this->load->database();

        $this->db->where("id",$id);

        return $this->db->get($this->table)->row_array();

    }
    
    public function insert($data) {

        $this->load->database();
        
        $this->db->insert($this->table, $data);
    
    }

    public function update($id,$data) {

        $this->load->database();
        
        $this->db->where("id",$id);

        $this->db->update($this->table, $data);
    
    }
    
     public function delete_checkbox($id,$data) {
        
        $this->load->database();
        
        $this->db->where("id",$id);

        if ($this->db->update($this->table,$data)) {
            
            return true;

        } else {

            return false;
            
        }
    
    }

}

?>
