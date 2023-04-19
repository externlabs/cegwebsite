<?php
class Drivedetails extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('frontend/Careermodel');
    }
    public function index()
    {

        $this->load->view('frontend/template/header');
       $this->load->view('frontend/template/navbar');
        $this->load->view('frontend/drivedetails');
        $this->load->view('frontend/template/footer');
    }
}
