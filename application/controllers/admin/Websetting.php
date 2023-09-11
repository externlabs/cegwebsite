<?php
class Websetting extends CI_controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('vendorAuth')) {
            redirect('admin/login');
        }
        $this->load->model('admin/Websitemodel');
    }

    public function index(){
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/template/topbar');
        $this->load->view('admin/websetting');
        $this->load->view('admin/template/footer');
    }

    public function update(){

        $this->load->model('admin/Websitemodel');
        $this->input->post('formSubmit');

        $this->form_validation->set_rules('web_name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('contact', 'number', 'required');
        $this->form_validation->set_rules('address', 'Subject', 'required');
        $this->form_validation->set_rules('id', 'Subject', 'required');

       
        if ($this->form_validation->run()) {

            $data = array(
                'web_name' => $this->input->post('web_name'),
                'email' => $this->input->post('email'),
                'contact' => $this->input->post('contact'),
                'address' => $this->input->post('address'),
            );

            $id = $this->input->post('id');

            if ($this->Websitemodel->update($data,$id)) {
                $this->session->set_flashdata('success', 'Setting Updated!');
                redirect(base_url() . 'admin/websetting');
            } else {
                $this->session->set_flashdata('error', 'Error In Submission');
                redirect(base_url() . 'admin/websetting');
            }
        }else{
            $this->session->set_flashdata('error', 'Please Fill All The Fields');
            redirect(base_url() . 'admin/websetting');
        }
    }   
}