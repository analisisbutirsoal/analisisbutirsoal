<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Ujian extends CI_Model
{
    public function addUjian($data)
    {
        return $this->db->insert('ujian', $data);
    }
    public function addDetailUjian($data)
    {
        return $this->db->insert('ujian_detail', $data);
    }
    public function addSoal($data)
    {
        return $this->db->insert('bank_soal', $data);
    }
    public function addSoalUjian($data)
    {
        return $this->db->insert('soal_ujian', $data);
    }
    public function listUjian($username)
    {
        $this->db->select('*');
        $this->db->from('ujian_detail ud');
        $this->db->join('ujian u', 'u.kd_ujian = ud.kd_ujian');
        $this->db->join('kelas k', 'k.kd_kelas = ud.kd_kelas');
        $this->db->join('mapel m', 'm.kd_mapel = ud.kd_mapel');
        $this->db->where('ud.kd_guru', $username);
        $this->db->order_by('u.tgl_ujian', 'ASC');
        return $this->db->get()->result_array();
    }
    public function getLast()
    {
        return $this->db->get('ujian')->last_row('array');
    }
    public function getUjian($id_ud)
    {
        $this->db->select('*');
        $this->db->from('ujian_detail ud');
        $this->db->join('ujian u', 'u.kd_ujian = ud.kd_ujian');
        $this->db->join('kelas k', 'k.kd_kelas = ud.kd_kelas');
        $this->db->join('mapel m', 'm.kd_mapel = ud.kd_mapel');
        $this->db->where('ud.id_ud', $id_ud);
        return $this->db->get();
    }
    public function getUjianSiswa($kd_siswa)
    {
        $this->db->select('*');
        $this->db->from('ujian_detail ud');
        $this->db->join('ujian u', 'u.kd_ujian = ud.kd_ujian');
        $this->db->join('kelas k', 'k.kd_kelas = ud.kd_kelas');
        $this->db->join('siswa s', 's.kd_kelas = k.kd_kelas');
        $this->db->join('mapel m', 'm.kd_mapel = ud.kd_mapel');
        $this->db->join('nilai n', 'n.kd_ujian = u.kd_ujian', 'left');
        $this->db->where('s.nisn', $kd_siswa);
        $this->db->where('ud.active', '1');
        return $this->db->get()->result_array();
    }
    public function getBankSoal($key, $value)
    {
        $this->db->where($key, $value);
        $this->db->order_by('kd_mapel', 'asc');
        return $this->db->get('bank_soal')->result_array();
    }
    public function getAllSoal($kd_ujian)
    {
        $this->db->select("*");
        $this->db->from("soal_ujian s");
        $this->db->join("bank_soal b", "s.id_soal = b.id_soal");
        $this->db->where("s.kd_ujian", $kd_ujian);
        return $this->db->get()->result_array();
    }
    public function getSoal($idSoal)
    {
        return $this->db->get_where('bank_soal', array('id_soal' => $idSoal))->result_array();
    }
    public function updateUjian($kd_ujian, $data)
    {
        $this->db->where("kd_ujian", $kd_ujian);
        return $this->db->update('ujian', $data);
    }
    public function updateDetailUjian($id_ud, $data)
    {
        $this->db->where('id_ud', $id_ud);
        return $this->db->update('ujian_detail', $data);
    }
    public function updateSoal($idSoal, $data)
    {
        $this->db->where('id_soal', $idSoal);
        return $this->db->update('bank_soal', $data);
    }
    public function deleteDetailUjian($id_ud)
    {
        $this->db->where('id_ud', $id_ud);
        return $this->db->delete('ujian_detail');
    }
    public function deleteBankSoal($id_soal)
    {
        $this->db->where('id_soal', $id_soal);
        return $this->db->delete('bank_soal');
    }
    public function deleteSoalUjian($id_soalUjian)
    {
        $this->db->where('id_soalUjian', $id_soalUjian);
        return $this->db->delete('soal_ujian');
    }
}