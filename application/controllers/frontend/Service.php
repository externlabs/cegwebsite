<?php
class Service extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('frontend/Servicemodel');
        $this->load->helper('url');
    }
    public function index()
    {
        $data['blogs'] = $this->Servicemodel->fetch();
        $data['service_cate'] = $this->Servicemodel->fetch_cate();
        $this->load->view('frontend/template/header');
        //$this->load->view('frontend/template/navbar');
        $this->load->view('frontend/service',$data);
        $this->load->view('frontend/template/footer');
    }
}
