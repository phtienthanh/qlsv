
<?php 

if (!defined('BASEPATH')) exit ('No direct script access allowed');  

class article extends MY_Controller {

	public function __construct() {
	        
	        parent::__construct();

	        if (!$this->ion_auth->logged_in()) {
	            
	            redirect('home/login');

	        }	

	    }

	public function home() {

		$this->load->model('Marticle');
		
		$this->data['student'] = $this->Marticle->get_all();

		$this->load->view('home/header',$this->data);

		$this->load->view('article/home',$this->data);

	}

	public function add() {

			$this->load->library('form_validation');
	       
	       	$this->load->helper('form');

	       	$this->load->model('Mcategories');

	       	$this->data['student'] = $this->Mcategories->get_all();
	       
	       	if ($this->input->post("submit")) {

		       	$this->form_validation->set_rules('title','title','required|is_unique[article.title]');

		       	$this->form_validation->set_message('required','%s không được bỏ trống');
		       	
		       	$this->form_validation->set_rules('content','content','required');

		       	$this->form_validation->set_message('is_unique','%s đã tồn tại');

		       	$this->form_validation->set_rules('author','author','required');

		       	$this->form_validation->set_rules('categories','categories','required');

	    		if ($this->form_validation->run()) {
	    			
					$list = array(

						"title" => $this->input->post("title"),
						
						"content" => $this->input->post("content"),
						
						"image" => $_FILES['userfile']['name'],
						
						"author" => $this->input->post("author"),

						"categories" => $this->input->post("categories"),
						
					);
					
					if($list['image'] == '') {

					$list['image'] = 'doanthi';
	    			
	    			} 

					$this->load->model('Marticle');

					$this->Marticle->insert($list);

					$config['upload_path'] = './asset/images/';

					$config['allowed_types'] = 'gif|jpg|png';

					$this->load->library('upload', $config);

					if (!$this->upload->do_upload()) {

						$error = array('error' => $this->upload->display_errors());

					} else {

						$file_data =  $this->upload->data();
						
						$data['img'] = base_url().'/images'.$file_data['file_name'];

					}

				redirect('article/home');	  

			}
					       
       	} else if ($this->input->post("back")) {

       		redirect('article/home');	  
	       			    	
	    }
	       
		$this->load->view('home/header',$this->data);

		$this->load->view('article/add',$this->data);
	
	}

	public function update($id) {

    	$this->load->library('form_validation');
       
       	$this->load->helper('form');

   		$this->load->model('Marticle');

      	$data['student'] = $this->Marticle->getsinhvien($id); 
      	
      	if ($this->input->post("submit")) {

	       	$this->form_validation->set_rules('title','title','required');

	       	$this->form_validation->set_message('required','%s không được bỏ trống');
	       	
	       	$this->form_validation->set_rules('content','content','required');

	       	$this->form_validation->set_message('is_unique','%s đã tồn tại');

	       	$this->form_validation->set_rules('author','author','required');

	       	$this->form_validation->set_rules('categories','categories','required');
    
	       	if ($this->form_validation->run()) {
	       		
	       		if ($_FILES['userfile']['name'] == '') {

	       			$list_update = array(

						"title" => $this->input->post("title"),
						
						"content" => $this->input->post("content"),
						
						"author" => $this->input->post("author"),

						"categories" => $this->input->post("categories"),
					
					);
	       			
	       		}
				
				$this->Marticle->update($id,$list_update);	

				$config['upload_path'] = './asset/images/';

				$config['allowed_types'] = 'gif|jpg|png';

				$this->load->library('upload', $config);				

				if (!$this->upload->do_upload()) {

					$error = array('error' => $this->upload->display_errors());
					
				} else {
					
					$file_data =  $this->upload->data();
					
					$data['img'] = base_url().'/images'.$file_data['file_name'];

				}

				redirect('article/home');	   

			}
	         
       	} else if ($this->input->post("back")) {

       		redirect('article/home');	   
       			    
       	}
       	
   		$this->load->view("article/update",$data);

    }

	public function delete($id) {
 	
	 	$this->load->model('Marticle');

	 	$this->Marticle->delete($id);
	 	
	 	redirect('article/home');	    
    
    }

    public function delete_multiple() {

     	$this->load->model('Marticle');

		$dataId = $this->input->post('id');

		foreach ($dataId as $key => $value) {

			if ($value != 'on') {

				$check = $this->Marticle->delete_multiple($value);
				
			}

		} 

    }

    public function show() {

    	$this->load->model('Marticle');
		
		$this->data['student'] = $this->Marticle->get_all();

    	$this->load->view('home/header',$this->data);

    	$this->load->view('article/show');

    }

     public function upload($id) {

    	$this->load->library('form_validation');
       
       	$this->load->helper('form');

   		$this->load->model('Marticle');

      	$data['student'] = $this->Marticle->getsinhvien($id); 		
	       		
   		if ($_FILES['userfile']['name'] == '' && $this->input->post("img_name") == 'doanthi' ) {

   			$list_update = array(

				"image" => $this->input->post("img_name"),

			);
   			
   		} else if ($_FILES['userfile']['name'] == '' && $this->input->post("img_name") != 'doanthi' ) {

   			$list_update = array(

				"image" => $this->input->post("img_name"),

			);

   		} else {

   			$list_update = array(

				"image" => $_FILES['userfile']['name'],
			
			);

   		}
				
		$this->Marticle->update($id,$list_update);

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

		redirect('article/home');  

    }

    public function preview($id) {

    	$this->load->model('Marticle');

      	$data['student'] = $this->Marticle->getsinhvien($id); 	

    	$this->load->view("article/preview",$data);

    }		
   
}

