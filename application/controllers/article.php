<?php 

if (!defined('BASEPATH')) exit ('No direct script access allowed');  

class article extends MY_Controller {

	public function __construct() {
	        
        parent::__construct();

        $this->load->helper("slug", "form");

        $this->load->helper('date');

        $this->load->library('form_validation');

        if (!$this->ion_auth->logged_in()) {
            
            redirect('home/login');

        }	

        $this->load->view('home/header', $this->data);
        
    }

	public function home() {

		if ($this->data['UserPr'] == true && $this->data['AdminPr'] == false && $this->data['MemberPr'] == false ) {
            
            redirect('home/index');

        }

		$this->load->model('Mcategories');

		$this->load->model('Msinhvien');

		$listCategories = $this->Mcategories->get_all_categories();

		$listStudent = $this->Msinhvien->get_all_sinhvien('esc');

		$newArrayStudent = array();

		if (count($listStudent) > 0) {

        	foreach ($listStudent as $listStudenKey => $listStudenValue) {

        		if ($listStudenValue['first_name'] == "" && $listStudenValue['last_name'] == "") {

        			$newArrayStudent[] = $listStudenValue['username'];

        		} else {

        			$newArrayStudent[] = $listStudenValue['first_name'].$listStudenValue['last_name'];

        		}

	        }

	        $this->data['arraystudent'] = $newArrayStudent;

        }

        if (count($listCategories) > 0) {

        	foreach ($listCategories as $listCategoriesKey => $listCategoriesValue) {

	        	if ($listCategoriesValue['is_deleted'] == 0) {

	        		$newArray[$listCategoriesValue['id']] = $listCategoriesValue['name'];
	        		
	        	}  else {

	        		$newArray[$listCategoriesValue['id']] = "All";

	        	}

	        }

	        $this->data['newArray'] = $newArray;

        }

		$this->load->model('Marticle');

		$this->data['article'] = $this->Marticle->get_all_article();

		$this->load->view('article/home', $this->data);

	}

