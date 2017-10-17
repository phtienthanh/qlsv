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

            $this->data['AdminPr'] = false;

            $this->data['MemberPr'] = false;
             
            $this->data['UserPr'] = false;

            $listRoler = $this->Mrole->get_role_groups($id);

            foreach ($listRoler as $keyListRole => $valListRole) {

                if ($valListRole['group_id'] == '1') {

                    $this->data['AdminPr'] = true;
                        
                }

                if ($valListRole['group_id'] == '2') {

                    $this->data['MemberPr'] = true;
                    
                }

                if ($valListRole['group_id'] == '3') {

                    $this->data['UserPr'] = true;
                    
                }

            }
  			
            $first_name = $userInfo->first_name;
  			
            $email = $userInfo->email;
  			
            $last_name = $userInfo->last_name;
  			
            $password = $userInfo->password;

			$avatar = $userInfo->avatar;
            
            $this->data['id'] = $id;
  			
            $this->data['first_name'] = $first_name;
  			
            $this->data['email'] = $email;
  			
            $this->data['last_name'] = $last_name;
  			
            $this->data['password'] = $password;
  			
            $this->data['avatar'] = $avatar; 
      
		}

        $this->data['checkLogin'] = $this->ion_auth->logged_in();
	
	}
    
}
