
<?php 

if (!defined('BASEPATH')) exit ('No direct script access allowed');  

class article extends MY_Controller {

	public function __construct() {
	        
        parent::__construct();

        $this->load->helper("slug" , "form" );

        $this->load->helper('date');

        $this->load->library('form_validation');

        if (!$this->ion_auth->logged_in()) {
            
            redirect('home/login');

        }	

        if ($this->data['role'] == 'User') {
		
			redirect('home/index');

		}			

        $this->load->view('home/header',$this->data);



    }

	public function home() {

		$this->load->model('Marticle');

		$this->load->model('Mcategories');

		$listCg = $this->Mcategories->get_all_categories();

        $newArray = [];

        if (isset($listCg) && count($listCg) > 0) {

        	foreach ($listCg as $listCgKey => $listCgValue) {

	        	if ($listCgValue['is_delete'] == 0) {

	        		$newArray[$listCgValue['id']] = $listCgValue['name'];
	        		
	        	}  else {

	        		$newArray[$listCgValue['id']] = "All";
	        	}

	        }

        }

        $this->data['newArray'] = $newArray;

		$this->data['categories'] =  $listCg;

		$this->data['article'] = $this->Marticle->get_all_article();

		$this->load->view('article/home',$this->data);

	}

	public function add() {

		$this->load->model('Marticle');

       	$data = $this->Marticle->get_all_article();

       	$this->load->model('Mcategories');

       	$slug = create_slug($this->input->post('title')).'.html';

       	$this->data['categories'] = $this->Mcategories->get_all_categories();

       	$values = $this->Marticle->get_delete_article($slug);

       	$format = 'DATE_RFC822';
        
		$time = time(); 

       	if ($this->input->post("submit")) {

       		if (isset($data) && count($data) > 0) {

       			foreach ($data as $key => $value) {

	       			if ($this->input->post('title') == $value['title'] && $value['is_delete'] == "0" )  {

	       				$this->form_validation->set_rules('title','title','|is_unique[article.title]');
	       			
	       			}
	   		
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

    			$_FILES['userfile']['name'] = time().substr($_FILES['userfile']['name'], -4);

    			if (count($values) > 0) {

    				$data = "Slug exists";

    				$this->data['slug'] = $data;

    			} else {

    				$list = array(

						"title" => $this->input->post('title'),
						
						"content" => $this->input->post("content"),
						
						"image" => $_FILES['userfile']['name'],
						
						"author" => $this->input->post("author"),

						"categories" => $this->input->post("categories"),

						"is_delete" => 0,

						"slug" => $slug,

						"date" => standard_date($format, $time),
					
					);

					if ($list['image'] == '') {

						$list['image'] = 'doanthi.jpg';
	    			
	    			} 

	    			$config['max_size'] = 20480;

					$config['upload_path'] = './medias/article/';

					$config['allowed_types'] = 'gif|jpg|png';

					$this->load->library('upload', $config);

					if (!$this->upload->do_upload()) {

						$this->data['error'] = array('error' => $this->upload->display_errors());

					} else {

						if ($this->Marticle->insert($list)) {
							
							$file_data =  $this->upload->data();
						
							$data['img'] = base_url().'/medias/article'.$file_data['file_name'];

							$success = 'Add new success';

							$this->data['success'] = $success;

						} else {

							$add_fail = 'Add new success';

							$this->data['success'] = $add_fail;

						}

					}

	    		}

			}
				       
   		} else if ($this->input->post("back")) {

   			redirect('article/home');	  
       			    	
    	}

		$this->load->view('article/add',$this->data);

	}

	public function update($slug) {

		if (isset($slug) && count($slug) > 0) {

			$this->load->model('Marticle');

			$this->load->model('Mcategories');

			$data['categoriess'] = $this->Mcategories->get_all_categories();

			$checkSlug = create_slug($this->input->post('slug'));

	      	$data['student'] = $this->Marticle->get_slug_article($slug); 
	      	
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

							"slug" => $checkSlug.'.html',
						
						);
		       			
		       		}
					
					$this->Marticle->update_slug_article($slug,$list_update);

					redirect('article/home');	   

				}
		         
	       	} else if ($this->input->post("back")) {

	       		redirect('article/home');	   
	       			    
	       	}
	       	
	       
	       	
	   		$this->load->view("article/update",$data);

	   	} else {

	   		redirect('article/home');
	   		
	   	}

    }

    public function upload($id) {

     	if (isset($id) && count($id) > 0) {

	     	$this->load->model('Marticle');

	      	$this->data['student'] = $this->Marticle->get_article($id);

	      	if ($_FILES['userfile']['name'] == '') {
					
				redirect('article/update/'.$this->data['student']['slug']); 

			}	

			$config['upload_path'] = './medias/article/';

			$config['allowed_types'] = 'gif|jpg|png';

			$this->load->library('upload', $config);

			if ($_FILES['userfile']['name'] == $this->input->post('img_name')) {

				redirect('article/update/'.$this->data['student']['slug']); 

			} else {
				
				$_FILES['userfile']['name'] = time().substr($_FILES['userfile']['name'], -4);

				if (!$this->upload->do_upload()) {

					$list_update = array(

						"image" =>$this->input->post('img_name'),

					);

					$this->Marticle->update($id,$list_update);

					redirect('article/upload_fail/'.$this->data['student']['slug']); 

				} else {

					if (file_exists("medias/article/".$this->data['student']['image'])) {
				
						if ($this->data['student']['image'] != "doanthi.jpg" ) {

							unlink("medias/article/".$this->data['student']['image']);

						}	

					}

					$list_update = array(

						"image" =>  $_FILES['userfile']['name'],

					);

					$this->Marticle->update($id,$list_update);

					redirect('article/update/'.$this->data['student']['slug']); 

				}
			}

		} else {

    		redirect('article/home');

    	}

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

		        	if ($listCgValue['is_delete'] == 0) {

		        		$newArray[$listCgValue['id']] = $listCgValue['name'];
		        		
		        	}  else {

		        		$newArray[$listCgValue['id']] = "All";
		        	}

		        }

        	}

	        $this->data['newArray'] = $newArray;

			$this->data['categories'] =  $listCg;

			$this->data['article'] = $this->Marticle->get_all_article();

	    	$this->load->view("article/preview",$this->data);

    	} else {

    		redirect('article/home');

    	}

    }	

    public function delete_checkbox() {

    	$this->load->model('Marticle');

		$dataId = $this->input->post('id');

		foreach ($dataId as $key => $value) {

			$data = $this->Marticle->get_article($value);

			$list_update = array(	
		
				"is_delete" => 1,
				
			);	

			if (file_exists("medias/article/".$data['image']) && $data['image'] != "doanthi.jpg") {
			        
		        if (unlink("medias/article/".$data['image'])) {

		            $this->Marticle->delete_checkbox($value,$list_update);  
		        
		        }
     			
     		} else if (file_exists("medias/article/".$data['image']) && $data['image'] == "doanthi.jpg"){

     			$this->Marticle->delete_checkbox($value,$list_update);  

     		}
	
		}		

    }

    public function upload_fail($slug) {

    	if (isset($slug) && count($slug) > 0) {
    		
    		$this->data['slug'] = $slug;

    		$this->load->view('article/upload_fail',$this->data);

    	} else {

			redirect('article/home');

    	}

    }	
   
}

