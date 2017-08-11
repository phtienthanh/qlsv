<?php 

if (!defined('BASEPATH')) exit ('No direct script access allowed');  

class MY_Controller extends CI_Controller {

	var $data;
	
    public function __construct() {
	    
	    parent::__construct();

	    $this->load->library('ion_auth');

		if ($this->ion_auth->logged_in() == true) {

			      $userInfo = $this->ion_auth->user()->row();
            
            $id = $userInfo->id;
  			
            $role = $userInfo->role;
  			
            $first_name = $userInfo->first_name;
  			
            $email = $userInfo->email;
  			
            $last_name = $userInfo->last_name;
  			
            $password = $userInfo->password;

			      $avatar = $userInfo->avatar;

            $first_login = $userInfo->first_login;
            
            $this->data['id']=$id;
  			
            $this->data['role']=$role;
  			
            $this->data['first_name']=$first_name;
  			
            $this->data['email']=$email;
  			
            $this->data['last_name']=$last_name;
  			
            $this->data['password']=$password;
  			
            $this->data['avatar']=$avatar; 

            $this->data['first_login']=$first_login; 
            
		}
	
	}
    
}
