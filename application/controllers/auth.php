<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->form_validation->set_rules('email', 'Email address', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Login Page';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('templates/auth_footer');
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();
		if ($user) {
			//usernya ada
			if ($user['is_active'] == 1) {
				//cek password
				if (password_verify($password, $user['password'])) {
					$data = [
						'email' => $user['email'],
						'role_id' => $user['role_id'],
					];
					$this->session->set_userdata($data);
					if ($user['role_id'] == 1) {
						redirect('admin');
					} elseif ($user['role_id'] == 2) {
						redirect('user');
					} elseif ($user['role_id'] == 3) {
						redirect('ketua');
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger text-white font-weight-bold" role="alert">
			Kata sandi salah!</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger text-white font-weight-bold" role="alert">
			Akun ini belum diregistrasi!</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger text-white font-weight-bold" role="alert">
			Akun tidak teregistrasi!</div>');
			redirect('auth');
		}
	}

	public function registration()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
			'matches' => 'Kata sandi harus sama!',
			'min_length' => 'Kata sandi terlalu pendek!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');


		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Registration';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/registration');
			$this->load->view('templates/auth_footer');
		} else {
			$email = $this->input->post('email', true);
			$data = [
				'name' => htmlspecialchars($this->input->post('name', true)),
				'email' => htmlspecialchars($email),
				'image' => 'default.jpg',
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' => 2,
				'is_active' => 0,
				'date_created' => time()
			];


			// token
			$token = base64_encode(random_bytes(32));
			$user_token = [
				'email' => $email,
				'token' => $token,
				'date_created' => time()
			];

			$this->db->insert('user', $data);
			$this->db->insert('user_token', $user_token);

			$this->_sendEmail($token, 'verify');

			$this->session->set_flashdata('message', '<div class="alert alert-success text-white font-weight-bold" role="alert">
			Selamat! Akun kamu sudah diregistrasi, Aktivasi akun kamu sekarang!</div>');
			redirect('auth');
		}
	}

	private function _sendEmail($token, $type)
	{
		$config = [
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'razifrosadi@gmail.com',
			'smtp_pass' => 'nhaf zusj pucr tchq',
			'smtp_port' => 465,
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n"
		];

		$this->load->library('email', $config);
		$this->email->initialize($config);

		$this->email->from('razifrosadi@gmail.com', 'razifrosadi');
		$this->email->to($this->input->post('email'));

		if($type == 'verify'){
			$this->email->subject('Verifikasi akun anda!');
			$this->email->message('Klik link berikut untuk verifikasi akun anda: <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Aktifasi</a>');
		}


		if($this->email->send()) {
			return true;
		}else {
			echo $this->email->print_debugger();
			die;
		}
	}

	public function verify()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		if($user) {
			$user_token = $this->db->get_where('user_token', ['token' => $token])
			->row_array();

			if($user_token) {
				if(time() - $user_token['date_created'] < (60*60*24)) {
					$this->db->set('is_active', 1);
					$this->db->where('email', $email);
					$this->db->update('user');

					$this->db->delete('user_token', ['email' => $email]);

					$this->session->set_flashdata('message', '<div class="alert alert-success text-white font-weight-bold" role="alert">
					'. $email .' telah diaktivasi, masuk sekarang!</div>');
					redirect('auth');
				} else {

					$this->db->delete('user', ['email' => $email]);
					$this->db->delete('user_token', ['email' => $email]);

					$this->session->set_flashdata('message', '<div class="alert alert-danger text-white font-weight-bold" role="alert">
					Aktifasi akun anda gagal! token kadaluarsa.</div>');
					redirect('auth');
				}
			} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger text-white font-weight-bold" role="alert">
			Aktifasi akun anda gagal! token invalid.</div>');
			redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger text-white font-weight-bold" role="alert">
			Aktifasi akun anda gagal! email salah.</div>');
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('message', '<div class="alert alert-success text-white font-weight-bold" role="alert">
			Anda telah keluar!</div>');
		redirect('auth');
	}

	public function blocked()
	{
		$this->load->view('auth/blocked');
	}
}
