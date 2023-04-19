<?php
class Career extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('frontend/Careermodel');
    }
    public function index()
    {

        $this->load->view('frontend/template/header');
      //  $this->load->view('frontend/template/navbar');
        $this->load->view('frontend/career');
        $this->load->view('frontend/template/footer');
    }

    public function create()
    {
        $this->load->model('frontend/Careermodel');
        $this->input->post('formSubmit');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('mob', 'number', 'required');


        if ($this->form_validation->run()) {
            if (!empty($_FILES['images']['name'])) {

                $File_name = '';
    
                $config['upload_path'] = APPPATH . '../upload/resume';
                $config['file_name'] = $File_name;
                $config['overwrite'] = TRUE;
                $config["allowed_types"] = 'pdf|doc|docx';
                $config["max_size"] = '6144';
    
                $this->load->library('upload', $config);
    
                if (!$this->upload->do_upload('images')) {
    
                    $this->data['error'] = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $this->upload->display_errors());
    
                    redirect(base_url().'carrer');
                } else {
                    $dataimage_return = $this->upload->data();
                    $imageurl = $dataimage_return['file_name'];
                }
            }
            $datas = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'number' => $this->input->post('mob'),
                'resume' => $imageurl,
                
            );
            if ($this->Careermodel->insert_data($datas)) {

                $this->session->set_flashdata('success', 'Thank you for showing interest in Bada Engineering.  Our Team will Call/Connect/Reply you ASAP.');
                redirect(base_url() . 'career');
            } else {

                $this->session->set_flashdata('error', 'Error In Submission');
                redirect(base_url() . 'career');
            }
        } else {

            $this->session->set_flashdata('error', 'Please Fill All The Fields');
            redirect(base_url() . 'career');
        }
    }
}
