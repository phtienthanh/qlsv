
<?php 

if (!defined('BASEPATH')) exit ('No direct script access allowed');  

class Sinhvien extends MY_Controller {

    public function __construct() {
	    
	    parent::__construct();

	    if (!$this->ion_auth->logged_in()) {
			
			redirect('home/index');

		}
		
		if ($this->data['role']=='User') {
			
			redirect('home/index');

		}

		$this->load->helper(array('form', 'url'));

    }

    public function show() {

		$this->load->model('model_sinhvien');
		
		$this->data['student'] = $this->model_sinhvien->get_all();

		$this->load->view('home/header',$this->data);

		$this->load->view('sinhvien/show',$this->data);

	}
   
    public function insert() {
    	
       	$this->load->library('form_validation');
       
       	$this->load->helper('form');
       
       	if ($this->input->post("submit")) {

	       	$this->form_validation->set_rules('first_name','First name','required');

	       	$this->form_validation->set_message('required','%s không được bỏ trống');
	       	
	       	$this->form_validation->set_rules('last_name','Last name','required');
	       	
	       	$this->form_validation->set_rules('email','Email','required|valid_email|is_unique[student.email]');

	       	$this->form_validation->set_message('valid_email','%s không  được định dạng');

	       	$this->form_validation->set_message('is_unique','%s đã tồn tại');

	       	$this->form_validation->set_message('matches','%s không đ');

	       	$this->form_validation->set_rules('password','Password','required|matches[confirm_password]');

	       	$this->form_validation->set_rules('confirm_password','Confirm password','required');
	       	
	       	$this->form_validation->set_rules('role','Role','required');

	       	if( $this->input->post("role")=='Admin' || $this->input->post("role")=='User' ){
    		
	    		if ($this->form_validation->run()) {
	    			
					$list = array(

						"first_name"=>$this->input->post("first_name"),
						
						"last_name"=>$this->input->post("last_name"),
						
						"email"=>$this->input->post("email"),
						
						"password"=>$this->input->post("password"),
						
						"avatar"=>$_FILES['userfile']['name'],
						
						"role"=>$this->input->post("role"),
						
					);
					
					if($list['avatar']==''){

					$list['avatar'] = 'doanthi';
	    			
	    			} 
					$this->load->model('model_sinhvien');

					$this->model_sinhvien->insert($list);

					$config['upload_path'] = './images/';

					$config['allowed_types'] = 'gif|jpg|png';

					$this->load->library('upload', $config);

					if (!$this->upload->do_upload()) {

						$error = array('error' => $this->upload->display_errors());

					} else {

						$file_data=  $this->upload->data();
						
						$data['img']=base_url().'/images'.$file_data['file_name'];

					}

						header('Location:'.base_url("/index.php/sinhvien/show"));  

				}

			} else {
				
				echo "<script>";

				echo "alert('Role error');t ";

				echo "</script>";

			}
						       
       	} else if ($this->input->post("back")) {

       		header('Location:'.base_url("/index.php/sinhvien/show"));   
       			    	
       	}
	
        $this->load->view('sinhvien/insert',array('error' => ' '));
   
    }

   	public function delete() {

   		$id = $this->uri->segment(3);
     	
     	$this->load->model('model_sinhvien');

     	$this->model_sinhvien->delete($id);
     	
     	header('Location:'.base_url("/index.php/sinhvien/show"));  
    
    }

    public function update($id) {

    	if ($this->input->post("change_password")) {

       		header('Location:'.base_url("/index.php/sinhvien/changepass/$id"));   
       	
       	}

    	$this->load->library('form_validation');
       
       	$this->load->helper('form');

   		$this->load->model('model_sinhvien');

      	$data['student'] = $this->model_sinhvien->getsinhvien($id); 		
      	
      	if ($this->input->post("insert")) {

	       	$this->form_validation->set_rules('first_name','First name','required');
       	
	       	$this->form_validation->set_rules('last_name','Last name','required');
	       	
	       	$this->form_validation->set_rules('email','Email','required');
	       	
	       	$this->form_validation->set_rules('role','Role','required');

	       	$this->form_validation->set_message('required','%s không được bỏ trống');
    
	       	if ($this->form_validation->run()) {

	       		
	       		if ($_FILES['userfile']['name']=='' && $this->input->post("img_name")=='doanthi' ) {

	       				// $_FILES['userfile']['name']=$this->input->post("img_name");

	       			$list_update= array(

					"first_name"=>$this->input->post("first_name"),
					
					"last_name"=>$this->input->post("last_name"),
					
					"email"=>$this->input->post("email"),

					"avatar"=>$this->input->post("img_name"),
					
					"role"=>$this->input->post("role"),
					
				);
	       			
	       		} else if ($_FILES['userfile']['name']=='' && $this->input->post("img_name")!='doanthi' ) {

	       			$list_update= array(

					"first_name"=>$this->input->post("first_name"),
					
					"last_name"=>$this->input->post("last_name"),
					
					"email"=>$this->input->post("email"),
					
					"avatar"=>$this->input->post("img_name"),
					
					"role"=>$this->input->post("role"),
					
				);

	       		} else {

	       			$list_update= array(

					"first_name"=>$this->input->post("first_name"),
					
					"last_name"=>$this->input->post("last_name"),
					
					"email"=>$this->input->post("email"),
					
					"avatar"=>$_FILES['userfile']['name'],
					
					"role"=>$this->input->post("role"),
					
				);

	       		}
				
				$this->model_sinhvien->update($id,$list_update);	

				$config['upload_path'] = './images/';

				$config['allowed_types'] = 'gif|jpg|png';

				$this->load->library('upload', $config);				

				if (!$this->upload->do_upload()) {

					$error = array('error' => $this->upload->display_errors());

					$this->load->view('sinhvien/insert', $error);
				} else {
					
					$file_data=  $this->upload->data();
					
					$data['img']=base_url().'/images'.$file_data['file_name'];

				}

				header('Location:'.base_url("/index.php/sinhvien/show"));  

			}
	         
       	} else if ($this->input->post("back")) {

       		header('Location:'.base_url("/index.php/sinhvien/show"));   
       			    
       	}
       	
       	$this->load->view('home/header',$this->data);

   		$this->load->view("sinhvien/update",$data);

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

					header('Location:'.base_url("/index.php/sinhvien/show"));  
	       		
	       		} else echo "mật khẩu sai nhập lại";	
	
			} 
	         
       	} else if ($this->input->post("back")) {

       		header('Location:'.base_url("/index.php/sinhvien/show"));   
       			    
       	}
       	$this->load->view('home/header',$this->data);

   		$this->load->view("sinhvien/changepass",$data);
 
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
   
}
