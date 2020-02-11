<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {
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
		$this->load->view('admin/header');
        $this->load->view('v_dashboard');
        $this->load->view('admin/footer');
    }
}