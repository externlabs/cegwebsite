<?php
class Home extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('frontend/Projectmodel');
        // $this->load->model('frontend/Servicemodel');
        // $this->load->helper('url');
        // $this->load->model('frontend/Clientmodel');
    }

    public function index()
    {
        // $data['fetch_client'] = $this->Clientmodel->fetch_data();
        // $data['fetch_project'] = $this->Projectmodel->fetch_data();
        // $data['service_cate'] = $this->Servicemodel->fetch_cate();
        $this->load->view('frontend/template/header');
        $this->load->view('frontend/template/navbar');

        $this->load->view('frontend/home');
        $this->load->view('frontend/template/footer');
    }
}
