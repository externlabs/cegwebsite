<?php
class Company extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('frontend/Companymodel');
    }
    public function index(){
        $this->load->view('frontend/template/header');
        $this->load->view('frontend/template/navbar');
        $this->load->view('frontend/auth/company');
        $this->load->view('frontend/template/footer');
    }


    public function company_login()
    {
        
        $this->load->model('frontend/Companymodel');
        $model_data = $this->Companymodel->fetch_poc();

        $login_success = 0;
        $user_data = array(
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
        );
        
        $company_data = $this->db->get('company')->result_array();

        foreach ($model_data as $value) {
            if ((strtolower($value['poc_email']) == strtolower($user_data['email'])) && ($value['poc_password'] == md5($user_data['password']))) {
                $company_id = $value['company_id'];
                foreach($company_data as $company){
                    if($company['company_id'] == $company_id ){
                        $company_status = $company['company_status'];
                    }
                }
                
                if( $company_status == 1){
                    $_SESSION["user_id"] = $value["poc_id"];
                    $_SESSION['profile_type'] = "company";
                    $login_success = 1;
                    break;
                }else{
                    $this->session->set_flashdata('error', 'Your Company Has Been Blacklist. Please Contact To admin!');
                    redirect(base_url().'auth/company');
                }
            }
        }

        if ($login_success == 1) {
            redirect(base_url() . 'user/dashboard');
        } else {
            $this->session->set_flashdata('error', 'Wrong Email Or Password');
            redirect(base_url().'auth/company');
        }
    }
}
