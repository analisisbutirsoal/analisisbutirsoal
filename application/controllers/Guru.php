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
        $this->load->model('M_Analisis');
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
        $ujian = $this->M_Ujian->getUjian($this->session->userdata('id_ud'))->row_array();
        $jml = $ujian['jumlah_soal'];
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
            $dtujian['nama_ujian'] = $this->input->post('nama');
            $dtujian['tgl_ujian'] = date("Y-m-d", strtotime($this->input->post('tanggal')));
            $dtujian['mulai_ujian'] = date("H:i:s", strtotime($this->input->post('mulai')));
            $dtujian['selesai_ujian'] = date("H:i:s", strtotime($this->input->post('selesai')));
            $dtujian['nilaiKKM'] = $this->input->post('kkm');
            $this->M_Ujian->updateujian($this->session->userdata('kd_ujian'), $dtujian);
            $detail['kd_mapel'] = $this->input->post('mapel');
            $detail['kd_kelas'] = $this->input->post('kelas');;
            $detail['kd_ujian'] = $this->session->userdata('kd_ujian');
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
        $ujian = $this->M_Ujian->getUjian($this->session->userdata('id_ud'))->row_array();
        $jml = $ujian['jumlah_soal'];
        $dt['jumlah_soal'] = $jml-1;
        $this->M_Ujian->updateUjian($this->session->userdata('kd_ujian'), $dt);
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
    public function hasilAnalisis($id_ud)
    {
        $data['desk'] = $this->M_Ujian->getUjian($id_ud)->result_array();
        $data['cek'] = count($this->M_Analisis->getAnalisis($id_ud));
        $data['siswa'] = count($this->M_Nilai->listNilaiUjian($id_ud));
        $hasil = $this->M_Analisis->getAnalisis($id_ud);
        if (count($hasil) > 0) {
            $validitas = explode(",", $hasil[0]['validitas']);
            $ket_validitas = explode(",", $hasil[0]['ket_validitas']);
            $reliabilitas['reliabilitas'] = $hasil[0]['reliabilitas'];
            $ket_reliabilitas['ket_reliabilitas'] = $hasil[0]['ket_reliabilitas'];
            $daya_beda = explode(",", $hasil[0]['daya_beda']);
            $ket_daya_beda = explode(",", $hasil[0]['ket_daya_beda']);
            $tk_kesukaran = explode(",", $hasil[0]['tk_kesukaran']);
            $ket_tk_kesukaran = explode(",", $hasil[0]['ket_tk_kesukaran']);
            $hsl = array(array());
            for ($i=0; $i < count($validitas); $i++) { 
                $hsl[$i]['validitas'] = $validitas[$i];
                $hsl[$i]['ket_validitas'] = $ket_validitas[$i];
                $hsl[$i]['tk_kesukaran'] = $tk_kesukaran[$i];
                $hsl[$i]['ket_tk_kesukaran'] = $ket_tk_kesukaran[$i];
                $hsl[$i]['daya_beda'] = $daya_beda[$i];
                $hsl[$i]['ket_daya_beda'] = $ket_daya_beda[$i];
            }
            $tolak = ""; $revisi = ""; $sukar = "";
            for ($j=0; $j < count($hsl); $j++) { 
                if ($hsl[$j]['ket_daya_beda'] == "Tidak Baik (Ditolak)") {
                    $tolak .= ($j+1)." ";
                } elseif ($hsl[$j]['ket_daya_beda'] == "Cukup (Perlu Direvisi)") {
                    $revisi .= ($j+1)." ";
                }
                if ($hsl[$j]['ket_tk_kesukaran'] == "Sukar") {
                    $sukar .= ($j+1)." ";
                }
            }
            $data['hasil'] = $hsl;
            $data['kesimpulan'] = array('tolak' => $tolak, 'revisi' => $revisi, 'sukar' => $sukar);
            $data['reliabilitas'] = array_merge($reliabilitas, $ket_reliabilitas);
        }
        $this->session->set_userdata(array('id_ud' => $id_ud));
        $this->load->view('guru/header');
        $this->load->view('guru/V_hasilAnalisis', $data);
        $this->load->view('guru/footer');   
    }
    public function buatAnalisis($id_ud)
    {
        $data = $this->M_Nilai->listNilaiUjian($id_ud);
        $jml_siswa = count($data);
        $ujian = $this->M_Ujian->getUjian($id_ud)->row_array();
        $jml_soal = count($this->M_Ujian->getAllSoal($ujian['kd_ujian']));
        $soal = $this->M_Ujian->getAllSoal($ujian['kd_ujian']);
        $kunci = array();
        for ($i=0; $i < $jml_soal; $i++) { 
            $kunci[$i] = $soal[$i]['kunciJawaban'];
        }
        for ($j=0; $j < $jml_siswa; $j++) { 
            $jawaban[$j] = $data[$j]['jawaban'];
        }
        $skorButir = array(array());
        $skorSiswa = array();
        for ($k=0; $k < $jml_siswa; $k++) { 
            $skorSiswa[$k] = 0;
            if (!empty($jawaban[$k])) {
                $jwbnSiswa = explode("-", $jawaban[$k]);
                for ($l = 0; $l < count($jwbnSiswa); $l++) {
                    if ($jwbnSiswa[$l] == $kunci[$l]) {
                        $skorButir[$k][$l] = 1;
                    } else {
                        $skorButir[$k][$l] = 0;
                    }
                    $skorSiswa[$k] += $skorButir[$k][$l];
                }
            } else {
                for ($z=0; $z < $jml_soal; $z++) { 
                    $skorButir[$k][$z] = 0;
                }
            }
        }
        $jawabanAll = array(array());
        for ($m=0; $m < $jml_siswa; $m++) { 
            $jwbnSiswa = explode("-", $jawaban[$m]);
            for ($n=0; $n < count($jwbnSiswa); $n++) { 
                $jawabanAll[$m][$n] = $jwbnSiswa[$n];
            }
        }
        $validitas = $this->hitungValiditas($id_ud, $skorButir, $skorSiswa);
        $reliabilitas = $this->hitungReliabilitas($skorSiswa, $skorButir);
        $tk_kesukaran = $this->hitungTkKesukaran($jawabanAll, $kunci);
        $daya_beda = $this->hitungDayaBeda($skorButir, $skorSiswa);
        $dt['id_ud'] = $id_ud;
        $dt['validitas'] = $validitas[0];
        $dt['ket_validitas'] = $validitas[1];
        $dt['reliabilitas'] = $reliabilitas[0];
        $dt['ket_reliabilitas'] = $reliabilitas[1];
        $dt['daya_beda'] = $daya_beda[0];
        $dt['ket_daya_beda'] = $daya_beda[1];
        $dt['tk_kesukaran'] = $tk_kesukaran[0];
        $dt['ket_tk_kesukaran'] = $tk_kesukaran[1];
        $this->M_Analisis->addAnalisis($dt);
        redirect("guru/hasilAnalisis/".$id_ud);
    }
    public function hitungValiditas($id_ud, $skorButir, $skorSiswa)
    {
        $n = array();
        $Mp = array();
        for ($i=0; $i < count($skorButir[0]); $i++) { 
            $temp = 0; $tempSkor=array();
            $butir = array_column($skorButir, $i);
            for ($j=0; $j < count($butir); $j++) { 
                if ($butir[$j] == 1) {
                    $temp += $butir[$j];
                    $tempSkor[$j] = $skorSiswa[$j];
                }
            }
            $n[$i] = $temp;
            $Mp[$i] = array_sum($tempSkor)/$n[$i];
        }
        $p = array();
        for ($j=0; $j < count($n); $j++) { 
            $p[$j] = round($n[$j] / count($skorSiswa), 2);
        }
        $q = array();
        for ($k=0; $k < count($p); $k++) { 
            $q[$k] = 1 - $p[$k];
        }
        $Mt = array_sum($skorSiswa)/count($skorSiswa);

        $varian = 0.0;
        foreach ($skorSiswa as $ss) {
            $varian += pow(($ss - round($Mt, 2)), 2);
        }
        $St = sqrt($varian/(count($skorSiswa) - 1));
        $rtabel = $this->readExcel(count($skorSiswa));
        $rpbis = array();
        for ($l=0; $l < count($skorButir[0]); $l++) { 
            $rpbis[$l] = round((($Mp[$l] - $Mt)/$St) * (sqrt($p[$l]/$q[$l])), 2);
            if ($rpbis[$l]>$rtabel) {
                $ket_validitas[$l] = "Valid";
            } else {
                $ket_validitas[$l] = "Tidak Valid";
            }
        }
        $val = implode(",", $rpbis);
        $ket = implode(",", $ket_validitas);
        return array($val, $ket);
    }
    public function hitungReliabilitas($skorSiswa, $skorButir)
    {
        $skorGanjil = array(); $skorGenap = array();
        $skorGanjilKuadrat = array(); $skorGenapKuadrat = array();
        $skorGanjilxGenap = array();
        for ($m=0; $m < count($skorButir); $m++) { 
            $skorGenap[$m] = 0; $skorGanjil[$m] = 0;
            for ($n=0; $n < count($skorButir[$m]); $n++) { 
                if ($n % 2 == 0) {
                    $skorGenap[$m] += $skorButir[$m][$n];
                } else {
                    $skorGanjil[$m] += $skorButir[$m][$n];
                }
            }
            $skorGanjilKuadrat[$m] = pow($skorGanjil[$m], 2);
            $skorGenapKuadrat[$m] = pow($skorGenap[$m], 2);
            $skorGanjilxGenap[$m] = $skorGanjil[$m] * $skorGenap[$m];
        }
        $atas = (count($skorSiswa) * array_sum($skorGanjilxGenap)) - (array_sum($skorGanjil) * array_sum($skorGenap));
        $bawah = sqrt((count($skorSiswa) * array_sum($skorGanjilKuadrat) - (pow(array_sum($skorGanjil),2))) * (count($skorSiswa) * array_sum($skorGenapKuadrat) - (pow(array_sum($skorGenap),2))));
        $rxy = $atas / $bawah;  
        $rGanjilGenap = round((2 * $rxy) / (1 + $rxy), 2);
        if ($rGanjilGenap >= 0.7) {
            $ket_reliabilitas = "Reliable";
        } else {
            $ket_reliabilitas = "Unreliable";
        }
        return array($rGanjilGenap, $ket_reliabilitas);
    }
    public function hitungDayaBeda($skorButir, $skorSiswa)
    {
        for ($i=0; $i < count($skorSiswa); $i++) { 
            $skorButir[$i]['skor'] = $skorSiswa[$i];
        }
        foreach ($skorButir as $key => $value) {
            $skor[$key] = $value['skor'];
        }
        array_multisort($skor, SORT_DESC, $skorButir);
        $bagi = count($skorButir) / 2;
        $ba = array(); $bb = array(); 
        $pa = array(); $pb = array(); 
        $d = array(); $ket_dayaBeda = array();
        for ($j=0; $j < count($skorButir[0])-1; $j++) { 
            $tempAtas=0; $tempBawah = 0;
            $butir = array_column($skorButir, $j);
            for ($k=0; $k < $bagi; $k++) { 
                if ($butir[$k] == 1) {
                    $tempAtas++;
                } 
            }
            for ($l=$bagi; $l < count($butir); $l++) { 
                if ($butir[$l] == 1) {
                    $tempBawah++;
                } 
            }
            $ja = $bagi;
            $ba[$j] = $tempAtas;
            $jb = count($skorButir) - $ja;
            $bb[$j] = $tempBawah;
            $pa[$j] = $ba[$j] / $ja;
            $pb[$j] = $bb[$j] / $jb;
            $d[$j] = round($pa[$j] - $pb[$j], 2);

            if ($d[$j] < 0 || $d[$j] >= 0 && $d[$j] <= 0.19) {
                $ket_dayaBeda[$j] = "Tidak Baik (Ditolak)";
            } else if ($d[$j] >= 0.20 && $d[$j] <= 0.29) {
                $ket_dayaBeda[$j] = "Cukup (Perlu Direvisi)";
            } else if ($d[$j] >= 0.30 && $d[$j] <= 0.39) {
                $ket_dayaBeda[$j] = "Sedang (Tidak Perlu Direvisi)";
            } else if ($d[$j] >= 0.4 && $d[$j] <= 1) {
                $ket_dayaBeda[$j] = "Baik";
            }
        }
        $dB = implode(",", $d);
        $ket = implode(",", $ket_dayaBeda);
        return array($dB, $ket);
    }
    public function hitungTkKesukaran($jawabanAll, $kunci)
    {
        $skorA = array();
        $skorB = array();
        $skorC = array();
        $skorD = array();
        for ($i=0; $i < count($jawabanAll[0]); $i++) { 
            $tempA = 0; $tempB = 0;
            $tempC = 0; $tempD = 0;
            $butirJawaban = array_column($jawabanAll, $i);
            for ($j=0; $j < count($butirJawaban); $j++) { 
                if ($butirJawaban[$j] == "a") {
                    $tempA++;
                } else if ($butirJawaban[$j] == "b") {
                    $tempB++;
                } else if ($butirJawaban[$j] == "c") {
                    $tempC++;
                } else if ($butirJawaban[$j] == "d"){
                    $tempD++;
                }
                $skorA[$i] = $tempA;
                $skorB[$i] = $tempB;
                $skorC[$i] = $tempC;
                $skorD[$i] = $tempD;
            }
        }
        $p = array(); $b = array(); $ket_tkKesukaran = array();
        for ($k=0; $k < count($kunci); $k++) { 
            if ($kunci[$k] == "a") {
                $b[$k] = $skorA[$k]; 
            } elseif ($kunci[$k] == "b") {
                $b[$k] = $skorB[$k]; 
            } elseif ($kunci[$k] == "c") {
                $b[$k] = $skorC[$k]; 
            } else {
                $b[$k] = $skorD[$k]; 
            }
            $p[$k] = round($b[$k] / ($skorA[$k] + $skorB[$k] + $skorC[$k] + $skorD[$k]), 2);

            if ($p[$k] >= 0 && $p[$k] <= 0.3) {
                $ket_tkKesukaran[$k] = "Sukar";
            } else if ($p[$k] >= 0.31 && $p[$k] <= 0.7){
                $ket_tkKesukaran[$k] = "Sedang";
            } else if ($p[$k] >= 0.71 && $p[$k] <= 1) {
                $ket_tkKesukaran[$k] = "Mudah";
            }
        }
        $tK = implode(",", $p);
        $ket = implode(",", $ket_tkKesukaran);
        return array($tK, $ket);
    }
    public function readExcel($df)
    {
        $this->load->library('excel_reader');
        $this->excel_reader->read("./upload/rtabel2.xls");
        $worksheet = $this->excel_reader->sheets[0];
        $numRows = $worksheet['numRows']; // ex: 14
        $numCols = $worksheet['numCols']; // ex: 4
        $cells = $worksheet['cells'];
        for ($m=1; $m < count($cells)+1; $m++) { 
            if ($cells[$m][1] == $df) {
                return $rtabel = $cells[$m][3];
            }
        }
    }
    public function setKodeUjian()
    {
        $last = $this->M_Ujian->getLast();
        $id = (int) substr($last['kd_ujian'], 1, 4);
        $kode = "U" . sprintf("%04s", ++$id);
        return $kode;
    }
}