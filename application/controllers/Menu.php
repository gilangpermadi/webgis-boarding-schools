<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

	public function __construct(){
		parent::__construct();
		is_logged_in();
	}

	public function index() {
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Kelola Menu';

		$data['menu'] = $this->db->get('tb_usermenu')->result_array();

		$this->form_validation->set_rules('menu', 'Menu', 'required');
		$this->form_validation->set_rules('alias', 'Alias', 'required');

		if($this->form_validation->run() == false) {
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/user_sidebar', $data);
			$this->load->view('templates/user_topbar', $data);
			$this->load->view('menu/index', $data);
			$this->load->view('templates/user_footer');
		} else {
			$data = [
				'menu' => $this->input->post('menu'),
				'alias' => $this->input->post('alias')
			];
			$this->db->insert('tb_usermenu', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu baru telah ditambahkan!</div>');
			redirect('menu');
		}
	}

	public function submenu() {
		$data['title'] = 'Kelola Sub-Menu';
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->model('model_menu', 'menu');
		$data['submenu'] = $this->menu->getsubmenu();
		$data['menu'] = $this->db->get('tb_usermenu')->result_array();
		$this->form_validation->set_rules('judul', 'Judul', 'required');
		$this->form_validation->set_rules('id_menu', 'Menu', 'required');
		$this->form_validation->set_rules('url', 'Url', 'required');
		$this->form_validation->set_rules('icon', 'Icon', 'required');

		if($this->form_validation->run() == false) {
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/user_sidebar', $data);
			$this->load->view('templates/user_topbar', $data);
			$this->load->view('menu/submenu', $data);
			$this->load->view('templates/user_footer');	
		} else {
			$data = [
				'judul' => $this->input->post('judul'),
				'id_menu' => $this->input->post('id_menu'),
				'url' => $this->input->post('url'),
				'icon' => $this->input->post('icon'),
				'aktif' => $this->input->post('aktif')
			];
			$this->db->insert('tb_usersubmenu', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sub-Menu baru telah ditambahkan!</div>');
			redirect('menu/submenu');	
		}
		
	}
}