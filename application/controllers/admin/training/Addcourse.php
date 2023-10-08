<?php
class Addcourse extends CI_controller
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


    // $datas['course_details']=$this->Trainingmodel->fetch_course();
    $this->load->view('admin/template/header');
    $this->load->view('admin/template/sidebar');
    $this->load->view('admin/template/topbar');
    $this->load->view('admin/training/addcourse');
    $this->load->view('admin/template/footer');
  }

 

  public function add_course(){

    $this->load->model('admin/training/Trainingmodel');
    $this->input->post('formSubmit');

    $this->form_validation->set_rules('training_id', 'Name', 'required');
    $this->form_validation->set_rules('course_name', 'Name', 'required');

    $this->form_validation->set_rules('course_desc', 'Name', 'required');
    $this->form_validation->set_rules('course_type', 'Name', 'required');

    
    if ($this->form_validation->run()) {

      if( $this->input->post('course_type') == "paid"){
        $course_amount = $this->input->post('course_amount');
        $form_amount = $this->input->post('form_amount');
      }else{
        $course_amount = 0;
        $form_amount =0;
      }

        $datas = array(
            'training_id' => $this->input->post('training_id'),
            'course_name' => $this->input->post('course_name'),
            'course_desc' => $this->input->post('course_desc'),
            'course_type' => $this->input->post('course_type'),
            'course_amount' => $course_amount,
            'form_amount' => $form_amount,
            'course_status' => 1,
        );
        
        if ($this->Trainingmodel->add_course($datas)) {
            $this->session->set_flashdata('success', 'Course Added Successfully!');
            redirect(base_url() . 'admin/training/addcourse');
        } else {
            $this->session->set_flashdata('error', 'Error In Submission');
            redirect(base_url() . 'admin/training/addcourse');
        }
    } else {
        $this->session->set_flashdata('error', 'Please Fill All The Fields or company Already Registered!');
        redirect(base_url() . 'admin/training/addcourse');
    }
}

public function update_course_status(){

  $status=$this->input->post('status');
  $id=$this->input->post('id');
  
  $data = array(
    'course_status' => $status
  );

  $update_faculity = $this->db->set($data)->where('course_id',$id)->update('course');

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




 


 


  public function deletecontactdetail(){
    
    if ($this->input->post('deletesliderId')) {
      $this->form_validation->set_rules('deletesliderId', 'text', 'required');
      
      if ($this->form_validation->run() == true) {
        
        $getDeleteStatus = $this->Trainingmodel->delete_coursseee($this->input->post('deletesliderId'));
      
        if ($getDeleteStatus['message'] == 'yes') {
          $this->session->set_flashdata('success', 'course  deleted successfully');
          redirect(base_url() . 'admin/training/addcourse');
        } else {
          $this->session->set_flashdata('error', 'Something went wrong. Please try again');
          redirect(base_url() . 'admin/training/addcourse');
        }
      } else {
        $this->session->set_flashdata('error', 'Something went wrong. Please try again');
        redirect(base_url() . 'admin/training/addcourse');
      }
    }
  }



  

  public function addinventory_api(){
      
    $postData = $this->input->post();
    // Get data
    $data = $this->Trainingmodel->fetch_course_data($postData);
    echo json_encode($data);
}




}
