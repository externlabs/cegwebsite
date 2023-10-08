<?php
class Faculityqulification extends CI_controller
{

  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('vendorAuth')) {
      redirect('admin/login');
    }
    $this->load->model('frontend/Faculitymodel');
  }

  public function index(){
    $data['faculityqulification_details']=$this->Faculitymodel->fetch_qualification();
    $this->load->view('admin/template/header');
    $this->load->view('admin/template/sidebar');
    $this->load->view('admin/template/topbar');
    $this->load->view('admin/faculity/faculityqulification',$data);
    $this->load->view('admin/template/footer');
  }
  
    public function deletepost(){ 
        if($this->input->post('deletesliderId')){
            $this->form_validation->set_rules('deletesliderId','text','required');
            if($this->form_validation->run() == true){
                $getDeleteStatus = $this->Faculitymodel->delete_qualification($this->input->post('deletesliderId'));
                if($getDeleteStatus['message'] == 'yes'){
                    $this->session->set_flashdata('success','Qualification  deleted successfully');
                    redirect(base_url()."admin/faculity/faculityqulification");
                }else{
                    $this->session->set_flashdata('error','Something went wrong. Please try again');
                    redirect(base_url()."admin/faculity/faculityqulification");
                }
            }else{
                $this->session->set_flashdata('error','Something went wrong. Please try again');
                redirect(base_url()."admin/faculity/faculityqulification");
            }
        }
    }


    
  public function addinventory_api(){
      
    $postData = $this->input->post();
    // Get data
    $data = $this->Faculitymodel->fetch_faculity_qualification_data($postData);
    echo json_encode($data);
}


  
}