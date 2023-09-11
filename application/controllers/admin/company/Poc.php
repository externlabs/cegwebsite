<?php
class Poc extends CI_controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('vendorAuth')) {
            redirect('admin/login');
        }
        
        $this->load->model('admin/company/Companymodel');
    }

    public function index()
    {

        $data['company_list'] = $this->Companymodel->fetch_data();
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/template/topbar');
        $this->load->view('admin/company/poc',$data);
        $this->load->view('admin/template/footer');
    }


    public function add_poc(){

        $this->load->model('admin/company/Companymodel');
        $this->input->post('formSubmit');

        $this->form_validation->set_rules('company_id', 'Name', 'required');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('phone', 'Name', 'required');
        $this->form_validation->set_rules('designation', 'Name', 'required');
        // $this->form_validation->set_rules('alternate_no', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');

        if ($this->form_validation->run()) {

            $email = $this->input->post('email');
            $name = $this->input->post('name');

            $student_data = $this->db->where('student_email',$email)->get('student')->result_array(); 
            $company_data = $this->db->where('poc_email',$email)->get('company_poc')->result_array(); 
            $faculity_data = $this->db->where('faculity_email',$email)->get('faculity')->result_array();
            $company_details = $this->db->where('company_email',$email)->get('company')->result_array();


            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $randomPassword = '';
            for ($i = 0; $i < 6; $i++) {
                $index = rand(0, strlen($characters) - 1);
                $randomPassword .= $characters[$index];
            }

            $from = "info@externlabs.com";
            $to = $email;
            $subject = "Welcome To Ceg";
            $message = "Hi $name
                Your LOGIN details Are Below:
                email: $email
                password: $randomPassword

                Note: Please Reset Your Password Once Logged in.
            ";
            $headers = "From:" . $from;

            if($student_data == Array()){
                if($company_data == Array()){
                    if($faculity_data == Array()){
                        if($company_details == Array()){
                        $datas = array(
                            'company_id' => $this->input->post('company_id'),
                            'poc_email' => $this->input->post('email'),
                            'poc_name' => $this->input->post('name'),
                            'designation' => $this->input->post('designation'),
                            'phone' => $this->input->post('phone'),
                            'alternate_no' => $this->input->post('alternate_no'),
                            'poc_password' => md5($randomPassword),
                        );
            
                        if ($this->Companymodel->add_poc($datas)) {
                            mail($to,$subject,$message, $headers);
                            $this->session->set_flashdata('success', 'Poc Added Successfully!');
                            redirect(base_url() . 'admin/company/poc');
                        } else {
                            $this->session->set_flashdata('error', 'Error In Submission');
                            redirect(base_url() . 'admin/company/poc');
                        }
                    }else{
                        $this->session->set_flashdata('error', 'Email Already Registered');
                        redirect(base_url() . 'admin/company/poc');
                    }
                }else{
                    $this->session->set_flashdata('error', 'Email Already Registered');
                    redirect(base_url() . 'admin/company/poc');
                }
            }else{
                $this->session->set_flashdata('error', 'Email Already Registered');
                redirect(base_url() . 'admin/company/poc');
            }
        }else{
            $this->session->set_flashdata('error', 'Email Already Registered');
            redirect(base_url() . 'admin/company/poc');
        }
        } else {
            $this->session->set_flashdata('error', 'Please Fill All The Fields or company Already Registered!');
            redirect(base_url() . 'admin/company/poc');
        }
    }
    
}
