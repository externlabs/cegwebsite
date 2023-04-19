<?php
class Blog extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('frontend/Blogmodel');
        $this->load->helper('url');
    }
    public function index()
    {
        $data['blogs'] = $this->Blogmodel->fetch();
        $this->load->view('frontend/template/header');
       // $this->load->view('frontend/template/navbar');
        $this->load->view('frontend/blog',$data);
        $this->load->view('frontend/template/footer');
    }
}
