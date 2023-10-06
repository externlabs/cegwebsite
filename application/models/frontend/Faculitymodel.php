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
   
}
