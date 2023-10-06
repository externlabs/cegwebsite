<?php
class Welcome extends CI_controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('vendorAuth')) {
            redirect('admin/login');
        }
    }
    public function index()
    {
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/template/topbar');
        $this->load->view('admin/dashboard');
        $this->load->view('admin/template/footer');
    }
}
