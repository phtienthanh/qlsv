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

            $this->load->model('Mrole');

            $listCg = $this->Mrole->get_all_role();

            $newArray = array();

            if (isset($listCg) && count($listCg) > 0) {

                foreach ($listCg as $listCgKey => $listCgValue) {

                    $newArray[$listCgValue['user_id']] = $this->Mrole->get_name_role($listCgValue['group_id'])['name'];

                }

            }

             $role = $newArray[$id];
  			
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

        $this->data['checklogin'] = $this->ion_auth->logged_in();
	
	}
    
}
