<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{
    public function addUser($data)
    {
        return $this->db->insert('user', $data);
    }   
    public function cekUsername($username)
    {
        return $this->db->get_where('user', array('username' => $username))->num_rows();
    }
    public function getUser($username)
    {
        return $this->db->get_where('user', array('username' => $username))->row_array();
    }
}