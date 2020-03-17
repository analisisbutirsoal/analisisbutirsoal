<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {
	public function __construct() {
        parent::__construct();
		$this->load->library('form_validation');
    }
    public function index()
	{
		$this->load->view('guru/header');
        $this->load->view('v_dashboard');
        $this->load->view('guru/footer');
    }
    public function menuGuru()
    {
        if ($_GET['menu'] == "add") {
            $this->load->view('guru/header');
            $this->load->view('V_addGuru');
            $this->load->view('guru/footer');

        } else {
            $this->load->view('V_home');
        }
    }
}