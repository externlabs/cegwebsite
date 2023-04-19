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

   
}
