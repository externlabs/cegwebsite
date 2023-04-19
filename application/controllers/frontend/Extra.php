<?php
class Extra extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('frontend/Extramodel');
    }
    public function index()
    {
        $data['fetch_extra'] = $this->Extramodel->fetch_data();
        $this->load->view('frontend/template/header');
       // $this->load->view('frontend/template/navbar');
        $this->load->view('frontend/extra',$data);
        //$this->load->view('frontend/template/footer');
    }

    public function insert_data()
    {
        $this->load->model('frontend/Extramodel');
        $this->input->post('formSubmit');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('mob', 'number', 'required');
        $this->form_validation->set_rules('work', 'Subject', 'required');
        $this->form_validation->set_rules('city', 'Message', 'required');
        if ($this->form_validation->run()) {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $number = $this->input->post('mob');
            $work = $this->input->post('work');
            $city = $this->input->post('city');
            if ($this->Extramodel->insert_data($name, $email, $number,$work, $city)) {

                $this->session->set_flashdata('success', 'Your Query is recorded.');
                redirect(base_url() . 'extra');
            } else {

                $this->session->set_flashdata('error', 'Error In Submission');
                redirect(base_url() . 'extra');
            }
        } else {

            $this->session->set_flashdata('error', 'Please Fill All The Fields');
            redirect(base_url() . 'extra');
        }
    }
}
