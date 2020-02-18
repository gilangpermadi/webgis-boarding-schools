<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index() {
		if($this->session->userdata('email')) {
			if($this->session->userdata('role_id') == 1) {
				redirect('admin');
			} else {
				redirect('user');
			}
		}
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if($this->form_validation->run() == false) {
			$data['title'] = 'User - Login';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('templates/auth_footer');
		} else {
			$this->_login();
		}
	}

	private function _login() {
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('tb_user', ['email' => $email])->row_array();
		// pengguna tersedia
		if($user) {
			// pengguna aktif
			if($user['is_active'] == 1) {
				// penguna terverifikasi 
				if($user['status'] == 1) {
					// cek kata sandi
					if(password_verify($password, $user['password'])) {
						$data = [
							'email' => $user['email'],
							'role_id' => $user['role_id'],
							'nspp' => $user['nspp']
						];
						$this->session->set_userdata($data);
						// role_id
						if($user['role_id'] == 1) {
							redirect('admin');
						} else {
							redirect('user');
						}
					} else {
						$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kata sandi salah!</div>');
						redirect('auth');
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun belum terverifikasi. Hubungi Administrator untuk mendapatkan verifikasi!</div>');
					redirect('auth');	
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum teraktivasi!</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum terdaftar!</div>');
			redirect('auth');
		}
	}

	private function _sendEmail($token, $type){
		$config = [
			'protocol'  => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'ponpeskabmojo@gmail.com',
			'smtp_pass' => 'Adminponpes123',
			'smtp_port' => 465,
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'newline'   => "\r\n"

		];
		$this->email->initialize($config);
		$this->email->from('ponpeskabmojo@gmail.com', 'Admin Ponpes');
		$this->email->to($this->input->post('email'));
		if($type == 'verify'){
			$this->email->subject('Verifikasi Akun');
			$this->email->message('Klik link ini untuk verifikasi akun Anda: <a 
				href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Aktivasi</a>');
		} elseif($type == 'forgot'){
			$this->email->subject('Atur Ulang Kata Sandi');
			$this->email->message('Klik link ini untuk mengatur ulang kata sandi akun Anda: <a 
				href="' . base_url() . 'auth/reset_password?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Atur Ulang</a>');
		}
		if($this->email->send()){
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}

	public function regist() {
		if($this->session->userdata('email')) {
			if($this->session->userdata('role_id') == 1) {
				redirect('admin');
			} else {
				redirect('user');
			}
		}
		$this->form_validation->set_rules('nspp', 'NSPP', 'required|trim', [
			'required' => 'Nomor Statistik Lembaga wajib diisi'
		]);
		$this->form_validation->set_rules('name', 'Name', 'required|trim',[
			'required' => 'Nama Lengkap wajib diisi'
		]);
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tb_user.email]', [
			'required' => 'Email wajib diisi',
			'is_unique' => 'Email ini sudah terdaftar'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
			'required' => 'Kata Sandi wajib diisi',
			'matches' => 'Kata Sandi tidak sama',
			'min_length' => 'Kata Sandi terlalu pendek'
		]);
		$this->form_validation->set_rules('nip', 'NoPeg', 'trim|required', [
			'required' => 'NIP wajib diisi'
		]);
		$this->form_validation->set_rules('almt', 'Alamat', 'trim|required', [
			'required' => 'Alamat wajib diisi'
		]);
		$this->form_validation->set_rules('tgl_lhr', 'Tgl', 'trim|required', [
			'required' => 'Tanggal Lahir wajib diisi'
		]);
		$this->form_validation->set_rules('telp', 'Telp', 'trim|required', [
			'required' => 'No. Telepon wajib diisi'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
		if($this->form_validation->run() == false) {
			$data['title'] = 'User - Registrasi';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/regist');
			$this->load->view('templates/auth_footer');
		} else {
			$nspp = $this->input->post('nspp');
			$lembaga = $this->db->get_where('dataponpes', ['nspp' => $nspp])->row_array();
			// jika lembaga ada
			if($lembaga){
				$data = [
					'nama' => htmlspecialchars($this->input->post('name', true)),
					'email' => htmlspecialchars($this->input->post('email', true)),
					'gambar' => 'default.jpg',
					'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
					'role_id' => 2,
					'nspp' => $nspp,
					'nip' => $this->input->post('nip'),
					'almt' => htmlspecialchars($this->input->post('almt', true)),
					'tgl_lhr' => $this->input->post('tgl_lhr'),
					'telp' => $this->input->post('telp'),
					'is_active' => 0,
					'tgl_buat' => time()
				];
				$token = base64_encode(random_bytes(32));
				$user_token = [
					'email' => $this->input->post('email'),
					'token' => $token,
					'date_created' => time()
				];
				$this->db->insert('tb_user', $data);
				$this->db->insert('tb_usertoken', $user_token);
				$this->_sendEmail($token, 'verify');
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! Akun Anda telah dibuat. Silahkan aktivasi akun Anda!</div>');
				redirect('auth');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Nomor Statistik tidak tersedia. Bantuan? Hubungi administrator</div>');
				redirect('auth/regist');
			}
		}
	}

	public function verify(){
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('tb_user', ['email' => $email])->row_array();
		if($user){
			$user_token = $this->db->get_where('tb_usertoken', ['token' => $token])->row_array();
			if($user_token){
				if(time() - $user_token['date_created'] < (60 * 60 * 24)) {
					$this->db->set('is_active', 1);
					$this->db->where('email', $email);
					$this->db->update('tb_user');

					$this->db->delete('tb_usertoken', ['email' => $email]);
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email . ' telah diaktivasi! Silahkan masuk</div>');
					redirect('auth');
				} else {
					$this->db->delete('tb_user', ['email' => $email]);
					$this->db->delete('tb_usertoken', ['email' => $email]);
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Aktivasi akun Anda gagal! Token kedaluwarsa</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Aktivasi akun Anda gagal! Token salah</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Aktivasi akun Anda gagal! Email salah</div>');
			redirect('auth');
		}
	}

	public function default() {
		if($this->session->userdata('role_id') == 1) {
			redirect('admin');
		} elseif($this->session->userdata('role_id') == 2) {
			redirect('user');
		}
		else {
			redirect('auth');
		}
	}

	public function logout() {
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		$this->session->unset_userdata('id_ponpes');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda telah keluar dari akun!</div>');
		redirect('auth');
	}

	public function blocked() {
		$this->load->view('auth/blocked');
	}

	public function forgot_password(){
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		if ($this->form_validation->run() == false) {
			$data['title'] = 'User - Forgot Password';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/forgot_password');
			$this->load->view('templates/auth_footer');
		} else {
			$email = $this->input->post('email');
			$user = $this->db->get_where('tb_user', ['email' => $email, 'is_active' => 1])->row_array();

			if($user){
				$token = base64_encode(random_bytes(32));
				$user_token = [
					'email' => $email,
					'token' => $token,
					'date_created' => time()
				];

				$this->db->insert('tb_usertoken', $user_token);
				$this->_sendEmail($token, 'forgot');

				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Cek email Anda untuk mengatur ulang kata sandi!</div>');
				redirect('auth/forgot_password');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum terdaftar atau aktivasi!</div>');
				redirect('auth/forgot_password');
			}
		}
	}

	public function reset_password(){
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('tb_user', ['email' => $email])->row_array();
		if($user){
			$user_token = $this->db->get_where('tb_usertoken', ['token' => $token])->row_array();
			if($user_token){
				$this->session->set_userdata('reset_email', $email);
				$this->change_password();
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Atur Ulang Kata Sandi Gagal. Token  salah!</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Atur Ulang Kata Sandi Gagal. Email salah!</div>');
			redirect('auth');
		}
	}

	public function change_password(){
		if(!$this->session->userdata('reset_email')){
			redirect('auth');
		}
		$this->form_validation->set_rules('password1', 'Kata Sandi', 'trim|required|min_length[3]|matches[password1]');
		$this->form_validation->set_rules('password2', 'Ulangi Kata Sandi', 'trim|required|min_length[3]|matches[password2]');
		if ($this->form_validation->run() == false) {
			$data['title'] = 'User - Change Password';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/change_password');
			$this->load->view('templates/auth_footer');
		} else {
			$password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
			$email = $this->session->userdata('reset_email');

			$this->db->set('password', $password);
			$this->db->where('email', $email);
			$this->db->update('tb_user');

			$this->session->unset_userdata('reset_email');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kata Sandi berhasil diubah!</div>');
			redirect('auth');
		}

	}
}
