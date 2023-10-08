<?php
class Allcompany extends CI_controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('vendorAuth')) {
            redirect('admin/login');
        }
        
        $this->load->model('admin/company/Companymodel');
    }

    public function index()
    {
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/template/topbar');
        $this->load->view('admin/company/allcompany');
        $this->load->view('admin/template/footer');
    }

    public function update_company_status(){

        $status=$this->input->post('status');
        $id=$this->input->post('id');
        
        $data = array(
          'company_status' => $status
        );
    
        $update_faculity = $this->db->set($data)->where('company_id',$id)->update('company');
    
        if($update_faculity == true){
          $response = array(
            'status' => "success",
            'result' => $data,
            'message' => "Update Successfully!",
          );
       
        }else{
          $response = array(
            'status' => "error",
            'message' => "Error In submission!",
          );
        }
    
      echo json_encode($response);


    }

    




    
  
    public function deletepost(){ 
        
        if($this->input->post('deletesliderId')){
            $this->form_validation->set_rules('deletesliderId','text','required');
            if($this->form_validation->run() == true){
                $postId = $this->input->post('deletesliderId');
                
                $check_poc = $this->db->where('company_id',$postId)->get('company_poc')->result_array();

                if(count($check_poc)>0){
                    $this->session->set_flashdata('error','Company Have Active poc. Please delete poc first!');
                    redirect(base_url()."admin/company/allcompany");
                }
                
                $getDeleteStatus = $this->Companymodel->delete_company($this->input->post('deletesliderId'));
                if($getDeleteStatus['message'] == 'yes'){
                    $this->session->set_flashdata('success','Company  deleted successfully');
                    redirect(base_url()."admin/company/allcompany");
                }else{
                    $this->session->set_flashdata('error','Something went wrong. Please try again');
                    redirect(base_url()."admin/company/allcompany");
                }
            }else{
                $this->session->set_flashdata('error','Something went wrong. Please try again');
                redirect(base_url()."admin/company/allcompany");
            }
        }
    }




    public function addinventory_api(){
      
        $postData = $this->input->post();
        // Get data
        $data = $this->Companymodel->fetch_company_data($postData);
        echo json_encode($data);
    }


}




    

