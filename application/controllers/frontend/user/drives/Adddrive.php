<?php
class Adddrive extends CI_controller
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
        $this->load->view('frontend/user/drives/adddrive');
        $this->load->view('frontend/user/common/footer');
    }

    public function add(){
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


        if($this->form_validation->run()){
           
            $poc_data = $this->db->where('poc_id',$_SESSION['user_id'])->get('company_poc')->result_array();
           
            foreach($poc_data as $value){
                $company_id = $value['company_id'];
            }
            
            $drive_date = $this->input->post('drive_date');
            $start_date = $this->input->post('start_date');
            $end_date = $this->input->post('last_date');


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
                'company_id' => $company_id,
            );

            if($drive_date > $end_date){
                if($end_date >= $start_date){
                    if ($this->Drivemodel->add_drive($datas)) {
                        $this->session->set_flashdata('success', 'Drive Added Successfully!');
                        redirect(base_url() . 'user/add-drive');
                    } else {
                        $this->session->set_flashdata('error', 'Error In Submission');
                        redirect(base_url() . 'user/add-drive');
                    }
                }else{
                    $this->session->set_flashdata('error', 'Last Date always be a future date of start date!');
                    redirect(base_url() . 'user/add-drive'); 
                }
            }else{
                $this->session->set_flashdata('error', 'Drive Can Not Be Schedule before or on last date. Please select Future Date');
                redirect(base_url() . 'user/add-drive'); 
            }
        }else {
            $this->session->set_flashdata('error', 'Please Fill All The Fields');
            redirect(base_url() . 'user/add-drive');
        }
    }

  
} 


