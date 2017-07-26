<?php 

if (!defined('BASEPATH')) exit ('No direct script access allowed');  

class Home extends MY_Controller {

    public function __construct() {
	    
	    parent::__construct();	

    }   

	public function index() {		

    	$this->load->view('home/header',$this->data);
    
    	$this->load->view('home/home');

    }

	public function login() {

		$this->data['title'] = $this->lang->line('login_heading');

    	$this->load->library(array('ion_auth','form_validation'));
       
       	$this->load->helper('form');

		$this->load->model('ion_auth_model');
		
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

				echo "<script>";
				
				echo " alert('Email or password error');";
				
				echo " </script>";

				$this->load->view('home/header',$this->data);

				$this->load->view('home/login');
	
			}
		
		} else {

			$this->load->view('home/header',$this->data);

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

	 	$this->load->library('form_validation');
       
       	$this->load->helper('form');

   		$this->load->model('Msinhvien');

      	$data['student'] = $this->Msinhvien->getsinhvien($id); 
      

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

    	$this->load->library('form_validation');
       
       	$this->load->helper('form');

   		$this->load->model('Msinhvien');

      	$data['student'] = $this->Msinhvien->getsinhvien($id); 		
	       		
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

		$config['upload_path'] = './images/';

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

}
	

?>
