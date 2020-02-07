<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Kelas extends CI_Model
{
    public function addKelas($data)
    {
        return $this->db->insert('kelas', $data);
    }
    public function listKelas()
    {
        $this->db->order_by('tahun', 'asc');
        return $this->db->get('kelas')->result_array();
    }
    public function getKelas()
    {
        $this->db->distinct();
        $this->db->select('kelas');
        $this->db->order_by('kelas', 'asc');
        return $this->db->get('kelas')->result_array();
    }
    public function getTahun()
    {
        $this->db->distinct();
        $this->db->select('tahun');
        $this->db->order_by('tahun', 'asc');
        return $this->db->get('kelas')->result_array();
    }
    public function getKode($kelas, $tahun)
    {
        $this->db->select('kd_kelas');
        $this->db->where(array('kelas' => $kelas, 'tahun' => $tahun));
        return $this->db->get('kelas')->row_array();
    }
    public function getDataKelas($id)
    {
        return $this->db->get_where('kelas', array('kd_kelas' => $id))->result_array();
    }
}