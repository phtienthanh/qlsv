<?php 
 
class Marticle extends CI_Model {
 
    protected $table = 'article';
    
    public function get_all() {
    
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

    public function update($id,$data) {
       
        $this->load->database();
        
        $this->db->where("id",$id);
         
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

        $db = $this->db->delete($this->table);

        return $db;

    }

}

?>
