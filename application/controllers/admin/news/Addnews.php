<?php
class Addnews extends CI_controller
{

  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('vendorAuth')) {
      redirect('admin/login');
    }
    $this->load->model('admin/news/Newsmodel');
  }

  public function index(){

    $this->load->view('admin/template/header');
    $this->load->view('admin/template/sidebar');
    $this->load->view('admin/template/topbar');
    $this->load->view('admin/news/addnews');
    $this->load->view('admin/template/footer');
  }


public function add_news(){

    $this->load->model('admin/news/Newsmodel');
    $this->input->post('formSubmit');

    $this->form_validation->set_rules('title', 'number', 'required');

    if ($this->form_validation->run()) {
        if (!empty($_FILES['images']['name'])) {
            $File_name = '';
            $config['upload_path'] = APPPATH . '../upload/news';
            $config['file_name'] = $File_name;
            $config['overwrite'] = TRUE;
            $config["allowed_types"] = 'jpeg|jpg|png|pdf';
            $config["max_size"] = 2048;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('images')) {
                $this->data['error'] = $this->upload->display_errors();
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('admin/news/addnews');
            } else {
                $dataimage_return = $this->upload->data();
                $imageurl =  $dataimage_return['file_name'];
            }
        }
        $data = array(
            'title' => $this->input->post('title'),
            'cover' => $imageurl,
            'news_status' => 1,
        );

        if ($this->Newsmodel->add_news($data)) {
            $this->session->set_flashdata('success', 'News Added Successfully!');
            redirect(base_url() . 'admin/news/addnews');
        } else {
            $this->session->set_flashdata('error', 'Error In Submission');
            redirect(base_url() . 'admin/news/addnews');
        }
    } else {
        $this->session->set_flashdata('error', 'Please Fill All The Fields');
        redirect(base_url() . 'admin/news/addnews');
    }
}


  

 
 
}