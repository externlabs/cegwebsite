<?php
class Home extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('frontend/Projectmodel');
        // $this->load->model('frontend/Servicemodel');
        // $this->load->helper('url');
       
    }

    public function index()
    {
        
        $this->load->model('admin/news/Newsmodel');
        $data['news_details']=$this->Newsmodel->fetch_data();
        $this->load->view('frontend/template/header');
        $this->load->view('frontend/template/navbar');

        $this->load->view('frontend/home',$data);
        $this->load->view('frontend/template/footer');
    }
}
