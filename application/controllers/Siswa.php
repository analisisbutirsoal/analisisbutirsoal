<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->model('M_User');
        $this->load->model('M_Siswa');
        $this->load->model('M_Siswa');
        $this->load->model('M_Kelas');
        $this->load->model('M_Mapel');
    }
	public function index()
	{
		$this->load->view('siswa/header');
        $this->load->view('v_dashboard');
        $this->load->view('siswa/footer');
    }
    public function editProfil($kd_siswa)
    {
        $data['akun'] = $this->M_Siswa->getSiswa($this->session->userdata('username'));
        $this->load->view('siswa/header');
        $this->load->view('v_editProfil', $data);
        $this->load->view('siswa/footer');

        if (isset($_POST['submitEdit'])) {
            $user = $this->M_User->getUser($this->session->userdata('username'));
            $field['nama'] = $this->input->post('nama');
            $field['alamat'] = $this->input->post('alamat');
            $field['phone'] = $this->input->post('phone');
            $pass = $this->input->post('password');
            //jika alamat, phone, jabatan tidak diubah
            $field['alamat'] != 'Alamat' ? $field['alamat'] = $field['alamat'] : $field['alamat'] = "";
            $field['phone'] != 'Phone' ? $field['phone'] = $field['phone'] : $field['phone'] = "";
            //upload foto
            $config['upload_path'] = './upload/siswa/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 10240;
            $this->load->library('upload', $config);
            if (!empty($_FILES['foto']['name'])) {
                if (!$this->upload->do_upload('foto')) {
                    $error = array('error' => $this->upload->display_errors());
                    print_r($error);
                } else {
                    $upload = $this->upload->data();
                    $field['foto'] = $upload['file_name'];
                    if (!empty($pass)) {
                        $this->M_User->updateData(array('password' => md5($pass)), $kd_siswa);
                    }
                    $this->M_Siswa->updateSiswa($kd_siswa, $field);
                    redirect('siswa');
                }
            } else {
                if (!empty($pass)) {
                    $this->M_User->updateData(array('password' => md5($pass)), $kd_siswa);
                }
                $this->M_Siswa->updateSiswa($kd_siswa, $field);
                redirect('siswa');
            } 
        }
    }
}