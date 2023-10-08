<?php
class Upcommingdrive extends CI_controller
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
    $this->load->view('admin/drive/upcommingdrive',$data);
    $this->load->view('admin/template/footer');
  }

  public function update_drive(){
      $status=$this->input->post('status');
        $id=$this->input->post('id');
        
        $data = array(
          'status' => $status
        );
    
        $update_faculity = $this->db->set($data)->where('drive_id',$id)->update('drive');
    
        if($update_faculity == true){
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
  $data = $this->Drivemodel->fetch_ucoming_drive_data($postData);
  echo json_encode($data);
}

 
}
