<?php
class Faculity extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('frontend/Faculitymodel');
    }
    public function index()
    {
        
        $this->load->view('frontend/template/header');
        $this->load->view('frontend/template/navbar');
        $this->load->view('frontend/auth/faculity');
        $this->load->view('frontend/template/footer');
    }

    public function faculity_login()
    {
       
        $this->load->model('frontend/Faculitymodel');
        $model_data = $this->Faculitymodel->fetch_data();

        $login_success = 0;
        $user_data = array(
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
        );

        foreach ($model_data as $value) {
            if ((strtolower($value['faculity_email']) == strtolower($user_data['email'])) && ($value['password'] == md5($user_data['password']))) {
                $_SESSION["user_id"] = $value["faculity_id"];
                $_SESSION['profile_type'] = "faculity";
                $login_success = 1;
                break;
            }
        }
        if ($login_success == 1) {
            redirect(base_url() . 'user/dashboard');
        } else {
            $this->session->set_flashdata('error', 'Wrong Email Or Password');
            redirect(base_url().'auth/faculity');
        }
    }

  

    public function create_faculity(){

        $this->load->model('frontend/Faculitymodel');
        $this->input->post('formSubmit');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('designation', 'Designation', 'required');
        $this->form_validation->set_rules('department', 'Department', 'required');
        $this->form_validation->set_rules('organization', 'Organization', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('address', 'address', 'required');
        $this->form_validation->set_rules('state', 'State', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Password', 'required');

       

        if ($this->form_validation->run() == true) {
            if($this->input->post('password') == $this->input->post('confirm_password')){

                $email = $this->input->post('email');


                $student_data = $this->db->where('student_email',$email)->get('student')->result_array(); 
                $company_data = $this->db->where('poc_email',$email)->get('company_poc')->result_array(); 
                $faculity_data = $this->db->where('faculity_email',$email)->get('faculity')->result_array(); 

                if($student_data == Array()){
                    if($company_data == Array()){
                        if( $faculity_data == Array()){
                            $datas = array(
                                'faculity_name' => $this->input->post('name'),
                                'faculity_designation' => $this->input->post('designation'),
                                'faculity_department' => $this->input->post('department'),
                                'faculity_organization' => $this->input->post('organization'),
                                'faculity_email' => $this->input->post('email'),
                                'city' => $this->input->post('city'),
                                'state' => $this->input->post('state'),
                                'address' => $this->input->post('address'),
                                'phone' => $this->input->post('phone'),
                                'faculity' => $this->input->post('faculity'),
                                'accommodation' => $this->input->post('accommodation'),
                                'password' => md5($this->input->post('password')),
                            );
                            if ($this->Faculitymodel->create_faculity($datas)) {
                                $this->session->set_flashdata('success', 'Account has been created successfully!');
                                redirect(base_url() . 'auth/faculity');
                            } else {
                                $this->session->set_flashdata('error', 'Error In Submission');
                                redirect(base_url() . 'auth/faculity');
                            }
                        }else{
                            $this->session->set_flashdata('error', 'Email Already Exists!');
                            redirect(base_url() . 'auth/faculity');
                        }
                    }else{
                        $this->session->set_flashdata('error', 'Email Already Exists!');
                        redirect(base_url() . 'auth/faculity');
                    }
                }else{
                    $this->session->set_flashdata('error', 'Email Already Exists!');
                    redirect(base_url() . 'auth/faculity'); 
                }
        }else{
            $this->session->set_flashdata('error', 'Password does not match!');
            redirect(base_url() . 'auth/faculity');
        }
        }else{
            $this->session->set_flashdata('error', 'Please Fill All The Fields');
            redirect(base_url() . 'auth/faculity');
        }
    }    
}

