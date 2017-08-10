<?php 

if (!defined('BASEPATH')) exit ('No direct script access allowed');  

class Home extends MY_Controller {

    public function __construct() {
	    
	    parent::__construct();	

	    $this->load->library(array('ion_auth','form_validation'));
       
       	$this->load->helper('form');

		$this->load->model('ion_auth_model');

		$this->load->model('Msinhvien');

		$this->load->view('home/header',$this->data);

    }   

	public function index() {		
    
    	$this->load->view('home/home');

    }

	public function login() {

		$this->data['title'] = $this->lang->line('login_heading');
		
		$this->form_validation->set_rules('email', str_replace(':', '', $this->lang->line('login_identity_label')), 'required|valid_email');
		
		$this->form_validation->set_rules('password', str_replace(':', '', $this->lang->line('login_password_label')), 'required');

		if ($this->form_validation->run() == true) {
			
			$user = $this->ion_auth->login($this->input->post('email'), $this->input->post('password'));
		
			if ($user) {

				$this->session->set_flashdata('message', $this->ion_auth->messages());

				$data = $user->role; 

				$this->data['role'] = $data;

				redirect('home', 'refresh');	

			} else {

				echo "<p class='error'>Email or password error</p>";

				$this->load->view('home/login');
	
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

		 if (!$this->ion_auth->logged_in()) {
			
			redirect('home/index');

		}

   		$this->load->model('Msinhvien');

      	$data['student'] = $this->Msinhvien->get_sinhvien($id); 
      
      	if ($this->input->post("submit")) {
      		
      		$this->form_validation->set_rules('first_name','First name','required');
       	
	       	$this->form_validation->set_rules('last_name','Last name','required');
	       	
	       	$this->form_validation->set_rules('email','Email','required');
	       	
	       	$this->form_validation->set_rules('role','Role','required');

	       	$this->form_validation->set_message('required','%s không được bỏ trống');
      		
      		if ($this->form_validation->run()) {

	      		$list_update = array(

					"first_name" => $this->input->post("first_name"),
					
					"last_name" => $this->input->post("last_name"),
					
					"email" => $this->input->post("email"),

					"role" => $this->input->post("role"),
					
				);	

		    }

       		$this->Msinhvien->update($id,$list_update);

       		redirect('sinhvien/show'); 

    	} 
	    	
		$this->load->view("home/profile",$data);
    
	}

    public function upload($id) {

   		$this->load->model('Msinhvien');

      	$data['student'] = $this->Msinhvien->get_sinhvien($id); 		
	       		
   		if ($_FILES['userfile']['name'] == '') {

   			$list_update = array(

				"avatar" => $this->input->post("img_name"),

			);
   			
   		} else {

   			$list_update = array(

				"avatar" => $_FILES['userfile']['name'],
			
			);

   		}
				
		$this->Msinhvien->update($id,$list_update);

		$config['upload_path'] = './asset/images/';

		$config['allowed_types'] = 'gif|jpg|png';

		$this->load->library('upload', $config);				

		if (!$this->upload->do_upload()) {

			$error = array('error' => $this->upload->display_errors());

		
			$this->load->view('sinhvien/insert', $error);

		} else {
			
			$file_data =  $this->upload->data();
			
			$data['img'] = base_url().'/images'.$file_data['file_name'];

		}

		redirect('sinhvien/show');

    }

    public function register() {

    	$this->load->model('Msinhvien');
		
		$data = $this->Msinhvien->forget($this->input->post('email'));
       
       	if ($this->input->post("submit")) {

       		if ($data > 1) {

       			$data_fail = "Email already exists";

				$this->data = $data_fail;
       		
       		} else {

	       		$this->form_validation->set_rules('email','Email','required|valid_email');
	 
		       	$this->form_validation->set_rules('first_name','First name','required');

		       	$this->form_validation->set_message('required','%s không được bỏ trống');
		       	
		       	$this->form_validation->set_rules('last_name','Last name','required');

		       	$this->form_validation->set_message('valid_email','%s không  được định dạng');

		       	$this->form_validation->set_message('is_unique','%s đã tồn tại');

		       	$this->form_validation->set_message('matches','%s không được để trống');

		       	$this->form_validation->set_rules('password','Password','required|matches[confirm_password]');

		       	$this->form_validation->set_rules('confirm_password','Confirm password','required');
			
	    		if ($this->form_validation->run()) {
	    			
					$list = array(

						"first_name" => $this->input->post("first_name"),
						
						"last_name" => $this->input->post("last_name"),
						
						"email" => $this->input->post("email"),
						
						"password" => $this->input->post("password"),
						
						"avatar" => "doanthi",
						
						"role" => 'User',

						"delete_is" => 0,

						"active" => 0,

					);
	    			
					$this->load->model('Msinhvien');

					if ($this->Msinhvien->insert($list)) {

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

						$message = base_url('home/active/').'/'.$this->db->insert_id(). "\n";

				        $this->email->message($message);  

						$this->email->send();

						redirect('home/success');	
				
					} else {

						$data_fail = "Registration failed";

						$this->data = $data_fail;

					}	

				}
							       
	       	}

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

		$message .= "Password: ". base_url('home/change/').'/'.$token . "\n";

        $this->email->message($message); 

        if ($this->input->post("submit")) {

        	$this->form_validation->set_rules('email','Email','required|valid_email');

        	$this->form_validation->set_message('required','%s not be empty');

        	if($this->form_validation->run()) {

        		$user = $this->Msinhvien->forget($this->input->post('email'));

        		if ($user > 0){

        			$id = $user["0"]->id;

        			$list_update = array(	
			
						"token" => $token,
			
					);

					if ($this->Msinhvien->update_forget($id,$list_update)) {

						$this->email->send();

						$data_11 = "Please check your mail again";

        				$this->data = $data_11;
						
					}

        		} else {

        			$data_11 = "Email does not exist";

        			$this->data = $data_11;
        		
        		}

	    	}

   		} 
 
 		$this->load->view('home/forgetpassword',$this->data);
	
	}

	public function change($token) {

		  if ($this->input->post("submit")) {

        	$this->form_validation->set_rules('new_password','Password','required|matches[new_password_confirm]');

	       	$this->form_validation->set_rules('new_password_confirm','Confirm password','required');
	       	
        	if($this->form_validation->run()) {

        		$user = $this->Msinhvien->forget_tk($token);

        		$id = $user["0"]->id;

    			$list_update = array(	
		
					"password" => $this->input->post('new_password'),
		
				);

				if ($this->Msinhvien->update_forget($id,$list_update)) {
				
					$token = rand(1000,9999);

        			$list_update = array(	
			
						"token" => $token,
			
					);

					$this->Msinhvien->update_forget($id,$list_update);

					redirect('home/changesuccess');

				}
				
	    	}

   		} 

		$this->load->view('home/changepass');

	}

	public function success() {

		$this->load->view('home/success');
	
	}

	public function changesuccess() {

		$this->load->view('home/change_success');
	
	}

	public function active($id) {

		$list_update = array(	

			"active" => 1,

		);

		$this->Msinhvien->update($id,$list_update);

		$this->load->view('home/active');

	}

}
	

?>
