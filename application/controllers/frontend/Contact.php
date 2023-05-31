<?php
class Contact extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('frontend/Contactmodel');
    }
    public function index()
    {
        
        $this->load->view('frontend/template/header');
        $this->load->view('frontend/template/navbar');
        $this->load->view('frontend/contact');
        $this->load->view('frontend/template/footer');
    }
    
    public function insert(){
        $this->load->model('frontend/Contactmodel');
        $this->input->post('formsubmit');

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Name', 'required');
        $this->form_validation->set_rules('subject', 'Name', 'required');
        $this->form_validation->set_rules('number', 'Name', 'required');
        $this->form_validation->set_rules('msg', 'Name', 'required');
        if($this->form_validation->run()) {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $subject = $this->input->post('subject');
            $number = $this->input->post('number');
            $msg = $this->input->post('msg');

            if($this->Contactmodel->insert_data($name,$email,$subject,$number,$msg)){
                $this->session->set_flashdata('success', 'Thank you for showing interest. Our Team will Call/Connect/Reply you ASAP.');
                redirect(base_url() . 'contact');
            }
            else{
                $this->session->set_flashdata('error', 'Error in Submission');
                redirect(base_url() . 'contact');
            }
        }else{
            $this->session->set_flashdata('error', 'Please Fill All The Fields');
            redirect(base_url() . 'contact');

        }
    }
 
}
