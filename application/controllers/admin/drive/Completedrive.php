<?php
class Completedrive extends CI_controller
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
    $this->load->view('admin/drive/completedrive',$data);
    $this->load->view('admin/template/footer');
  }

  public function update_drive(){

    $this->load->model('frontend/Drivemodel');
    $this->input->post('formSubmit');

    $this->form_validation->set_rules('option', 'Name', 'required');
    $this->form_validation->set_rules('drive_id', 'Message', 'required');

    if ($this->form_validation->run()) {
        $datas = array(
            'status' => $this->input->post('option'),
        );
        $id = $this->input->post('drive_id');

        if ($this->Drivemodel->update_drive_status($datas, $id)) {
            $this->session->set_flashdata('error', 'Error In Submission');
            redirect(base_url() . 'admin/drive/completedrive');
        } else {
            $this->session->set_flashdata('success', 'Drive Status Updated Successfully!');
            redirect(base_url() . 'admin/drive/completedrive');
        }
    } else {
        $this->session->set_flashdata('error', 'Please Fill All The Fields!');
        redirect(base_url() . 'admin/drive/completedrive');
    }
}

 
 
}
