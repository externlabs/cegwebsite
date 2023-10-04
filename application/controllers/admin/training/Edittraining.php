<?php
class Edittraining extends CI_controller
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
    $this->load->view('admin/training/edittraining');
    $this->load->view('admin/template/footer');
  }
  public function update_traning(){
    
    $this->load->model('admin/training/Trainingmodel');
    $this->input->post('formSubmit');
  
    $this->form_validation->set_rules('training_name', 'Name', 'required');
    $this->form_validation->set_rules('registration_last_date', 'Name', 'required');
    $this->form_validation->set_rules('start_date', 'Name', 'required');
    $this->form_validation->set_rules('end_date', 'Name', 'required');
    $this->form_validation->set_rules('training_id', 'Name', 'required');
    
    
    if($this->form_validation->run()){
      $url_link = $this->input->post('training_name');
      $string = preg_replace('/[^A-Za-z0-9\-]/','-',$url_link);
      $final_link=preg_replace('/-+/','-',$string);

      if ($this->form_validation->run()){
        $datas = array(
                  'training_name' => $this->input->post('training_name'),
                  'training_link' => $final_link,
                  'training_desc' => $this->input->post('training_desc'),
                  'start_date' => $this->input->post('start_date'),
                  'registration_last_date' => $this->input->post('registration_last_date'),
                  'end_date' => $this->input->post('end_date'),
          );
          
          $id = $this->input->post('training_id');

          if ($this->Trainingmodel->update_traning_status($datas, $id)) {
              $this->session->set_flashdata('error', 'Error In Submission');
              redirect(base_url() . 'admin/training/edittraining');
          } else {
              $this->session->set_flashdata('success', 'Training Updated Successfully!');
              redirect(base_url() . 'admin/training/alltraining');
          }
      } else {
          $this->session->set_flashdata('error', 'Please Fill All The Fields!');
          redirect(base_url() . 'admin/training/edittraining');
      }
    }
  }
}
  
 
