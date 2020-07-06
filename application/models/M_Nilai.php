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
        $query='SELECT * FROM (
                    SELECT
                        siswa.nisn,
                        siswa.nama,
                        ujian_detail.kd_kelas,
                        ujian.nilaiKKM
                        FROM siswa
                        INNER JOIN ujian_detail
                            ON siswa.kd_kelas = ujian_detail.kd_kelas
                        INNER JOIN ujian
                            ON ujian_detail.kd_ujian = ujian.kd_ujian
                        WHERE ujian_detail.id_ud = '.$id_ud.') a
                LEFT JOIN (
                    SELECT
                        nilai.kd_ujian,
                        nilai.kd_siswa,
                        ujian_detail.id_ud,
                        nilai.nilai,
                        nilai.waktu,
                        nilai.jawaban,
                        nilai.benar,
                        nilai.salah,
                        nilai.kosong
                        FROM nilai
                        INNER JOIN ujian_detail
                            ON nilai.kd_ujian = ujian_detail.kd_ujian
                        WHERE ujian_detail.id_ud = '.$id_ud.') b
                ON a.nisn = b.kd_siswa
                LIMIT 30';
        return $this->db->query($query)->result_array();
    }
}