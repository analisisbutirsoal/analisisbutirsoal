<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->model('M_User');
        $this->load->model('M_Guru');
        $this->load->model('M_Siswa');
        $this->load->model('M_Kelas');
    }
	public function index()
	{
		$this->load->view('admin/header');
        $this->load->view('v_dashboard');
        $this->load->view('admin/footer');
    }
    public function daftarGuru()
    {
        $data['guru'] = $this->M_Guru->listGuru();
        $this->load->view('admin/header');
        $this->load->view('v_daftarGuru', $data);
        $this->load->view('admin/footer');
    }
    public function addGuru()
    {
        $this->load->view('admin/header');
        $this->load->view('v_addGuru');
        $this->load->view('admin/footer');

        if (isset($_POST['submit'])) {
            $user['username'] = $this->input->post('username');
            $user['level'] = "Guru";
            if ($this->M_User->cekUsername($user['username']) > 0) {
                echo "
                    <script>
                        alert('Data sudah ada');
                    </script>";

            } else {
                $this->M_User->addUser($user);
                $guru['nip_nik'] = $user['username'];
                $guru['nama'] = $this->input->post('nama');
                $this->M_Guru->addGuru($guru);
                redirect('admin/daftarGuru');
            }
        }
    }
    public function editGuru($id)
    {
        $data['edit'] = $this->M_Guru->getGuru($id);
        $this->load->view('admin/header');
        $this->load->view('v_editGuru', $data);
        $this->load->view('admin/footer');
    }
    public function daftarSiswa()
    {
        $data['siswa'] = $this->M_Siswa->listSiswa();
        $this->load->view('admin/header');
        $this->load->view('v_daftarSiswa', $data);
        $this->load->view('admin/footer');
    }
    public function addSiswa()
    {
        $data['kelas'] = $this->M_Kelas->getKelas();
        $data['tahun'] = $this->M_Kelas->getTahun();
        $this->load->view('admin/header');
        $this->load->view('v_addSiswa', $data);
        $this->load->view('admin/footer');
        if (isset($_POST['submit'])) {
            $user['username'] = $this->input->post('username');
            $user['level'] = "Siswa";
            if ($this->M_User->cekUsername($user['username']) > 0) {
                echo "
                    <script>
                        alert('Data sudah ada');
                    </script>";

            } else {
                $this->M_User->addUser($user);

                $kls = $this->input->post('kelas');
                $thn = $this->input->post('tahun');
                $kode = $this->M_Kelas->getKode($kls, $thn);

                $siswa['nisn'] = $user['username'];
                $siswa['nama'] = $this->input->post('nama');
                $siswa['grade'] = $kode['kd_kelas'];
                $this->M_Siswa->addSiswa($siswa);
                redirect('admin/daftarSiswa');
            }
        }
    }
    public function editSiswa($id)
    {
        $data['kelas'] = $this->M_Kelas->getKelas();
        $data['tahun'] = $this->M_Kelas->getTahun();
        $data['edit'] = $this->M_Siswa->getSiswa($id);
        $this->load->view('admin/header');
        $this->load->view('v_editSiswa', $data);
        $this->load->view('admin/footer');
    }
    public function daftarKelas()
    {
        $data['kelas'] = $this->M_Kelas->listKelas();
        $this->load->view('admin/header');
        $this->load->view('v_daftarKelas', $data);
        $this->load->view('admin/footer');
    }
    public function addKelas()
    {
        $this->load->view('admin/header');
        $this->load->view('v_addKelas');
        $this->load->view('admin/footer');

        if (isset($_POST['submit'])) {
            $kelas['kelas'] = $this->input->post('kelas') ." ". $this->input->post('nmkelas');
            $kelas['tahun'] = $this->input->post('tahun');
            $this->M_Kelas->addKelas($kelas);
            redirect('admin/daftarKelas');
        }
    }
    public function editKelas($id)
    {
        $data['edit'] = $this->M_Kelas->getDataKelas($id);
        $this->load->view('admin/header');
        $this->load->view('v_editKelas', $data);
        $this->load->view('admin/footer');
    }
}