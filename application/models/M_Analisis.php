<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Analisis extends CI_Model
{
    public function addAnalisis($data)
    {
        return $this->db->insert('analisis', $data);
    }
    public function getAnalisis($id_ud)
    {
        return $this->db->get_where('analisis', array('id_ud' => $id_ud))->result_array();
    }
}