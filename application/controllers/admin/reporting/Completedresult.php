<?php
class Completedresult extends CI_controller
{

  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('vendorAuth')) {
      redirect('admin/login');
    }
    $this->load->model('frontend/Drivemodel');
  }

  public function index(){
    // $data['drive_details']=$this->Drivemodel->fetch_drive();
    $this->load->view('admin/template/header');
    $this->load->view('admin/template/sidebar');
    $this->load->view('admin/template/topbar');
    $this->load->view('admin/reporting/completedresult');
    $this->load->view('admin/template/footer');
  }

  

  public function addinventory_api(){
      
    $postData = $this->input->post();
    // Get data
    $data = $this->Drivemodel->fetch_complete_drive_result_data($postData);
    echo json_encode($data);
  }
 
}