<?php 

if (!defined('BASEPATH')) exit ('No direct script access allowed');  

class Home extends MY_Controller {

    public function __construct() {
	    
	    parent::__construct();	

       	$this->load->helper('form');

	    $this->load->library(array('ion_auth','form_validation'));
 
		$this->load->model('ion_auth_model');

		$this->load->view('home/header',$this->data);

    }   

	public function index() {		
    
    	$this->load->view('home/home');

    }

	public function login() {

		if ($this->ion_auth->logged_in()) {
            
            redirect('home');

        }	

		$this->data['title'] = $this->lang->line('login_heading');
		
		$this->form_validation->set_rules('email', str_replace(':', '', $this->lang->line('login_identity_label')), 'required|valid_email');
		
		$this->form_validation->set_rules('password', str_replace(':', '', $this->lang->line('login_password_label')), 'required');

		if ($this->form_validation->run() == true) {
			
			$user = $this->ion_auth->login($this->input->post('email'), $this->input->post('password'));

			if ($user) {

				$this->session->set_flashdata('message', $this->ion_auth->messages());
				
				$userInfo = $this->ion_auth->user()->row();

				$this->data['role'] = $data;

				redirect('home', 'refresh');	
				
			} else {

				$this->data['login_fail'] = 'Email or password error';

				$this->load->view('home/login',$this->data);
	
			}
		
		} else {

			$this->load->view('home/login');

		}

	}

	public function logout() {

		$this->data['title'] = "Logout";
		
		$logout = $this->ion_auth->logout();

		$this->session->set_flashdata('message', $this->ion_auth->messages());

		redirect('home/login', 'refresh');

	}

	public function profile($id) {

		if (isset($id) && count($id) > 0) {

			if (!$this->ion_auth->logged_in()) {
				
				redirect('home/index');

			}

			$this->load->model('Msinhvien');

	        $this->load->model('Mrole');

	        $listCg = $this->Mrole->get_all_role();

	        $newArray = [];

	         if (isset($listCg) && count($listCg) > 0) {

	        	foreach ($listCg as $listCgKey => $listCgValue) {

		        	$newArray[$listCgValue['user_id']] = $this->Mrole->get_name_role($listCgValue['group_id'])['name'];

		        }

        	}

	        $this->data['newArray'] = $newArray;

			$this->data['role'] =  $listCg;
			
			$this->data['student'] = $this->Msinhvien->get_all_sinhvien();

	   		$this->load->model('Msinhvien');

	      	$this->data['student'] = $this->Msinhvien->get_id_sinhvien($id); 
	      
	      	if ($this->input->post("submit")) {
	      		
	      		$this->form_validation->set_rules('first_name','First name','required');
	       	
		       	$this->form_validation->set_rules('last_name','Last name','required');

		       	$this->form_validation->set_message('required','%snot be empty');
	      		
	      		if ($this->form_validation->run()) {

		      		$list_update = array(

						"first_name" => $this->input->post("first_name"),
						
						"last_name" => $this->input->post("last_name"),
						
					);	

					if ($this->Msinhvien->update($id,$list_update)) {

						redirect('home/profile/'.$id);

					}

			    }

	    	} 

			$this->load->view("home/profile",$this->data);

		} else {

			return flase;

		}
    
	}

	public function upload($id) {

		if (isset($id) && count($id) > 0) {

	   		$this->load->model('Msinhvien');

	      	$data = $this->Msinhvien->get_id_sinhvien($id); 		
		       		
	   		if ($_FILES['userfile']['name'] == '') {

	   			$list_update = array(

					"avatar" => $this->input->post("img_name"),

				);

				redirect('home/profile/'.$id); 
	   			
	   		} 
				
			$config['max_size'] = 20480;

			$config['upload_path'] = './medias/student/';

			$config['allowed_types'] = 'gif|jpg|png';

			$this->load->library('upload', $config);

			if ($_FILES['userfile']['name'] == $this->input->post('img_name')) {

				redirect('home/profile/'.$id);

			} else {

				$_FILES['userfile']['name'] = time().substr($_FILES['userfile']['name'],-4);

				if (!$this->upload->do_upload()) {
				
					redirect('home/upload_fail/'.$id);

				} else {

					if (file_exists("medias/student/".$data['avatar'])) {

						if ($data['avatar'] != "doanthi.jpg") {

							unlink("medias/student/".$data['avatar']);
						
						}

					}
				        
			       	$list_update = array(

						"avatar" => $_FILES['userfile']['name'],
			
					);

		            $this->Msinhvien->update($id,$list_update);

		            $file_data =  $this->upload->data();

					redirect('home/profile/'.$id); 
	     			
	 			} 

	 		}

		} else {

			redirect('home'); 

		}

	}

