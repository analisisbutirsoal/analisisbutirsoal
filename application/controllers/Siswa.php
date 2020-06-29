<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->model('M_User');
        $this->load->model('M_Siswa');
        $this->load->model('M_Ujian');
        $this->load->model('M_Nilai');
        $this->load->model('M_Kelas');
        $this->load->model('M_Mapel');
    }
	public function index()
	{
        redirect("siswa/daftarUjian");
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
    public function daftarUjian()
    {
        $data['ujian'] = $this->M_Ujian->getUjianSiswa($this->session->userdata('username'));
        $data['jmlUjian'] = count($this->M_Ujian->getUjianSiswa($this->session->userdata('username')));
        $this->load->view('siswa/header');
        $this->load->view('siswa/v_daftarUjian', $data);
        $this->load->view('siswa/footer');
    }
    public function mulaiUjian($id_ud)
    {
        $ujian = $this->M_Ujian->getUjian($id_ud)->row_array();
        $data['desk'] = $this->M_Ujian->getUjian($id_ud)->result_array();
        $data['soal'] = $this->M_Ujian->getAllSoal($ujian['kd_ujian']);
        $data['jmlsoal'] = count($this->M_Ujian->getAllSoal($ujian['kd_ujian']));
        $this->session->set_userdata(array('kd_ujian' => $ujian['kd_ujian']));
        $this->session->set_userdata(array('id_ud' => $id_ud));
        $this->load->view('siswa/header');
        $this->load->view('siswa/v_ujian', $data);
        $this->load->view('siswa/footer');
    }
    public function koreksiUjian($kd_ujian, $id_ud)
    {
        $total = 0;
        $kosong = 0;
        $jwb = "";
        $jmlsoal = count($this->M_Ujian->getAllSoal($kd_ujian));
        $data = $this->M_Ujian->getAllSoal($kd_ujian);
        foreach ($_POST['id_soal'] as $id) {
            $i = 0;
            $id_soal = $this->input->post('id_soal');
        }
        for ($i = 0; $i < $jmlsoal; $i++) {
            $check = $this->input->post('jawaban' . $id_soal[$i]);
            if ($check != null) {
                $jawaban[$i] = $check;
            } else {
                $jawaban[$i] = "0";
                $kosong++;
            }
            $kunci[$i] = $data[$i]['kunciJawaban'];
            $jwb .= $jawaban[$i] . "-";
            if ($jawaban[$i] == $kunci[$i]) {
                $skor[$i] = 1;
            } else {
                $skor[$i] = 0;
            }
            $total += $skor[$i];
        }
        $benar = $total;
        $salah = $jmlsoal - $benar;
        $nilai = ($benar / $jmlsoal) * 100;
        $dt['waktu'] = $this->input->post('timedone');
        $dt['kd_siswa'] = $this->session->userdata('username');
        $dt['kd_ujian'] = $kd_ujian;
        $dt['jawaban'] = $jwb;
        $dt['benar'] = $benar;
        $dt['salah'] = $salah;
        $dt['kosong'] = $kosong;
        $dt['nilai'] = $nilai;
        $this->M_Nilai->addNilai($dt);
        var_dump($dt['waktu']);
        redirect('siswa/hasilUjian/' . $id_ud);
    }
    public function hasilUjian($id_ud)
    {
        $data['desk'] = $this->M_Ujian->getUjian($id_ud)->result_array();
        $data['siswa'] = $this->M_Siswa->getSiswa($this->session->userdata('username'));
        $data['nilai'] = $this->M_Nilai->getNilaiSiswa($this->session->userdata('username'), $id_ud);
        $this->load->view('siswa/header');
        $this->load->view('siswa/v_hasilUjian', $data);
        $this->load->view('siswa/footer');
    }
}