<?php
class Qualification extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        if(!isset($_SESSION['user_id'])){
            redirect(base_url());
        }
        $this->load->model('frontend/Studentmodel');
    }
    public function index()
    {
       
        $this->load->view('frontend/user/common/header');
        $this->load->view('frontend/user/common/sidebar');
        $this->load->view('frontend/user/common/topbar');
        $this->load->view('frontend/user/qualification');
        $this->load->view('frontend/user/common/footer');
    }

    
    

    public function add(){
       
       

        $this->load->model('frontend/Studentmodel');
        $this->input->post('formSubmit');

        $this->form_validation->set_rules('class', 'Name', 'required');
        $this->form_validation->set_rules('university_name', 'Email', 'required');
        $this->form_validation->set_rules('institute_type', 'number', 'required');
        $this->form_validation->set_rules('state', 'Name', 'required');
        $this->form_validation->set_rules('percentage', 'Name', 'required');
        $this->form_validation->set_rules('branch', 'Email', 'required');
        $this->form_validation->set_rules('start_year', 'Start Year', 'required');
        $this->form_validation->set_rules('passing_year', 'Passing Year', 'required');

     
        
        if ($this->form_validation->run()){
            $start_year = $this->input->post('start_year');
            $passing_year = $this->input->post('passing_year');

            if($_SESSION['profile_type'] == 'student'){
                $user_type = "student";
            }else{
                $user_type = "faculity";
            }


            $student_id = $_SESSION['user_id'];
            
            $datas = array(
                'class' => $this->input->post('class'),
                'university_name' => $this->input->post('university_name'),
                'institute_type' => $this->input->post('institute_type'),
                'state' => $this->input->post('state'),
                'passing_year' => $this->input->post('passing_year'),
                'percentage' => $this->input->post('percentage'),
                'branch' => $this->input->post('branch'),
                'backlog' => $this->input->post('backlog'),
                'start_year' => $this->input->post('start_year'),
                'student_id' => $student_id,
                'user_type' => $user_type,
                'course_name' => $this->input->post('course_name'),
            );
              
            if($start_year < $passing_year){
                if ($this->Studentmodel->add_qualification($datas)){
                    $this->session->set_flashdata('success', 'Qualification Added Successfully!');
                    redirect(base_url() . 'user/add-qualification');
                } else {
                    $this->session->set_flashdata('error', 'Error In Submission');
                    redirect(base_url() . 'user/add-qualification');
                }
            }else{
                $this->session->set_flashdata('error', 'passing year should be greter than admission year');
                redirect(base_url() . 'user/add-qualification'); 

            }
        } else {
            $this->session->set_flashdata('error', 'Please Fill All The Fields');
            redirect(base_url() . 'user/add-qualification');
        }
    }
}
