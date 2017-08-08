
<?php 

if (!defined('BASEPATH')) exit ('No direct script access allowed');  

class Sinhvien extends MY_Controller {

    public function __construct() {
	    
	    parent::__construct();

	    if (!$this->ion_auth->logged_in()) {
			
			redirect('home/index');

		}
		
		if ($this->data['role'] == 'User') {
			
			redirect('home/index');

		}

		$this->load->helper(array('form', 'url'));

		$this->load->view('home/header',$this->data);

    }

    public function show() {

		$this->load->model('Msinhvien');
		
		$this->data['student'] = $this->Msinhvien->get_all();

		$this->load->view('Sinhvien/show',$this->data);

	}
   
    public function insert() {

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

		$message .= "Last namet : ".$this->input->post("last_name") . "\n";

		$message .= "Email: ".$this->input->post("email") . "\n";

		$message .= "Role: ".$this->input->post("role") . "\n";

        $this->email->message($message);  

    	$this->load->model('Msinhvien');
		
		$data = $this->Msinhvien->get_all();
    	
       	$this->load->library('form_validation');
       
       	$this->load->helper('form');
       
       	if ($this->input->post("submit")) {

       		foreach ($data as $key => $value) {
       			
       			if ($this->input->post('email') == $value['email'] && $value['delete_is'] == 0 )  {

       				$this->form_validation->set_rules('email','Email','required|valid_email|is_unique[student.email]');
       			
       			}
       		
       		}

	       	$this->form_validation->set_rules('first_name','First name','required');

	       	$this->form_validation->set_message('required','%s không được bỏ trống');
	       	
	       	$this->form_validation->set_rules('last_name','Last name','required');

	       	$this->form_validation->set_message('valid_email','%s không  được định dạng');

	       	$this->form_validation->set_message('is_unique','%s đã tồn tại');

	       	$this->form_validation->set_message('matches','%s không đ');

	       	$this->form_validation->set_rules('password','Password','required|matches[confirm_password]');

	       	$this->form_validation->set_rules('confirm_password','Confirm password','required');
	       	
	       	$this->form_validation->set_rules('role','Role','required');

	       	if( $this->input->post("role") == 'Admin' || $this->input->post("role") == 'User' ){
    		
	    		if ($this->form_validation->run()) {
	    			
					$list = array(

						"first_name" => $this->input->post("first_name"),
						
						"last_name" => $this->input->post("last_name"),
						
						"email" => $this->input->post("email"),
						
						"password" => $this->input->post("password"),
						
						"avatar" => $_FILES['userfile']['name'],
						
						"role" => $this->input->post("role"),

						"delete_is" => 0,

					);
					
					if($list['avatar'] == '') {

						$list['avatar'] = 'doanthi';
	    			
	    			} 
	    			
					$this->load->model('Msinhvien');

					$config['max_size'] = 20480;

					$config['upload_path'] = './asset/images/student/';

					$config['allowed_types'] = 'gif|jpg|png';

					$this->load->library('upload', $config);


					if (!$this->upload->do_upload()) {

						$error = array('error' => $this->upload->display_errors());

					} else {

						$file_data =  $this->upload->data();
						
						$data['img'] = base_url().'isset/images'.$file_data['file_name'];	
				
					}

					if ($this->Msinhvien->insert($list)) {

						$this->email->send();

						redirect('sinhvien/show');	
				
					} else {

						echo "Thêm thất bại";

					}	

				}

			} else {
				
				echo "<script>";

				echo "alert('Role error'); ";

				echo "</script>";

			}
						       
       	} else if ($this->input->post("back")) {

       		redirect('sinhvien/show');   
       			    	
       	}
	
        $this->load->view('sinhvien/insert',array('error' => ' '));
   
    }

   	public function delete($id) {

   		$this->load->model('Msinhvien');

   		$data['student'] = $this->Msinhvien->get_sinhvien($id); 

   		if ($data['student']['role'] == Admin) {

   			echo "No deleted";
   		
   		} else {

			$list_update = array(	
			
			"delete_is" => 1,
			
			);	
	       					
				$this->Msinhvien->update($id,$list_update);	

				redirect('sinhvien/show');  
			}

   		$this->load->view("sinhvien/update",$data);

    }

