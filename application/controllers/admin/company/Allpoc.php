<?php
class Allpoc extends CI_controller
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
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/template/topbar');
        $this->load->view('admin/company/allpoc');
        $this->load->view('admin/template/footer');
    }

    public function update_status(){

        $this->load->model('admin/Companymodel');
        $this->form_validation->set_rules('company_status', 'company_status', 'required');
        $this->form_validation->set_rules('company_id', 'company_id', 'required');

        if ($this->form_validation->run()) {
            $datas = array(
                'company_status' => $this->input->post('company_status'),
            );
            $id = $this->input->post('company_id');
    
            if ($this->Companymodel->update_company_status($datas, $id)) {
                $this->session->set_flashdata('error', 'Error In Submission');
                redirect(base_url() . 'admin/company/allpoc');
            } else {
                $this->session->set_flashdata('success', 'Company Status Updated Successfully!');
                redirect(base_url() . 'admin/company/allpoc');
            }
        } else {
            $this->session->set_flashdata('error', 'Please Fill All The Fields!');
            redirect(base_url() . 'admin/company/allpoc');
        }


    }

    




  
    public function deletepost(){ 
        if($this->input->post('deletesliderId')){
            $this->form_validation->set_rules('deletesliderId','text','required');
            if($this->form_validation->run() == true){
                $getDeleteStatus = $this->Companymodel->delete_poc($this->input->post('deletesliderId'));
                if($getDeleteStatus['message'] == 'yes'){
                    $this->session->set_flashdata('success','Company  deleted successfully');
                    redirect(base_url()."admin/company/allpoc");
                }else{
                    $this->session->set_flashdata('error','Something went wrong. Please try again');
                    redirect(base_url()."admin/company/allpoc");
                }
            }else{
                $this->session->set_flashdata('error','Something went wrong. Please try again');
                redirect(base_url()."admin/company/allpoc");
            }
        }
    }


}




    

