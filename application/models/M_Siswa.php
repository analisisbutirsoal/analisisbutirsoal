<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Siswa extends CI_Model
{
    public function addSiswa($data)
    {
        return $this->db->insert('siswa', $data);
    }
    public function listSiswa()
    {
        $this->db->select('*');
        $this->db->from('siswa s');
        $this->db->join('kelas k', 'k.kd_kelas = s.grade', 'inner');  
        $this->db->join('user u', 'u.username = s.nisn', 'inner');
        return $this->db->get()->result_array();
    }
    public function getSiswa($id)
    {
        $this->db->select('*');
        $this->db->from('siswa s');
        $this->db->join('kelas k', 'k.kd_kelas = s.grade', 'inner');
        $this->db->join('user u', 'u.username = s.nisn', 'inner');
        $this->db->where('s.nisn', $id);
        return $this->db->get()->result_array();

    }
}