    public function register() {

    	if ($this->ion_auth->logged_in()) {
       
            redirect('home');

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

        $this->session->set_flashdata('message', $this->ion_auth->messages());


        $this->load->model('ion_auth_model');	

    	$this->data['title'] = $this->lang->line('create_user_heading');

        $tables = $this->config->item('tables','ion_auth');

        $identity_column = $this->config->item('identity','ion_auth');
        
        $this->data['identity_column'] = $identity_column;

        // validate form input
        $this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'required');
        
        $this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'required');
        
        if($identity_column!=='email') {
            
            $this->form_validation->set_rules('identity',$this->lang->line('create_user_validation_identity_label'),'required|is_unique['.$tables['users'].'.'.$identity_column.']');
            
            $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email');
        
        } else {
            
            $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email|is_unique[' . $tables['users'] . '.email]');
        
        }
        
        $this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
        
        $this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');

        if ($this->form_validation->run() == true) {

            $email    = strtolower($this->input->post('email'));
            
            $identity = ($identity_column==='email') ? $email : $this->input->post('identity');
            
            $password = $this->input->post('password');

            $additional_data = array(
            
                'first_name' => $this->input->post('first_name'),
                'last_name'  => $this->input->post('last_name'),
                'avatar' => 'doanthi.jpg',
                'is_deleted' => 0,
 
            );
        }

        if ($this->form_validation->run() == true && $this->ion_auth->register($identity, $password, $email, $additional_data)) {
            // check to see if we are creating the user
            // redirect them back to the admin page
            $this->email->send(); 
        
            $this->session->set_flashdata('message', $this->ion_auth->messages());
        
           	redirect('home/register_success');
        
        } else {
            // display the create user form
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

            $this->data['first_name'] = array(
              
                'name'  => 'first_name',
                'id'    => 'first_name',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('first_name'),
            
            );
            
            $this->data['last_name'] = array(
            
                'name'  => 'last_name',
                'id'    => 'last_name',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('last_name'),
            
            );
            
            $this->data['identity'] = array(
            
                'name'  => 'identity',
                'id'    => 'identity',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('identity'),
            
            );
            
            $this->data['email'] = array(
            
                'name'  => 'email',
                'id'    => 'email',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('email'),
            
            );
            
            $this->data['company'] = array(
            
                'name'  => 'company',
                'id'    => 'company',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('company'),
            
            );
            
            $this->data['phone'] = array(
            
                'name'  => 'phone',
                'id'    => 'phone',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('phone'),
            
            );

            $this->data['password'] = array(
            
                'name'  => 'password',
                'id'    => 'password',
                'type'  => 'password',
                'value' => $this->form_validation->set_value('password'),
            
            );
            
            $this->data['password_confirm'] = array(
            
                'name'  => 'password_confirm',
                'id'    => 'password_confirm',
                'type'  => 'password',
                'value' => $this->form_validation->set_value('password_confirm'),
            
            );

          
        }
	
