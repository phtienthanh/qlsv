<?php 
 
class Msinhvien extends CI_Model {
 
    protected $table = 'users';

    public function get_all_sinhvien() {

        $this->db->order_by('id', 'desc');
    
        $query = $this->db->get('users');
    
        $ar = $query->result_array();

        return $ar;

    }

     public function get_sinhvienEsc() {

        $this->db->order_by('id', 'esc');
    
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
    
    public function get_id_sinhvien($id) {

        if (isset($id) && count($id) > 0) {
        
            $this->load->database();

            $this->db->where("id", $id);

            return $this->db->get($this->table)->row_array();

        } else {

            return false;
            
        }

    }

    public function changepass_sinhvien($id, $data) {

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

    public function delete_checkbox($id, $data) {

        if (isset($id) && count($id) > 0) {
        
            $this->load->database();
            
            $this->db->where("id", $id);

            $this->db->update($this->table, $data);

        } else {
                 
            return false;
                
        }
    
    }
    
    public function forget_password($email) {

        if (isset($email) && count($email) > 0) {

            $this->load->database();
            
            $this->db->where("is_deleted", 0);

            $this->db->where("email", $email);

            $query = $this->db->get($this->table);           
            
            if ($query->num_rows() == 1) {
                 
                return $query->result_array();
                
            } else {
                     
                return false;
                    
            }

        } else {
                 
            return false;
                
        }

    }

    public function update_forget($id, $data) {

        if (isset($id) && count($id) > 0) {
       
            $this->load->database();
            
            $this->db->where("id", $id);
             
            $forget = $this->db->update($this->table, $data);

            if ($forget) {

                return true;

            } else {

                return flase;
            
            }

        } else {

            return flase;
        
        }

    }

    public function forget_tk($token) {

        if (isset($token) && count($token) > 0) {

            $this->load->database();

            $this->db->where("token", $token);

            $query = $this->db->get($this->table);         
        
            if ($query->num_rows() == 1) {
             
                return $query->row_array();
            
            } else {
                     
                return false;
                    
            }

        } else {
                 
            return false;
                
        }

    }

    public function get_exist_email($email) {

        if (isset($email) && count($email) > 0) {

            $this->load->database();

            $this->db->where("email", $email);

            $this->db->where("is_deleted", '0');

            $query = $this->db->get('users');    
        
            if ($query->num_rows() > 1) {
             
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
