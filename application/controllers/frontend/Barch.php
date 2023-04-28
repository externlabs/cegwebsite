<?php
class Barch extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        //$this->load->model('admin/Plansmodel');
    }
    public function index()
    {
        //$data['course'] = $this->Plansmodel->fetch_plans();
        // $data['plans'] = $this->Plansmodel->fetchinventory_api();
        $this->load->view('frontend/template/header');
       $this->load->view('frontend/template/navbar');
        $this->load->view('frontend/barch');
        $this->load->view('frontend/template/footer');
    }
}
