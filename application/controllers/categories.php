
<?php 

if (!defined('BASEPATH')) exit ('No direct script access allowed');  

class Categories extends MY_Controller {

    public function __construct() {
        
        parent::__construct();

        $this->load->library('form_validation');
       
        $this->load->helper('form');

        if (!$this->ion_auth->logged_in()) {
            
            redirect('home/login');

        }
        
        if ($this->data['role'] == 'User') {
            
            redirect('home/index');

        }

        $this->load->view('home/header',$this->data);
        
    }

    public function home() {

        $this->load->model('Mcategories');

        $this->db->order_by("id","desc");
        
        $this->data['categories'] = $this->Mcategories->get_all_categories();

        $this->load->view('categories/show',$this->data);

    }

    public function add() {

        $this->load->model('Mcategories');

        if ($this->input->post('submit')) {

            $this->form_validation->set_rules('input_text','Name','required');

            $this->form_validation->set_message('required','%s không được bỏ trống');

            $check_exist = $this->Mcategories->get_exist_categories($this->input->post('input_text'));

            if (count($check_exist) > 0) {
              
                $this->form_validation->set_rules('input_text','Name','required|is_unique[categories.name]');

                $this->form_validation->set_message('required','%s không được bỏ trống');
            
                $this->form_validation->set_message('is_unique','%s đã tồn tại');

            }

            if ($this->form_validation->run()) {
                
                $list = array(

                    "name" => $this->input->post("input_text"),

                    "is_delete" => 0,
                    
                );
          
                $this->load->model('Mcategories');

                $this->Mcategories->insert($list);    

                redirect('categories/home');    

            }

        }
        
        $this->load->view('categories/add',$this->data);

    }

    public function update($id) {

        if (isset($id) && count($id) > 0) {

            $this->load->model('Mcategories');

            $data['student'] = $this->Mcategories->get_id_categories($id);      
            
            if ($this->input->post("change")) {
              
                $this->form_validation->set_rules('input_text','name','required');

                $this->form_validation->set_message('required','%s không được bỏ trống');
                
                if ($this->form_validation->run()) {

                    $list_update = array(

                        "name" => $this->input->post("input_text"),
                     
                    );
                   
                    $this->Mcategories->update($id,$list_update); 

                    redirect('categories/home');

                }
                 
            } 

            $this->load->view("categories/update",$data);

        } else {

            redirect('categories/home');

        } 

    }

    public function delete_multiple() {

        $this->load->model('Mcategories');

        $dataId = $this->input->post('id');

        foreach ($dataId as $key => $value) {

            if ($value == 1) {
                
                $list_update = array(   
        
                    "is_delete" => 0,
                
                );

                $this->Mcategories->delete_checkbox($value,$list_update);  

            } else {

                $list_update = array(   
        
                    "is_delete" => 1,
                
                );

                $this->Mcategories->delete_checkbox($value,$list_update); 

            }  

        } 

    }       
   
}
