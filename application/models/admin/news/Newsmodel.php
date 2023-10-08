<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Newsmodel extends CI_Model

{
    function add_news($data){
        $this->db->insert('news', $data);
        return true;
      }

      public function fetch_data()
      {
        return $this->db->get('news')->result_array();
      }

      function update_news_status($data, $id){
        $this->db->set($data);
        $this->db->where('news_id',$id);
        $this->db->update('news');
      }
  
      public function delete_news($data){
        $explodData = explode(',',$data);
        $this->db->where_in('news_id',$explodData);
        $getDeleteStatus = $this->db->delete('news');
        if($getDeleteStatus == 1){
          return array('message'=>'yes');
        }else{
          return array('message'=>'no');
        }
    }
   



    function fetch_news_data($postData=null){

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
              $search_arr[] = " (news_id like '%".$searchValue."%' or 
                  title like '%".$searchValue."%' or 
                  news_status like'%".$searchValue."%'
              ) ";
          }
          
  
          date_default_timezone_set('Asia/Kolkata');
          $currntdate = date("Y-m-d");
          
          if($startDate == $currntdate && $endDate == $currntdate){
            // return "hiii";
              $getadminreferdata = $this->db->order_by('news_id','asc')->limit(1)->get('news')->result_array();
             
              foreach($getadminreferdata as $valll){
                  $firstdate = $valll['date'];
              
              }
              
              $getStartDate = explode(' ', $firstdate);
              $startDatee = $getStartDate[0];
              $endDatee = $currntdate;
          }else{
              $startDatee = $startDate;
              $endDatee = $endDate;
          }
          
         
          // return $startDatee;
          
          if($startDatee != '' && $endDatee != ''){
            $search_arr[] = " str_to_date(date, '%Y-%m-%d') BETWEEN '".$startDatee."' and  '".$endDatee."' ";
          }
          
          
          
          if(count($search_arr) > 0){
              $searchQuery = implode(" and ",$search_arr);
          }
        
          
  
          ## Total number of records without filtering
          $this->db->select('count(*) as allcount');
          $records = $this->db->get('news')->result();
          $totalRecords = $records[0]->allcount;
          
          ## Total number of record with filtering
          $this->db->select('count(*) as allcount');
          if($searchQuery != '')
          $this->db->where($searchQuery);
          $records = $this->db->get('news')->result();
          $totalRecordwithFilter = $records[0]->allcount;
          
          
          
          ## Fetch records
          $this->db->select('*');
          if($searchQuery != '')
          $this->db->where($searchQuery);
          $this->db->order_by($columnName, $columnSortOrder);
          $this->db->limit($rowperpage, $start);
          $records = $this->db->get('news')->result();
          $data = array();
          
          $i =$start + 1;

          
          foreach ($records as $record) {

            if($record->news_status == 0){
              $news_status = '<span id="ajax_status"><span class="badge badge-pill badge-warning " style="font-size:14px">Disabled</span></span>';
            }elseif($record->news_status == 1){
              $news_status = '<span id="ajax_status"><span class="badge badge-pill badge-success" style="font-size:14px">Enabled</span></span>';
            }

              $data[] = array($i,'<a href="'.base_url().'upload/news/'.$record->cover.'" target="_blank">View File</a>',$record->title,$news_status,'<select name="news_status" id="change_status" required><option value="">Please select an Option</option><option value="1">Enable</option><option value="0">Disable</option></select><input type="hidden" name="news_id" id="news_id" value="'.$record->news_id.'" required>','<a class="delete_sliders" data-id="'.$record->news_id.'"  style="color: red;cursor: pointer;" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>' );
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