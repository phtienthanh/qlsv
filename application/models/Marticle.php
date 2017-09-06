<?php 
 
class Marticle extends CI_Model {
 
    protected $table = 'article';
    
    public function get_all_article() {

        $this->db->order_by("id","desc");
    
        $query = $this->db->get('article');
      
        $ar = $query->result_array();

        return $ar;

    }

    public function show_article($perpage,$offset,$title) {

        if (isset($perpage) && count($perpage) > 0) {

            $this->db->order_by("id","desc");

            $this->db->limit($perpage, $offset);

            $this->db->where('title LIKE', "%".$title."%");
        
            $query = $this->db->get('article');
          
            $ar = $query->result_array();

            return $ar;

        } else {

            return false;

        } 

    }

    public function show_all_article($perpage, $offset) {

        if (isset($perpage) && count($perpage) > 0) {

            $this->db->order_by("id","desc");

            $this->db->where('is_deleted',"0");

            $this->db->limit($perpage, $offset);
        
            $query = $this->db->get('article');
          
            $ar = $query->result_array();

            return $ar;

        } else {

            return false;

        } 

    }

    public function show_number_title_article($title) {

        if (isset($title) && count($title) > 0) {

            $this->db->where('title LIKE',"%".$title."%");

            $this->db->where('is_deleted',0);
        
            $query = $this->db->get('article');
        
            return  $query->num_rows();

        } else {

            return false;

        } 

    }

    public function show_number_article() {

        $this->db->where('is_deleted', '0');
    
        $query = $this->db->get('article');
    
        return  $query->num_rows();

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

            $this->db->where("is_deleted",0);

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