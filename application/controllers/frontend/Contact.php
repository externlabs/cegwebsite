<?php
class Contact extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('frontend/Contactmodel');
    }
    public function index()
    {

        $this->load->view('frontend/template/header');
       $this->load->view('frontend/template/navbar');
        $this->load->view('frontend/contact');
        $this->load->view('frontend/template/footer');
    }

 
}
