<?php
class Student extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('frontend/Studentmodel');
        $this->load->library('session');
    }
    public function index()
    {
       
        $this->load->view('frontend/template/header');
        $this->load->view('frontend/template/navbar');
        $this->load->view('frontend/auth/student');
        $this->load->view('frontend/template/footer');
    }

    

    public function student_login()
    {
       
        $url  = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';;
        $explode_url = explode('=',$url);
        $this->load->model('frontend/Studentmodel');
        $model_data = $this->Studentmodel->fetch_data();

        $login_success = 0;
        $user_data = array(
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
        );

        foreach ($model_data as $value) {
            if ((strtolower($value['student_email']) == strtolower($user_data['email'])) && ($value['password'] == md5($user_data['password']))) {


                if($value['student_status'] == 1){
                    $_SESSION["user_id"] = $value["student_id"];
                    $_SESSION['profile_type'] = "student";
                    $login_success = 1;
                    break;
                }else{
                    $this->session->set_flashdata('error', 'Your Account Has Been Blocked. Please contact Administratror!');
                    redirect(base_url().'auth/student');
                }

                
            }
        }

        if ($login_success == 1) {
            if($explode_url[1] == "apply"){
                redirect(base_url().'upcoming-drives'); 
            }else{
                redirect(base_url().'user/dashboard');
            }
        } else {
            $this->session->set_flashdata('error', 'Wrong Email Or Password');
            redirect(base_url().'auth/student');
        }
    }

    public function add_create(){
        $this->load->model('frontend/Studentmodel');
        $this->input->post('formSubmit');

        $this->form_validation->set_rules('height', 'Height', 'required');
        $this->form_validation->set_rules('weight', 'Weight', 'required');
        $this->form_validation->set_rules('bloodgroup', 'Bloodgroup', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Confirm_password', 'required');

        if ($this->form_validation->run() == true) {
            if($this->input->post('password') == $this->input->post('confirm_password')){


                if (!empty($_FILES['photo']['name'])) {
                    $File_name = '';
                    $config['upload_path'] = APPPATH . '../upload/student/';
                    $config['file_name'] = $File_name;
                    $config['overwrite'] = false;
                    $config["allowed_types"] = 'jpg|jpeg|png';
                    $config["max_size"] = '6144';
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('photo')) {
                        $this->data['error'] = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $this->upload->display_errors());
                        redirect(base_url().'auth/student/add');
                    } else {
                        $dataimage_return = $this->upload->data();
                        $studentphoto = $dataimage_return['file_name'];
                    }
                }

                if (!empty($_FILES['aadhar']['name'])){
                    $File_name = '';
                    $config['upload_path'] = APPPATH . '../upload/aadhar/';
                    $config['file_name'] = $File_name;
                    $config['overwrite'] = false;
                    $config["allowed_types"] = 'jpg|png|jpeg';
                    $config["max_size"] = '6144';

                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('aadhar')) {
                        $this->data['error'] = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $this->upload->display_errors());
                        redirect(base_url().'auth/student/add');
                    } else {
                        $dataimage_retur = $this->upload->data();
                        $aadhar_front =  $dataimage_retur['file_name'];
                    }
                }

                if (!empty($_FILES['signature']['name'])) {
                    $File_nam = '';
                    $config['upload_path'] = APPPATH . '../upload/signature/';
                    $config['file_name'] = $File_nam;
                    $config['overwrite'] = false;
                    $config["allowed_types"] = 'jpeg|jpg|png';
                    $config["max_size"] = '6144';
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('signature')) {
                        $this->data['error'] = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $this->upload->display_errors());
                        redirect(base_url().'auth/student/add');
                    } else {
                        $dataimage_return = $this->upload->data();
                        $signature = $dataimage_return['file_name'];
                    }
                }

                $student_information = $_SESSION['student_information'];

                $datas = array(
                    'student_name' => $student_information['student_name'],
                    'father_name' => $student_information['father_name'],
                    'mother_name' =>$student_information['mother_name'],
                    'student_email' =>$student_information['student_email'],
                    'student_number' =>$student_information['student_number'],
                    'student_aadhar' => $student_information['student_aadhar'],
                    'student_dob' => $student_information['student_dob'],
                    'student_gender' => $student_information['student_gender'],
                    'student_address' =>$student_information['student_address'],
                    'city' => $student_information['city'],
                    'district' =>$student_information['district'],
                    'state' =>$student_information['state'],
                    'pincode' =>$student_information['pincode'],

                    'height' => $this->input->post('height'),
                    'weight' => $this->input->post('weight'),
                    'bloodgroup' => $this->input->post('bloodgroup'),
                    'password' => md5($this->input->post('password')),
                    'photo' => $studentphoto,
                    'aadhar_front' => $aadhar_front,
                    'signature' =>$signature,
                    'student_status' =>1,
                );
                if ($this->Studentmodel->create_student($datas)) {
                    session_destroy();
                    $this->session->set_flashdata('success', 'Account has been created successfully!');
                    redirect(base_url() . 'auth/student');
                } else {
                    $this->session->set_flashdata('error', 'Error In Submission');
                    redirect(base_url() . 'auth/student/add');
                }
            }else{
                $this->session->set_flashdata('error', 'Password does not match!');
                redirect(base_url() . 'auth/student/add');
            }
        } else {
            $this->session->set_flashdata('error', 'Please Fill All The Fields');
            redirect(base_url() . 'auth/student/add');
        }
    }

    public function add(){

        if(!isset($_SESSION['student_information'])){
            redirect(base_url().'auth/student');
        }
        $this->load->view('frontend/template/header');
        $this->load->view('frontend/template/navbar');
        $this->load->view('frontend/auth/add');
        $this->load->view('frontend/template/footer');
    }

    public function student_create()
    {
        $this->load->model('frontend/Studentmodel');
        $this->input->post('formSubmit');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('father_name', 'Father_Name', 'required');
        $this->form_validation->set_rules('mother_name', 'Father_Name', 'required');
        $this->form_validation->set_rules('email', 'Aadhar', 'required');
        $this->form_validation->set_rules('phone', 'DOB', 'required');
        $this->form_validation->set_rules('aadhar', 'Email', 'required');
        $this->form_validation->set_rules('dob', 'Gender', 'required');
        $this->form_validation->set_rules('gender', 'City', 'required');
        $this->form_validation->set_rules('address', 'District', 'required');
        $this->form_validation->set_rules('city', 'State', 'required');
        $this->form_validation->set_rules('district', 'Pincode', 'required');
        $this->form_validation->set_rules('state', 'Phone', 'required');
        $this->form_validation->set_rules('pincode', 'Phone', 'required');
        // $this->form_validation->set_rules('state', 'Phone', 'required');

        
        if ($this->form_validation->run() == true) {

            $email = $this->input->post('email');


            $student_data = $this->db->where('student_email',$email)->get('student')->result_array(); 
            $company_data = $this->db->where('poc_email',$email)->get('company_poc')->result_array(); 
            $faculity_data = $this->db->where('faculity_email',$email)->get('faculity')->result_array(); 


            if($student_data == Array()){
                if($company_data == Array()){
                    if($faculity_data == Array()){
                        $datas = array(
                            'student_name' => $this->input->post('name'),
                            'father_name' => $this->input->post('father_name'),
                            'mother_name' => $this->input->post('mother_name'),
                            'student_email' => $this->input->post('email'),
                            'student_number' => $this->input->post('phone'),
                            'student_aadhar' => $this->input->post('aadhar'),
                            'student_dob' => $this->input->post('dob'),
                            'student_gender' => $this->input->post('gender'),
                            'student_address' => $this->input->post('address'),
                            'city' => $this->input->post('city'),
                            'district' => $this->input->post('district'),
                            'state' => $this->input->post('state'),
                            'pincode' => $this->input->post('pincode'),
                        );
                        $_SESSION['student_information'] = $datas;
                        redirect(base_url() . 'auth/student/add');
                    }else{
                        $this->session->set_flashdata('error', 'Email Already Exists!');
                        redirect(base_url() . 'auth/student');
                    }
                }else{
                    $this->session->set_flashdata('error', 'Email Already Exists!');
                    redirect(base_url() . 'auth/student');
                }
            }else{
                $this->session->set_flashdata('error', 'Email Already Exists!');
                redirect(base_url() . 'auth/student');
            }   
        } else {
            $this->session->set_flashdata('error', 'Please Fill All The Fields');
            redirect(base_url() . 'auth/student');
        }
    }
}
