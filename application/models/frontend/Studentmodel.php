<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Studentmodel extends CI_Model
{
    function create_student($datas)
    {
        return  $this->db->insert('student', $datas);
    }

    public function fetch_data()
    {
      return $this->db->get('student')->result_array();
    }


    public function fetch_qualification()
    {
      return $this->db->get('qualification')->result_array();
    }

    function add_qualification($datas)
    {
        return  $this->db->insert('qualification', $datas);
    }

    function apply_drive($datas)
    {
        return  $this->db->insert('drive_application', $datas);
    }

    function update_qualification($data,$id){           
        $this->db->set($data);
        $this->db->where('qualification_id',$id);
        $this->db->update('qualification');
    }

    function update_student_status($data, $id){
      $this->db->set($data);
      $this->db->where('student_id',$id);
      $this->db->update('student');
    }

    public function delete_student($data){
      $explodData = explode(',',$data);
      $this->db->where_in('student_id',$explodData);
      $getDeleteStatus = $this->db->delete('student');
      if($getDeleteStatus == 1){
        return array('message'=>'yes');
      }else{
        return array('message'=>'no');
      }
  }

    public function delete_qualification($data){
      $explodData = explode(',',$data);
      $this->db->where_in('qualification_id',$explodData);
      $getDeleteStatus = $this->db->delete('qualification');
      if($getDeleteStatus == 1){
        return array('message'=>'yes');
      }else{
        return array('message'=>'no');
      }
  }

  public function getcurrpassword($id,$table_name,$colom_name){
    $query = $this->db->where($colom_name,$id)->get($table_name);
    if($query->num_rows()>0){
      return $query->row();
    }
  }

  function updatepassword($new_password,$id,$table_name,$colom_name,$colom_pass){
    $data = array(
      $colom_pass=>md5($new_password),
    );
    $this->db->set($data);
    $this->db->where($colom_name,$id);
    $this->db->update($table_name);
  }


  function update_verification_code($data,$tablename,$coloumn_name,$id){
    $this->db->set($data);
    $this->db->where($coloumn_name,$id);
    $this->db->update($tablename);
  }



  function apply_ml_training($datas){
    return  $this->db->insert('ml_training', $datas);
  }

  function fetch_student_information_data($postData=null){

    $response = array();
  
    ## Read value
    $draw = $postData['draw'];
    $start = $postData['start'];
    $rowperpage = $postData['length']; // Rows display per page
    $columnIndex = $postData['order'][0]['column']; // Column index
    $columnName = $postData['columns'][$columnIndex]['data']; // Column name
    $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
    $searchValue = $postData['search']['value']; // Search value
  
  
    // Custom search filter 
    $startDate = $postData['startDate'];
    $endDate = $postData['endDate'];
  
    if($startDate != null && $endDate != null){
        ## Search 
        $search_arr = array();
        $searchQuery = "";
        if($searchValue != ''){
            $search_arr[] = " (student_id like '%".$searchValue."%' or 
                student_name like '%".$searchValue."%' or
                father_name like '%".$searchValue."%' or 
                mother_name like '%".$searchValue."%' or 
                student_dob like '%".$searchValue."%' or 
                student_email like '%".$searchValue."%' or 
                student_gender like '%".$searchValue."%' or 
                city like '%".$searchValue."%' or 
                district like '%".$searchValue."%' or 
                state like '%".$searchValue."%' or 
                pincode like '%".$searchValue."%' or 
                student_number like'%".$searchValue."%' or
                height like'%".$searchValue."%' or
                weight like'%".$searchValue."%' or
                bloodgroup like'%".$searchValue."%' or
                student_address like'%".$searchValue."%' or
                student_aadhar like'%".$searchValue."%' or
                student_status like'%".$searchValue."%'

            ) ";
        }
        

        date_default_timezone_set('Asia/Kolkata');
        $currntdate = date("Y-m-d");
        
        if($startDate == $currntdate && $endDate == $currntdate){
            $getadminreferdata = $this->db->order_by('student_id','asc')->limit(1)->get('student')->result_array();
            foreach($getadminreferdata as $valll){
                $firstdate = $valll['created_at'];
            }
            
            $getStartDate = explode(' ', $firstdate);
            $startDatee = $getStartDate[0];
            $endDatee = $currntdate;
        }else{
            $startDatee = $startDate;
            $endDatee = $endDate;
        }
        
        if($startDatee != '' && $endDatee != ''){
          $search_arr[] = " str_to_date(created_at, '%Y-%m-%d') BETWEEN '".$startDatee."' and  '".$endDatee."' ";
        }

        
        if(count($search_arr) > 0){
            $searchQuery = implode(" and ",$search_arr);
        }


        ## Total number of records without filtering
        $this->db->select('count(*) as allcount');
        $records = $this->db->get('student')->result();
        $totalRecords = $records[0]->allcount;
        
       
        ## Total number of record with filtering
        $this->db->select('count(*) as allcount');
        if($searchQuery != '')
        $this->db->where($searchQuery);
        $records = $this->db->get('student')->result();
        $totalRecordwithFilter = $records[0]->allcount;
        
        
        ## Fetch records
        $this->db->select('*');
        if($searchQuery != '')
        $this->db->where($searchQuery);
        $this->db->order_by($columnName, $columnSortOrder);
        $this->db->limit($rowperpage, $start);
        $records = $this->db->get('student')->result();
        $data = array();
        
        $i =$start + 1;

        foreach ($records as $record) {

          if($record->student_status == 0){
            $student_status = '<span id="ajax_status"><span class="badge badge-pill badge-warning " style="font-size:14px">Disabled</span></span>';
          }elseif($record->student_status == 1){
            $student_status = '<span id="ajax_status"><span class="badge badge-pill badge-success" style="font-size:14px">Enabled</span></span>';
          }

            $data[] = array($i,'<img src="'.base_url().'upload/student/'.$record->photo.'" width="100px">','<img src="'.base_url().'upload/student/'.$record->aadhar_front.'" width="100px">',$record->student_name,$record->father_name,$record->mother_name,$record->student_dob,$record->student_email,$record->student_gender,$record->student_aadhar,$record->student_number,$record->city,$record->district,$record->state,$record->pincode,$record->student_address,$record->height,$record->weight,$record->bloodgroup,$student_status,'<select name="change_status" id="change_status" required><option value="">Please select an Option</option><option value="1">Enable</option><option value="0">Disable</option></select><input type="hidden" name="student_id" id="student_id" value="'.$record->student_id.'" required>','<a class="delete_sliders" data-id="'.$record->student_id.'"  style="color: red;cursor: pointer;" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>' );
                $i++;
        }

        ## Response
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data
        );

        return $response;
      
  }else{
      return "No Raw Found!";
  }
}


