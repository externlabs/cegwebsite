<?php
class Changepassword extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('frontend/Studentmodel');
    }
    public function index(){
       
        $this->load->view('frontend/template/header');
        $this->load->view('frontend/template/navbar');
        $this->load->view('frontend/auth/changepassword');
        $this->load->view('frontend/template/footer');
    }

    public function change_password(){
        
        $this->form_validation->set_rules('password','Current_password','required');
        $this->form_validation->set_rules('cofirm_password','Current_password','required');
       
        if($this->form_validation->run()){
            
            $new_password = $this->input->post('password');
            $cofirm_password = $this->input->post('cofirm_password');
            $this->load->model('frontend/Studentmodel');

            if($new_password == $cofirm_password){

                // $user_email = $_SESSION['verification_email'];
                // $user_type = $_SESSION['verification_type'];
                $user_email = "himanshugoyal1011@gmail.com";
                $user_type = "company";


                if($user_type == "company"){
                    $poc_data = $this->db->where('poc_email',$user_email)->get('company_poc')->result_array();
                    foreach($poc_data as $poc){
                        $id = $poc['poc_id'];
                    }

                    $table_name = "company_poc";
                    $colom_name =  "poc_id";
                    $colom_pass = "poc_password";

                }else if($user_type == "student"){
                    $student_data = $this->db->where('student_email',$user_email)->get('student')->result_array();
                    foreach($student_data as $student){
                        $id = $student['student_id'];
                    }
            
                    $table_name = "student";
                    $colom_name =  "student_id";
                    $colom_pass = "password";
                    
                }else if($user_type == "faculity"){
                    $faculity_data = $this->db->where('faculity_email',$user_email)->get('faculity')->result_array();
                    foreach($faculity_data as $faculity){
                        $id = $faculity['faculity_id'];
                    }

                    $table_name = "faculity";
                    $colom_name =  "faculity_id";
                    $colom_pass = "password";

                }else{
                    $this->session->set_flashdata('error', 'Invalid Profile Type!');
                    redirect(base_url() . 'auth/changepassword');

                }

                

                if($this->Studentmodel->updatepassword($new_password,$id,$table_name,$colom_name,$colom_pass)){
                    $this->session->set_flashdata('error', 'Failed to Change password!');
                    redirect(base_url() . 'auth/changepassword');
                }
                else{
                  
                    $this->session->set_flashdata('success', 'Password Changed Sussfully! You Can login now using new password');
                    redirect(base_url() . 'auth/changepassword');
                }

            }else{
                $this->session->set_flashdata('error', 'Password Does not match!');
                redirect(base_url() . 'auth/changepassword');
            }
         
        }else{
            $this->session->set_flashdata('error', 'Please Fill All The Fields');
            redirect(base_url() . 'auth/changepassword');
        }
    
    }
}
    




