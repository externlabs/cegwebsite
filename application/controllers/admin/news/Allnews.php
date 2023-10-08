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

    $status=$this->input->post('status');
    $id=$this->input->post('id');
    
    $data = array(
      'news_status' => $status
    );

    $update_news = $this->db->set($data)->where('news_id',$id)->update('news');

    if($update_news == true){
      $response = array(
        'status' => "success",
        'result' => $data,
        'message' => "Update Successfully!",
      );
   
    }else{
      $response = array(
        'status' => "error",
        'message' => "Error In submission!",
      );
    }

  echo json_encode($response);
  
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


  public function addinventory_api(){
      
    $postData = $this->input->post();
    // Get data
    $data = $this->Newsmodel->fetch_news_data($postData);
    echo json_encode($data);
}



}
