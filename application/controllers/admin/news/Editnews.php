<?php
class Editnews extends CI_controller
{

  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('vendorAuth')) {
      redirect('admin/login');
    }
    $this->load->model('admin/news/Newsmodel');
  }

  public function index()
  {

    $this->load->view('admin/template/header');
    $this->load->view('admin/template/sidebar');
    $this->load->view('admin/template/topbar');
    $this->load->view('admin/news/editnews');
    $this->load->view('admin/template/footer');
  }

  public function update_news(){

    $this->load->model('admin/news/Newsmodel');
    $this->form_validation->set_rules('description', 'number', 'required');
    $this->form_validation->set_rules('title', 'number', 'required');
    $this->form_validation->set_rules('link', 'Message', 'required');

    if ($this->form_validation->run()) {
        $news_id = $this->input->post('news_id');
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
                redirect('admin/news/editnews?id='.$news_id);
            } else {
                $dataimage_return = $this->upload->data();
                $imageurl =  $dataimage_return['file_name'];
            }
        } else {
            $news_data = $this->db->where('news_id',$news_id)->get('news')->result_array();
            foreach ($news_data as $value) {
                $imageurl = $value['cover'];
            }
        }

        $data = array(
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'link' => $this->input->post('link'),
            'cover' => $imageurl,
        );
        $id = $this->input->post('news_id');

        if ($this->Newsmodel->update_news_status($data, $id)) {
            $this->session->set_flashdata('error', 'Error In Submission');
            redirect(base_url() . 'admin/news/editnews');
        } else {
            $this->session->set_flashdata('success', 'News Updated Successfully!');
            redirect(base_url() . 'admin/news/allnews');
        }
    } else {
        $this->session->set_flashdata('error', 'Please Fill All The Fields!');
        redirect(base_url() . 'admin/news/editnews');
    }
}

}