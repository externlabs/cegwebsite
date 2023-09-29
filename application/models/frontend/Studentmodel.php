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


}


