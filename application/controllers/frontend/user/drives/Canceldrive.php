<?php
class Canceldrive extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        if(!isset($_SESSION['user_id'])){
            redirect(base_url());
        }
        $this->load->model('frontend/Drivemodel');
    }
    public function index()
    {
        
        $this->load->view('frontend/user/common/header');
        $this->load->view('frontend/user/common/sidebar');
        $this->load->view('frontend/user/common/topbar');
        $this->load->view('frontend/user/drives/canceldrive');
        $this->load->view('frontend/user/common/footer');
    }



}