	public function add() {

		if ($this->data['AdminPr'] == false) {
            
            redirect('home/index');

        }

		$this->load->model('Marticle');

       	$listArticle = $this->Marticle->get_all_article();

       	$this->load->model('Msinhvien');

       	$this->data['authorSv'] = $this->Msinhvien->get_all_sinhvien('esc');

       	$slug = create_slug($this->input->post('title')).'.html';

       	$this->load->model('Mcategories');

       	$this->data['categories'] = $this->Mcategories->get_all_categories();

       	$values = $this->Marticle->get_slug_article($slug);

       	if ($this->input->post("submit")) {

       		if (count($listArticle) > 0) {

       			foreach ($listArticle as $keylistArticle => $valuelistArticle) {

	       			if ($this->input->post('title') == $valuelistArticle['title'] && $valuelistArticle['is_deleted'] == "0" )  {

	       				$this->form_validation->set_rules('title', 'title', '|is_unique[article.title]');
	       			
	       			}
	   		
	   			}

       		}

        	$this->form_validation->set_rules('slug', 'slug', '|is_unique[article.slug]');
   			
	       	$this->form_validation->set_rules('title', 'title', 'required');

	       	$this->form_validation->set_message('required', '%s not be empty');

	       	$this->form_validation->set_message('is_unique', '%s already exists');

	       	$this->form_validation->set_rules('author', 'author', 'required');

	       	$this->form_validation->set_rules('categories', 'categories', 'required');

    		if ($this->form_validation->run()) {

    			$_FILES['userfile']['name'] = time().substr($_FILES['userfile']['name'], -4);

    			if (count($values) > 0) {

    				$this->session->set_flashdata('message_add', '<div class="fail">Slug exists<button type="button" class="close" data-dismiss="alert">×</button></div>');

                    redirect('article/add');

    			} else {

    				$listCreate = array(

						"title" => $this->input->post('title'),
						
						"content" => $this->input->post("content"),
						
						"image" => $_FILES['userfile']['name'],
						
						"author" => $this->input->post("author"),

						"categories" => $this->input->post("categories"),

						"is_deleted" => 0,

						"slug" => $slug,

						"date" => date('d/n/Y'),

					);

					if ($list['image'] == '') {

						$list['image'] = 'doanthi.jpg';
	    			
	    			} 

	    			$config['max_size'] = 20480;

					$config['upload_path'] = './medias/article/';

					$config['allowed_types'] = 'gif|jpg|png';

					$this->load->library('upload', $config);

					if (!$this->upload->do_upload()) {

						$this->session->set_flashdata('message_add', '<div class="fail">'.$this->upload->display_errors().'<button type="button" class="close" data-dismiss="alert">×</button></div>');

                    	redirect('article/add');

					} else {

						if ($this->Marticle->insert($listCreate)) {

							$this->session->set_flashdata('message_add', '<div class="succes">Add new article success<button type="button" class="close" data-dismiss="alert">×</button></div>');

                    		redirect('article/home');

						} else {

 							$this->session->set_flashdata('message_add', '<div class="fail">Add new article fail<button type="button" class="close" data-dismiss="alert">×</button></div>');

                    		redirect('article/home');

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

			$checkSlugs = $this->Marticle->get_slug_article($slug);

			if (count($checkSlugs) > 0) {

				if ($this->data['AdminPr'] == false) {
	            
	            	redirect('home/index');

	        	}

				$this->load->model('Mcategories');

				$data['categoriess'] = $this->Mcategories->get_all_categories();

				$this->load->model('Msinhvien');

       			$data['authorSv'] = $this->Msinhvien->get_all_sinhvien('esc');

				$checkSlug = create_slug($this->input->post('slug'));

		      	$data['student'] = $this->Marticle->get_slug_article($slug); 
		      	
		      	if ($this->input->post("submit")) {

			       	$this->form_validation->set_rules('title','title','required');

			       	$this->form_validation->set_message('required','%s không được bỏ trống');

			       	$this->form_validation->set_rules('author','author','required');

			       	$this->form_validation->set_rules('categories','categories','required');
		    
			       	if ($this->form_validation->run()) {

		       			$listUpdate = array(

							"title" => $this->input->post("title"),
							
							"content" => $this->input->post("content"),
							
							"author" => $this->input->post("author"),

							"categories" => $this->input->post("categories"),

							"slug" => $checkSlug.'.html',
						
						);	
						
						if ($this->Marticle->update_slug_article($slug, $listUpdate)) {

							$this->session->set_flashdata('message_add', '<div class="succes">Update article success<button type="button" class="close" data-dismiss="alert">×</button></div>');

		                   	redirect('article/update/'.$slug);
							
						}

					}
			         
		       	} else if ($this->input->post("back")) {

		       		redirect('article/home');	   
		       			    
		       	}
		       	
		   		$this->load->view("article/update", $data);
				
			} else {

    			redirect('article/home');

    		}

	   	} else {

	   		redirect('article/home');
	   		
	   	}

    }

    public function upload($id) {

		if ($this->data['AdminPr'] == false) {
            
            redirect('home/index');

        }

     	if (isset($id) && count($id) > 0) {

     		$this->load->model('Marticle');

    		$checkId = $this->Marticle->get_article($id);

    		if (count($checkId) > 0) {

	    		$this->data['student'] = $this->Marticle->get_article($id);

		      	if ($_FILES['userfile']['name'] == '') {

		      		$this->session->set_flashdata('message_upload', '<div class="fail">You did not select a image to upload.<button type="button" class="close" data-dismiss="alert">×</button></div>');
						
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

						$listUpdate = array(

							"image" =>$this->input->post('img_name'),

						);

						if ($this->Marticle->update($id, $listUpdate)) {
							
							$this->session->set_flashdata('message_upload', '<div class="fail">Upload fail. please upload the picture again<button type="button" class="close" data-dismiss="alert">×</button></div>');

							redirect('article/update/'.$checkId['slug']);  

						}	

					} else {

						if (file_exists("medias/article/".$this->data['student']['image'])) {
					
							if ($this->data['student']['image'] != "doanthi.jpg" ) {

								unlink("medias/article/".$this->data['student']['image']);

							}	

						}

						$listUpdate = array(

							"image" =>  $_FILES['userfile']['name'],

						);

						if ($this->Marticle->update($id, $listUpdate)) {

							$this->session->set_flashdata('message_upload', '<div class="succes">Upload success<button type="button" class="close" data-dismiss="alert">×</button></div>');

							redirect('article/update/'.$checkId['slug']);
							
						}

					}

				}
     			
     		} else {

    			redirect('article/home');

    		}

		} else {

    		redirect('article/home');

    	}

	}

    public function preview($slug) {

    	if (isset($slug) && count($slug) > 0) {

			$this->load->model('Marticle');

			$checkSlug = $this->Marticle->get_slug_article($slug);

			if (count($checkSlug) > 0) {

				$this->data['student'] = $this->Marticle->get_slug_article($slug); 	

		    	$this->load->model('Mcategories');

		      	$listCategories = $this->Mcategories->get_all_categories();

		      	$this->load->model('Msinhvien');

		      	$listStudent = $this->Msinhvien->get_all_sinhvien('esc');

	        	$categoryVariable = array();

	        	if (count($listCategories) > 0) {

	        		foreach ($listCategories as $keyCategories => $listCategoriesValue) {

			        	if ($listCategoriesValue['is_deleted'] == 0) {

			        		$categoryVariable[$listCategoriesValue['id']] = $listCategoriesValue['name'];
			        		
			        	}  else {

			        		$categoryVariable[$listCategoriesValue['id']] = "All";

			        	}

			        }

	        	}

	        	$newArrayStudent = array();

				if (count($listStudent) > 0) {

		        	foreach ($listStudent as $listStudenKey => $listStudenValue) {

		        		if ($listStudenValue['first_name'] == "" && $listStudenValue['last_name'] == "") {

		        			$newArrayStudent[] = $listStudenValue['username'];

		        		} else {

		        			$newArrayStudent[] = $listStudenValue['first_name'].$listStudenValue['last_name'];

		        		}

			        }

		        }

 				$this->data['arraystudent'] = $newArrayStudent;

		        $this->data['newArray'] = $categoryVariable;

				$this->data['categories'] = $listCategories;

				$this->data['article'] = $this->Marticle->get_all_article();

		    	$this->load->view("article/preview", $this->data);

			} else {

    			redirect('article/home');

    		}	      	

    	} else {

    		redirect('article/home');

    	}

    }	

    public function delete_checkbox() {

		$dataId = $this->input->post('id');

		foreach ($dataId as $keyDataId => $valDataId) {

			$this->load->model('Marticle');

			$data = $this->Marticle->get_article($valDataId);

			$listUpdate = array(	
		
				"is_deleted" => 1
				
			);	

			if (file_exists("medias/article/".$data['image']) && $data['image'] != "doanthi.jpg") {
			        
		        if (unlink("medias/article/".$data['image'])) {

		            $this->Marticle->delete_checkbox($valDataId, $listUpdate);  
		        
		        }
     			
     		} else if (file_exists("medias/article/".$data['image']) && $data['image'] == "doanthi.jpg") {

     			$this->Marticle->delete_checkbox($valDataId, $listUpdate);  

     		}
	
		}		

    }

}