function fetch_student_qualification_data($postData=null){

  $response = array();

  ## Read value
  $draw = $postData['draw'];
  $start = $postData['start'];
  $rowperpage = $postData['length']; // Rows display per page
  $columnIndex = $postData['order'][0]['column']; // Column index
  $columnName = $postData['columns'][$columnIndex]['data']; // Column name
  $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
  $searchValue = $postData['search']['value']; // Search value


  // Custom search filter 
  $startDate = $postData['startDate'];
  $endDate = $postData['endDate'];

  if($startDate != null && $endDate != null){
      ## Search 
      $search_arr = array();
      $searchQuery = "";
      if($searchValue != ''){
          $search_arr[] = " (class like '%".$searchValue."%' or 
              university_name like '%".$searchValue."%' or
              institute_type like '%".$searchValue."%' or 
              state like '%".$searchValue."%' or 
              passing_year like '%".$searchValue."%' or 
              percentage like '%".$searchValue."%' or 
              branch like '%".$searchValue."%' or 
              backlog like '%".$searchValue."%' or 
              start_year like '%".$searchValue."%' or 
              course_name like '%".$searchValue."%' or 
              user_type like '%".$searchValue."%'
          ) ";
      }
      

      date_default_timezone_set('Asia/Kolkata');
      $currntdate = date("Y-m-d");
      
      if($startDate == $currntdate && $endDate == $currntdate){
          $getadminreferdata = $this->db->order_by('qualification_id','asc')->limit(1)->get('qualification')->result_array();
          foreach($getadminreferdata as $valll){
              $firstdate = $valll['created_at'];
          }
          
          $getStartDate = explode(' ', $firstdate);
          $startDatee = $getStartDate[0];
          $endDatee = $currntdate;
      }else{
          $startDatee = $startDate;
          $endDatee = $endDate;
      }
      
      if($startDatee != '' && $endDatee != ''){
        $search_arr[] = " str_to_date(created_at, '%Y-%m-%d') BETWEEN '".$startDatee."' and  '".$endDatee."' ";
      }

      
      if(count($search_arr) > 0){
          $searchQuery = implode(" and ",$search_arr);
      }


      ## Total number of records without filtering
      $this->db->select('count(*) as allcount');
      $records = $this->db->get('qualification')->result();
      $totalRecords = $records[0]->allcount;
      
     
      ## Total number of record with filtering
      $this->db->select('count(*) as allcount');
      if($searchQuery != '')
      $this->db->where($searchQuery);
      $records = $this->db->get('qualification')->result();
      $totalRecordwithFilter = $records[0]->allcount;
      
      
      ## Fetch records
      $this->db->select('*');
      if($searchQuery != '')
      $this->db->where($searchQuery);
      $this->db->order_by($columnName, $columnSortOrder);
      $this->db->limit($rowperpage, $start);
      $records = $this->db->get('qualification')->result();
      $data = array();
      
      $i =$start + 1;

      foreach ($records as $record) {
        if($record->user_type == 'student'){
        
            $faculity_details = $this->db->where('student_id',$record->student_id)->get('student')->result_array();
          
          foreach($faculity_details as $faculity){
            $faculityName = $faculity['student_name'];
            $faculityEmail = $faculity['student_email'];
          }


          $data[] = array($i,$faculityName,$faculityEmail,$record->class,$record->university_name,$record->institute_type,$record->state,$record->start_year,$record->passing_year,$record->percentage,$record->branch,$record->backlog,'<a class="delete_sliders" data-id="'.$record->qualification_id.'"  style="color: red;cursor: pointer;" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>' );
          $i++;}
      }

      ## Response
      $response = array(
          "draw" => intval($draw),
          "iTotalRecords" => $totalRecords,
          "iTotalDisplayRecords" => $totalRecordwithFilter,
          "aaData" => $data
      );

      return $response;
    
}else{
    return "No Raw Found!";
}
}

}


