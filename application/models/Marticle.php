<?php 
 
class Marticle extends CI_Model {
 
    protected $table = 'article';
    
    public function get_all() {

        $this->db->order_by("id","desc");
    
        $query = $this->db->get('article');
      
        $ar = $query->result_array();

        return $ar;

    }

    public function insert($data) {

    	$this->load->database();
     	
     	$this->db->insert($this->table, $data);
    }

    public function get_article($id) {
        
        $this->load->database();

        $this->db->where("id",$id);

        return $this->db->get($this->table)->row_array();

    }

    public function get__slug_article($slug) {
        
        $this->load->database();

        $this->db->where("slug",$slug);

        return $this->db->get($this->table)->row_array();

    }

    public function get_delete_article($slug) {
        
        $this->load->database();

        $this->db->where("slug",$slug);

        $this->db->where("delete_is",0);

        return $this->db->get($this->table)->row_array();

    }

    public function update($id,$data) {
       
        $this->load->database();
        
        $this->db->where("id",$id);
         
        $this->db->update($this->table, $data);

    }

    public function update1($slug,$data) {
       
        $this->load->database();
        
        $this->db->where("slug",$slug);
         
        $this->db->update($this->table, $data);

    }

    public function delete($id) {
     	
     	$this->load->database();
     	
        $this->db->where("id",$id);
    
    	$this->db->delete($this->table);

    }

    public function delete_multiple($id) {
        
        $this->load->database();
        
        $this->db->where("id",$id);

        $db = $this->db->update($this->table);

        return $db;

    }

     public function delete_checkbox($id,$data) {
        
        $this->load->database();
        
        $this->db->where("id",$id);

        $this->db->update($this->table,$data);
    
    }

}

?>
