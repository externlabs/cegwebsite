<?php
class Forget extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('frontend/Studentmodel');
        $this->load->library('session');
    }
    public function index(){
       
        $this->load->view('frontend/template/header');
        $this->load->view('frontend/template/navbar');
        $this->load->view('frontend/auth/forget');
        $this->load->view('frontend/template/footer');
    }

    public function verify_otp() {

        $this->load->model('frontend/Studentmodel');

        $verification_code = $this->input->post('verification_code');
        // $email= $_SESSION['verification_email'];
        // $type = $_SESSION['verification_type'];


        $email = 'himanshugoyal1011@gmail.com';
        $type = "company";

        if($type == "company"){
            $poc_data = $this->db->where('poc_email',$email)->get('company_poc')->result_array();
            foreach($poc_data as $poc){
                $otp = $poc['verification_code'];
            }
        }elseif($type == "student"){
            $student_data = $this->db->where('student_email',$email)->get('student')->result_array();
            foreach($student_data as $student){
                $otp = $student['verification_code'];
            }

        }elseif($type == "faculity"){
            $faculity_data = $this->db->where('faculity_email',$email)->get('faculity')->result_array();
            foreach($faculity_data as $faculity){
                $otp = $faculity['verification_code'];
            }

        }else{
            $this->session->set_flashdata('error', 'Unknown User');
            redirect(base_url() . 'auth/forget');
        }
        
        if ($verification_code == $otp){
            redirect(base_url() . 'auth/changepassword');
        } else {
            $this->session->set_flashdata('error', 'OTP did not match. Please recheck and try again!');
            redirect(base_url() . 'auth/forget');
        }
     }
  

    



    public function forgot_password(){
        $this->load->model('frontend/Studentmodel');
        $this->input->post('formSubmit');
        $this->load->config('email');
        $this->load->library('email');

        $this->form_validation->set_rules('email', 'Email', 'required');
    
        if($this->form_validation->run()){
            $email = $this->input->post('email');

            
            $student_data = $this->db->where('student_email',$email)->get('student')->result_array();
            $company_data = $this->db->where('poc_email',$email)->get('company_poc')->result_array();
            $faculity_data = $this->db->where('faculity_email',$email)->get('faculity')->result_array();

           
            if($student_data == Array()){
                if($company_data == Array()){
                    if($faculity_data == Array()){
                        $array = array(
                            'status'   => "error",
                            'msg' => "Email Not Found!",
                        );
                    }else{
                        foreach($faculity_data as $faculity){
                            $name = $faculity['faculity_name'];
                            $id = $faculity['faculity_id'];
                            $type = "faculity";
                        }
                    }
                }else{
                    foreach($company_data as $company){
                        $name = $company['poc_name'];
                        $id = $company['poc_id'];
                        $type = "company";
                    }
                }
            }else{
                foreach($student_data as $student){
                    $name = $student['student_name'];
                    $id = $student['student_id'];
                    $type = "student";
                }
            }

           
            $code = random_int(100000, 999999);
            
            if($name){
                $from = $this->config->item('smtp_user');
                $to = $email;
                $subject = "Verification Code";
                $message = "<p>Hi: ".$name."</p>
                    <p>Your Email Verification Code Is Given Below</p>
                    <p><b>".$code."</b></p>
                    <p>Thanks</p>
                ";
        
                $this->email->set_newline("\r\n");
                $this->email->from($from);
                $this->email->to($to);
                $this->email->subject($subject);
                $this->email->message($message);
            }
            


            if($type == "company"){
                $tablename = 'company_poc';
                $coloumn_name = "poc_id";
            }else if($type == "student"){
                $tablename = 'student';
                $coloumn_name = "student_id";
            }else if($type == "faculity"){
                $tablename = 'faculity';
                $coloumn_name = "faculity_id";
            }else{
                $array = array(
                    'status'   => "error",
                    'msg' => "Unknown User Type!",
                );
            }
            
            $data = array(
                'verification_code' => $code,
            );

            if($id){
                
                if($this->Studentmodel->update_verification_code($data,$tablename,$coloumn_name,$id)){
                    $array = array(
                        'status'   => "error",
                        'msg' => "Error In Submission",
                    );
                }else{
                    if($this->email->send()){
                        $_SESSION['verification_email'] = $email;
                        $_SESSION['verification_type'] = $type;
                        $array = array(
                            'status'   => "success",
                            'msg' => "Email Has been sent!",
                        );
                    }else{
                        $array = array(
                            'status'   => "error",
                            'msg' => "Email Is Busy Please try again later!",
                        );
                    }
                } 
            }else{
                $array = array(
                    'status'   => "error",
                    'msg' => "Email Not Found!",
                );
            }

                  
        }else{
            $array = array(
                'status'   => "error",
                'msg' => "Email Is Require",
            );
        }
        echo json_encode($array);
    }
}





























    
