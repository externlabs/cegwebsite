<?php
class feedback extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('frontend/Feedbackmodel');
    }
    public function index()
    {

        $this->load->view('frontend/template/header');
       // $this->load->view('frontend/template/navbar');
        $this->load->view('frontend/feedback');
        $this->load->view('frontend/template/footer');
    }

    public function insert_data()
    {
        $this->load->model('frontend/Feedbackmodel');
        $this->input->post('formSubmit');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('mob', 'number', 'required');
        $this->form_validation->set_rules('sub', 'Subject', 'required');
        $this->form_validation->set_rules('msg', 'Message', 'required');
        if ($this->form_validation->run()) {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $number = $this->input->post('mob');
            $sub = $this->input->post('sub');
            $msg = $this->input->post('msg');
            if ($this->Feedbackmodel->insert_data($name, $email, $number,$sub, $msg)) {

                $this->session->set_flashdata('success', 'Thank you for showing interest in Bada Engineering.  Our Team will Call/Connect/Reply you ASAP.');
                redirect(base_url() . 'feedback');
            } else {

                $this->session->set_flashdata('error', 'Error In Submission');
                redirect(base_url() . 'feedback');
            }
        } else {

            $this->session->set_flashdata('error', 'Please Fill All The Fields');
            redirect(base_url() . 'feedback');
        }
    }
}
