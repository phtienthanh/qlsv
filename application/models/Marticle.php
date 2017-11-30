<?php 
 
class Marticle extends CI_Model {
 
    protected $table = 'article';
    
    public function get_all_article() {

        $this->db->order_by('id', 'desc');
        
        $this->db->where('is_deleted', 0);
    
        $query = $this->db->get('article');
      
        $ar = $query->result_array();

        return $ar;

    }

    public function show_article($perpage, $offset, $title='') {

        if (isset($perpage) && count($perpage) > 0) {

            $this->db->order_by('id', 'desc');

            $this->db->limit($perpage, $offset);

            $this->db->where('is_deleted', 0);

            if (isset($title) && count($title) > 0) {

                $this->db->where('title LIKE', '%'.$title.'%');

            }
        
            $query = $this->db->get('article');
          
            $ar = $query->result_array();

            return $ar;

        } else {

            return false;

        } 

    }

    public function show_number_title_article($title='') {

        if (isset($title) && count($title) > 0) {

            $this->db->where('title LIKE', '%'.$title.'%');

        }

        $this->db->where('is_deleted', 0);
        
        $query = $this->db->get('article');
        
        return $query->num_rows();

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

    public function get_article($element, $data) {

        if (isset($element) && count($element) > 0) {
            
            $this->load->database();

            $this->db->where($element, $data);
            
            $this->db->where('is_deleted', 0);

            return $this->db->get($this->table)->row_array();

        } else {

            return false;

        }

    }

    public function update_article($element,$id, $data) {

        if (isset($element) && count($element) > 0) {
       
            $this->load->database();
            
            $this->db->where($element, $id);
             
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