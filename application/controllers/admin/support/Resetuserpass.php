<?php
    class Resetuserpass extends CI_controller{

    public function __construct(){
        parent::__construct();
        if (!$this->session->userdata('vendorAuth')) {
            redirect('admin/login');
        }
        $this->load->model('admin/company/Companymodel');
    }

    public function index(){
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/template/topbar');
        $this->load->view('admin/support/resetuserpass');
        $this->load->view('admin/template/footer');
    }

    public function reset(){

        $this->load->model('admin/company/Companymodel');
        $this->input->post('formSubmit');
        $this->form_validation->set_rules('poc_id', 'state', 'required');
        $this->form_validation->set_rules('new_pass', 'shipment_port', 'required');


        if ($this->form_validation->run()) {
            $password = $this->input->post('new_pass');
            $datas = array(
                'poc_password' => md5($password),
            );
            $id = $this->input->post('poc_id');
            $poc_data = $this->db->where('poc_id',$id)->get('company_poc')->result_array();

            foreach($poc_data as $poc){
                $email = $poc['poc_email'];
                $name = $poc['poc_name'];
            }

        
            $from = "info@externlabs.com";
            $to = $email;
            $subject = "New Password";
            $message = "Hello $name,
            Your New Login Details are given below:
            Email : $email
            Password: $password

            Thank You
            ";
            $headers = "From:" . $from;
            mail($to,$subject,$message, $headers);
            if ($this->Companymodel->update_poc($datas, $id)) {
                $this->session->set_flashdata('error', 'Error In Submission');
                redirect(base_url() . 'admin/support/resetuserpass');
            } else {
                $this->session->set_flashdata('success', 'Password Reset Successfully');
                redirect(base_url() . 'admin/support/resetuserpass');   
            }
        }else{
            $this->session->set_flashdata('error', 'Please Fill All The Fields');
            redirect(base_url() . 'admin/support/resetuserpass');
        }
    }


    public function getpoc(){
        $companyId=$this->input->post('companyId');
        $getPocData = $this->db->where('company_id',$companyId)->get('company_poc')->result_array();
        if($getPocData == Array()){
            $data = array(
                'status' => "error",
                'pocdeatils' => $getPocData,
            );
            echo json_encode($data);
        }else{
            $data = array(
                'status' => "Success",
                'pocdeatils' => $getPocData,
            );
            echo json_encode($data);
        }
    }

}
