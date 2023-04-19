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
}