    public function update($id) {

    	if ($this->input->post("change_password")) {

       		header('Location:'.base_url("/sinhvien/changepass/$id"));   
       	
       	}

    	$this->load->library('form_validation');
       
       	$this->load->helper('form');

   		$this->load->model('Msinhvien');

      	$data['student'] = $this->Msinhvien->get_sinhvien($id); 		
      	
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
					
					"email" => $this->input->post("email"),

					"avatar" => $this->input->post("img_name"),
					
					"role" => $this->input->post("role"),
					
					);
	       			
	       		} else {

	       			$list_update = array(

					"first_name" => $this->input->post("first_name"),
					
					"last_name" => $this->input->post("last_name"),
					
					"email" => $this->input->post("email"),
					
					"avatar" => $_FILES['userfile']['name'],
					
					"role" => $this->input->post("role"),
					
					);

	       		} 

       			$config['max_size'] = 20480;

				$config['upload_path'] = './asset/images/student/';

				$config['allowed_types'] = 'gif|jpg|png';

				$this->load->library('upload', $config);	

				if (!$this->upload->do_upload()) {

					$error = array('error' => $this->upload->display_errors());

					$this->load->view('sinhvien/insert', $error);

				} else {

					$file_data =  $this->upload->data();
						
					$data['img'] = base_url().'/images'.$file_data['file_name'];

				}

				$this->Msinhvien->update($id,$list_update);

				redirect('sinhvien/show');
			
			}
	         
       	} else if ($this->input->post("back")) {

       		redirect('sinhvien/show');   
       			    
       	}
      
   		$this->load->view("sinhvien/update",$data);

    }

    public function changepass($id) {

    	$this->load->library('form_validation');
       
       	$this->load->helper('form');

   		$this->load->model('Msinhvien');

      	$data = $this->Msinhvien->get_sinhvien($id);

     	$password2 = $data['password'];

      	if ($this->input->post("change")) {

	    	$this->form_validation->set_rules('old_password','old_password','required');
	       	
	       	$this->form_validation->set_rules('new_password','new_password','required');
	       	
	       	$this->form_validation->set_rules('new_password_confirm','new_password_confirm','required|matches[new_password]');

	       	$this->form_validation->set_message('required','%s không được bỏ trống');
	       	
	       	$this->form_validation->set_message('matches','%s không đúng');
    
	       	if ($this->form_validation->run()) {

	       		if ( $data['password'] == $this->input->post("old_password")) {
	       		
	       			$change = array(
	       			
	       				'password' => $this->input->post("new_password"),
	       			
	       			);
	       			
	       			$this->Msinhvien->changepass($id,$change );	

					redirect('sinhvien/show'); 
	       		
	       		} else echo "mật khẩu sai nhập lại";	
	
			} 
	         
       	} else if ($this->input->post("back")) {

       		redirect('sinhvien/show');  
       			    
       	}

   		$this->load->view("sinhvien/changepass",$data);
 
    }	

	public function delete_multiple() {

     	$this->load->model('Msinhvien');

		$dataId = $this->input->post('id');

		foreach ($dataId as $key => $value) {

			if ($value != 'on') {

				$check = $this->Msinhvien->delete_multiple($value);

				
			}

		}   

    }

    public function delete_checkbox() {

     	$this->load->model('Msinhvien');

		$dataId = $this->input->post('id');

		$stack = array();

		foreach ($dataId as $key => $val) {

			if ($val != "0") {

				$data = $this->Msinhvien->get_sinhvien($val);

				if($data['role'] == "User") {

					array_push($stack, $data['id']);

				}

			}

		}

		if (count($stack) > 0) {

			foreach ($stack as $key => $value) {

				$data = $this->Msinhvien->get_sinhvien($value);

				$list_update = array(	
		
					"delete_is" => 1,
				
				);

				if (file_exists("asset/images/student/".$data['avatar']) && $data['avatar'] != "doanthi.jpg" ) {
			        
			        if(unlink("asset/images/student/".$data['avatar'])) {

			            $this->Msinhvien->delete_checkbox($value,$list_update);    
			        
			        } 
     			
     			} else {

     				$this->Msinhvien->delete_checkbox($value,$list_update);    

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

    public function sendmail(){

    	 
    }
   
}

