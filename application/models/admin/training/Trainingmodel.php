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
}
