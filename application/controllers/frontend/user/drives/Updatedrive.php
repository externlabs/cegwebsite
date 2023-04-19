<?php
class Updatedrive extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        if(!isset($_SESSION['user_id'])){
            redirect(base_url());
        }
        $this->load->model('frontend/Drivemodel');
    }
    public function index()
    {
        
        $this->load->view('frontend/user/common/header');
        $this->load->view('frontend/user/common/sidebar');
        $this->load->view('frontend/user/common/topbar');
        $this->load->view('frontend/user/drives/updatedrive');
        $this->load->view('frontend/user/common/footer');
    }


    public function update(){

        $this->load->model('frontend/Drivemodel');
        $this->input->post('formSubmit');

        $this->form_validation->set_rules('designation', 'Name', 'required');
        $this->form_validation->set_rules('post_no', 'Email', 'required');
        $this->form_validation->set_rules('vanue', 'number', 'required');
        $this->form_validation->set_rules('job_location', 'Name', 'required');
        $this->form_validation->set_rules('eligibility', 'Email', 'required');
        $this->form_validation->set_rules('job_desc', 'number', 'required');
        $this->form_validation->set_rules('drive_method', 'Name', 'required');
        $this->form_validation->set_rules('drive_date', 'Email', 'required');
        $this->form_validation->set_rules('last_date', 'number', 'required');
        $this->form_validation->set_rules('start_date', 'Name', 'required');
        $this->form_validation->set_rules('salary', 'Email', 'required');
        $this->form_validation->set_rules('department', 'number', 'required');
        $this->form_validation->set_rules('benefits', 'Name', 'required');
        $this->form_validation->set_rules('selection_process', 'Email', 'required');
        $this->form_validation->set_rules('drive_id', 'number', 'required');


        if ($this->form_validation->run()) {

            $id = $this->input->post('drive_id');
            
            $datas = array(
                'designation' => $this->input->post('designation'),
                'post_no' => $this->input->post('post_no'),
                'vanue' => $this->input->post('vanue'),
                'job_location' => $this->input->post('job_location'),
                'eligibility' => $this->input->post('eligibility'),
                'job_desc' => $this->input->post('job_desc'),
                'drive_method' => $this->input->post('drive_method'),
                'drive_date' => $this->input->post('drive_date'),
                'last_date' => $this->input->post('last_date'),
                'start_date' => $this->input->post('start_date'),
                'salary' => $this->input->post('salary'),
                'department' => $this->input->post('department'),
                'benefits' => $this->input->post('benefits'),
                'selection_process' => $this->input->post('selection_process'),
                'other' => $this->input->post('other'),
                'status' => 'pending',
            );
        
            if ($this->Drivemodel->update_drive_status($datas,$id)) {
                
                $this->session->set_flashdata('error', 'Error In Submission');
                redirect(base_url() . 'user/drives/'.$id);
            } else {
                $this->session->set_flashdata('success', 'Drive Updated Successfully!');
                redirect(base_url() . 'user/pending-drive');
            }
        } else {

            $this->session->set_flashdata('error', 'Please Fill All The Fields');
            redirect(base_url() . 'user/add-drives/'.$id);
        }
    }
}
