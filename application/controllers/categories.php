
<?php 

if (!defined('BASEPATH')) exit ('No direct script access allowed');  

class categories extends MY_Controller {
    public function __construct() {
        
        parent::__construct();

        if (!$this->ion_auth->logged_in()) {
            
            redirect('home/login');

        }
        
    }

    public function add(){

        $this->load->model('model_categories');
        
        $this->data['student'] = $this->model_categories->get_all();

        $this->load->library('form_validation');
       
        $this->load->helper('form');

        if ($this->input->post('submit')) {
          
        $this->form_validation->set_rules('input_text','Name','required|is_unique[categories.name]');

        $this->form_validation->set_message('required','%s không được bỏ trống');
        
        $this->form_validation->set_message('is_unique','%s đã tồn tại');

            if ($this->form_validation->run()) {
                
                $list = array(

                    "name"=>$this->input->post("input_text"),
                    
                    
                );
          
            $this->load->model('model_categories');

            $this->model_categories->insert($list);        

            header('Location:'.base_url("/categories/add"));  

            }

        }
        
        $this->load->view('home/header',$this->data);

        $this->load->view('categories/add_show',$this->data);

    }

    

    public function update($id) {

        if ($this->input->post("change_password")) {

            header('Location:'.base_url("/index.php/sinhvien/changepass/$id"));   
        
        }

        $this->load->library('form_validation');
       
        $this->load->helper('form');

        $this->load->model('model_categories');

        $data['student'] = $this->model_categories->getsinhvien($id);      
        
        if ($this->input->post("change")) {
          
            $this->form_validation->set_rules('name','name','required');

            $this->form_validation->set_message('required','%s không được bỏ trống');
            
            if ($this->form_validation->run()) {

                $list_update = array(

                    "name"=>$this->input->post("name"),
                 
                );
               
                $this->model_categories->update($id,$list_update); 

                header('Location:'.base_url("/categories/add"));  

            }
             
        } 
        
        $this->load->view('home/header',$this->data);

        $this->load->view("categories/update",$data);
    
    }


    public function delete($id) {
    
        $this->load->model('model_categories');

        $this->model_categories->delete($id);
        
        header('Location:'.base_url("/categories/add"));  
    
    }

    public function delete_multiple() {

        $this->load->model('model_categories');

        $dataId = $this->input->post('id');

        foreach ($dataId as $key => $value) {

            if ($value != 'on') {

                $check = $this->model_categories->delete_multiple($value);
                
            }

        }   

    }       
   
}
