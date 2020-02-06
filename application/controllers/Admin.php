<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->model('M_User');
        $this->load->model('M_Guru');
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
            $guru['nip/nik'] = $this->input->post('username');
            $guru['nama'] = $this->input->post('nama');
            if ($this->M_User->cekUsername($guru['nip/nik']) > 0) {
                echo "
                    <script>
                        alert('Data sudah ada');
                    </script>";

            } else {
                $this->M_Guru->addGuru($guru);
                $user['username'] = $guru['nip/nik'];
                $user['level'] = "Guru";
                $this->M_User->addUser($user);
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
}