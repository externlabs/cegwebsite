<?php
class Blogsingle extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('frontend/Blogmodel');
        $this->load->helper('url');
    }
    public function index($slug = "")
    {
        $data['blog'] = $this->Blogmodel->blog_detail($slug);
        $data['recents']=$this->db->limit(5)->order_by('id','DESC')->get('news')->result();
        $this->load->view('frontend/template/header');
        $this->load->view('frontend/blogsingle',$data);
        $this->load->view('frontend/template/footer');
    }
}
