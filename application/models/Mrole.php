<?php 
 
class Mrole extends CI_Model {

	protected $table = 'users_groups';

	public function get_role($id){

	    $this->load->database();

        $this->db->where("id",$id);

        return $this->db->get($this->table)->row_array();

	}

	public function get_name_role($id){

	    $this->load->database();

        $this->db->where("id",$id);

        return $this->db->get("groups")->row_array();

	}

}