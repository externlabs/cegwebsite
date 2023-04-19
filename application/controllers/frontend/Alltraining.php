<?php
class Alltraining extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {

        $this->load->view('frontend/template/header');
       $this->load->view('frontend/template/navbar');
        $this->load->view('frontend/alltraining');
        $this->load->view('frontend/template/footer');
    }
}
