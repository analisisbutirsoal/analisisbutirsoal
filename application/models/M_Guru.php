<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Guru extends CI_Model
{
    public function addGuru($data)
    {
        return $this->db->insert('guru', $data);
    }   
    public function listGuru()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('guru', 'guru.nip_nik = user.username');
        return $this->db->get()->result_array();
    }
    public function getGuru($id)
    {
        return $this->db->get_where('guru', array('nip_nik' => $id))->result_array();
    }
}