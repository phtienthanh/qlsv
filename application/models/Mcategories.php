<?php 
 
class Mcategories extends CI_Model {
 
    protected $table = 'categories';

    public function get_all_categories() {
    
        $query = $this->db->get('categories');
    
        $ar = $query->result_array();

        return $ar;

    }

    public function get_categories($element, $data) {

        if (isset($data) && count($data) > 0) {
           
            $this->load->database();

            $this->db->where($element, $data);

            $this->db->where('is_deleted', 0);

            return $this->db->get($this->table)->result_array();

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
            
            $this->db->where('id', $id);

            if ($this->db->update($this->table, $data)) {

                return true;

            } else {

                return flase;

            }

        } else {

            return false;

        }
    
    }

}

?>