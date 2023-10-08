<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Trainingmodel extends CI_Model
{

  function add_training($datas){
    $this->db->insert('training', $datas);
    return true;
  }

  function add_course($datas){
    $this->db->insert('course', $datas);
    return true;
  }

  public function fetch_course()
  {
    return $this->db->get('course')->result_array();
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

function update_course_status($datas, $id){
  $this->db->set($datas);
  $this->db->where('course_id',$id);
  $this->db->update('course');
}

function update_traning_status($datas, $id){
  $this->db->set($datas);
  $this->db->where('training_id',$id);
  $this->db->update('training');
}

  public function delete_training($data){
      $explodData = explode(',',$data);
      $this->db->where_in('training_id',$explodData);
      $getDeleteStatus = $this->db->delete('training');
      if($getDeleteStatus == 1){
        return array('message'=>'yes');
      }else{
        return array('message'=>'no');
      }
  }


  public function delete_coursseee($data){
    $explodData = explode(',',$data);
    $this->db->where_in('course_id',$explodData);
    $getDeleteStatus = $this->db->delete('course');
    if($getDeleteStatus == 1){
      return array('message'=>'yes');
    }else{
      return array('message'=>'no');
    }
}


//   public function delete_coursseee($data){
//     $explodData = explode(',',$data);
//     $this->db->where_in('course_id',$explodData);
//     $getDeleteStatus = $this->db->delete('course');
//     if($getDeleteStatus == 1){
//       return array('message'=>'yes');
//     }else{
//       return array('message'=>'no');
//     }
// }


  function fetch_training_application_data($postData=null){

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
            $search_arr[] = " (id like '%".$searchValue."%' or 
                amount like '%".$searchValue."%' or 
                transaction_id like'%".$searchValue."%' or
                status like'%".$searchValue."%'
            ) ";
        }


        date_default_timezone_set('Asia/Kolkata');
        $currntdate = date("Y-m-d");
        
        if($startDate == $currntdate && $endDate == $currntdate){
            $getadminreferdata = $this->db->order_by('id','asc')->limit(1)->get('transactions')->result_array();
            foreach($getadminreferdata as $valll){
                $firstdate = $valll['createdAt'];
            
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
          $search_arr[] = " str_to_date(createdAt, '%Y-%m-%d') BETWEEN '".$startDatee."' and  '".$endDatee."' ";
        }
        
        
        
        if(count($search_arr) > 0){
            $searchQuery = implode(" and ",$search_arr);
        }
      
        

        ## Total number of records without filtering
        $this->db->select('count(*) as allcount');
        $records = $this->db->get('transactions')->result();
        $totalRecords = $records[0]->allcount;
        
        ## Total number of record with filtering
        $this->db->select('count(*) as allcount');
        if($searchQuery != '')
        $this->db->where($searchQuery);
        $records = $this->db->get('transactions')->result();
        $totalRecordwithFilter = $records[0]->allcount;
        
        
  
        ## Fetch records
        $this->db->select('*');
        if($searchQuery != '')
        $this->db->where($searchQuery);
        $this->db->order_by($columnName, $columnSortOrder);
        $this->db->limit($rowperpage, $start);
        $records = $this->db->get('transactions')->result();
        $data = array();
        
        $i =$start + 1;
        foreach ($records as $record) { 

          $userId = $record->user_id;
          $userType = $record->user_type;

          if($userType == "student"){
            $userData = $this->db->where('student_id', $userId)->get('student')->result_array();
          }else{
            $userData = $this->db->where('faculity_id', $userId)->get('faculity')->result_array();
          }

          $course_data = $this->db->where('course_id',$record->course_id)->get('course')->result_array();
          foreach( $course_data as $course){
                  $training_data = $this->db->where('training_id',$course['training_id'])->get('training')->result_array();

                  $courseName = $course['course_name'];
                  $courseDesc = $course['course_desc'];
                  $courseType = $course['course_type'];
                  $courseAmount = $course['course_amount'];
                  $courseFormAmount = $course['form_amount'];
          
                }


          foreach($userData as $user){
            $userName = $user[$userType.'_name'];
            $userEmail = $user[$userType.'_email'];
          }

          foreach($training_data as $training){
            $trainingName = $training['training_name'];
            $trainingDesc = $training['training_desc'];
            $trainingStartDate = $training['start_date'];
            $trainingEndDate = $training['end_date'];
          }



            $data[] = array($i,$userName,$userEmail,$record->user_type,$record->transaction_id,$record->amount,$record->status,$trainingName,$trainingDesc,$trainingStartDate,$trainingEndDate,$courseName,$courseDesc,$courseType,$courseAmount,$courseFormAmount );
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
