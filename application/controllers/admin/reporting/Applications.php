<?php
class Applications extends CI_controller
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
    $data['drive_details']=$this->Drivemodel->fetch_drive();
    $this->load->view('admin/template/header');
    $this->load->view('admin/template/sidebar');
    $this->load->view('admin/template/topbar');
    $this->load->view('admin/reporting/applications',$data);
    $this->load->view('admin/template/footer');
  }



  public function update_result(){

    $application_id=$this->input->post('application_id');
    $round_no=$this->input->post('round_no');
    $result=$this->input->post('result');
    if($round_no == 1){
      if($result == "pass"){
        $data = array(
          'round_1' => 1,
        );
      }else{
        $data = array(
          'round_1' => 0,
        );
      }
    }elseif($round_no == 2){
      if($result == "pass"){
        $data = array(
          'round_2' => 1,
        );
      }else{
        $data = array(
          'round_2' => 0,
        );
      }
    }elseif($round_no == 3){
      if($result == "pass"){
        $data = array(
          'round_3' => 1,
        );
      }else{
        $data = array(
          'round_3' => 0,
        );
      }
    }elseif($round_no == 4){
      if($result == "pass"){
        $data = array(
          'round_4' => 1,
        );
      }else{
        $data = array(
          'round_4' => 0,
        );
      }
    }elseif($round_no == 5){
      if($result == "pass"){
        $data = array(
          'round_5' => 1,
        );
      }else{
        $data = array(
          'round_5' => 0,
        );
      }
    }else{
      $response = array(
        'status' => "error",
        'message' => "Choose Correct Option!",
      );
      
    }

    $update_result = $this->db->set($data)->where('application_id',$application_id)->update('drive_application');

      if($update_result == true){
        $response = array(
          'status' => "success",
          'result' => $data,
          'message' => "Update Successfully!",
        );
     
      }else{
        $response = array(
          'status' => "error",
          'message' => "Error In submission!",
        );
      }

    echo json_encode($response);
}

  

public function addinventory_api(){
      
  $postData = $this->input->post();
  // Get data
  $data = $this->Drivemodel->fetch_ucoming_drive_application_result_data($postData);
  echo json_encode($data);
}

 
}