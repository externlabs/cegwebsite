<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Companymodel extends CI_Model
{

  function add_company($data){
    $this->db->insert('company', $data);
    return true;
  }

  function add_poc($datas){
    $this->db->insert('company_poc', $datas);
    return true;
  }

  public function fetch_data()
  {
    return $this->db->get('company')->result_array();
  }


  public function fetch_poc(){
    return $this->db->get('company_poc')->result_array();
  }

  function update_company_status($datas, $id){           
    $this->db->set($datas);
    $this->db->where('company_id',$id);
    $this->db->update('company');
}
  
function update_poc($datas, $id){           
  $this->db->set($datas);
  $this->db->where('poc_id',$id);
  $this->db->update('company_poc');
}

  public function delete_company($data){
      $explodData = explode(',',$data);
      $this->db->where_in('company_id',$explodData);
      $getDeleteStatus = $this->db->delete('company');
      if($getDeleteStatus == 1){
        return array('message'=>'yes');
      }else{
        return array('message'=>'no');
      }
  }

  public function delete_poc($data){
    $explodData = explode(',',$data);
    $this->db->where_in('poc_id',$explodData);
    $getDeleteStatus = $this->db->delete('company_poc');
    if($getDeleteStatus == 1){
      return array('message'=>'yes');
    }else{
      return array('message'=>'no');
    }
}



function fetch_company_data($postData=null){

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
          $search_arr[] = " (company_id like '%".$searchValue."%' or 
              company_name like '%".$searchValue."%' or
              company_email like '%".$searchValue."%' or 
              company_number like '%".$searchValue."%' or 
              company_address like '%".$searchValue."%' or 
              company_city like '%".$searchValue."%' or
              company_desc like '%".$searchValue."%' or
              company_status like '%".$searchValue."%' or
              district like '%".$searchValue."%' or
              state like '%".$searchValue."%' or
              country like '%".$searchValue."%' or
              groupcompany like '%".$searchValue."%' or
              pincode like '%".$searchValue."%' or
              company_landline like '%".$searchValue."%'
          ) ";
      }
      

      date_default_timezone_set('Asia/Kolkata');
      $currntdate = date("Y-m-d");
      
      if($startDate == $currntdate && $endDate == $currntdate){
          $getadminreferdata = $this->db->order_by('company_id','asc')->limit(1)->get('company')->result_array();
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
      $records = $this->db->get('company')->result();
      $totalRecords = $records[0]->allcount;
      
     
      ## Total number of record with filtering
      $this->db->select('count(*) as allcount');
      if($searchQuery != '')
      $this->db->where($searchQuery);
      $records = $this->db->get('company')->result();
      $totalRecordwithFilter = $records[0]->allcount;
      
      
      ## Fetch records
      $this->db->select('*');
      if($searchQuery != '')
      $this->db->where($searchQuery);
      $this->db->order_by($columnName, $columnSortOrder);
      $this->db->limit($rowperpage, $start);
      $records = $this->db->get('company')->result();
      $data = array();
      
      $i =$start + 1;

      foreach ($records as $record) {

        if($record->company_status == 0){
          $company_status = '<span id="ajax_status"><span class="badge badge-pill badge-warning " style="font-size:14px">Disabled</span></span>';
        }elseif($record->company_status == 1){
          $company_status = '<span id="ajax_status"><span class="badge badge-pill badge-success" style="font-size:14px">Enabled</span></span>';
        }

          $data[] = array($i,'<img src="'.base_url().'upload/company/'.$record->company_logo.'" width="70px">',$record->company_name,$record->company_email,$record->company_number,$record->company_address,$record->company_city,$record->district,$record->state,$record->country,$record->pincode,$record->groupcompany,$record->company_desc,'<a href="'.$record->company_website.'" target="_blank">View company website</a>',$record->created_at,$company_status,'<select name="change_status" id="change_status" required><option value="">Please select an Option</option><option value="1">Enable</option><option value="0">Disable</option></select><input type="hidden" name="course_id" id="course_id" value="'.$record->company_id.'" required>','<a href="'.base_url().'admin/company/edit?id='.$record->company_id.'"><i class="fas fa-edit" style="color: #009cff !important;cursor: pointer; margin-right:10px;"></i></a><a class="delete_sliders" data-id="'.$record->company_id.'"  style="color: red;cursor: pointer;" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>' );
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



function fetch_poc_data($postData=null){

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
          $search_arr[] = " (poc_id like '%".$searchValue."%' or 
              poc_name like '%".$searchValue."%' or
              poc_email like '%".$searchValue."%' or 
              designation like '%".$searchValue."%' or 
              phone like '%".$searchValue."%' or 
              alternate_no like '%".$searchValue."%'
          ) ";
      }
      

      date_default_timezone_set('Asia/Kolkata');
      $currntdate = date("Y-m-d");
      
      if($startDate == $currntdate && $endDate == $currntdate){
          $getadminreferdata = $this->db->order_by('poc_id','asc')->limit(1)->get('company_poc')->result_array();
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
      $records = $this->db->get('company_poc')->result();
      $totalRecords = $records[0]->allcount;
      
     
      ## Total number of record with filtering
      $this->db->select('count(*) as allcount');
      if($searchQuery != '')
      $this->db->where($searchQuery);
      $records = $this->db->get('company_poc')->result();
      $totalRecordwithFilter = $records[0]->allcount;
      
      
      ## Fetch records
      $this->db->select('*');
      if($searchQuery != '')
      $this->db->where($searchQuery);
      $this->db->order_by($columnName, $columnSortOrder);
      $this->db->limit($rowperpage, $start);
      $records = $this->db->get('company_poc')->result();
      $data = array();
      
      $i =$start + 1;

      foreach ($records as $record) {
          $companydata = $this->db->where('company_id',$record->company_id)->get('company')->result_array();

          foreach($companydata as $company){
            $companyName = $company['company_name'];
            $companyLogo = $company['company_logo'];
          }

          $data[] = array($i,$companyName,'<img src="'.base_url().'upload/company/'.$companyLogo.'" width="70px">',$record->poc_name,$record->designation,$record->phone,$record->alternate_no,$record->poc_email,'<a href="'.base_url().'admin/company/updatepoc?id='.$record->poc_id.'"><i class="fas fa-edit" style="color: #009cff !important;cursor: pointer; margin-right:10px;"></i></,><a class="delete_sliders" data-id="'.$record->poc_id.'"  style="color: red;cursor: pointer;" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>' );
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






}
