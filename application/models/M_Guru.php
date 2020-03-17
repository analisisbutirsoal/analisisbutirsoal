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
    public function aktivasiGuru($nip, $email)
    {
        $this->db->where('nip_nik', $nip);
        return $this->db->update('guru', array('email' => $email));
    }
    public function updateGuru($id, $data)
    {
        $this->db->where('nip_nik', $id);
        return $this->db->update('guru', $data);
    }
    public function hapusGuru($id)
    {
        return $this->db->query("DELETE guru, user, mapel_detail FROM guru, user, mapel_detail WHERE guru.nip_nik=user.username AND guru.nip_nik=mapel_detail.guru AND guru.nip_nik = $id");
    }
}