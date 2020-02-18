<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GIS extends CI_Controller {

	public function index()
	{
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Peta';

		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_sidebar', $data);
		$this->load->view('templates/user_topbar', $data);
		$this->load->view('gis/index', $data);
		$this->load->view('templates/user_footer');	
	}
}

/* End of file GIS.php */
/* Location: ./application/controllers/GIS.php */