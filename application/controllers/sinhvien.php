
<?php 

if (!defined('BASEPATH')) exit ('No direct script access allowed');  

class Sinhvien extends MY_Controller {

    public function __construct() {
	    
	    parent::__construct();

	    if (!$this->ion_auth->logged_in()) {
			
			redirect('home/index');

		}

		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');

		$this->load->view('home/header',$this->data);

    }

    public function show() {

		if ($this->data['role'] == 'User') {
            
            redirect('home/index');

        }

        $this->load->model('Msinhvien');
		
		$this->data['student'] = $this->Msinhvien->get_all_sinhvien();

		$this->load->view('Sinhvien/show',$this->data);

	}
   
    public function insert() {

		if ($this->data['role'] == 'User') {
            
            redirect('home/index');

        }
        
    	$config['protocol']    = 'smtp';
        
        $config['smtp_host']    = 'ssl://smtp.gmail.com';
        
        $config['smtp_port']    = '465';
        
        $config['smtp_timeout'] = '7';
        
        $config['smtp_user']    = 'doanthi2241@gmail.com';
        
        $config['smtp_pass']    = 'doanthi123';
        
        $config['charset']    = 'utf-8';
        
        $config['newline']    = "\r\n";
        
        $config['mailtype'] = 'text'; 
        
        $config['validation'] = TRUE;   

        $this->email->initialize($config);

        $this->email->from('doanthi2241@gmail.com', 'Ron');

        $this->email->to($this->input->post("email")); 

        $this->email->subject('Email Test');

        $message = "Contact form\n\n";

		$message .= "Last namet : ".$this->input->post("last_name") . "\n";

		$message .= "Email: ".$this->input->post("email") . "\n";

		$message .= "Role: ".$this->input->post("role") . "\n";

        $this->email->message($message); 

        $this->load->model('Msinhvien'); 

		$config['max_size'] = 20480;

		$config['upload_path'] = './medias/student/';

		$config['allowed_types'] = 'gif|jpg|png';

		$this->load->library('upload', $config);
		
		$data = $this->Msinhvien->get_all_sinhvien();

		if ($this->input->post("submit")) {

       		$this->form_validation->set_rules('email','Email','required');

	       	$this->form_validation->set_rules('first_name','First name','required');

	       	$this->form_validation->set_message('required','%s không được bỏ trống');
	       	
	       	$this->form_validation->set_rules('last_name','Last name','required');

	       	$this->form_validation->set_message('valid_email','%s không  được định dạng');

	       	$this->form_validation->set_message('is_unique','%s đã tồn tại');

	       	$this->form_validation->set_message('matches','%s không đ');

	       	$this->form_validation->set_rules('password','Password','required|matches[confirm_password]');

	       	$this->form_validation->set_rules('confirm_password','Confirm password','required');
	       	
	       	$this->form_validation->set_rules('role','Role','required');

	       	$email_exist = $this->Msinhvien->get_exist_email($this->input->post('email'));

	       	if ($email_exist) {
	       		
	       		$this->form_validation->set_rules('email','Email','required|valid_email|is_unique[student.email]');

	       	}

	       	if ($this->input->post("role") == 'Admin' || $this->input->post("role") == 'User' ) {
    		
	    		if ($this->form_validation->run()) {

	    			if ($_FILES['userfile']['name'] == '') {

	    				$list = array(

							"first_name" => $this->input->post("first_name"),
							
							"last_name" => $this->input->post("last_name"),
							
							"email" => $this->input->post("email"),
							
							"password" => $this->input->post("password"),
							
							"avatar" =>	'doanthi.jpg',
							
							"role" => $this->input->post("role"),

							"is_delete" => 0,

							"active" => 1,

						);

						if ($this->Msinhvien->insert($list)) {

							$file_data =  $this->upload->data();

							$this->email->send();

							$success = 'Successfully added new but failed image upload';
							
							$this->data['succes']= $success;
				
						} else {

							$this->data['error'] = array('error' => "add fail");

						} 

	    			} else {

		    			$_FILES['userfile']['name'] = time().substr($_FILES['userfile']['name'], -4);

	    				if (!$this->upload->do_upload()) { 

	    					$success = 'Add new student fail';

							$this->data['succes'] = $success;

						} else {

							$list = array(

								"first_name" => $this->input->post("first_name"),
								
								"last_name" => $this->input->post("last_name"),
								
								"email" => $this->input->post("email"),
								
								"password" => $this->input->post("password"),
								
								"avatar" =>	$_FILES['userfile']['name'],
								
								"role" => $this->input->post("role"),

								"is_delete" => 0,

								"active" => 1,

							);

							if ($this->Msinhvien->insert($list)) {

								$file_data =  $this->upload->data();

								$this->email->send();

								$success = 'Add new student success';

								$this->data['succes'] = $success;

							} else {

								$this->data['error'] = array('error' => "add fail");

							} 
					
						}

		    		}

				}

			} else {

				echo "Role error";

			}
						       
       	} else if ($this->input->post("back")) {

       		redirect('sinhvien/show');   
       			    	
       	}
	
        $this->load->view('sinhvien/insert',$this->data);
   
    }

