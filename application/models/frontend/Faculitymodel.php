<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Faculitymodel extends CI_Model
{
    function create_faculity($datas)
    {
        return  $this->db->insert('faculity', $datas);
    }

    public function fetch_data()
    {
      return $this->db->get('faculity')->result_array();
    }

    function update_faculity_status($data, $id){
      $this->db->set($data);
      $this->db->where('faculity_id',$id);
      $this->db->update('faculity');
    }

    public function fetch_qualification()
    {
      return $this->db->get('qualification')->result_array();
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

    public function delete_faculity($data){
      $explodData = explode(',',$data);
      $this->db->where_in('faculity_id',$explodData);
      $getDeleteStatus = $this->db->delete('faculity');
      if($getDeleteStatus == 1){
        return array('message'=>'yes');
      }else{
        return array('message'=>'no');
      }
  }




  function fetch_faculity_information_data($postData=null){

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
            $search_arr[] = " (faculity_id like '%".$searchValue."%' or 
                faculity_name like '%".$searchValue."%' or
                faculity_department like '%".$searchValue."%' or 
                faculity_organization like '%".$searchValue."%' or 
                faculity_email like '%".$searchValue."%' or 
                city like '%".$searchValue."%' or 
                state like '%".$searchValue."%' or 
                address like '%".$searchValue."%' or 
                phone like '%".$searchValue."%' or 
                accommodation like '%".$searchValue."%' or 
                status like '%".$searchValue."%' or 
                faculity_designation like'%".$searchValue."%'
            ) ";
        }
        

        date_default_timezone_set('Asia/Kolkata');
        $currntdate = date("Y-m-d");
        
        if($startDate == $currntdate && $endDate == $currntdate){
            $getadminreferdata = $this->db->order_by('faculity_id','asc')->limit(1)->get('faculity')->result_array();
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
        $records = $this->db->get('faculity')->result();
        $totalRecords = $records[0]->allcount;
        
       
        ## Total number of record with filtering
        $this->db->select('count(*) as allcount');
        if($searchQuery != '')
        $this->db->where($searchQuery);
        $records = $this->db->get('faculity')->result();
        $totalRecordwithFilter = $records[0]->allcount;
        
        
        ## Fetch records
        $this->db->select('*');
        if($searchQuery != '')
        $this->db->where($searchQuery);
        $this->db->order_by($columnName, $columnSortOrder);
        $this->db->limit($rowperpage, $start);
        $records = $this->db->get('faculity')->result();
        $data = array();
        
        $i =$start + 1;

        foreach ($records as $record) {

          if($record->status == 0){
            $faculity_status = '<span id="ajax_status"><span class="badge badge-pill badge-warning " style="font-size:14px">Disabled</span></span>';
          }elseif($record->status == 1){
            $faculity_status = '<span id="ajax_status"><span class="badge badge-pill badge-success" style="font-size:14px">Enabled</span></span>';
          }

            $data[] = array($i,$record->faculity,$record->faculity_name,$record->faculity_designation,$record->faculity_department,$record->faculity_organization,$record->faculity_email,$record->address,$record->city,$record->state,$record->phone,$record->accommodation,$faculity_status,'<select name="change_status" id="change_status" required><option value="">Please select an Option</option><option value="1">Enable</option><option value="0">Disable</option></select><input type="hidden" name="faculity_id" id="faculity_id" value="'.$record->faculity_id.'" required>','<a class="delete_sliders" data-id="'.$record->faculity_id.'"  style="color: red;cursor: pointer;" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>' );
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



function fetch_faculity_qualification_data($postData=null){

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
        if($record->user_type == 'faculity'){
            $faculity_details = $this->db->where('faculity_id',$record->student_id)->get('faculity')->result_array();
          foreach($faculity_details as $faculity){
            $faculityName = $faculity['faculity_name'];
            $faculityEmail = $faculity['faculity_email'];
          }


          $data[] = array($i,$faculityName,$faculityEmail,$record->class,$record->university_name,$record->institute_type,$record->state,$record->start_year,$record->passing_year,$record->percentage,$record->branch,$record->backlog,'<a class="delete_sliders" data-id="'.$record->qualification_id.'"  style="color: red;cursor: pointer;" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>' );
          $i++; }
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
