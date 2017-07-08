<?php 

if (!defined('BASEPATH')) exit ('No direct script access allowed');  

class Home extends CI_Controller {

    public function __construct() {
	    
	    parent::__construct();


	    // $this->load->model('model_sinhvien');
        
   

    }

	public function index() {

		
		$this->load->model('model_sinhvien');
		
		$this->data['student'] = $this->model_sinhvien->get_all();

		$this->load->view('home/show', $this->data);

	}
   
    public function insert() {
    	
       	$this->load->library('form_validation');
       
       	$this->load->helper('form');
       
       	if ($this->input->post("insert")) {

	       	$this->form_validation->set_rules('first_name','First name','required');

	       	$this->form_validation->set_message('required','%s không được bỏ trống');
	       	
	       	$this->form_validation->set_rules('last_name','Last name','required');
	       	
	       	$this->form_validation->set_rules('email','Email','required|valid_email|is_unique[student.email]');

	       	$this->form_validation->set_message('valid_email','%s không  được định dạng');

	       	$this->form_validation->set_message('is_unique','%s đã tồn tại');

	       	$this->form_validation->set_message('matches','%s không đ');

	       	$this->form_validation->set_rules('password','Password','required|matches[confirm_password]');

	       	$this->form_validation->set_rules('confirm_password','Confirm password','required');
	       	
	       	$this->form_validation->set_rules('avarta','Avatar','required');
	       	
	       	$this->form_validation->set_rules('role','Role','required');
    
	       	if ($this->form_validation->run()) {

				$list = array(

					"first_name"=>$this->input->post("first_name"),
					
					"last_name"=>$this->input->post("last_name"),
					
					"email"=>$this->input->post("email"),
					
					"password"=>$this->input->post("password"),
					
					"avatar"=>$this->input->post("avarta"),
					
					"role"=>$this->input->post("role"),
					
				);

				$this->load->model('model_sinhvien');

				$this->model_sinhvien->insert($list);	

				header('Location:'.base_url("/index.php/home/"));  

			}
	         
       	} else if ($this->input->post("back")) {

       		header('Location:'.base_url("/index.php/home/"));   
       			    	
       	}
	
        $this->load->view('home/insert');
   
    }

   	public function delete() {

   		$id = $this->uri->segment(3);
     	
     	$this->load->model('model_sinhvien');

     	$this->model_sinhvien->delete($id);
     	
     	header('Location:'.base_url("/index.php/home/"));  
    
    }

    public function update($id) {


    	if ($this->input->post("change_password")) {

       		header('Location:'.base_url("/index.php/home/changepass/$id"));   
       	
       	}

    	$this->load->library('form_validation');
       
       	$this->load->helper('form');

   		$this->load->model('model_sinhvien');

      	$data['student'] = $this->model_sinhvien->getsinhvien($id); 		
      	
      	if ($this->input->post("insert")) {

	       	$this->form_validation->set_rules('first_name','First name','required');
       	
	       	$this->form_validation->set_rules('last_name','Last name','required');
	       	
	       	$this->form_validation->set_rules('email','Email','required');
	       	
	       	$this->form_validation->set_rules('avarta','Avatar','required');
	       	
	       	$this->form_validation->set_rules('role','Role','required');

	       	$this->form_validation->set_message('required','%s không được bỏ trống');
    
	       	if ($this->form_validation->run()) {

				$list_update= array(

					"first_name"=>$this->input->post("first_name"),
					
					"last_name"=>$this->input->post("last_name"),
					
					"email"=>$this->input->post("email"),
					
					"avatar"=>$this->input->post("avarta"),
					
					"role"=>$this->input->post("role"),
					
				);
				
				$this->model_sinhvien->update($id,$list_update);	

				header('Location:'.base_url("/index.php/home/"));  

			}
	         
       	} else if ($this->input->post("back")) {

       		header('Location:'.base_url("/index.php/home/"));   
       			    
       	}

   		$this->load->view("home/update",$data);

    }

     public function changepass($id) {

     	
    	$this->load->library('form_validation');
       
       	$this->load->helper('form');

   		$this->load->model('model_sinhvien');

      	$data = $this->model_sinhvien->getsinhvien($id);

     	$password2 = $data['password'];

  	
      	if ($this->input->post("change")) {


	    	$this->form_validation->set_rules('old_password','old_password','required');
	       	
	       	$this->form_validation->set_rules('new_password','new_password','required');
	       	
	       	$this->form_validation->set_rules('new_password_confirm','new_password_confirm','required|matches[new_password]');

	       	$this->form_validation->set_message('required','%s không được bỏ trống');
	       	
	       	$this->form_validation->set_message('matches','%s không đúng');
    
	       	if ($this->form_validation->run()) {

	       		if ( $data['password']==$this->input->post("old_password")) {
	       		
	       			$change = array(
	       			
	       				'password'=>$this->input->post("new_password"),
	       			
	       			);
	       			
	       			$this->model_sinhvien->changepass($id,$change );	

					header('Location:'.base_url("/index.php/home/"));  
	       		
	       		} else echo "mật khẩu sai nhập lại";	
	
			} 
	         
       	} else if ($this->input->post("back")) {

       		header('Location:'.base_url("/index.php/home/"));   
       			    
       	}

   		$this->load->view("home/changepass",$data);
 
    }	

	public function delete_multiple() {

     	$this->load->model('model_sinhvien');

		$dataId = $this->input->post('id');

		foreach ($dataId as $key => $value) {

			if ($value != 'on') {

				$check = $this->model_sinhvien->delete_multiple($value);
				
			}

		}   

    }

    

	
	public function login()
	{

		$this->load->library(array('ion_auth','form_validation'));
       
       	$this->load->helper('form');

		$this->load->model('ion_auth_model');

		$this->data['title'] = $this->lang->line('login_heading');

		//validate form input
		$this->form_validation->set_rules('identity', str_replace(':', '', $this->lang->line('login_identity_label')), 'required');
		$this->form_validation->set_rules('password', str_replace(':', '', $this->lang->line('login_password_label')), 'required');

		if ($this->form_validation->run() == true)
		{
			// check to see if the user is logging in
			// check for "remember me"
			

			if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password')))
			{
				//if the login is successful
				//redirect them back to the home page
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect('/', 'refresh');
			}
			else
			{
				// if the login was un-successful
				// redirect them back to the login page
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('auth/login', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
			}
		}
		else
		{
			// the user is not logging in so display the login page
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['identity'] = array('name' => 'identity',
				'id'    => 'identity',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('identity'),
			);
			$this->data['password'] = array('name' => 'password',
				'id'   => 'password',
				'type' => 'password',
			);

			$this->load->view('home/login');
		}
	}



}

?>
