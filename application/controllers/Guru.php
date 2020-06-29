<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_User');
        $this->load->model('M_Guru');
        $this->load->model('M_Siswa');
        $this->load->model('M_Kelas');
        $this->load->model('M_Mapel');
        $this->load->model('M_Ujian');
        $this->load->model('M_Nilai');
    }
    public function index()
	{
        $data['kelas'] = count($this->M_Kelas->getKelasMapelGuru($this->session->userdata('username')));
        $data['ujian'] = count($this->M_Ujian->listUjian($this->session->userdata('username')));
		$this->load->view('guru/header');
        $this->load->view('guru/v_dashboardGuru', $data);
        $this->load->view('guru/footer');
    }
    public function editProfil($kd_guru){
        $data['akun'] = $this->M_Guru->getGuru($this->session->userdata('username'));
        $this->load->view('guru/header');
        $this->load->view('v_editProfil', $data);
        $this->load->view('guru/footer');

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
                    if (!empty($pass)) {
                        $this->M_User->updateData(array('password' => md5($pass)), $kd_guru);
                    }
                    $this->M_Guru->updateGuru($kd_guru, $field);
                    redirect('guru');
                }
            } else {
                if (!empty($pass)) {
                    $this->M_User->updateData(array('password' => md5($pass)), $kd_guru);
                }
                $this->M_Guru->updateGuru($kd_guru, $field);
                redirect('guru');
            } 
        }
    }
    public function daftarUjian(){
        $data['ujian'] = $this->M_Ujian->listUjian($this->session->userdata('username'));
        $this->load->view('guru/header');
        $this->load->view('guru/v_daftarUjian', $data);
        $this->load->view('guru/footer');
    }
    public function addUjian(){
        $data['mapel'] = $this->M_Mapel->getMapelGuru($this->session->userdata('username'));
        $data['kelas'] = $this->M_Kelas->getKelasMapelGuru($this->session->userdata('username'));
        $this->load->view('guru/header');
        $this->load->view('guru/v_addUjian', $data);
        $this->load->view('guru/footer');

        if (isset($_POST['next'])) {
            $kodeUjian = $this->setKodeUjian();
            $ujian['kd_ujian'] = $kodeUjian;
            $ujian['nama_ujian'] = $this->input->post('nama');
            $ujian['tgl_ujian'] = date("Y-m-d", strtotime($this->input->post('tanggal')));
            $ujian['mulai_ujian'] = date("H:i:s", strtotime($this->input->post('mulai')));
            $ujian['selesai_ujian'] = date("H:i:s", strtotime($this->input->post('selesai')));
            $ujian['nilaiKKM'] = $this->input->post('kkm');
            $this->M_Ujian->addUjian($ujian);
            foreach ($_POST['kelas'] as $kls) {
                $detail['kd_guru'] = $this->session->userdata('username');
                $detail['kd_mapel'] = $this->input->post('mapel');
                $detail['kd_kelas'] = $kls;
                $detail['kd_ujian'] = $kodeUjian;
                $this->M_Ujian->addDetailUjian($detail);
            }
            redirect('guru/daftarUjian');
        }
    }
    public function pilihSoal(){
        $data['soal'] = $this->M_Ujian->getBankSoal('kd_mapel', $this->session->userdata('kd_mapel'));
        $data['jmlsoal'] = count($data['soal']);
        $this->load->view('guru/header');
        $this->load->view('guru/v_pilihSoal', $data);
        $this->load->view('guru/footer');
    }
    public function addSoalUjian()
    {
        $jml=0;
        if (isset($_POST['tambah'])) {
            foreach ($_POST['id_soal'] as $soal) {
                $data['id_soal'] = $soal;
                $data['kd_ujian'] = $this->session->userdata('kd_ujian');
                $this->M_Ujian->addSoalUjian($data);
                $jml++;
            }
            $dt['jumlah_soal'] = $jml;
            $this->M_Ujian->updateUjian($data['kd_ujian'], $dt);
            redirect('guru/editUjian/' . $this->session->userdata('id_ud'));
        }
    }
    public function daftarSoal()
    {
        $data['soal'] = $this->M_Ujian->getBankSoal('kd_guru', $this->session->userdata('username'));
        $data['mapel'] = $this->M_Mapel->getMapelGuru($this->session->userdata('username'));
        $data['jmlsoal'] = count($data['soal']);
        $this->load->view('guru/header');
        $this->load->view('guru/v_daftarSoal', $data);
        $this->load->view('guru/footer');
    }
    public function addSoal()
    {
        if (isset($_POST['tambah'])) {
            $soal['kd_guru'] = $this->session->userdata('username');
            $soal['kd_mapel'] = $this->input->post('mapel');
            $soal['pertanyaan'] = $this->input->post('pertanyaan');
            $soal['jawabanA'] = $this->input->post('jwbnA');
            $soal['jawabanB'] = $this->input->post('jwbnB');
            $soal['jawabanC'] = $this->input->post('jwbnC');
            $soal['jawabanD'] = $this->input->post('jwbnD');
            $soal['kunciJawaban'] = $this->input->post('kunci');
            $this->M_Ujian->addSoal($soal);
            redirect("guru/daftarSoal");
        }
    }
    public function editUjian($id_ud)
    {
        $ujian = $this->M_Ujian->getUjian($id_ud)->row_array();
        $data['desk'] = $this->M_Ujian->getUjian($id_ud)->result_array();
        $data['soal'] = $this->M_Ujian->getAllSoal($ujian["kd_ujian"]);
        $data['jmlsoal'] = count($this->M_Ujian->getAllSoal($ujian['kd_ujian']));
        $data['mapel'] = $this->M_Mapel->getMapelGuru($this->session->userdata('username'));
        $data['kelas'] = $this->M_Kelas->getKelasMapelGuru($this->session->userdata('username'));
        $data['kd_ujian'] = $ujian['kd_ujian'];
        $this->load->view('guru/header');
        $this->load->view('guru/v_editUjian', $data);
        $this->load->view('guru/footer');
        $this->session->set_userdata(array('kd_ujian' => $ujian['kd_ujian']));
        $this->session->set_userdata(array('kd_kelas' => $ujian['kd_kelas']));
        $this->session->set_userdata(array('kd_mapel' => $ujian['kd_mapel']));
        $this->session->set_userdata(array('id_ud' => $id_ud));

        if (isset($_POST['submitEdit'])) {
            $id_ud = $this->input->post('id_ud');
            $ujian['nama_ujian'] = $this->input->post('nama');
            $ujian['tgl_ujian'] = date("Y-m-d", strtotime($this->input->post('tanggal')));
            $ujian['mulai_ujian'] = date("H:i:s", strtotime($this->input->post('mulai')));
            $ujian['selesai_ujian'] = date("H:i:s", strtotime($this->input->post('selesai')));
            $ujian['nilaiKKM'] = $this->input->post('kkm');
            $this->M_Ujian->updateujian($kd_ujian, $ujian);
            $detail['kd_mapel'] = $this->input->post('mapel');
            $detail['kd_kelas'] = $this->input->post('kelas');;
            $detail['kd_ujian'] = $kd_ujian;
            $this->M_Ujian->updateDetailUjian($id_ud, $detail);
            redirect("guru/daftarUjian");
        }
    }
    public function editSoal($idSoal)
    {
        $data['soal'] = $this->M_Ujian->getSoal($idSoal);
        $this->load->view('guru/header');
        $this->load->view('guru/v_editSoal', $data);
        $this->load->view('guru/footer');

        if (isset($_POST['simpan'])) {
            $soal['pertanyaan'] = $this->input->post('pertanyaan');
            $soal['jawabanA'] = $this->input->post('jwbnA');
            $soal['jawabanB'] = $this->input->post('jwbnB');
            $soal['jawabanC'] = $this->input->post('jwbnC');
            $soal['jawabanD'] = $this->input->post('jwbnD');
            $soal['kunciJawaban'] = $this->input->post('kunci');
            $this->M_Ujian->updateSoal($idSoal, $soal);
            redirect("guru/daftarSoal");
        }
    }
    public function hapusUjian($id_ud)
    {
        $this->M_Ujian->deleteDetailUjian($id_ud);
        redirect("guru/daftarUjian");
    }
    public function hapusSoal($id_soal)
    {
        $this->M_Ujian->deleteBankSoal($id_soal);
        redirect("guru/daftarSoal");
    }
    public function hapusSoalUjian($id_soalUjian)
    {
        $this->M_Ujian->deleteSoalUjian($id_soalUjian);
        redirect("guru/editUjian/".$this->session->userdata('id_ud'));
    }
    public function cekActivate($id_ud)
    {
        $data = $this->M_Ujian->getUjian($id_ud)->row_array();
        if ($data['active'] == 0) {
            $dt['active'] = 1;
        } else {
            $dt['active'] = 0;
        }
        $this->M_Ujian->updateDetailUjian($id_ud, $dt);
        redirect('guru/daftarUjian');
    }
    public function daftarNilai($id_ud)
    {
        $data['desk'] = $this->M_Ujian->getUjian($id_ud)->result_array();
        $data['nilai'] = $this->M_Nilai->listNilaiUjian($id_ud);
        $this->load->view('guru/header');
        $this->load->view('guru/v_daftarNilai', $data);
        $this->load->view('guru/footer');
    }
    public function setKodeUjian()
    {
        $last = $this->M_Ujian->getLast();
        $id = (int) substr($last['kd_ujian'], 1, 4);
        $kode = "U" . sprintf("%04s", ++$id);
        return $kode;
    }
}