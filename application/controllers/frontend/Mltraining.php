<?php
class Mltraining extends CI_controller
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
        $this->load->view('frontend/mltraining');
        $this->load->view('frontend/template/footer');
    }

    public function add()
    {
        $this->load->model('frontend/Studentmodel');
        $this->input->post('formSubmit');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('father_name', 'Father_Name', 'required');
        $this->form_validation->set_rules('mother_name', 'Aadhar', 'required');
        $this->form_validation->set_rules('email', 'DOB', 'required');
        $this->form_validation->set_rules('phone', 'Email', 'required');
        $this->form_validation->set_rules('enrollment', 'Email', 'required');
        $this->form_validation->set_rules('dob', 'Email', 'required');
        $this->form_validation->set_rules('gender', 'Email', 'required');

        $this->form_validation->set_rules('address', 'Email', 'required');
        $this->form_validation->set_rules('collage', 'Email', 'required');
        $this->form_validation->set_rules('course', 'Email', 'required');
        $this->form_validation->set_rules('branch', 'Email', 'required');
        $this->form_validation->set_rules('year', 'Email', 'required');



        if ($this->form_validation->run() == true) {
     
                $datas = array(
                    'name' => $this->input->post('name'),
                    'father_name' => $this->input->post('father_name'),

                    'mother_name' => $this->input->post('mother_name'),
                    'email' => $this->input->post('email'),

                    'phone' => $this->input->post('phone'),
                    'enrollment' => $this->input->post('enrollment'),

                    'dob' => $this->input->post('dob'),
                    'address' => $this->input->post('address'),

                    'collage' => $this->input->post('collage'),
                    'course' => $this->input->post('course'),

                    'branch' => $this->input->post('branch'),
                    'year' => $this->input->post('year'),
                    'gender' => $this->input->post('gender'),

                );
                if ($this->Studentmodel->apply_ml_training($datas)) {
                    $this->session->set_flashdata('success', 'Apply successfully!');
                    redirect(base_url() . 'ml-training');
                } else {
                    $this->session->set_flashdata('error', 'Error In Submission');
                    redirect(base_url() . 'ml-training');
                }
            
        } else {
            $this->session->set_flashdata('error', 'Please Fill All The Fields');
            redirect(base_url() . 'ml-training');
        }
    }
}
