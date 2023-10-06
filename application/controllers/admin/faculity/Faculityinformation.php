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
    $this->load->model('frontend/Faculitymodel');
    $this->input->post('formSubmit');
  
    $this->form_validation->set_rules('faculity_status', 'Name', 'required');
    $this->form_validation->set_rules('faculity_id', 'Message', 'required');
  
    if ($this->form_validation->run()){
        $datas = array(
            'status' => $this->input->post('faculity_status'),
        );
        $id = $this->input->post('faculity_id');


        if ($this->Faculitymodel->update_faculity_status($datas, $id)) {
            $this->session->set_flashdata('error', 'Error In Submission');
            redirect(base_url() . 'admin/faculity/faculityinformation');
        } else {
            $this->session->set_flashdata('success', 'Faculity Status Updated Successfully!');
            redirect(base_url() . 'admin/faculity/faculityinformation');
        }
    } else {
        $this->session->set_flashdata('error', 'Please Fill All The Fields!');
        redirect(base_url() . 'admin/faculity/faculityinformation');
    }
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
}
