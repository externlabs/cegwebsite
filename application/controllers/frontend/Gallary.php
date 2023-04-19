<?php
class Gallary extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('frontend/Gallarymodel');
    }
    public function index()
    {

        $data['fetch_gallary'] = $this->Gallarymodel->fetch_gallary();
        $data['fetch_cate'] = $this->Gallarymodel->fetch_cate();
        $this->load->view('frontend/template/header');
      //  $this->load->view('frontend/template/navbar');
        $this->load->view('frontend/gallary',$data);
        $this->load->view('frontend/template/footer');
    }
}
