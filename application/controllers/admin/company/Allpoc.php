<?php
class Allpoc extends CI_controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('vendorAuth')) {
            redirect('admin/login');
        }
        
        $this->load->model('admin/company/Companymodel');
    }

    public function index()
    {
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/template/topbar');
        $this->load->view('admin/company/allpoc');
        $this->load->view('admin/template/footer');
    }

  
    public function deletepost(){ 
        if($this->input->post('deletesliderId')){
            $this->form_validation->set_rules('deletesliderId','text','required');
            if($this->form_validation->run() == true){
                $getDeleteStatus = $this->Companymodel->delete_poc($this->input->post('deletesliderId'));
                if($getDeleteStatus['message'] == 'yes'){
                    $this->session->set_flashdata('success','Company  deleted successfully');
                    redirect(base_url()."admin/company/allpoc");
                }else{
                    $this->session->set_flashdata('error','Something went wrong. Please try again');
                    redirect(base_url()."admin/company/allpoc");
                }
            }else{
                $this->session->set_flashdata('error','Something went wrong. Please try again');
                redirect(base_url()."admin/company/allpoc");
            }
        }
    }



    public function addinventory_api(){
      
        $postData = $this->input->post();
        // Get data
        $data = $this->Companymodel->fetch_poc_data($postData);
        echo json_encode($data);
    }


}




    

