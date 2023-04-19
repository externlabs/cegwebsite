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

    public function update_status(){

        $this->load->model('admin/Companymodel');
        $this->form_validation->set_rules('company_status', 'company_status', 'required');
        $this->form_validation->set_rules('company_id', 'company_id', 'required');

        if ($this->form_validation->run()) {
            $datas = array(
                'company_status' => $this->input->post('company_status'),
            );
            $id = $this->input->post('company_id');
    
            if ($this->Companymodel->update_company_status($datas, $id)) {
                $this->session->set_flashdata('error', 'Error In Submission');
                redirect(base_url() . 'admin/company/allcompany');
            } else {
                $this->session->set_flashdata('success', 'Company Status Updated Successfully!');
                redirect(base_url() . 'admin/company/allcompany');
            }
        } else {
            $this->session->set_flashdata('error', 'Please Fill All The Fields!');
            redirect(base_url() . 'admin/company/allcompany');
        }


    }

    




    public function addinventory_api(){
        $getPurchaseData = $this->Companymodel->fetch_data();
        $i=1;
        foreach ($getPurchaseData as $key => $value) { 
            if($value['company_status'] == 0){
                $company_status = '<span class="badge badge-pill badge-warning " style="font-size:14px">Disabled</span>';
            }else if($value['company_status'] == 1){
                $company_status = '<span class="badge badge-pill badge-success" style="font-size:14px">Enabled</span>';
            }
            
            $arrya_json[] = array($i,'<img src="'.base_url().'upload/company/'.$value['company_logo'].'" width="70px">',$value['company_name'],$value['company_email'],$value['company_number'],$value['company_address'],$value['company_city'],$value['district'],$value['state'],$value['country'],$value['pincode'],$value['groupcompany'],$value['company_desc'],'<a href="'.$value['company_website'].'" target="_blank">View company website</a>',$value['created_at'],$company_status,'<form action="'.base_url().'admin/company/allcompany/update_status" method="post"><select name="company_status" required><option value="">Select Option</option><option value="1">Enable</option><option value="0">Disable</option></select><input type="hidden" value="'.$value['company_id'].'" name="company_id"><button type="submit">Update Status</button></form>',
           '<a href="'.base_url().'admin/company/edit?id='.$value['company_id'].'"  ><i class="fas fa-edit" style="color: #009cff !important;cursor: pointer; margin-right:10px;"></i></a><a class="delete_sliders" data-id="'.$value['company_id'].'"  style="color: red;cursor: pointer;" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>' );
        $i++;
        }
        echo json_encode(array('data'=>$arrya_json));
    }
  
    public function deletepost(){ 
        if($this->input->post('deletesliderId')){
            $this->form_validation->set_rules('deletesliderId','text','required');
            if($this->form_validation->run() == true){
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


}




    

