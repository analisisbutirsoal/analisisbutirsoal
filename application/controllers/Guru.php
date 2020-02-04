<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Guru extends CI_Controller {
	public function __construct() {
        parent::__construct();
		$this->load->library('form_validation');
    }
    public function index()
    {
        $this->load->view('admin/header');
        $this->load->view('V_daftarGuru');
        $this->load->view('admin/footer');
    }
    public function menuGuru()
    {
        if ($_GET['menu'] == "add") {
            $this->load->view('admin/header');
            $this->load->view('V_addGuru');
            $this->load->view('admin/footer');

        } else {
            $this->load->view('V_home');
        }
    }
}