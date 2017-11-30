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
        
        if ($this->data['AdminPr'] == false) {
            
            redirect('home/index');

        }

        $this->load->view('home/header', $this->data);
        
    }

    public function home() {

        $this->load->model('Mcategories');
        
        $this->data['categories'] = $this->Mcategories->get_all_categories();

        $this->load->view('categories/show', $this->data);

    }

    public function add() {

        if ($this->input->post('submit')) {

            $this->form_validation->set_rules('input_text', 'Name', 'required');

            $this->form_validation->set_message('required', '%s not be empty');

            $this->load->model('Mcategories');

            $checkExist = $this->Mcategories->get_categories('name',$this->input->post('input_text'));

            if (count($checkExist) > 0) {
              
                $this->form_validation->set_rules('input_text', 'Name', 'required|is_unique[categories.name]');

                $this->form_validation->set_message('required', '%s not be empty');
            
                $this->form_validation->set_message('is_unique', '%s already exist');

            }

            if ($this->form_validation->run()) {
                
                $list = array(

                    "name" => $this->input->post("input_text"),

                    "is_deleted" => 0
                    
                );

                if ($this->Mcategories->insert($list)) {

                    $this->session->set_flashdata('message_add', '<div class="succes">Add new categories success<button type="button" class="close" data-dismiss="alert">×</button></div>');

                    redirect('categories/home');  
                    
                } else {

                    $this->session->set_flashdata('message_add', '<div class="succes fail">Add new categories fail<button type="button" class="close" data-dismiss="alert">×</button></div>');

                    redirect('categories/home');
                    
                }   
                  
            } else {

                $this->session->set_flashdata('message_add', '<div class="succes fail">Add new categories fail<button type="button" class="close" data-dismiss="alert">×</button></div>');

                redirect('categories/home');
                
            }

        }
        
        $this->load->view('categories/add', $this->data);

    }

    public function update($id) {
  
        if (isset($id) && count($id) > 0) {

            $this->load->model('Mcategories');

            $getId = $this->Mcategories->get_categories('id',$id);

            if (count($getId) > 0) {
                
                $data['student'] = $getId;      
                
                if ($this->input->post("change")) {
                  
                    $this->form_validation->set_rules('input_text', 'name', 'required|min_length[6]|max_length[30]');

                    $this->form_validation->set_message('required', '%s not be empty');
                    
                    if ($this->form_validation->run()) {

                        $listUpdate = array(

                            "name" => $this->input->post("input_text")
                         
                        );
                       
                        $this->Mcategories->update($id, $listUpdate); 

                        $this->session->set_flashdata('message_add', '<div class="succes">Update new categories success<button type="button" class="close" data-dismiss="alert">×</button></div>');

                        redirect('categories/home');

                    } else {

                        $this->session->set_flashdata('message_add', '<div class="succes fail">Update new categories fail<button type="button" class="close" data-dismiss="alert">×</button></div>');

                        redirect('categories/home');

                    }
                     
                } 

                $this->load->view("categories/update", $data);

            } else {

                redirect('categories/home');

            } 

        } else {

            redirect('categories/home');

        } 

    }

    public function delete_multiple() {

        $this->load->model('Mcategories');

        $dataId = $this->input->post('id');
        
        $checkAll = false;

        foreach ($dataId as $keyDataId => $valDataId) {

            if ($valDataId == "1") {

                $checkAll = true;
            
            }

        }

        if ( $checkAll == false) {

            foreach ($dataId as $keyDataId => $valDataId) {

                $listUpdate = array(   
        
                    "is_deleted" => 1
                
                );

                $this->Mcategories->update($valDataId, $listUpdate);    

            } 

            $returnData = array(

                'status' => 1,
                'data' => $checkAll,
                'message' => "Delete !!!"
              
            );

            echo json_encode($returnData);

            exit();
          
        } else {

            $returnData = array(

                'status' => 0,
                'data' => null,
                'message' => "Can't Delete !!!"
             
            );

            echo json_encode($returnData);

            exit();

        }  

    }       
   
}