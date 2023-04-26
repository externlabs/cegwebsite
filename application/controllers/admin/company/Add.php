<?php
class Add extends CI_controller
{

    public function __construct()
    {
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
        $this->load->view('admin/company/add');
        $this->load->view('admin/template/footer');
    }

    public function getpincodedeatils(){

        $pincode=$this->input->post('pincode');

        $pincodeData = file_get_contents('https://api.postalpincode.in/pincode/'.$pincode);
        $jsonDecodeData = json_decode($pincodeData);

        // print_r($jsonDecodeData);
        echo json_encode($jsonDecodeData);

        // if($jsonDecodeData[0]->Status == "Success"){
        //     $postOffices = $jsonDecodeData[0]->PostOffice;
        //     $District = $jsonDecodeData[0]->PostOffice[0]->District;
        //     $State = $jsonDecodeData[0]->PostOffice[0]->State;

        //     $data = array(
        //         'status' => "Success",
        //         'state' => $State,
        //         'district' => $District,
        //         'city' => $postOffices,
                
        //     );
        //     echo json_encode($data);
        // }else{
        //     $data = array(
        //         'status' => "error",
        //         'message' => "Please Enter Correct Pincode!",
        //     );
        //     echo json_encode($data);
        // }
    }

        


    

    public function add_company(){

        $this->load->model('admin/company/Companymodel');
        $this->input->post('formSubmit');

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[company.company_email]');
        $this->form_validation->set_rules('number', 'number', 'required');
        $this->form_validation->set_rules('landline', 'number', 'required');
        $this->form_validation->set_rules('address', 'Subject', 'required');
        $this->form_validation->set_rules('city', 'Message', 'required');
        $this->form_validation->set_rules('desc', 'Message', 'required');
        $this->form_validation->set_rules('website', 'Message', 'required');
        $this->form_validation->set_rules('district', 'number', 'required');
        $this->form_validation->set_rules('state', 'Subject', 'required');
        $this->form_validation->set_rules('country', 'Message', 'required');
        $this->form_validation->set_rules('groupcompany', 'Message', 'required');
        $this->form_validation->set_rules('pincode', 'Message', 'required');

       
        if ($this->form_validation->run()) {
            if (!empty($_FILES['images']['name'])) {
                $File_name = '';
                $config['upload_path'] = APPPATH . '../upload/company';
                $config['file_name'] = $File_name;
                $config['overwrite'] = TRUE;
                $config["allowed_types"] = 'jpeg|jpg|png';
                $config["max_size"] = 2048;
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('images')) {
                    $this->data['error'] = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('admin/company/add');
                } else {
                    $dataimage_return = $this->upload->data();
                    $imageurl =  $dataimage_return['file_name'];
                }
            }
            $data = array(
                'company_name' => $this->input->post('name'),
                'company_email' => $this->input->post('email'),
                'company_number' => $this->input->post('number'),
                'company_landline' => $this->input->post('number'),
                'company_address' => $this->input->post('address'),
                'company_city' => $this->input->post('city'),
                'company_desc' => $this->input->post('desc'),
                'company_website' => $this->input->post('website'),
                'country' => $this->input->post('country'),
                'groupcompany' => $this->input->post('groupcompany'),
                'company_logo' => $imageurl,
                'pincode' => $this->input->post('pincode'),
                'district' => $this->input->post('district'),
                'state' => $this->input->post('state'),
                'company_status' => 1,
            );

            if ($this->Companymodel->add_company($data)) {
                $this->session->set_flashdata('success', 'Company Added Successfully!');
                redirect(base_url() . 'admin/company/add');
            } else {
                $this->session->set_flashdata('error', 'Error In Submission');
                redirect(base_url() . 'admin/company/add');
            }
        } else {
            $this->session->set_flashdata('error', 'Please Fill All The Fields or company Already Registered!');
            redirect(base_url() . 'admin/company/add');
        }
    }



    
}
