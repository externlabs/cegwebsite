<?php
class Forgetpassword extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        if(!isset($_SESSION['user_id'])){
            redirect(base_url());
        }
    }
    public function index()
    {
        
        $this->load->view('frontend/user/common/header');
        $this->load->view('frontend/user/common/sidebar');
        $this->load->view('frontend/user/common/topbar');
        $this->load->view('frontend/user/forgetpassword');
        $this->load->view('frontend/user/common/footer');
    }

  
    public function updatepwd(){
        $this->form_validation->set_rules('password','Current_password','required');
        $this->form_validation->set_rules('new_password','Current_password','required');
        $this->form_validation->set_rules('confirm_password','Current_password','required');


        if($this->form_validation->run()){
            $curr_password = $this->input->post('password');
            $new_password = $this->input->post('new_password');
            $confirm_password = $this->input->post('confirm_password');
            $this->load->model('frontend/Studentmodel');

            $user_id = $_SESSION['user_id'];
            $user_type = $_SESSION['profile_type'];


            if($user_type == "company"){
                $id = $user_id;
                $table_name = "company_poc";
                $colom_name =  "poc_id";
                $colom_pass = "poc_password";

            }else if($user_type == "student"){
                $id = $user_id;
                $table_name = "student";
                $colom_name =  "student_id";
                $colom_pass = "password";
            }else if($user_type == "faculity"){
                $id = $user_id;
                $table_name = "faculity";
                $colom_name =  "faculity_id";
                $colom_pass = "password";
            
            }else{
                redirect(base_url());
            }

            
            $student_data = $this->Studentmodel->getcurrpassword($id,$table_name,$colom_name);
          
            if($student_data->$colom_pass == md5($curr_password)){
                if($new_password == $confirm_password){
                
                    if($this->Studentmodel->updatepassword($new_password,$id,$table_name,$colom_name,$colom_pass)){
                        $this->session->set_flashdata('error', 'failed to updated password!');
                        redirect(base_url() . 'user/forgetpassword');
                    }
                    else{
                      
                        $this->session->set_flashdata('success', 'password updated sussfully!');
                        redirect(base_url() . 'user/forgetpassword');
                    }
                }
                else{
          
                    $this->session->set_flashdata('error', 'new and confirm password is not match');
                    redirect(base_url() . 'user/forgetpassword');
                    
                }
            }
            else{
                
                $this->session->set_flashdata('error', 'sorry current password is not matching');
                redirect(base_url() . 'user/forgetpassword');
            }
        }
        else{
            $this->session->set_flashdata('error', 'Please Fill All The Fields');
            redirect(base_url() . 'user/forgetpassword');
        }
    }
    
}