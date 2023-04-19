<?php
class Result extends CI_controller
{

  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('vendorAuth')) {
      redirect('admin/login');
    }
    $this->load->model('frontend/Studentmodel');
  }

  public function index(){
    $data['student_details']=$this->Studentmodel->fetch_data();
    $this->load->view('admin/template/header');
    $this->load->view('admin/template/sidebar');
    $this->load->view('admin/template/topbar');
    $this->load->view('admin/reporting/result',$data);
    $this->load->view('admin/template/footer');
  }

  

 
 
}