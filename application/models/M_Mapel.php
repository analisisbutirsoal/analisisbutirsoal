<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Mapel extends CI_Model
{
    public function listMapel()
    {
        return $this->db->get('mapel')->result_array();
    }
    public function listDetailMapel()
    {
        $this->db->select('*'); 
        $this->db->from('mapel_detail md');
        $this->db->join('mapel m', 'm.kd_mapel = md.kd_mapel');
        $this->db->join('guru g', 'g.nip_nik = md.guru');
        $this->db->join('kelas k', 'k.kd_kelas = md.kd_kelas');
        $this->db->order_by('md.id_md', 'asc');
        return $this->db->get()->result_array();
    }
    public function addMapel($data)
    {
        return $this->db->insert('mapel', $data);
    }
    public function addMapelDetail($data)
    {
        return $this->db->insert('mapel_detail', $data);
    }
    public function getLast()
    {
        return $this->db->get('mapel')->last_row('array');
    }
    public function getMapel($nama)
    {
        return $this->db->get_where('mapel', array('nama_mapel' => $nama))->row_array();
    }
    public function getDetailMapel($id)
    {
        $this->db->select('*');
        $this->db->from('mapel_detail d');
        $this->db->join('mapel m', 'm.kd_mapel = d.kd_mapel');
        $this->db->join('guru g', 'g.nip_nik = d.guru');
        $this->db->join('kelas k', 'k.kd_kelas = d.kd_kelas');
        $this->db->where('d.id_md', $id);
        return $this->db->get()->result_array();
    }
    public function updateMapelDetail($id, $data)
    {
        $this->db->where('id_md', $id);
        return $this->db->update('mapel_detail', $data);
    }
    public function deleteMapelDetail($id)
    {
        $this->db->where('id_md', $id);
        return $this->db->delete('mapel_detail');
    }
    public function getMapelGuru($username)
    {
        $this->db->select('*');
        $this->db->from('mapel m');
        $this->db->join('mapel_detail d', 'm.kd_mapel = d.kd_mapel');
        $this->db->where('d.guru', $username);
        $this->db->group_by('m.nama_mapel');
        return $this->db->get()->result_array();
    }
}