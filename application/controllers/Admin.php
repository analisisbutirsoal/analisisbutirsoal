<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct() {
        parent::__construct();
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
            $data['username'] = $this->input->post('username');
            if ($this->M_Guru->cekUsername($data['username']) > 0) {
                echo "
                    <script>
                        alert('Data sudah ada');
                    </script>";

            } else {
                $this->M_Guru->addGuru($data);
                redirect('admin/daftarGuru');
            }
        }
    }
}