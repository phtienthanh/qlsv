
<?php 

if (!defined('BASEPATH')) exit ('No direct script access allowed');  

class article extends MY_Controller {

	public function __construct() {
	        
	        parent::__construct();

	        if (!$this->ion_auth->logged_in()) {
	            
	            redirect('home/login');

	        }	

	        if ($this->data['first_login'] == null) {
					
				redirect('sinhvien/changepass/'.$this->data['id']);

			}

	        if ($this->data['role'] == 'User') {
			
				redirect('home/index');

			}			

	        $this->load->view('home/header',$this->data);

	        $this->load->helper("slug" , "form" );

	        $this->load->library('form_validation');

	    }

	public function home() {

		$this->load->model('Marticle');

		$this->data['student'] = $this->Marticle->get_all();

		$this->load->view('article/home',$this->data);

	}

	public function add() {

		$this->data = null;

		$this->load->model('Marticle');

       	$data = $this->Marticle->get_all();

       	$data2 = '';

		$this->data['slug'] = $data2;

       	$this->load->model('Mcategories');

       	$slug = create_slug($this->input->post('title')).'.html';

       	$this->data['student'] = $this->Mcategories->get_all();

       	$values = $this->Marticle->get_article2($slug);

       	if ($this->input->post("submit")) {

       		foreach ($data as $key => $value) {

       			if ($this->input->post('title') == $value['title'] && $value['delete_is'] == "0" )  {

       				$this->form_validation->set_rules('title','title','|is_unique[article.title]');
       			
       			}
   		
   			}

        	$this->form_validation->set_rules('slug','slug','|is_unique[article.slug]');
   			
	       	$this->form_validation->set_rules('title','title','required');

	       	$this->form_validation->set_message('required','%s không được bỏ trống');
	       	
	       	$this->form_validation->set_rules('content','content','required');

	       	$this->form_validation->set_message('is_unique','%s đã tồn tại');

	       	$this->form_validation->set_rules('author','author','required');

	       	$this->form_validation->set_rules('categories','categories','required');

    		if ($this->form_validation->run()) {

    			if( count($values) > 0){

    				$data = "Slug exists";

    				$this->data['slug'] = $data;

    			} else {

    				$list = array(

						"title" => $this->input->post('title'),
						
						"content" => $this->input->post("content"),
						
						"image" => $_FILES['userfile']['name'],
						
						"author" => $this->input->post("author"),

						"categories" => $this->input->post("categories"),

						"delete_is" =>0,

						"slug" => $slug,
					
					);

					if($list['image'] == '') {

						$list['image'] = 'doanthi.jpg';
	    			
	    			} 

	    			$this->Marticle->insert($list);

					$config['upload_path'] = './asset/images/article/';

					$config['allowed_types'] = 'gif|jpg|png';

					$this->load->library('upload', $config);

					if (!$this->upload->do_upload()) {

						$error = array('error' => $this->upload->display_errors());

					} else {

						$file_data =  $this->upload->data();
						
						$data['img'] = base_url().'/images/article'.$file_data['file_name'];

					}

				redirect('article/home');

	    		}

			}
				       
   		} else if ($this->input->post("back")) {

   			redirect('article/home');	  
       			    	
    	}

		$this->load->view('article/add',$this->data);

	}

	public function update($slug) {

		$this->load->model('Marticle');

		$slug1 = create_slug($this->input->post('slug'));

      	$data['student'] = $this->Marticle->get_article1($slug); 
      	
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

						"slug" =>$slug1.'.html',
					
					);
	       			
	       		}
				
				$this->Marticle->update1($slug,$list_update);

				$config['upload_path'] = './asset/images/article/';

				$config['allowed_types'] = 'gif|jpg|png';

				$this->load->library('upload', $config);			

				if (!$this->upload->do_upload()) {

					$error = array('error' => $this->upload->display_errors());
					
				} else {
					
					$file_data =  $this->upload->data();
					
					$data['img'] = base_url().'/images/article'.$file_data['file_name'];

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

    	$this->load->view('article/show');

    }

     public function upload($id) {

     	$this->load->model('Marticle');

      	$data['student'] = $this->Marticle->get_article($id); 		
	       		
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

		$config['upload_path'] = './asset/images/article/';

		$config['allowed_types'] = 'gif|jpg|png';

		$this->load->library('upload', $config);				

		if (!$this->upload->do_upload()) {

			$error = array('error' => $this->upload->display_errors());

			$this->load->view('sinhvien/insert', $error);

		} else {
			
			$file_data =  $this->upload->data();
			
			$data['img'] = base_url().'/images/article'.$file_data['file_name'];

		}

		redirect('article/home');  

    }

    public function preview($slug) {

    	$this->load->model('Marticle');

      	$data['student'] = $this->Marticle->get_article1($slug); 	

    	$this->load->view("article/preview",$data);

    }	

    public function delete_checkbox() {

    	$this->load->model('Marticle');

		$dataId = $this->input->post('id');

		foreach ($dataId as $key => $value) {

			$data = $this->Marticle->get_article($value);

			$list_update = array(	
		
				"delete_is" => 1,
				
			);	

			if (file_exists("asset/images/article/".$data['image']) && $data['image'] != "doanthi.jpg" ) {
			        
		        if(unlink("asset/images/article/".$data['image'])) {

		            $this->Marticle->delete_checkbox($value,$list_update);  
		        
		        }
     			
     		} else if (file_exists("asset/images/article/".$data['image']) && $data['image'] == "doanthi.jpg" ){

     			$this->Marticle->delete_checkbox($value,$list_update);  

     		}
	
		}		

    }	
   
}

