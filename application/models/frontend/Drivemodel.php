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
}
