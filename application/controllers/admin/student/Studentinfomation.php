<?php
class Studentinfomation extends CI_controller
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
    $this->load->view('admin/student/studentinfomation',$data);
    $this->load->view('admin/template/footer');

  }

  public function update_student(){
    $status=$this->input->post('status');
    $id=$this->input->post('id');
    
    $data = array(
      'student_status' => $status
    );

    $update_student = $this->db->set($data)->where('student_id',$id)->update('student');

    if($update_student == true){
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

  public function delete_student(){ 
    if($this->input->post('deletesliderId')){
        $this->form_validation->set_rules('deletesliderId','text','required');

        $getQualification = $this->db->where('user_type','student')->where('student_id',$this->input->post('deletesliderId'))->get('qualification')->result_array();

       

        if(count($getQualification) > 0){
          $this->session->set_flashdata('error','Please Delete Qualification Of This User to delete!');
          redirect(base_url()."admin/student/studentinfomation");
        }



        if($this->form_validation->run() == true){
            $getDeleteStatus = $this->Studentmodel->delete_student($this->input->post('deletesliderId'));
            if($getDeleteStatus['message'] == 'yes'){
                $this->session->set_flashdata('success','Student  deleted successfully');
                redirect(base_url()."admin/student/studentinfomation");
            }else{
                $this->session->set_flashdata('error','Something went wrong. Please try again');
                redirect(base_url()."admin/student/studentinfomation");
            }
        }else{
            $this->session->set_flashdata('error','Something went wrong. Please try again');
            redirect(base_url()."admin/student/studentinfomation");
        }
    }
  }



  public function addinventory_api(){
      
    $postData = $this->input->post();
    // Get data
    $data = $this->Studentmodel->fetch_student_information_data($postData);
    echo json_encode($data);
}
  



}
