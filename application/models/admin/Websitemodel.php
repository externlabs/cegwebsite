<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Websitemodel extends CI_Model{

    function update($data, $id){           
        $this->db->set($data);
        $this->db->where('id',$id);
        $this->db->update('websetting');
    }
}
