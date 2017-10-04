<?php 
 
class Mcategories extends CI_Model {
 
    protected $table = 'categories';

    public function get_all_categories() {

        $this->db->order_by("id", "desc");
    
        $query = $this->db->get('categories');
    
        $ar = $query->result_array();

        return $ar;

    }

    public function get_id_categories($id) {

        if (isset($id) && count($id) > 0) {
           
            $this->load->database();

            $this->db->where("id", $id);

            return $this->db->get($this->table)->row_array();

        } else {

            return false;

        }
        
    }

    public function get_exist_categories($name) {

        if (isset($name) && count($name) > 0) {
           
            $this->load->database();

            $this->db->where("name", $name);

            $this->db->where("is_deleted", 0);

            return $this->db->get($this->table)->row_array();

        } else {

            return false;

        }
        
    }
    
    public function insert($data) {

        if (isset($data) && count($data) > 0) {

            $this->load->database();
            
            if ($this->db->insert($this->table, $data)) {
              
                return true;

            } else {

                return flase;

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
    
     public function delete_checkbox($id,$data) {

        if (isset($id) && count($id) > 0) {
        
            $this->load->database();
            
            $this->db->where("id", $id);

            if ($this->db->update($this->table, $data)) {
                
                return true;

            } else {

                return false;
                
            }

        } else {

            return false;

        }
    
    }

}

?>