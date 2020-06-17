<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct() {
        parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('email');
		$this->load->helper('email');
        $this->load->model('M_Guru');
        $this->load->model('M_Siswa');
        $this->load->model('M_User');
    }
	public function index()
	{
		if (isset($_SESSION['level'])) {
			if ($_SESSION['level'] == "Admin") {
				redirect('admin');
			} elseif ($_SESSION['level'] == "Guru") {
				redirect('guru');
			} else {
				redirect('siswa');
			}
		} else {
			$this->load->view('V_home');
		}
	}
	public function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		if (isset($username) && isset($password)) {
			if ($username == "admin" && $password == "admin864") {
				$this->session->set_userdata('level', 'Admin');
				redirect('admin');
			} else {
				$user = $this->M_User->getUser($username);
				if ($this->M_User->cekUsername($username) > 0) {
					if (md5($password) == $user['password']) {
						if ($user['level'] == "Guru") {
							$ses = array(
								'level' => $user['level'],
								'username' => $user['username']);
							$this->session->set_userdata($ses);
							redirect('guru');
						} else if ($user['level'] == "Siswa") {
							$ses = array(
								'level' => $user['level'],
								'username' => $user['username']);
							$this->session->set_userdata($ses);
							redirect('siswa');
						}
					} else {
						echo "
						<script>
							alert('Password anda salah');
						</script>";
					}
				} else {
					echo "
					<script>
						alert('Akun anda tidak terdaftar');
					</script>";
				}
				echo "
					<script type='text/javascript'>
						window.location.replace(location.origin+/ontest/);
					</script> ";
			}
		} 
	}
	public function aktivasi()
	{
		$username = $this->input->post('Id');
        $email = $this->input->post('Email');
        $data['username'] = $username;
		$data['email'] = $email;
		$user = $this->M_User->getUser($username);

		if (isset($username) && isset($email)) {
			if ($user['active'] == 1) {
				echo "
					<script>
						alert('Akun anda sudah aktif');
					</script>";

			} elseif (filter_var($email, FILTER_VALIDATE_EMAIL) == FALSE) {
				echo "
				<script>
					alert('Email Invalid!');
				</script>
				";
			} else {
				$pass = $this->randomPass();
				$data['password'] = md5($pass);
				$data['active'] = 1;
				if ($this->sendEmail($username, $email, $pass) == TRUE) {
					$this->M_User->updateData($data, $username);
					if ($user['level'] == "Guru") {
						$this->M_Guru->aktivasiGuru($username, $email);
					} else if ($user['level'] == "Siswa") {
						$this->M_Siswa->aktivasiSiswa($username, $email);
					}
					echo "
						<script>
							alert('Akun berhasil diaktivasi silakan cek email anda!');
						</script>
						";
				}
			}
			echo "
					<script type='text/javascript'>
						window.location.replace(location.origin+/ontest/);
					</script> ";
		}
	}
	public function randomPass()
	{
		$char = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
		$str = '';
		for ($i=0; $i < 8; $i++) { 
			$temp = rand(0, strlen($char)-1);
			$str .= $char{$temp};
		}
		return $str;
	}
	public function sendEmail($username, $email, $pass)
	{
		$config = [
			'protocol'	=> 'smtp',
			'smtp_host'	=> 'smtp.gmail.com',
			'smtp_user'	=> 'minadsekul@gmail.com',
			'smtp_pass'	=> 'admin864',
			'smtp_port'	=> 465,
			'mailtype'	=> 'html',
			'wordwrap'	=> TRUE,
			'newline'	=> "\r\n",
			'smtp_crypto'	=> 'ssl',
			'charset'	=> 'utf-8'
		];
		$this->email->initialize($config);
		$this->email->from('no-reply@skripsi.com');
		$this->email->to($email);
		$this->email->subject('Aktivasi Akun Berhasil');
		$this->email->message('
		<html>
			<head>
			</head>
			<body>
				<p>Akun anda telah berhasil diaktifkan, silahkan login menggunakan username dan password berikut<br>
				---------------------------- <br>Username: '.$username.' <br>Password: '.$pass.' <br>----------------------------</p>
			</body>
		</html>
		');
		if (!$this->email->send()) {
			show_error($this->email->print_debugger());
		} else {
			echo "
				<script>
					alert('Akun berhasil diaktifkan');
				</script>
				";
			return true;
		}
	}
	public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }
}
