<?php
class Edit extends CI_controller
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
        $data['fetch_content'] = $this->Companymodel->fetch_data();
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/template/topbar');
        $this->load->view('admin/company/edit',$data);
        $this->load->view('admin/template/footer');
    }

    public function update_company(){

        $this->load->model('admin/Companymodel');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('number', 'number', 'required');
        $this->form_validation->set_rules('landline', 'number', 'required');
        // $this->form_validation->set_rules('fax', 'number', 'required');
        $this->form_validation->set_rules('address', 'Subject', 'required');
        $this->form_validation->set_rules('city', 'Message', 'required');
        $this->form_validation->set_rules('desc', 'Message', 'required');
        $this->form_validation->set_rules('website', 'Message', 'required');
        $this->form_validation->set_rules('district', 'Message', 'required');
        $this->form_validation->set_rules('state', 'Message', 'required');
        $this->form_validation->set_rules('country', 'Message', 'required');
        $this->form_validation->set_rules('groupcompany', 'Message', 'required');
        $this->form_validation->set_rules('pincode', 'Message', 'required');

        if ($this->form_validation->run()) {
            $company_id = $this->input->post('company_id');
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
                    redirect('admin/company/edit?id='.$company_id);
                } else {
                    $dataimage_return = $this->upload->data();
                    $imageurl =  $dataimage_return['file_name'];
                }
            } else {
                $data = $this->db->where('company_id',$company_id)->get('company')->result_array();
                foreach ($data as $value) {
                    $imageurl = $value['company_logo'];
                }
            }

            $data = array(
                'company_name' => $this->input->post('name'),
                'company_email' => $this->input->post('email'),
                'company_number' => $this->input->post('number'),
                'company_landline' => $this->input->post('landline'),
                'company_address'=> $this->input->post('address'),
                'company_city'=> $this->input->post('city'),
                'district' => $this->input->post('district'),
                'state' => $this->input->post('state'),
                'country' => $this->input->post('country'),
                'groupcompany' => $this->input->post('groupcompany'),
                'pincode' => $this->input->post('pincode'),
                'company_desc' => $this->input->post('desc'),
                'company_website' => $this->input->post('website'),
                'company_logo' => $imageurl,
            );
            $id = $this->input->post('company_id');
    
            if ($this->Companymodel->update_company_status($data, $id)) {
                $this->session->set_flashdata('error', 'Error In Submission');
                redirect(base_url() . 'admin/company/edit');
            } else {
                $this->session->set_flashdata('success', 'Company Updated Successfully!');
                redirect(base_url() . 'admin/company/allcompany');
            }
        } else {
            $this->session->set_flashdata('error', 'Please Fill All The Fields!');
            redirect(base_url() . 'admin/company/edit');
        }
    }
}