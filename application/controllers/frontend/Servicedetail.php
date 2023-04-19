<?php
class Servicedetail extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('frontend/Servicemodel');
        $this->load->helper('url');
    }
    public function index($slug = '')
    {
        $data['blog'] = $this->Servicemodel->blog_detail($slug);
        $this->load->view('frontend/template/header');
        //$this->load->view('frontend/template/navbar');
        $this->load->view('frontend/servicedetail',$data);
        $this->load->view('frontend/template/footer');
    }
}
 