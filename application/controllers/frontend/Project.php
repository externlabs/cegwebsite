<?php
class Project extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('frontend/Projectmodel');
    }
    public function index()
    {
        $data['fetch_project'] = $this->Projectmodel->fetch_data();
        $this->load->view('frontend/template/header');
        //$this->load->view('frontend/template/navbar');
        $this->load->view('frontend/project',$data);
        $this->load->view('frontend/template/footer');
    }
}
