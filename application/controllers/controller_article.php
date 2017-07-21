
<?php 

if (!defined('BASEPATH')) exit ('No direct script access allowed');  

class Controller_article extends MY_Controller {
	

public function home(){



		$this->load->model('model_article');
		
		$this->data['student'] = $this->model_article->get_all();

		$this->load->view('home/header',$this->data);

		$this->load->view('view_article/home',$this->data);

	
}

public function add(){

		$this->load->library('form_validation');
       
       	$this->load->helper('form');

       	$this->load->model('Model_categories');

       	$this->data['student'] = $this->Model_categories->get_all();
       
       	if ($this->input->post("submit")) {

	       	$this->form_validation->set_rules('title','title','required|is_unique[article.title]');

	       	$this->form_validation->set_message('required','%s không được bỏ trống');
	       	
	       	$this->form_validation->set_rules('content','content','required');

	       	$this->form_validation->set_message('is_unique','%s đã tồn tại');

	       	$this->form_validation->set_rules('author','author','required');

	       	$this->form_validation->set_rules('categories','categories','required');

	    		if ($this->form_validation->run()) {
	    			
					$list = array(

						"title"=>$this->input->post("title"),
						
						"content"=>$this->input->post("content"),
						
						"image"=>$_FILES['userfile']['name'],
						
						"author"=>$this->input->post("author"),

						"categories"=>$this->input->post("categories"),
						
					);
					
					
					if($list['image']==''){

					$list['image'] = 'doanthi';
	    			
	    			} 
					$this->load->model('model_article');

					$this->model_article->insert($list);

					$config['upload_path'] = './images/';

					$config['allowed_types'] = 'gif|jpg|png';

					$this->load->library('upload', $config);

					if (!$this->upload->do_upload()) {

						$error = array('error' => $this->upload->display_errors());

					} else {

						$file_data=  $this->upload->data();
						
						$data['img']=base_url().'/images'.$file_data['file_name'];

					}

						header('Location:'.base_url("/Controller_article/home"));  

				}

		
						       
       	} else if ($this->input->post("back")) {

       		header('Location:'.base_url("/Controller_article/home"));   
       			    	
       	}
	
       
		$this->load->view('home/header',$this->data);

		$this->load->view('view_article/add',$this->data);

	
	}

	 public function update($id) {

    	if ($this->input->post("change_password")) {

       		header('Location:'.base_url("/index.php/sinhvien/changepass/$id"));   
       	
       	}

    	$this->load->library('form_validation');
       
       	$this->load->helper('form');

   		$this->load->model('model_article');

      	$data['student'] = $this->model_article->getsinhvien($id); 		
      	
      	if ($this->input->post("insert")) {

	      
	       	$this->form_validation->set_rules('title','title','required');

	       	$this->form_validation->set_message('required','%s không được bỏ trống');
	       	
	       	$this->form_validation->set_rules('content','content','required');

	       	$this->form_validation->set_message('is_unique','%s đã tồn tại');

	       	$this->form_validation->set_rules('author','author','required');

	       	$this->form_validation->set_rules('categories','categories','required');
    
	       	if ($this->form_validation->run()) {

	       		
	       		if ($_FILES['userfile']['name']=='' && $this->input->post("img_name")=='doanthi' ) {

	       				// $_FILES['userfile']['name']=$this->input->post("img_name");

	       			$list_update= array(

					
						"title"=>$this->input->post("title"),
						
						"content"=>$this->input->post("content"),
						
					
						"image"=>$this->input->post("img_name"),
						
						"author"=>$this->input->post("author"),

						"categories"=>$this->input->post("categories"),
					
				);
	       			
	       		} else if ($_FILES['userfile']['name']=='' && $this->input->post("img_name")!='doanthi' ) {

	       			$list_update= array(

					"title"=>$this->input->post("title"),
					
					"content"=>$this->input->post("content"),
					
					"image"=>$this->input->post("img_name"),
						
					"author"=>$this->input->post("author"),

					"categories"=>$this->input->post("categories"),
					
				);

	       		} else {

	       			$list_update= array(

						"title"=>$this->input->post("title"),
						
						"content"=>$this->input->post("content"),
						
						"image"=>$_FILES['userfile']['name'],
						
						"author"=>$this->input->post("author"),

						"categories"=>$this->input->post("categories"),
					
				);

	       		}
				
				$this->model_article->update($id,$list_update);	

				$config['upload_path'] = './images/';

				$config['allowed_types'] = 'gif|jpg|png';

				$this->load->library('upload', $config);				

				if (!$this->upload->do_upload()) {

					$error = array('error' => $this->upload->display_errors());

					
				} else {
					
					$file_data=  $this->upload->data();
					
					$data['img']=base_url().'/images'.$file_data['file_name'];

				}

				header('Location:'.base_url("/Controller_article/home"));  

			}
	         
       	} else if ($this->input->post("back")) {

       		header('Location:'.base_url("/Controller_article/home"));    
       			    
       	}
       	
       	$this->load->view('home/header',$this->data);

   		$this->load->view("view_article/update",$data);

    }

    	public function delete($id) {
     	
     	$this->load->model('model_article');

     	$this->model_article->delete($id);
     	
     	header('Location:'.base_url("/Controller_article/home"));  
    
    }

    public function delete_multiple() {

     	$this->load->model('model_article');

		$dataId = $this->input->post('id');

		foreach ($dataId as $key => $value) {

			if ($value != 'on') {

				$check = $this->model_article->delete_multiple($value);
				
			}

		}   

    }

    public function show(){
    		$this->load->model('model_article');
		
		$this->data['student'] = $this->model_article->get_all();

    	$this->load->view('home/header',$this->data);

    	$this->load->view('view_article/show');
    }
    		
   
}
