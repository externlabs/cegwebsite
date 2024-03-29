<?php
class Trainingapplication extends CI_controller
{

  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('vendorAuth')) {
      redirect('admin/login');
    }
    $this->load->model('admin/training/Trainingmodel');
  }

  public function index(){
    $this->load->view('admin/template/header');
    $this->load->view('admin/template/sidebar');
    $this->load->view('admin/template/topbar');
    $this->load->view('admin/trainingapplication');
    $this->load->view('admin/template/footer');
  }

  public function addinventory_api(){
      
    $postData = $this->input->post();
    // Get data
    $data = $this->Trainingmodel->fetch_training_application_data($postData);
    echo json_encode($data);
}


}
