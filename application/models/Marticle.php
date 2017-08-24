<?php 
 
class Marticle extends CI_Model {
 
    protected $table = 'article';
    
    public function get_all_article() {

        $this->db->order_by("id","desc");
    
        $query = $this->db->get('article');
      
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

    public function get_article($id) {

        if (isset($id) && count($id) > 0) {
            
            $this->load->database();

            $this->db->where("id",$id);

            return $this->db->get($this->table)->row_array();

        } else {

            return false;

        }

    }

    public function get_slug_article($slug) {

        if (isset($slug) && count($slug) > 0) {
        
            $this->load->database();

            $this->db->where("slug",$slug);

            return $this->db->get($this->table)->row_array();

        } else {

            return false;

        }

    }

    public function get_delete_article($slug) {

        if (isset($slug) && count($slug) > 0) {
        
            $this->load->database();

            $this->db->where("slug",$slug);

            $this->db->where("delete_is",0);

            return $this->db->get($this->table)->row_array();

        } else {

            return false;

        }

    }

    public function update($id,$data) {

        if (isset($id) && count($id) > 0) {
       
            $this->load->database();
            
            $this->db->where("id",$id);
             
            if ($this->db->update($this->table, $data)) {
               
                return true;

            } else {

                return false;

            }

        } else {

            return false;

        }

    }

    public function update_slug_article($slug,$data) {

        if (isset($slug) && count($slug) > 0) {
       
            $this->load->database();
            
            $this->db->where("slug",$slug);
             
            if ($this->db->update($this->table, $data)) {
                
                return true;

            } else {

                return false;

            }

        } else {

            return false;

        }

    }

    public function delete_checkbox($id,$data) {

        if (isset($id) && count($id) > 0) {
        
            $this->load->database();
            
            $this->db->where("id",$id);

            if ($this->db->update($this->table,$data)) {
                
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
