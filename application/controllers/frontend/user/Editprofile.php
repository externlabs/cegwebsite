<?php
class Editprofile extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('frontend/Studentmodel');
        $this->load->library('session');
    }
    public function index()
    {
        
        $this->load->view('frontend/user/common/header');
        $this->load->view('frontend/user/common/sidebar');
        $this->load->view('frontend/user/common/topbar');
        $this->load->view('frontend/user/editprofile');
        $this->load->view('frontend/user/common/footer');
    }

    

    public function update_student(){
      
        $this->input->post('formSubmit');
        

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('father_name', 'Father_Name', 'required');
        $this->form_validation->set_rules('mother_name', 'Father_Name', 'required');
        $this->form_validation->set_rules('email', 'Aadhar', 'required');
        $this->form_validation->set_rules('phone', 'DOB', 'required');
        $this->form_validation->set_rules('aadhar', 'Email', 'required');
        $this->form_validation->set_rules('dob', 'Gender', 'required');
        $this->form_validation->set_rules('gender', 'City', 'required');
        $this->form_validation->set_rules('address', 'District', 'required');
        $this->form_validation->set_rules('city', 'State', 'required');
        $this->form_validation->set_rules('district', 'Pincode', 'required');
        $this->form_validation->set_rules('state', 'Phone', 'required');
        $this->form_validation->set_rules('pincode', 'Phone', 'required');
        $this->form_validation->set_rules('height', 'Height', 'required');
        $this->form_validation->set_rules('weight', 'Weight', 'required');
        $this->form_validation->set_rules('bloodgroup', 'Bloodgroup', 'required');
        

        

        if ($this->form_validation->run() == true) {
            
            $id = $this->input->post('student_id');
            
            $student_data = $this->db->where('student_id',$id)->get('student')->result_array();
            
           
            foreach($student_data as $student){
                
                $student_resume = $student['resume'];
                $student_photo = $student['photo'];
                $student_aadhar = $student['aadhar_front'];
                $student_signature = $student['signature'];
            }

                if (!empty($_FILES['photo']['name'])) {
                    $File_name = '';
                    $config['upload_path'] = APPPATH . '../upload/student/';
                    $config['file_name'] = $File_name;
                    $config['overwrite'] = false;
                    $config["allowed_types"] = 'jpg|jpeg|png|pdf|doc|docx';
                    $config["max_size"] = '6144';
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('photo')) {
                        $this->data['error'] = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $this->upload->display_errors());
                        redirect(base_url() . 'user/edit-profile?id='.$this->input->post('student_id'));
                    } else {
                        $dataimage_return = $this->upload->data();
                        $studentphoto = $dataimage_return['file_name'];
                    }
                }else{
                    $studentphoto = $student_photo;
                }

                if (!empty($_FILES['aadhar']['name'])) {
                    $File_name = '';
                    $config['upload_path'] = APPPATH . '../upload/student/';
                    $config['file_name'] = $File_name;
                    $config['overwrite'] = false;
                    $config["allowed_types"] = 'jpg|jpeg|png|pdf|doc|docx';
                    $config["max_size"] = '6144';
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('aadhar')){
                        $this->data['error'] = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $this->upload->display_errors());
                        redirect(base_url() . 'user/edit-profile?id='.$this->input->post('student_id'));
                    } else {
                        $dataimage_return = $this->upload->data();
                        $aadhar_front = $dataimage_return['file_name'];
                    }
                }else{
                    $aadhar_front = $student_aadhar;
                }

               

                if (!empty($_FILES['signature']['name'])) {
                   
                    $File_name = '';
                    $config['upload_path'] = APPPATH . '../upload/student/';
                    $config['file_name'] = $File_name;
                    $config['overwrite'] = false;
                    $config["allowed_types"] = 'jpg|jpeg|png|pdf|doc|docx';
                    $config["max_size"] = '6144';
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('signature')) {
                        $this->data['error'] = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $this->upload->display_errors());
                        redirect(base_url() . 'user/edit-profile?id='.$this->input->post('student_id'));
                    } else {
                        $dataimage_return = $this->upload->data();
                        $signature = $dataimage_return['file_name'];
                    }
                }else{
                    $signature = $student_signature;
                }

                if (!empty($_FILES['resume']['name'])) {
                    $File_name = '';
                    $config['upload_path'] = APPPATH . '../upload/student/';
                    $config['file_name'] = $File_name;
                    $config['overwrite'] = TRUE;
                    $config["allowed_types"] = 'jpg|jpeg|png|pdf|doc|docx';
                    $config["max_size"] = '6144';
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('resume')) {
                        $this->data['error'] = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $this->upload->display_errors());
                        redirect(base_url() . 'user/edit-profile?id='.$this->input->post('student_id'));
                    } else {
                        $dataimage_return = $this->upload->data();
                        $resume = $dataimage_return['file_name'];
                    }
                }else{
                    $resume = $student_resume;
                }                 

                $data = array(
                    'student_name' => $this->input->post('name'),
                    'father_name' =>$this->input->post('father_name'),
                    'mother_name' =>$this->input->post('mother_name'),
                    'student_email' =>$this->input->post('email'),
                    'student_number' =>$this->input->post('phone'),
                    'student_aadhar' => $this->input->post('aadhar'),
                    'student_dob' => $this->input->post('dob'),
                    'student_gender' => $this->input->post('gender'),
                    'student_address' =>$this->input->post('address'),
                    'city' => $this->input->post('city'),
                    'district' =>$this->input->post('district'),
                    'state' =>$this->input->post('state'),
                    'pincode' =>$this->input->post('pincode'),
                    'height' => $this->input->post('height'),
                    'weight' => $this->input->post('weight'),
                    'bloodgroup' => $this->input->post('bloodgroup'),
                    'photo' => $studentphoto,
                    'aadhar_front' => $aadhar_front,
                    'signature' =>$signature,
                    'resume' => $resume,
                );
                
                if ($this->Studentmodel->update_student_status($data, $id)) {
                    $this->session->set_flashdata('error', 'Error In Submission');
                    redirect(base_url() . 'user/edit-profile?id='.$id);
                  
                } else {
                    $this->session->set_flashdata('success', 'Account has been created successfully!');
                    redirect(base_url() . 'user/my-profile');
                }
            } else {
                $this->session->set_flashdata('error', 'Please Fill All The Fields');
                redirect(base_url() . 'user/edit-profile?id='.$this->input->post('student_id'));
        }
    }
}
