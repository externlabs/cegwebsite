<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Drivemodel extends CI_Model
{
    function add_drive($datas)
    {
        return $this->db->insert('drive', $datas);
    }

    public function fetch_drive()
    {
      return $this->db->get('drive')->result_array();
    }

    function update_drive_status($datas, $id){           
        $this->db->set($datas);
        $this->db->where('drive_id',$id);
        $this->db->update('drive');
    }



    function fetch_ucoming_drive_data($postData=null){

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
                $search_arr[] = " (drive_id like '%".$searchValue."%' or 
                    designation like '%".$searchValue."%' or
                    post_no like '%".$searchValue."%' or 
                    vanue like '%".$searchValue."%' or 
                    job_location like '%".$searchValue."%' or 
                    eligibility like '%".$searchValue."%' or
                    job_desc like '%".$searchValue."%' or
                    drive_method like '%".$searchValue."%' or
                    drive_date like '%".$searchValue."%' or
                    last_date like '%".$searchValue."%' or
                    start_date like '%".$searchValue."%' or
                    salary like '%".$searchValue."%' or
                    department like '%".$searchValue."%' or
                    selection_process like '%".$searchValue."%' or
                    other like '%".$searchValue."%' or
                    status like '%".$searchValue."%'
                ) ";
            }
            
      
            date_default_timezone_set('Asia/Kolkata');
            $currntdate = date("Y-m-d");
            
            if($startDate == $currntdate && $endDate == $currntdate){
                $getadminreferdata = $this->db->order_by('drive_id','asc')->limit(1)->get('drive')->result_array();
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
            $records = $this->db->get('drive')->result();
            $totalRecords = $records[0]->allcount;
           
            ## Total number of record with filtering
            $this->db->select('count(*) as allcount');
            if($searchQuery != '')
            $this->db->where($searchQuery);
            $records = $this->db->get('drive')->result();
            $totalRecordwithFilter = $records[0]->allcount;
            
             
            ## Fetch records
            $this->db->select('*');
            if($searchQuery != '')
            $this->db->where($searchQuery);
            $this->db->order_by($columnName, $columnSortOrder);
            $this->db->limit($rowperpage, $start);
            $records = $this->db->get('drive')->result();
            $data = array();
            
            $i =$start + 1;
            
      
            foreach ($records as $record) {

                if($record->status == "approve"){

                $companydata = $this->db->where('company_id',$record->company_id)->get('company')->result_array();

          foreach($companydata as $company){
            $companyName = $company['company_name'];
            
          }

      
                $data[] = array($i,$companyName,$record->designation,$record->post_no,$record->vanue,$record->job_location,$record->drive_method,$record->drive_date,$record->salary,$record->department,$record->created_at,'<a href="'.base_url().'drive/'.$record->drive_id.'" href="_blank">View Drive</a>','<select name="change_status" id="change_status" required><option value="">Please select an Option</option><option value="cancel">Cancle</option><option value="complete">Complete</option></select><input type="hidden" name="drive_id" id="drive_id" value="'.$record->drive_id.'" required>' );
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


    function fetch_compelete_drive_data($postData=null){

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
                $search_arr[] = " (drive_id like '%".$searchValue."%' or 
                    designation like '%".$searchValue."%' or
                    post_no like '%".$searchValue."%' or 
                    vanue like '%".$searchValue."%' or 
                    job_location like '%".$searchValue."%' or 
                    eligibility like '%".$searchValue."%' or
                    job_desc like '%".$searchValue."%' or
                    drive_method like '%".$searchValue."%' or
                    drive_date like '%".$searchValue."%' or
                    last_date like '%".$searchValue."%' or
                    start_date like '%".$searchValue."%' or
                    salary like '%".$searchValue."%' or
                    department like '%".$searchValue."%' or
                    selection_process like '%".$searchValue."%' or
                    other like '%".$searchValue."%' or
                    status like '%".$searchValue."%'
                ) ";
            }
            
      
            date_default_timezone_set('Asia/Kolkata');
            $currntdate = date("Y-m-d");
            
            if($startDate == $currntdate && $endDate == $currntdate){
                $getadminreferdata = $this->db->order_by('drive_id','asc')->limit(1)->get('drive')->result_array();
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
            $records = $this->db->get('drive')->result();
            $totalRecords = $records[0]->allcount;
           
            ## Total number of record with filtering
            $this->db->select('count(*) as allcount');
            if($searchQuery != '')
            $this->db->where($searchQuery);
            $records = $this->db->get('drive')->result();
            $totalRecordwithFilter = $records[0]->allcount;
            
             
            ## Fetch records
            $this->db->select('*');
            if($searchQuery != '')
            $this->db->where($searchQuery);
            $this->db->order_by($columnName, $columnSortOrder);
            $this->db->limit($rowperpage, $start);
            $records = $this->db->get('drive')->result();
            $data = array();
            
            $i =$start + 1;
            
      
            foreach ($records as $record) {

                if($record->status == "complete"){

                $companydata = $this->db->where('company_id',$record->company_id)->get('company')->result_array();

          foreach($companydata as $company){
            $companyName = $company['company_name'];
            
          }

      
                $data[] = array($i,$companyName,$record->designation,$record->post_no,$record->vanue,$record->job_location,$record->drive_method,$record->drive_date,$record->salary,$record->department,$record->created_at,'<a href="'.base_url().'drive/'.$record->drive_id.'" href="_blank">View Drive</a>' );
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



    function fetch_cancel_drive_data($postData=null){

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
                $search_arr[] = " (drive_id like '%".$searchValue."%' or 
                    designation like '%".$searchValue."%' or
                    post_no like '%".$searchValue."%' or 
                    vanue like '%".$searchValue."%' or 
                    job_location like '%".$searchValue."%' or 
                    eligibility like '%".$searchValue."%' or
                    job_desc like '%".$searchValue."%' or
                    drive_method like '%".$searchValue."%' or
                    drive_date like '%".$searchValue."%' or
                    last_date like '%".$searchValue."%' or
                    start_date like '%".$searchValue."%' or
                    salary like '%".$searchValue."%' or
                    department like '%".$searchValue."%' or
                    selection_process like '%".$searchValue."%' or
                    other like '%".$searchValue."%' or
                    status like '%".$searchValue."%'
                ) ";
            }
            
      
            date_default_timezone_set('Asia/Kolkata');
            $currntdate = date("Y-m-d");
            
            if($startDate == $currntdate && $endDate == $currntdate){
                $getadminreferdata = $this->db->order_by('drive_id','asc')->limit(1)->get('drive')->result_array();
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
            $records = $this->db->get('drive')->result();
            $totalRecords = $records[0]->allcount;
           
            ## Total number of record with filtering
            $this->db->select('count(*) as allcount');
            if($searchQuery != '')
            $this->db->where($searchQuery);
            $records = $this->db->get('drive')->result();
            $totalRecordwithFilter = $records[0]->allcount;
            
             
            ## Fetch records
            $this->db->select('*');
            if($searchQuery != '')
            $this->db->where($searchQuery);
            $this->db->order_by($columnName, $columnSortOrder);
            $this->db->limit($rowperpage, $start);
            $records = $this->db->get('drive')->result();
            $data = array();
            
            $i =$start + 1;
            
      
            foreach ($records as $record) {

                if($record->status == "cancel"){

                $companydata = $this->db->where('company_id',$record->company_id)->get('company')->result_array();

          foreach($companydata as $company){
            $companyName = $company['company_name'];
            
          }

      
                $data[] = array($i,$companyName,$record->designation,$record->post_no,$record->vanue,$record->job_location,$record->drive_method,$record->drive_date,$record->salary,$record->department,$record->created_at,'<a href="'.base_url().'drive/'.$record->drive_id.'" href="_blank">View Drive</a>' );
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
