<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Nilai extends CI_Model
{
    public function addNilai($data)
    {
        return $this->db->insert('nilai', $data);
    }
    public function getNilaiSiswa($kd_siswa, $id_ud)
    {
        $this->db->select('*');
        $this->db->from('ujian_detail ud');
        $this->db->join('nilai n', 'ud.kd_ujian = n.kd_ujian');
        $this->db->where(array('n.kd_siswa' => $kd_siswa, 'ud.id_ud' => $id_ud));
        return $this->db->get()->result_array();
    }
    public function listNilaiUjian($id_ud)
    {
        $this->db->select('s.nama, n.waktu, n.benar, n.salah, n.kosong, n.nilai, u.nilaiKKM');
        $this->db->from('nilai n');
        $this->db->join('siswa s', 's.nisn = n.kd_siswa', 'left');
        $this->db->join('ujian_detail ud', 'ud.kd_kelas = s.kd_kelas', 'left');
        $this->db->join('ujian u', 'u.kd_ujian = ud.kd_ujian', 'left');
        $this->db->where('ud.id_ud', $id_ud);
        $query1 = $this->db->get_compiled_select();

        $this->db->select('s.nama, n.waktu, n.benar, n.salah, n.kosong, n.nilai, u.nilaiKKM');
        $this->db->from('nilai n');
        $this->db->join('siswa s', 's.nisn = n.kd_siswa', 'right');
        $this->db->join('ujian_detail ud', 'ud.kd_kelas = s.kd_kelas', 'right');
        $this->db->join('ujian u', 'u.kd_ujian = ud.kd_ujian', 'right');
        $this->db->where('ud.id_ud', $id_ud);
        $query2 = $this->db->get_compiled_select();

        return $this->db->query($query1." UNION ".$query2)->result_array();
    }
}