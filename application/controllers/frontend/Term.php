<?php
class Term extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
      
    }
    public function index()
    {
       
        $this->load->view('frontend/template/header');
        $this->load->view('frontend/term');
        $this->load->view('frontend/template/footer');
    }
}