        $this->load->view('home/register',$this->data);
   
    }

    public function forget() {

    	$token = rand(1000,9999);

    	$config['protocol']    = 'smtp';
        
        $config['smtp_host']    = 'ssl://smtp.gmail.com';
        
        $config['smtp_port']    = '465';
        
        $config['smtp_timeout'] = '7';
        
        $config['smtp_user']    = 'doanthi2241@gmail.com';
        
        $config['smtp_pass']    = 'doanthi123';
        
        $config['charset']    = 'utf-8';
        
        $config['newline']    = "\r\n";
        
        $config['mailtype'] = 'text'; // or html
        
        $config['validation'] = TRUE; // bool whether to validate email or not      

        $this->email->initialize($config);

        $this->email->from('doanthi2241@gmail.com', 'Ron');

        $this->email->to($this->input->post("email")); 

        $this->email->subject('Email Test');

        $message = "Contact form\n\n";

        $message = "Please visit the link below forgot password:\n";

		$message .= "Password: ". base_url('home/change/').'/'.$token . "\n";

        $this->email->message($message); 

        if ($this->input->post("submit")) {

        	$this->form_validation->set_rules('email','Email','required|valid_email');

        	$this->form_validation->set_message('required','%s not be empty');

        	if ($this->form_validation->run()) {

        		$this->load->model('Msinhvien');

        		$user = $this->Msinhvien->forget_password($this->input->post('email'));

        		if (count($user) > 0) {

        			$id = $user["0"]['id'];

        			$list_update = array(	
			
						"token" => $token,
			
					);

					if ($this->Msinhvien->update_forget($id,$list_update)) {

						if ($this->email->send()) {
							
							$checkmail = "Please check your mail again";

						} else {

							$checkmail = "Send mail fail";

						}

						$this->data['checkmail'] = $checkmail;
	
					} else {

						$checkmail = "Update fail";

        				$this->data['checkmail'] = $checkmail;

					}

        		} else {

        			$checkmail = "Email does not exist";

        			$this->data['checkmail'] = $checkmail;
        		
        		}

	    	}

   		} 
 
 		$this->load->view('home/forgetpassword',$this->data);
	
	}

	public function change($token) {

		if (isset($token) && count($token) > 0) {
			
		  	if ($this->input->post("submit")) {

	        	$this->form_validation->set_rules('new_password','Password','required|matches[new_password_confirm]');

		       	$this->form_validation->set_rules('new_password_confirm','Confirm password','required');
		       	
	        	if ($this->form_validation->run()) {

	        		$this->load->model('Msinhvien');

	        		$user = $this->Msinhvien->forget_tk($token);

	        		$id = $user["0"]["id"];

	    			$list_update = array(	
			
						"password" => $this->input->post('new_password'),
			
					);

					if ($this->Msinhvien->update_forget($id,$list_update)) {
					
						$token = rand(1000,9999);

	        			$list_update = array(	
				
							"token" => $token,
				
						);

						redirect('home/changesuccess');

					}
				
		    	}

	   		} 

			$this->load->view('home/changepass');

		} else {

			redirect('home');

		}

	}

	public function success() {

		$this->load->view('home/success');
	
	}

	public function register_success() {

		$this->load->view('home/register_success');
	
	}

	public function upload_fail($id) {

		$this->load->view('home/upload_fail_profile',$id);
	
	}

	public function changesuccess() {

		$this->load->view('home/change_success');
	
	}

	public function active($id) {

		if (isset($id) && count($id) > 0) {

			$list_update = array(	

				"active" => 1,

			);

			$this->load->model('Msinhvien');

			$this->Msinhvien->update($id,$list_update);

			$this->load->view('home/active');

		} else {

			redirect('home');

		}

	}

	public function changepass_profile($id) {

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

   	   		$this->load->view("home/changepassword_profile",$this->data);
    	
    	} else {

    		return false;

    	}
 
    }

    public function show_article() {

    	$this->load->library('pagination');

    	$this->load->model('Marticle');

    	$this->load->model('Mcategories');

    	$listCg = $this->Mcategories->get_all_categories();

        $newArray = [];

        if (isset($listCg) && count($listCg) > 0) {

        	foreach ($listCg as $listCgKey => $listCgValue) {

	        	if ($listCgValue['is_deleted'] == 0) {

	        		$newArray[$listCgValue['id']] = $listCgValue['name'];
	        		
	        	}  else {

	        		$newArray[$listCgValue['id']] = "All";
	        	}

	        }

        }

        $this->data['newArray'] = $newArray;

		$this->data['categories'] =  $listCg;	

    	$perpage = 10;
        
       	$config = array();	

       	$keyword = trim($this->input->get('keyword', TRUE));

       	if (!isset($_GET['page'])) {

       		$_GET['page'] = 0;
       	
       	}

		$config['base_url'] = base_url('/home/show_article?keyword='.$keyword);

		if ($keyword == "")  {

			$this->data['query'] =  $this->Marticle->show_all_article($perpage,$_GET['page']);

			$config['total_rows'] = $this->Marticle->show_number_article();

		} else {

			$config['total_rows'] = $this->Marticle->show_number_title_article($keyword);

			$this->data['search_ar'] = $config['total_rows'];

			$this->data['query'] = $this->Marticle->show_article($perpage, $_GET['page'], $keyword);
		
		}	
		
		$config['per_page'] = $perpage;
		
		$config['uri_segment'] = 3;

		$config['num_links'] = 3;

		$config['page_query_string'] = TRUE;

		$config['query_string_segment'] = 'page';
		
		$config['next_link'] = "Trang ke tiep";
		
		$config['prev_link'] = "Trang truoc";

		$this->pagination->initialize($config);

		$this->data['paginator'] =  $this->pagination->create_links();

		$this->data['search'] = $keyword;

		$this->load->view('home/show_article', $this->data);

    }	

    public function preview($slug) {

    	if (isset($slug) && count($slug) > 0) {
	    		
	    	$this->load->model('Marticle');
	    	
	    	$this->load->model('Mcategories');

	      	$this->data['student'] = $this->Marticle->get_slug_article($slug); 	

	      	$listCg = $this->Mcategories->get_all_categories();

        	$newArray = [];

        	if (isset($listCg) && count($listCg) > 0) {

        		foreach ($listCg as $listCgKey => $listCgValue) {

		        	if ($listCgValue['is_deleted'] == 0) {

		        		$newArray[$listCgValue['id']] = $listCgValue['name'];
		        		
		        	}  else {

		        		$newArray[$listCgValue['id']] = "All";

		        	}

		        }

        	}

	        $this->data['newArray'] = $newArray;

			$this->data['categories'] =  $listCg;

			$this->data['article'] = $this->Marticle->get_all_article();

	    	$this->load->view("article/preview", $this->data);

    	} else {

    		redirect('article/home');

    	}

    }

}

?>