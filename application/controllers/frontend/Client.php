<?php
class Client extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('frontend/Clientmodel');
    }
    public function index()
    {
        $data['fetch_client'] = $this->Clientmodel->fetch_data();
        $this->load->view('frontend/template/header');
     //   $this->load->view('frontend/template/navbar');
        $this->load->view('frontend/client',$data);
        $this->load->view('frontend/template/footer');
    }
}
