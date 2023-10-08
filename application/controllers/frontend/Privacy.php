<?php
class Privacy extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        
        $this->load->view('frontend/template/header');
        $this->load->view('frontend/privacy');
        $this->load->view('frontend/template/footer');
    }
}
