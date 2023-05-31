<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Contactmodel extends CI_Model{


    public function insert_data($name,$email,$subject,$number,$msg)
    {
        $data = array(
            'name' => $name,
            'email' => $email,
            'number' => $number,
            'subject' => $subject,
            'msg' => $msg
        );
        return  $this->db->insert('contact', $data);
    }

}