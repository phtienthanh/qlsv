<?php 
 
class Mrole extends CI_Model {

	protected $table = 'users_groups';

	public function get_all_role() {

  		$this->db->order_by('id', 'desc');
    
        $query = $this->db->get('users_groups');
    
        $ar = $query->result_array();

        return $ar;

	}

	public function get_role($id){

	    $this->load->database();

        $this->db->where("id", $id);

        return $this->db->get($this->table)->row_array();

	}

    public function get_role_groups($id){

        $this->load->database();

        $this->db->where("user_id", $id);

        return $this->db->get($this->table)->result_array();

    }

	public function get_name_role($id){

	    $this->load->database();

        $this->db->where("id", $id);

        return $this->db->get("groups")->row_array();

	}

	public function get_all_group() {

  		$this->db->order_by('id', 'desc');
    
        $query = $this->db->get('groups');
    
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

}