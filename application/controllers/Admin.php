<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->model('M_User');
        $this->load->model('M_Guru');
        $this->load->model('M_Siswa');
        $this->load->model('M_Kelas');
        $this->load->model('M_Mapel');
    }
    public function index()
	{
        $data['guru'] = count($this->M_Guru->listGuru());
        $data['siswa'] = count($this->M_Siswa->listSiswa());
        $data['kelas'] = count($this->M_Kelas->listKelas());
        $data['mapel'] = count($this->M_Mapel->listMapel());
		$this->load->view('admin/header');
        $this->load->view('admin/v_dashboardAdmin', $data);
        $this->load->view('admin/footer');
    }
    public function daftarGuru()
    {
        $data['guru'] = $this->M_Guru->listGuru();
        $this->load->view('admin/header');
        $this->load->view('admin/v_daftarGuru', $data);
        $this->load->view('admin/footer');
    }
    public function addGuru()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/v_addGuru');
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
        $this->load->view('admin/v_editGuru', $data);
        $this->load->view('admin/footer');
        
        if (isset($_POST['submitEdit'])) {
            $field['nip_nik'] = $this->input->post('username');
            $field['nama'] = $this->input->post('nama');
            $field['alamat'] = $this->input->post('alamat');
            $field['phone'] = $this->input->post('phone');
            //jika alamat, phone, jabatan tidak diubah
            $field['alamat'] != 'Alamat' ? $field['alamat'] = $field['alamat'] : $field['alamat'] = "";
            $field['phone'] != 'Phone' ? $field['phone'] = $field['phone'] : $field['phone'] = "";
            //upload foto
            $config['upload_path'] = './upload/guru/';
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
                    $this->M_User->updateData(array('username' => $field['nip_nik']), $id);
                    $this->M_Guru->updateGuru($field['nip_nik'], $field);
                    redirect('admin/daftarGuru');
                }
            } else {
                $this->M_User->updateData(array('username' => $field['nip_nik']), $id);
                $this->M_Guru->updateGuru($field['nip_nik'], $field);
                redirect('admin/daftarGuru');
            } 
        }
    }
    public function hapusGuru($id)
    {
        $this->M_Guru->deleteGuru($id);
        redirect('admin/daftarGuru');
    }
    public function daftarSiswa()
    {
        $data['siswa'] = $this->M_Siswa->listSiswa();
        $this->load->view('admin/header');
        $this->load->view('admin/v_daftarSiswa', $data);
        $this->load->view('admin/footer');
    }
    public function addSiswa()
    {
        $data['kelas'] = $this->M_Kelas->getKelas();
        $data['tahun'] = $this->M_Kelas->getTahun();
        $this->load->view('admin/header');
        $this->load->view('admin/v_addSiswa', $data);
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
                $siswa['kd_kelas'] = $kode['kd_kelas'];
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
        $this->load->view('admin/v_editSiswa', $data);
        $this->load->view('admin/footer');

        if (isset($_POST['submitEdit'])) {
            $siswaBaru['nisn'] = $this->input->post('username');
            $siswaBaru['nama'] = $this->input->post('nama');
            $siswaBaru['alamat'] = $this->input->post('alamat');
            $siswaBaru['phone'] = $this->input->post('phone');
            $kls = $this->input->post('kelas');
            $thn = $this->input->post('tahun');
            $kode = $this->M_Kelas->getKode($kls, $thn);
            $siswaBaru['kd_kelas'] = $kode['kd_kelas'];
            //jika alamat, phone, jabatan tidak diubah
            $siswaBaru['alamat'] != 'Alamat' ? $siswaBaru['alamat'] = $siswaBaru['alamat'] : $siswaBaru['alamat'] = "";
            $siswaBaru['phone'] != 'Phone' ? $siswaBaru['phone'] = $siswaBaru['phone'] : $siswaBaru['phone'] = "";
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
                    $this->M_User->updateData(array('username' => $siswaBaru['nisn']), $id);
                    $this->M_Siswa->updateSiswa($siswaBaru['nisn'], $siswaBaru);
                    redirect('admin/daftarSiswa');
                }
            } else {
                $this->M_User->updateData(array('username' => $siswaBaru['nisn']), $id);
                $this->M_Siswa->updateSiswa($siswaBaru['nisn'], $siswaBaru);
                redirect('admin/daftarSiswa');
            }
        }
    }
    public function hapusSiswa($id)
    {
        $this->M_Siswa->deleteSiswa($id);
        redirect('admin/daftarSiswa');
    }
    public function daftarKelas()
    {
        $data['kelas'] = $this->M_Kelas->listKelas();
        $this->load->view('admin/header');
        $this->load->view('admin/v_daftarKelas', $data);
        $this->load->view('admin/footer');
    }
    public function addKelas()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/v_addKelas');
        $this->load->view('admin/footer');

        if (isset($_POST['submit'])) {
            $kelas['kd_kelas'] = $this->setKode('kelas');
            $kelas['kelas'] = $this->input->post('kelas') ." ". $this->input->post('nmkelas');
            $kelas['tahun'] = $this->input->post('tahun');
            $this->M_Kelas->addKelas($kelas);
            redirect('admin/daftarKelas');
        }
    }
    public function editKelas($id) {
        $data['edit'] = $this->M_Kelas->getDataKelas($id);
        $this->load->view('admin/header');
        $this->load->view('admin/v_editKelas', $data);
        $this->load->view('admin/footer');

        if (isset($_POST['submitEdit'])) {
            $kelasBaru['kelas'] = $this->input->post('kelas') . " " . $this->input->post('nmkelas');
            $kelasBaru['tahun'] = $this->input->post('tahun');
            $this->M_Kelas->updateKelas($id, $kelasBaru);
            redirect('admin/daftarKelas');
        }
    }
    public function hapusKelas($id)
    {
        $this->M_Kelas->deleteKelas($id);
        redirect('admin/daftarKelas');
    }
    public function daftarMapel()
    {
        $data['mapel'] = $this->M_Mapel->listDetailMapel();
        $this->load->view('admin/header');
        $this->load->view('admin/v_daftarMapel', $data);
        $this->load->view('admin/footer');
    }
    public function addMapel()
    {
        $data['kelas'] = $this->M_Kelas->listKelas();
        $data['guru'] = $this->M_Guru->listGuru();
        $this->load->view('admin/header');
        $this->load->view('admin/v_addMapel', $data);
        $this->load->view('admin/footer');

        if (isset($_POST['submit'])) {
            $mapel['kd_mapel'] = $this->setKode('mapel');
            $mapel['nama_mapel'] = $this->input->post('nama_mapel');
            $cek = $this->M_Mapel->getMapel($mapel['nama_mapel']);
            if (count($cek) == NULL) {
                $this->M_Mapel->addMapel($mapel);
            }
            foreach ($_POST['kelas'] as $kls) {
                $mapel_detail['kd_mapel'] = $cek['kd_mapel'];
                $mapel_detail['kd_kelas'] = $kls;
                $mapel_detail['guru'] = $this->input->post('guru');
                $this->M_Mapel->addMapelDetail($mapel_detail);
            }
            redirect('admin/daftarMapel');
        }
    }
    public function editMapel($id)
    {
        $data['edit'] = $this->M_Mapel->getDetailMapel($id);
        $data['guru'] = $this->M_Guru->listGuru();
        $data['kelas'] = $this->M_Kelas->listKelas();
        $this->load->view('admin/header');
        $this->load->view('admin/v_editMapel', $data);
        $this->load->view('admin/footer');
        if (isset($_POST['submitEdit'])) {
            $update_md['kd_kelas'] = $this->input->post('kelas');
            $update_md['guru'] = $this->input->post('guru');
            $this->M_Mapel->updateMapelDetail($id, $update_md);
            redirect('admin/daftarMapel');
        }
    }
    public function hapusMapel($id)
    {
        $this->M_Mapel->deleteMapelDetail($id);
        redirect('admin/daftarmapel');
    }
    public function setKode($tabel)
    {
        if ($tabel == "kelas") {
            $last = $this->M_Kelas->getLast();
            $id = (int) substr($last['kd_kelas'],1,4);
            $kode = "K".sprintf("%04s",++$id);
        } else if ($tabel == "mapel") {
            $last = $this->M_Mapel->getLast();
            $id = (int) substr($last['kd_mapel'], 1, 4);
            $kode = "M" . sprintf("%04s", ++$id);
        }
        return $kode;
    }
}