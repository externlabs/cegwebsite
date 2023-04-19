<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Companymodel extends CI_Model
{
    public function fetch_poc()
    {
      return $this->db->get('company_poc')->result_array();
    }
   
}