    public function update($id) {
    	
    	if (isset($id) && count($id) > 0) {
		
			if ($this->data['role'] == 'User') {
	            
	            redirect('home/index');
	        }
	        
	    	if ($this->input->post("change_password")) {

	    		redirect('sinhvien/changepass/'.$id);  
	       	
	       	}
	    
	       	$this->load->model('Msinhvien');
	    
	      	$this->data['student'] = $this->Msinhvien->get_id_sinhvien($id); 
	      	
	      	if ($this->input->post("insert")) {
		
		       	$this->form_validation->set_rules('first_name','First name','required');
	       	
		       	$this->form_validation->set_rules('last_name','Last name','required');
		       	
		       	$this->form_validation->set_rules('email','Email','required');
		       	
		       	$this->form_validation->set_rules('role','Role','required');
	
		       	$this->form_validation->set_message('required','%s không được bỏ trống');
	    
		       	if ($this->form_validation->run()) {
	
		       		if ($_FILES['userfile']['name'] == '') {
	
		       			$list_update = array(
	
							"first_name" => $this->input->post("first_name"),
							
							"last_name" => $this->input->post("last_name"),
	
							"avatar" => $this->input->post("img_name"),
							
							"role" => $this->input->post("role"),
						
						);

						if ($this->Msinhvien->update($id,$list_update)) {
							
							redirect('sinhvien/show'); 

						}

					}

					$config['max_size'] = 20480;
			
					$config['upload_path'] = './medias/student/';

					$config['allowed_types'] = 'gif|jpg|png';

					$this->load->library('upload', $config);

					if ($_FILES['userfile']['name'] == $this->input->post('img_name')) {

						redirect('sinhvien/update/'.$id);

					} else {

						$_FILES['userfile']['name'] = time().substr($_FILES['userfile']['name'], -4);
						
						if (!$this->upload->do_upload()) {

			        		$list_update = array(

								"first_name" => $this->input->post("first_name"),
								
								"last_name" => $this->input->post("last_name"),
		
								"avatar" => $this->input->post("img_name"),
								
								"role" => $this->input->post("role"),
							
							);

							$this->Msinhvien->update($id,$list_update);

							redirect('sinhvien/upload_fail/'.$id);

						} else { 
		       			
							if (file_exists("medias/student/".$this->data['student']['avatar'])) {

								if ($this->data['student']['avatar'] != "doanthi.jpg") {
									
									unlink("medias/student/".$this->data['student']['avatar']);

								}

							}

							$list_update = array(
		
								"first_name" => $this->input->post("first_name"),
								
								"last_name" => $this->input->post("last_name"),
								
								"avatar" => $_FILES['userfile']['name'],
								
								"role" => $this->input->post("role"),
							
							);

				        	if ($this->Msinhvien->update($id,$list_update)) {

				        		if ($this->upload->data()) {

									$data['img'] = base_url().'/images'.$file_data['file_name'];

									redirect('sinhvien/show'); 
				            
				            	}

				        	}				            

			       		}

			       	}

				} 
	
			} else if ($this->input->post("back")) {
		
		       	redirect('sinhvien/show');   
		       			    
			}
	   		
	   		$this->load->view("sinhvien/update",$this->data);
	
	   	} else {

	    	redirect('sinhvien/show');   
    	
    	}

	}

