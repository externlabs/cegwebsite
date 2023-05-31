<?php

class Allnews extends CI_controller
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
    $data['news_details']=$this->Newsmodel->fetch_data();
    $this->load->view('admin/template/header');
    $this->load->view('admin/template/sidebar');
    $this->load->view('admin/template/topbar');
    $this->load->view('admin/news/allnews',$data);
    $this->load->view('admin/template/footer');
  }

  public function update_news(){
    $this->load->model('admin/news/Newsmodel');
    $this->input->post('formSubmit');
  
    $this->form_validation->set_rules('news_status', 'Name', 'required');
    $this->form_validation->set_rules('news_id', 'Message', 'required');
  
    if ($this->form_validation->run()){
        $datas = array(
            'news_status' => $this->input->post('news_status'),
        );
        $id = $this->input->post('news_id');
  
        if ($this->Newsmodel->update_news_status($datas, $id)) {
            $this->session->set_flashdata('error', 'Error In Submission');
            redirect(base_url() . 'admin/news/allnews');
        } else {
            $this->session->set_flashdata('success', 'News Status Updated Successfully!');
            redirect(base_url() . 'admin/news/allnews');
        }
    } else {
        $this->session->set_flashdata('error', 'Please Fill All The Fields!');
        redirect(base_url() . 'admin/news/allnews');
    }
  }

  public function delete_news(){ 
    if($this->input->post('deletesliderId')){
        $this->form_validation->set_rules('deletesliderId','text','required');
        if($this->form_validation->run() == true){
            $getDeleteStatus = $this->Newsmodel->delete_news($this->input->post('deletesliderId'));
            if($getDeleteStatus['message'] == 'yes'){
                $this->session->set_flashdata('success','News  deleted successfully');
                redirect(base_url()."admin/news/allnews");
            }else{
                $this->session->set_flashdata('error','Something went wrong. Please try again');
                redirect(base_url()."admin/news/allnews");
            }
        }else{
            $this->session->set_flashdata('error','Something went wrong. Please try again');
            redirect(base_url()."admin/news/allnews");
        }
    }

    
  }

}
