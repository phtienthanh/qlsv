<?php 
 
class Msinhvien extends CI_Model {
 
    protected $table = 'student';

    public function get_all() {
    
        $query = $this->db->get('student');
    
        $ar = $query->result_array();

        return $ar;

    }

    public function insert($data) {

    	$this->load->database();

        if($this->db->insert($this->table, $data)) {

            return true;
        
        } else {

            return false;
        
        }
    
    }
     
    public function delete($id) {
     	
     	$this->load->database();
     	
        $this->db->where("id",$id);
    
    	$this->db->delete($this->table);

    }

    public function update($id,$data) {
       
        $this->load->database();
        
        $this->db->where("id",$id);
         
        $this->db->update($this->table, $data);

    }
    
    public function get_sinhvien($id) {
        
        $this->load->database();

        $this->db->where("id",$id);

        return $this->db->get($this->table)->row_array();

    }

    public function changepass($id,$data) {

        $this->load->database();
        
        $this->db->where("id",$id);
         
        $this->db->update($this->table, $data);
      
    }

    public function delete_multiple($id) {
        
        $this->load->database();
        
        $this->db->where("id",$id);

        $db = $this->db->delete($this->table);

        return $db;
    
    }

    public function login($email,$password) {
            
        $this->load->database();

        $this->db->select();
        
        $this->db->where('email',$email);
        
        $this->db->where('password',$password);
       
        $query = $this->db->get($this->table);           
        
        if($query->num_rows() == 1) {
             
            return $query->result();
            
        } else {
                 
            return false;
                
        }
    
    }  

    public function delete_checkbox($id,$data) {
        
        $this->load->database();
        
        $this->db->where("id",$id);

        $this->db->update($this->table,$data);
    
    }
    public function forget($email) {

        $this->load->database();
        
        $this->db->where("delete_is",0);

        $this->db->where("email",$email);

        $query = $this->db->get($this->table);           
        
        if($query->num_rows() == 1) {
             
            return $query->result();
            
        } else {
                 
            return false;
                
        }

    }

    public function update_forget($id,$data) {
       
        $this->load->database();
        
        $this->db->where("id",$id);
         
        $forget = $this->db->update($this->table, $data);

        if ($forget) {

            return true;

        } else {

            return flase;
        
        }

    }

        public function forget_tk($token) {

            $this->load->database();

            $this->db->where("token",$token);

            $query = $this->db->get($this->table);         
        
            if($query->num_rows() == 1) {
             
            return $query->result();
            
        } else {
                 
            return false;
                
        }

    }

}

?>
