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
   
  
}