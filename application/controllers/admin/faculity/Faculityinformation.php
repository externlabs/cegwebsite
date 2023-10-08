<?php
class Faculityinformation extends CI_controller
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
    $data['faculity_details']=$this->Faculitymodel->fetch_data();
    $this->load->view('admin/template/header');
    $this->load->view('admin/template/sidebar');
    $this->load->view('admin/template/topbar');
    $this->load->view('admin/faculity/faculityinformation',$data);
    $this->load->view('admin/template/footer');

  }

  public function update_faculity(){
    $status=$this->input->post('status');
    $id=$this->input->post('id');
    
    $data = array(
      'status' => $status
    );

    $update_faculity = $this->db->set($data)->where('faculity_id',$id)->update('faculity');

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

  public function delete_faculity(){ 
    if($this->input->post('deletesliderId')){
        $this->form_validation->set_rules('deletesliderId','text','required');

        $getQualification = $this->db->where('user_type','faculity')->where('student_id',$this->input->post('deletesliderId'))->get('qualification')->result_array();

       

        if(count($getQualification) > 0){
          $this->session->set_flashdata('error','Please Delete Qualification Of This User to delete!');
          redirect(base_url()."admin/faculity/faculityinformation");
        }
      
        if($this->form_validation->run() == true){
            $getDeleteStatus = $this->Faculitymodel->delete_faculity($this->input->post('deletesliderId'));

            if($getDeleteStatus['message'] == 'yes'){
                $this->session->set_flashdata('success','Faculity  deleted successfully');
                redirect(base_url()."admin/faculity/faculityinformation");
            }else{
                $this->session->set_flashdata('error','Something went wrong. Please try again');
                redirect(base_url()."admin/faculity/faculityinformation");
            }
        }else{
            $this->session->set_flashdata('error','Something went wrong. Please try again');
            redirect(base_url()."admin/faculity/faculityinformation");
        }
    }
  }


  public function addinventory_api(){
      
    $postData = $this->input->post();
    // Get data
    $data = $this->Faculitymodel->fetch_faculity_information_data($postData);
    echo json_encode($data);
}


}
