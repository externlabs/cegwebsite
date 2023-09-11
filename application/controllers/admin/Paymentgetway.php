<?php
class Paymentgetway extends CI_controller
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
        $this->load->view('admin/paymentgetway');
        $this->load->view('admin/template/footer');
    }

    public function update(){

        $this->load->model('admin/Websitemodel');
        $this->input->post('formSubmit');

        $this->form_validation->set_rules('merchant_id', 'Name', 'required');
        $this->form_validation->set_rules('merchant_key', 'Email', 'required');
        $this->form_validation->set_rules('payment_url', 'number', 'required');
        $this->form_validation->set_rules('id', 'Subject', 'required');

       
        if ($this->form_validation->run()) {

            $data = array(
                'merchant_id' => $this->input->post('merchant_id'),
                'merchant_key' => $this->input->post('merchant_key'),
                'payment_url' => $this->input->post('payment_url'),
            );

            $id = $this->input->post('id');

            if ($this->Websitemodel->update($data,$id)) {
                $this->session->set_flashdata('success', 'Setting updated!');
                redirect(base_url() . 'admin/paymentgetway');
            } else {
                $this->session->set_flashdata('error', 'Error In Submission');
                redirect(base_url() . 'admin/paymentgetway');
            }
        }else{
            $this->session->set_flashdata('error', 'Please Fill All The Fields');
            redirect(base_url() . 'admin/paymentgetway');
        }
    }   
}