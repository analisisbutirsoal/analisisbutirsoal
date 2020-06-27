<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Nilai extends CI_Model
{
    public function addNilai($data)
    {
        return $this->db->insert('nilai', $data);
    }
    public function getNilaiSiswa($kd_siswa)
    {
        $this->db->where('kd_siswa', $kd_siswa);
        return $this->db->get('nilai');
    }
}