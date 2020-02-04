<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Guru extends CI_Model
{
    public function addGuru($data)
    {
        return $this->db->insert('guru', $data);
    }   
    public function cekUsername($username)
    {
        return $this->db->get_where('guru', array('username' => $username))->num_rows();
    }
    public function getGuru($username)
    {
        return $this->db->get_where('guru', array('username' => $username))->row_array();
    }
    public function listGuru()
    {
        return $this->db->get('guru')->result_array();
    }
}