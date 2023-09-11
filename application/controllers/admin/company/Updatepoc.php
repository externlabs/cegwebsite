<?php
class Updatepoc extends CI_controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('vendorAuth')) {
            redirect('admin/login');
        }
        
        $this->load->model('admin/company/Companymodel');
    }

    public function index()
    {
        // $data['fetch_content'] = $this->Companymodel->fetch_data();
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/template/topbar');
        $this->load->view('admin/company/updatepoc');
        $this->load->view('admin/template/footer');
    }

    public function update(){

        $this->load->model('admin/Companymodel');
        $this->form_validation->set_rules('name', 'Email', 'required');
        $this->form_validation->set_rules('designation', 'number', 'required');
        $this->form_validation->set_rules('phone', 'Subject', 'required');
        $this->form_validation->set_rules('email', 'Message', 'required');
        $this->form_validation->set_rules('poc_id', 'Message', 'required');

        $datas = array(
            'poc_name' => $this->input->post('name'),
            'designation' => $this->input->post('designation'),
            'phone'=> $this->input->post('phone'),
            'alternate_no'=> $this->input->post('alternate_no'),
            'poc_email' => $this->input->post('email'),
        );
        
           
        if ($this->form_validation->run()) {
            
            $id = $this->input->post('poc_id');
    
            if ($this->Companymodel->update_poc($datas, $id)) {
                $this->session->set_flashdata('error', 'Error In Submission');
                redirect(base_url() . 'admin/company/allpoc');
            } else {
                $this->session->set_flashdata('success', 'Poc Updated Successfully!');
                redirect(base_url() . 'admin/company/allpoc');
            }
        } else {
            $this->session->set_flashdata('error', 'Please Fill All The Fields!');
            redirect(base_url() . 'admin/company/allpoc');
        }


    }


}