    public function changepass($id) {

    	if (isset($id) && count($id) > 0) {

    		$this->load->model('Msinhvien');

	      	$data = $this->Msinhvien->get_id_sinhvien($id);

	      	if ($this->input->post("change")) {

		    	$this->form_validation->set_rules('old_password','Current password ','required');
		       	
		       	$this->form_validation->set_rules('new_password','New password','required');
		       	
		       	$this->form_validation->set_rules('new_password_confirm','Confirm password ','required|matches[new_password]');

		       	$this->form_validation->set_message('required','%s not be empty');
		       	
		       	$this->form_validation->set_message('matches','%s Incorrect');
	    
		       	if ($this->form_validation->run()) {

		       		if ($data['password'] == $this->input->post("old_password")) {
		       		
		       			$change = array(
		       			
		       				'password' => $this->input->post("new_password"),
		       			
		       			);
		       			
		       			if ($this->Msinhvien->changepass_sinhvien($id,$change)) {
		       					
		       				$change_succes = "Change password succes";

		       			} else {

		       				$change_succes = "Change password fail";

		       			}

		       			$this->data['change_succes'] = $change_succes;
		       		
		       		} else {

	       				$change_succes = "Incorrect password";

	       				$this->data['change_succes'] = $change_succes;

		       		}	
		
				} 
		         
	       	}

   	   		$this->load->view("sinhvien/changepass",$this->data);
    	
    	} else {

    		redirect('sinhvien/show');   

    	}
 
    }	

    public function delete_checkbox() {

		$this->load->model('Msinhvien');

		$dataId = $this->input->post('id');

		$stack = array();

		foreach ($dataId as $key => $val) {

			if ($val != "0") {

				$data = $this->Msinhvien->get_id_sinhvien($val);

				if ($data['role'] == "User") {

					array_push($stack, $data['id']);

				}

			}

		}

		if (count($stack) > 0) {

			foreach ($stack as $key => $value) {

				$data = $this->Msinhvien->get_id_sinhvien($value);

				$list_update = array(	
		
					"is_delete" => 1,
				
				);

				if (file_exists("medias/student/".$data['avatar']) && $data['avatar'] != "doanthi.jpg") {
			        
			        if (unlink("medias/student/".$data['avatar'])) {

			            $this->Msinhvien->delete_checkbox($value,$list_update);    
			        
			        } 
     			
     			} else if (file_exists("medias/student/".$data['avatar']) && $data['avatar'] == "doanthi.jpg") {

     				$this->Msinhvien->delete_checkbox($value,$list_update, $data);    

     			}

			}
				
			$returnData = array(

			   'status' => 1,
			   'data' => $stack,
			   'message' => "Delete !!!",
			
			);

			echo json_encode($returnData);

	   		exit();

		} else {

			$returnData = array(

			   'status' => 0,
			   'data' => null,
			   'message' => "Can't Delete Admin Account !!!",
			   
			);

			echo json_encode($returnData);

			exit();

		} 		

    }  

    public function upload_fail($id) {

    	if (isset($id) && count($id) > 0) {

	 		$this->data['id'] = $id;
	 		
	    	$this->load->view('sinhvien/upload_fail_update',$this->data);
	    	
	    } else {

	    	redirect('sinhvien/show');   

	    }

    } 
   
}

