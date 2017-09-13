<?php 

if (!defined('BASEPATH')) exit ('No direct script access allowed');  

class MY_Controller extends CI_Controller {

	var $data;
	
    public function __construct() {
	    
	    parent::__construct();

	    $this->load->library('ion_auth');

		if ($this->ion_auth->logged_in() == true) {

            $this->load->model('Mrole');

            

			      $userInfo = $this->ion_auth->user()->row();

            // var_dump( $userInfo);
            
            $id = $userInfo->id;

            $data = $this->Mrole->get_role($userInfo->id); 

            $id_role =  $this->Mrole->get_name_role($data['group_id']);
  			
            $role = $id_role['name'];
  			
            $first_name = $userInfo->first_name;
  			
            $email = $userInfo->email;
  			
            $last_name = $userInfo->last_name;
  			
            $password = $userInfo->password;

			      $avatar = $userInfo->avatar;
            
            $this->data['id']=$id;
  			
            $this->data['role']=$role;
  			
            $this->data['first_name']=$first_name;
  			
            $this->data['email']=$email;
  			
            $this->data['last_name']=$last_name;
  			
            $this->data['password']=$password;
  			
            $this->data['avatar']=$avatar; 
            
		}
	
	}
    
}
