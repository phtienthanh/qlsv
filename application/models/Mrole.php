<?php 
 
class Mrole extends CI_Model {

	protected $table = 'users_groups';

    public function get_all_table($tables) {

        $this->db->order_by('id', 'desc');
    
        $query = $this->db->get($tables);
    
        $ar = $query->result_array();

        return $ar;

    }

    public function get_role_groups($id) {

        if (isset($id) && count($id) > 0) {

            $this->load->database();

            $this->db->where('user_id', $id);

            return $this->db->get($this->table)->result_array();

        } else {

            return false;
            
        }

    }

}