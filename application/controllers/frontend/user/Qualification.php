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

            // $qualification_data = $this->db->where('student_id',$_SESSION['user_id'])->get('qualification')->result_array();
            // foreach($qualification_data as $value){
            //     $student_id = $value['student_id'];
            // }

            $start_year = $this->input->post('start_year');
            $passing_year = $this->input->post('passing_year');




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
                'course_name' => $this->input->post('course_name'),
            );

            //  $passing_year => $this->input->post('passing_year');
            // $start_year => $this->input->post('start_year');

              
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
