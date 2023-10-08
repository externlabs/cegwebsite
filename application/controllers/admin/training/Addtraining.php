<?php
class Addtraining extends CI_controller
{

  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('vendorAuth')) {
      redirect('admin/login');
    }
    // $this->load->model('admin/Careermodel');
  }

  public function index()
  {


    // $data['list']=$this->Careermodel->fetchinventory_api();
    $this->load->view('admin/template/header');
    $this->load->view('admin/template/sidebar');
    $this->load->view('admin/template/topbar');
    $this->load->view('admin/training/addtraining');
    $this->load->view('admin/template/footer');
  }




  public function add_training(){

    $this->load->model('admin/training/Trainingmodel');
    $this->input->post('formSubmit');

    $this->form_validation->set_rules('training_name', 'Name', 'required');
    $this->form_validation->set_rules('registration_last_date', 'Name', 'required');
    $this->form_validation->set_rules('start_date', 'Name', 'required');
    $this->form_validation->set_rules('end_date', 'Name', 'required');


    
    
    if ($this->form_validation->run()) {

      $url_link = $this->input->post('training_name');
      $string = preg_replace('/[^A-Za-z0-9\-]/','-',$url_link);
      $final_link=preg_replace('/-+/','-',$string);
        $datas = array(
            'training_name' => $this->input->post('training_name'),
            'training_link' => $final_link,
            'training_desc' => $this->input->post('training_desc'),
            'start_date' => $this->input->post('start_date'),
            'registration_last_date' => $this->input->post('registration_last_date'),
            'end_date' => $this->input->post('end_date'),
            'status' => 1
        );

        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');


          if($end_date >= $start_date){

            if ($this->Trainingmodel->add_training($datas)) {
              $this->session->set_flashdata('success', 'Training Added Successfully!');
              redirect(base_url() . 'admin/training/addtraining');
          } else {
              $this->session->set_flashdata('error', 'Error In Submission');
              redirect(base_url() . 'admin/training/addtraining');
          }
          }else{
              $this->session->set_flashdata('error', 'Last Date always be a future date of start date!');
              redirect(base_url() . 'admin/training/addtraining');
          }
    } else {
        $this->session->set_flashdata('error', 'Please Fill All The Fields or company Already Registered!');
        redirect(base_url() . 'admin/training/addtraining');
    }
}





public function update_training_status(){

  $status=$this->input->post('status');
  $id=$this->input->post('id');
  
  $data = array(
    'status' => $status
  );

  $update_faculity = $this->db->set($data)->where('training_id',$id)->update('training');

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
}
