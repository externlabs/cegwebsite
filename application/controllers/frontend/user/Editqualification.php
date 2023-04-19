<?php
class Editqualification extends CI_controller
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
        $data['fetch_content'] = $this->Studentmodel->fetch_qualification();
        $this->load->view('frontend/user/common/header');
        $this->load->view('frontend/user/common/sidebar');
        $this->load->view('frontend/user/common/topbar');
        $this->load->view('frontend/user/editqulification',$data);
        $this->load->view('frontend/user/common/footer');
    }

   

    
    public function update_edit(){

        $this->load->model('admin/Studentmodel');
        $this->form_validation->set_rules('class', 'Name', 'required');
        $this->form_validation->set_rules('university_name', 'Email', 'required');
        $this->form_validation->set_rules('institute_type', 'number', 'required');
        $this->form_validation->set_rules('state', 'Name', 'required');
        $this->form_validation->set_rules('passing_year', 'Email', 'required');
        $this->form_validation->set_rules('percentage', 'Name', 'required');
        $this->form_validation->set_rules('branch', 'Email', 'required');

       
        if ($this->form_validation->run()) {
            $data = array(
                'class' => $this->input->post('class'),
                'university_name' => $this->input->post('university_name'),
                'institute_type' => $this->input->post('institute_type'),
                'state' => $this->input->post('state'),
                'passing_year' => $this->input->post('passing_year'),
                'percentage' => $this->input->post('percentage'),
                'branch' => $this->input->post('branch'),
                'backlog' => $this->input->post('backlog'),
                'start_year' => $this->input->post('start_year'),
                'course_name' => $this->input->post('course_name'),
                //'student_id' => $student_id,
            );

            $id = $this->input->post('qualification_id');
            if ($this->Studentmodel->update_qualification($data, $id)) {
                $this->session->set_flashdata('error', 'Error In Submission');
                redirect(base_url() . 'user/editqualification');
            } else {
                $this->session->set_flashdata('success', 'Student Updated Successfully!');
                redirect(base_url() . 'user/qualifications');
            }
        } else {
            $this->session->set_flashdata('error', 'Please Fill All The Fields!');
            redirect(base_url() . 'user/editqualification');
        }


    }
}
