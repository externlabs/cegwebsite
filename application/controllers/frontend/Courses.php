<?php
class Courses extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('frontend/Careermodel');
    }
    public function index()
    {

        $this->load->view('frontend/template/header');
       $this->load->view('frontend/template/navbar');
        $this->load->view('frontend/courses');
        $this->load->view('frontend/template/footer');
    }

    // public function apply()
    // {
    //     $this->load->model('frontend/Studentmodel');
    //     $this->input->post('formSubmit');
    //     $this->form_validation->set_rules('term', 'Name', 'required');
    //     $this->form_validation->set_rules('qualification', 'Father_Name', 'required');
    //     $this->form_validation->set_rules('eligible', 'Aadhar', 'required');
    //     $this->form_validation->set_rules('drive_id', 'DOB', 'required');
    //     $this->form_validation->set_rules('student_id', 'Email', 'required');

    //     if ($this->form_validation->run() == true) {
    //         $driveId = $this->input->post('drive_id');
    //             $datas = array(
    //                 'term' => "agree",
    //                 'qualification' => "agree",
    //                 'eligible' => "agree",
    //                 'drive_id' => $this->input->post('drive_id'),
    //                 'student_id' => $this->input->post('student_id'),
    //             );
    //             if ($this->Studentmodel->apply_drive($datas)) {
    //                 $this->session->set_flashdata('success', 'Apply successfully!');
    //                 redirect(base_url() . 'user/driveapplication');
    //             } else {
    //                 $this->session->set_flashdata('error', 'Error In Submission');
    //                 redirect(base_url() . 'apply/'.$driveId);
    //             }
    //     } else {
    //         $this->session->set_flashdata('error', 'Please Fill All The Fields');
    //         redirect(base_url() . 'apply/'.$driveId);
    //     }
    // }
}
