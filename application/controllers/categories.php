
<?php 

if (!defined('BASEPATH')) exit ('No direct script access allowed');  

class Categories extends MY_Controller {

    public function __construct() {
        
        parent::__construct();

        if (!$this->ion_auth->logged_in()) {
            
            redirect('home/login');

        }
        
    }

    public function home(){

        $this->load->model('Mcategories');
        
        $this->data['student'] = $this->Mcategories->get_all();

        $this->load->view('home/header',$this->data);

        $this->load->view('categories/show',$this->data);

    }

    public function add() {

        $this->load->model('Mcategories');
        
        $this->data['student'] = $this->Mcategories->get_all();

        $this->load->library('form_validation');
       
        $this->load->helper('form');

        if ($this->input->post('submit')) {
          
        $this->form_validation->set_rules('input_text','Name','required|is_unique[categories.name]');

        $this->form_validation->set_message('required','%s không được bỏ trống');
        
        $this->form_validation->set_message('is_unique','%s đã tồn tại');

            if ($this->form_validation->run()) {
                
                $list = array(

                    "name" => $this->input->post("input_text"),
                    
                );
          
            $this->load->model('Mcategories');

            $this->Mcategories->insert($list);    

            redirect('categories/home');    

            }
        }
        
        $this->load->view('home/header',$this->data);

        $this->load->view('categories/add',$this->data);

    }


    public function update($id) {

        $this->load->library('form_validation');
       
        $this->load->helper('form');

        $this->load->model('Mcategories');

        $data['student'] = $this->Mcategories->getsinhvien($id);      
        
        if ($this->input->post("change")) {
          
            $this->form_validation->set_rules('name','name','required');

            $this->form_validation->set_message('required','%s không được bỏ trống');
            
            if ($this->form_validation->run()) {

                $list_update = array(

                    "name" => $this->input->post("name"),
                 
                );
               
                $this->Mcategories->update($id,$list_update); 

                redirect('categories/home');

            }
             
        } 
        
        $this->load->view('home/header',$this->data);

        $this->load->view("categories/update",$data);
    
    }


    public function delete($id) {
    
        $this->load->model('Mcategories');

        $this->Mcategories->delete($id);
        
        redirect('categories/home');  
    
    }

    public function delete_multiple() {

        $this->load->model('Mcategories');

        $dataId = $this->input->post('id');

        foreach ($dataId as $key => $value) {

            if ($value != 'on') {

                $check = $this->Mcategories->delete_multiple($value);
                
            }

        }   

    }       
   
}
