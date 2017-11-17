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

		$this->load->view('home/header', $this->data);

    }

    public function show() {

    	if ($this->data['UserPr'] == true && $this->data['AdminPr'] == false && $this->data['MemberPr'] == false ) {
            
            redirect('home/index');

        }
  
        $this->load->model('Mrole');

        $listUserGroup = $this->Mrole->get_all_role();

        $listRole = $this->Mrole->get_all_group();

        $listGroup = array();

        if (count($listRole) > 0) {

        	foreach ($listRole as $keyListRole => $valueListRole) {

        		$listGroup[$valueListRole['id']] = $valueListRole['name'];
        		
        	}

        }

        $this->data['newArray'] = $listGroup;

		$this->data['role'] = $listUserGroup;

		$this->load->model('Msinhvien');
		
		$this->data['student'] = $this->Msinhvien->get_all_sinhvien();

		$this->load->view('Sinhvien/show', $this->data);

	}

    public function create_user() {

       	if ($this->data['AdminPr'] == false) {
            
            redirect('home/index');

        }

        $this->load->model('Mrole');

        $listRole = $this->Mrole->get_all_group();

		$listGroup = array();

        if (count($listRole) > 0) {

        	foreach ($listRole as $keylistRole => $vallistRole) {

        		if ($this->input->post($vallistRole['id']) == $vallistRole['id'] ) {

	        		$listGroup[] = $this->input->post($vallistRole['id']);

	        	}

	        }

        }

        $roleAdmin = "";
        
        $roleMembers = "";

        $roleUser = "";

        foreach ($listGroup as $keyListGroup => $valListGroup) {

        	if ($valListGroup == '1') {

                $roleAdmin = "Admin ,";
                        
                }

            if ($valListGroup == '2') {

                $roleMembers = "Members ,";
                
            }

            if ($valListGroup == '3') {

                $roleUser = "User";
                
            }

        }

		$config['max_size'] = 20480;

		$config['upload_path'] = './medias/student/';

		$config['allowed_types'] = 'gif|jpg|png';

		$this->load->library('upload', $config);

		$config['protocol'] = 'smtp';
	        
        $config['smtp_host'] = 'ssl://smtp.gmail.com';
        
        $config['smtp_port'] = '465';
        
        $config['smtp_timeout'] = '7';
        
        $config['smtp_user'] = 'doanthi2241@gmail.com';
        
        $config['smtp_pass'] = 'doanthi123';
        
        $config['charset'] = 'utf-8';
        
        $config['newline'] = "\r\n";
        
        $config['mailtype'] = 'text'; 
        
        $config['validation'] = TRUE;   

        $this->email->initialize($config);

        $this->email->from('doanthi2241@gmail.com', 'Ron');

        $this->email->to($this->input->post("email")); 

        $this->email->subject('Add student');

        $message = "ADD NEW STUDENT"."\n";

        $message .= "--------------------------"."\n\n";

        $message .= "Account completed to create\n";

        $message .= "First name : ".$this->input->post("first_name")."\n";

		$message .= "Last name : ".$this->input->post("last_name")."\n";

		$message .= "Email: ".$this->input->post("email")."\n";

		$message .= "Password: ".$this->input->post("password")."\n";

		$message .= "Role: ".$roleAdmin.$roleMembers.$roleUser."\n";

        $this->email->message($message); 

        $this->session->set_flashdata('message', $this->ion_auth->messages());

        $tables = $this->config->item('tables', 'ion_auth');

        $identity_column = $this->config->item('identity', 'ion_auth');

        $this->data['role'] = $this->Mrole->get_all_group(); 

        $this->data['identity_column'] = $identity_column;
        
        if($identity_column !== 'email') {

            $this->form_validation->set_rules('identity', $this->lang->line('create_user_validation_identity_label'),'required|is_unique['.$tables['users'].'.'.$identity_column.']');
            
            $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email');
        
        } else {

            $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email|is_unique['.$tables['users'].'.email]');

        }
      
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[30]|matches[password_confirm]');

        $this->form_validation->set_rules('password_confirm', 'password confirm', 'required|min_length[6]|max_length[30]');

        $this->form_validation->set_message('detail', '%s does not match password confirm');

        if ($this->form_validation->run() == true) {

        	if ($this->input->post('1') || $this->input->post('2') || $this->input->post('3')) {
	        
	            $email = strtolower($this->input->post('email'));

	            $identity = $this->input->post('Username');

	            $password = $this->input->post('password');

	            if ($_FILES['userfile']['name'] == '') {

			        $listCreate = array(
			        	
			            'first_name' => $this->input->post('first_name'),
			            'last_name'  => $this->input->post('last_name'),
			            'avatar' => "doanthi.jpg",
			            'is_deleted' => 0

			        );
						
			        if ($this->ion_auth->register($identity, $password, $email, $listCreate, $listGroup)) {

			        	if ($this->email->send()) {

			        		$this->session->set_flashdata('message_update', '<div class="succes">Add new student success<button type="button" class="close" data-dismiss="alert">×</button></div>');

							redirect('sinhvien/show'); 
			        		
			        	} else {

							$this->session->set_flashdata('message_update', '<div class="fail">Add new student success but error sending mail<button type="button" class="close" data-dismiss="alert">×</button></div>');

							redirect('sinhvien/show');

			        	}

			        }

	        	} else {

					$listCreate = array(

			            'first_name' => $this->input->post('first_name'),
			            'last_name' => $this->input->post('last_name'),
			            'avatar' => $_FILES['userfile']['name'],
			            'is_deleted' => 0

		        	);		
		
		        	if (!$this->upload->do_upload()) { 

						$this->session->set_flashdata('message_update', '<div class="succes">Add new student fail<button type="button" class="close" data-dismiss="alert">×</button></div>');

						redirect('sinhvien/show'); 

					} else {
			    	
			        	if ($this->ion_auth->register($identity, $password, $email, $listCreate, $listGroup)) {

				        	if ($this->email->send()) {

				        		$this->session->set_flashdata('message_update', '<div class="succes">Add new student success<button type="button" class="close" data-dismiss="alert">×</button></div>');

								redirect('sinhvien/show'); 
				        		
				        	} else {

								$this->session->set_flashdata('message_update', '<div class="fail">Add new student success but error sending mail<button type="button" class="close" data-dismiss="alert">×</button></div>');

								redirect('sinhvien/show');
								 
				        	} 

			        	}

			   		}

	        	}

	        } else {

				$this->session->set_flashdata('message_update', '<div class="fail">Please select a role<button type="button" class="close" data-dismiss="alert">×</button></div>');

				redirect('sinhvien/create_user');

	        }
        	
    	} else {

            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

            $this->data['first_name'] = array(
            
                'name'  => 'first_name',
                'id'    => 'first_name',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('first_name')
            
            );
            
            $this->data['last_name'] = array(
            
                'name'  => 'last_name',
                'id'    => 'last_name',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('last_name')
            
            );
                    
            $this->data['email'] = array(
            
                'name'  => 'email',
                'id'    => 'email',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('email')
            
            );
            
            $this->data['password'] = array(
            
                'name'  => 'password',
                'id'    => 'password',
                'type'  => 'password',
                'value' => $this->form_validation->set_value('password')
            );
            
            $this->data['password_confirm'] = array(
            
                'name'  => 'password_confirm',
                'id'    => 'password_confirm',
                'type'  => 'password',
                'value' => $this->form_validation->set_value('password_confirm')
            
            );

           	$this->load->view('sinhvien/insert', $this->data);

        }

    }

    public function update($id) {
    	
    	if (isset($id) && count($id) > 0) {

    		$this->load->model('Msinhvien');
	    
	    	$checkId = $this->Msinhvien->get_id_sinhvien($id); 

    		if (count($checkId) > 0) {

				if ($this->data['AdminPr'] == false) {
            
            		redirect('home/index');

        		}
		        
		    	if ($this->input->post("change_password")) {

		    		redirect('sinhvien/changepass/'.$id);  
		       	
		       	}

		       	$this->load->model('Mrole');

		       	$listRole = $this->Mrole->get_all_group();

				$listUserGroup = array();

				$listIdgroup = array();

				$getListGroup = $this->ion_auth->get_users_groups($id)->result();

				if (count($getListGroup) > 0) {
					
					foreach ($getListGroup as $keyGetListGroup => $valGetListGroup) {

					$listUserGroup[] = $valGetListGroup->name;

					$listIdgroup[] = $valGetListGroup->id;
					
					}

				}

		      	$this->data['student'] = $this->Msinhvien->get_id_sinhvien($id); 
		      	
		      	if ($this->input->post("insert")) {
			       	
			       	$this->form_validation->set_rules('email', 'Email', 'required');
		
			       	$this->form_validation->set_message('required', '%s not be empty ');
		    
			       	if ($this->form_validation->run()) {
		
			       		if ($_FILES['userfile']['name'] == '') {
		
			       			$listUpdate = array(
		
								"first_name" => $this->input->post("first_name"),
								
								"last_name" => $this->input->post("last_name"),

								"username" => $this->input->post("username"),
		
								"avatar" => $this->input->post("img_name")
							
							);

						if ($this->Msinhvien->update($id, $listUpdate)) {

							$listRole = $this->Mrole->get_all_group();

			         		if (count($listRole) > 0) {

			         			$listGroup = array();

			        			foreach ($listRole as $keylistRole => $vallistRole) {
			        				
			        				if ($this->input->post($vallistRole['id']) == $vallistRole['id']) {

				        				$listGroup[] = $this->input->post($vallistRole['id']);

						        	}

						        }

						        if (count($listGroup) > 0) {

									$this->ion_auth_model->remove_from_group($listIdgroup, $id);
						
						        	$this->ion_auth_model->add_to_group($listGroup, $id);
						        
						        } else {

						        	$this->session->set_flashdata('message_update', '<div class="fail">Please select a role<button type="button" class="close" data-dismiss="alert">×</button></div>');

									redirect('sinhvien/update/'.$id); 

						        }

					        } else {

					        	$this->session->set_flashdata('message_update', '<div class="fail"> Update success<button type="button" class="close" data-dismiss="alert">×</button></div>');

								redirect('sinhvien/update/'.$id);
					        	
					        }
								
								$this->session->set_flashdata('message_update', '<div class="succes"> Update success<button type="button" class="close" data-dismiss="alert">×</button></div>');

								redirect('sinhvien/update/'.$id); 

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

				        		$listUpdate = array(

									"first_name" => $this->input->post("first_name"),
									
									"last_name" => $this->input->post("last_name"),
			
									"avatar" => $this->input->post("img_name")
								
								);

								$this->session->set_flashdata('message_update', '<div class="succes fail"> Update fail<button type="button" class="close" data-dismiss="alert">×</button></div>');

								redirect('sinhvien/update/'.$id);

							} else { 
			       			
								if (file_exists("medias/student/".$this->data['student']['avatar'])) {

									if ($this->data['student']['avatar'] != "doanthi.jpg") {
										
										unlink("medias/student/".$this->data['student']['avatar']);

									}

								}

								$listUpdate = array(
			
									"first_name" => $this->input->post("first_name"),
									
									"last_name" => $this->input->post("last_name"),
									
									"avatar" => $_FILES['userfile']['name']
								
								);

					        	if ($this->Msinhvien->update($id, $listUpdate)) {

						        	$listRole = $this->Mrole->get_all_group();

									if (count($listGr) > 0) {

					         			$listGroup = array();

					        			foreach ($listRole as $keyListRole => $valListRole) {
					        				
					        				if ($this->input->post($valListGr['id']) == $valListGr['id']) {

						        				$listGroup[] = $this->input->post($valListGr['id']);

								        	}

								        }

								        if (count($listGroup) > 0) {

											$this->ion_auth_model->remove_from_group($listIdgroup, $id);
								
								        	$this->ion_auth_model->add_to_group($listGroup, $id);
								        
								        } else {

								        	$this->session->set_flashdata('message_update', '<div class="succes fail">Please select a role<button type="button" class="close" data-dismiss="alert">×</button></div>');

											redirect('sinhvien/update/'.$id); 

								        }

							        } else {

							        	$this->session->set_flashdata('message_update', '<div class="succes fail">Please select a role<button type="button" class="close" data-dismiss="alert">×</button></div>');

										redirect('sinhvien/update/'.$id);
							        	
							        }

					        		if ($this->upload->data()) {

										$data['img'] = base_url().'/images'.$file_data['file_name'];

										$this->session->set_flashdata('message_update', '<div class="succes"> Update succes<button type="button" class="close" data-dismiss="alert">×</button></div>');

										redirect('sinhvien/update/'.$id); 
					            
					            	}

					        	}				            

				       		}

				       	}

					} 
	    		
	    		} 

			} else {

	    		redirect('sinhvien/show');   
    	
    		}

			$this->data['roleUpdate'] = $listRole;

			$this->data['UserGroup'] = $listUserGroup;	
	   		
	   		$this->load->view("sinhvien/update", $this->data);
	
	   	} else {

	    	redirect('sinhvien/show');   
    	
    	}

	}

    public function changepass($id) {
	
    	if (isset($id) && count($id) > 0) {

    		$this->load->model('Msinhvien');
	    
	    	$checkId = $this->Msinhvien->get_id_sinhvien($id); 

    		if (count($checkId) > 0) {

    			if ($this->data['AdminPr'] == false) {
            
            		redirect('home/index');

        		}

				$this->form_validation->set_rules('old_password','old password', 'required|min_length[6]|max_length[30]');

				$this->form_validation->set_rules('new_password', 'new password ', 'required|min_length[6]|max_length[30]|matches[new_password_confirm]');

				$this->form_validation->set_rules('new_password_confirm','new password confirm', 'required|min_length[6]|max_length[30]');

				$this->form_validation->set_message('required','The %s not be empty');
				
				$this->load->model('ion_auth_model');
				
				if (!$this->ion_auth->logged_in()) {

					redirect('auth/login', 'refresh');

				}

				$user = $this->ion_auth->user()->row();

				if ($this->form_validation->run() == false) {
					
					$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

					$this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
					
					$this->data['old_password'] = array(
					
						'name' => 'old_password',
						'id'   => 'old_password',
						'type' => 'password'
					
					);
					
					$this->data['new_password'] = array(
					
						'name'    => 'new',
						'id'      => 'new',
						'type'    => 'password',
						'pattern' => '^.{'.$this->data['min_password_length'].'}.*$'
					
					);
					
					$this->data['new_password_confirm'] = array(
					
						'name'    => 'new_confirm',
						'id'      => 'new_confirm',
						'type'    => 'password',
						'pattern' => '^.{'.$this->data['min_password_length'].'}.*$'
					
					);
					
					$this->data['user_id'] = array(
					
						'name'  => 'user_id',
						'id'    => 'user_id',
						'type'  => 'hidden',
						'value' => $user->id
				
					);
				
				} else {

					$identity = $this->session->userdata('identity');

					$change = $this->ion_auth->change_password($identity, $this->input->post('old_password'), $this->input->post('new_password'));

					if ($change) {

						$this->session->set_flashdata('message_update', '<div class="succes"> Change password success<button type="button" class="close" data-dismiss="alert">×</button></div>');

					} else {

						$this->data['changeSucces'] = 'Change errors please do again';

						$this->session->set_flashdata('message_update', '<div class="fail"> Change password errors please do again<button type="button" class="close" data-dismiss="alert">×</button></div>');

					}

					redirect('sinhvien/show');

				}

		   	   	$this->load->view("sinhvien/changepass", $this->data);
		    			
		    } else {

    			redirect('sinhvien/show');   

    		}
    	
    	} else {

    		redirect('sinhvien/show');   

    	}
 
    }	

    public function delete_checkbox() {

	    $dataId = $this->input->post('id');

	    $stack = false;

	    foreach ($dataId as $keyDataId => $valDataId) {

	      	if ($valDataId != "0") {

	        	$data = $this->Mrole->get_role_groups($valDataId);

		        if (count($data) < 3) {

		          	foreach ($data as $keyData => $valData) {

			            if ($valData['group_id'] == "1") {

			              	$stack = true;

			            }

		          	}
		          
		        } else {

		        	$stack = true;

		        }

	      	}

	    }

	    if ($stack == false) {

	      	foreach ($dataId as $keyDataId => $valueDataId) {

		        $this->load->model('Msinhvien');

		        $data = $this->Msinhvien->get_id_sinhvien($valueDataId);

		        if (file_exists("medias/student/".$data['avatar']) && $data['avatar'] != "doanthi.jpg") {
		              
		            if (unlink("medias/student/".$data['avatar'])) {

	                	$this->load->model('ion_auth_model');

	                	$this->ion_auth_model->delete_user($valueDataId);    
	              
	              	} 
		          
		        } else if (file_exists("medias/student/".$data['avatar']) && $data['avatar'] == "doanthi.jpg") {

	          		$this->load->model('ion_auth_model');

	            	$this->ion_auth_model->delete_user($valueDataId);    

		        }

	    	}
	        
			$returnData = array(

			    'status' => 1,
			    'data' => $stack,
			    'message' => "Delete !!!"
			  
			);

		    echo json_encode($returnData);

		    exit();

	    } else {

	      	$returnData = array(

	         	'status' => 0,
	         	'data' => null,
	         	'message' => "Can't Delete Admin Account !!!"
	         
	      	);

	      	echo json_encode($returnData);

	      	exit();

	    }     

    }  
   
}