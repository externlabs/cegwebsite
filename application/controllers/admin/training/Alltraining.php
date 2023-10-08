<?php
class Alltraining extends CI_controller
{

  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('vendorAuth')) {
      redirect('admin/login');
    }
    $this->load->model('admin/training/Trainingmodel');
  }

  public function index()
  {
   
   
    $this->load->view('admin/template/header');
    $this->load->view('admin/template/sidebar');
    $this->load->view('admin/template/topbar');
    $this->load->view('admin/training/alltraining');
    $this->load->view('admin/template/footer');
  }
  
  public function deletecontactdetail(){
    if ($this->input->post('deletesliderId')) {
      $this->form_validation->set_rules('deletesliderId', 'text', 'required');

      $getCourses = $this->db->where('training_id', $this->input->post('deletesliderId'))->get('course')->result_array();

      if(count($getCourses) > 0){
        $this->session->set_flashdata('error', 'Please Delete Linked Courses with this Training');
        redirect(base_url() . "admin/training/alltraining");
      }

      if ($this->form_validation->run() == true) {
        $getDeleteStatus = $this->Trainingmodel->delete_training($this->input->post('deletesliderId'));
        if ($getDeleteStatus['message'] == 'yes') {
          $this->session->set_flashdata('success', 'Training  deleted successfully');
          redirect(base_url() . "admin/training/alltraining");
        } else {
          $this->session->set_flashdata('error', 'Something went wrong. Please try again');
          redirect(base_url() . "admin/training/alltraining");
        }
      } else {
        $this->session->set_flashdata('error', 'Something went wrong. Please try again');
        redirect(base_url() . "admin/training/alltraining");
      }
    }
  }



  public function addinventory_api(){
      
    $postData = $this->input->post();
    // Get data
    $data = $this->Trainingmodel->fetch_training_data($postData);
    echo json_encode($data);
}




}
