<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		is_logged_in();
		$this->load->model('Model_ponpes');
	}

	public function index() {
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Profil Saya';
		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_sidebar', $data);
		$this->load->view('templates/user_topbar', $data);
		$this->load->view('user/index', $data);
		$this->load->view('templates/user_footer');
	}

	public function edit() {
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Ubah Profil';

		$this->form_validation->set_rules('name', 'Nama Lengkap', 'required|trim');

		if($this->form_validation->run() == false) {
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/user_sidebar', $data);
			$this->load->view('templates/user_topbar', $data);
			$this->load->view('user/edit', $data);
			$this->load->view('templates/user_footer');
		} else {
			$name = $this->input->post('name');
			$email = $this->input->post('email');
			// Jika unggah gambar
			$unggah = $_FILES['image']['name'];
			
			if($unggah) {
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '2048';
				$config['upload_path'] = './assets/img/profile/';

				$this->load->library('upload', $config);

				if($this->upload->do_upload('image')) {
					$lama = $data['user']['gambar'];
					if($lama != 'default.jpg') {
						unlink(FCPATH . 'assets/img/profile/' . $lama);
					}
					$baru = $this->upload->data('file_name');
					$this->db->set('gambar', $baru);
				} else {
					echo $this->upload->display_errors();
				}

			}

			$this->db->set('nama', $name);
			$this->db->where('email', $email);
			$this->db->update('tb_user');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profil Anda telah di ubah!</div>');
			redirect('user');
		}
	}

	public function changePassword() {
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Ganti Kata Sandi';

		$this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
		$this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
		$this->form_validation->set_rules('new_password2', 'New Password', 'required|trim|min_length[3]|matches[new_password1]');

		if($this->form_validation->run() == false) {
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/user_sidebar', $data);
			$this->load->view('templates/user_topbar', $data);
			$this->load->view('user/changepassword', $data);
			$this->load->view('templates/user_footer');
		} else {
			$current_password = $this->input->post('current_password');
			$new_password = $this->input->post('new_password1');
			if(!password_verify($current_password, $data['user']['password'])) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kata Sandi Lama salah</div>');
				redirect('user/changepassword');
			} else {
				if($current_password == $new_password) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kata Sandi Baru tidak boleh sama</div>');
					redirect('user/changepassword');
				} else {
					$password_hash = password_hash($new_password, PASSWORD_DEFAULT);
					$this->db->set('password', $password_hash);
					$this->db->where('email', $this->session->userdata('email'));
					$this->db->update('tb_user');

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kata Sandi telah di ubah!</div>');
					redirect('user/changepassword');
				}
			}
		}		
	}

	public function profile_company(){
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Profil Lembaga';
		$data['company'] = $this->db->get_where('dataponpes', ['nspp' => $this->session->userdata('nspp')])->row_array();

		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_sidebar', $data);
		$this->load->view('templates/user_topbar', $data);
		$this->load->view('user/profil_lembaga', $data);
		$this->load->view('templates/user_footer');
	}

	public function change_company() {
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Edit Pondok Pesantren';
		$data['company'] = $this->db->get_where('dataponpes', ['nspp' => $this->session->userdata('nspp')])->row_array();

		$data['dataKecamatan'] = $this->db->get('kecamatan')->result_array();
		$data['dataProgram'] = $this->db->get('program_pendidikan')->result_array();
		$data['dataDaerah'] = $this->db->get('daerah')->result_array();
		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_sidebar', $data);
		$this->load->view('templates/user_topbar', $data);
		$this->load->view('user/edit_lembaga', $data);
		$this->load->view('templates/user_footer');
	}

	public function update_data(){
		$data_unit = $this->input->post('program');
		if($data_unit == null){
			$unit = 0;
		} else {
			$unit = sizeof($data_unit);
		}
		$countUnit = $this->db->where('id_ponpes', $this->input->post('id'))->from('ponpes_unit')->count_all_results() + $unit;
		$data = [
			'nspp' => $this->input->post('nspp'),
			'nama_ponpes' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'id_kecamatan' => $this->input->post('kecamatan'),
			'tgl_berdiri' => $this->input->post('tanggal'),
			'yayasan' => $this->input->post('yayasan'),
			'id_daerah' => $this->input->post('daerah'),
			'jumlah_santri' => $this->input->post('jsantri'),
			'jumlah_tenaga' => $this->input->post('jtenaga'),
			'jumlah_unit' => $countUnit,
			'lat' => $this->input->post('lat'),
			'lon' => $this->input->post('lon'),
			'pengupdate' => $this->input->post('updater'),
			'tgl_update' => time()
		];

		$where = [
			'id_ponpes' => $this->input->post('id')
		];
		if($data_unit){
			foreach ($data_unit as $unit) {
				$add_unit = array(
					'id_ponpes' => $this->input->post('id'),
					'nama_unit' => $unit
				);
				$this->db->insert('ponpes_unit', $add_unit);
			}
		} else {
			$this->Model_ponpes->update($where, $data, 'dataponpes');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data telah di ubah!</div>');
			redirect('user/change_company','refresh');
		}

		$this->Model_ponpes->update($where, $data, 'dataponpes');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data telah di ubah!</div>');
		redirect('user/change_company','refresh');
	}

	public function print_company(){
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['company'] = $this->db->get_where('dataponpes', ['nspp' => $this->session->userdata('nspp')])->row_array();
		$id = $this->db->get_where('dataponpes', ['nspp' => $this->session->userdata('nspp')])->row_array();
		$data['unit'] = $this->db->get_where('ponpes_unit', ['id_ponpes' => $id['id_ponpes']])->result_array();

		$this->load->view('user/cetak_lembaga', $data);
	}
}