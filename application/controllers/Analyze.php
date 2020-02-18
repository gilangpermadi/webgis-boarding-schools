<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Analyze extends CI_Controller {

	public function __construct(){
		parent::__construct();
		is_logged_in();
		$this->load->model('Model_ponpes', 'ponpes');
		$this->load->dbforge();
	}

	public function index() {
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Clustering';
		$data['alternatif'] = $this->ponpes->getAlternatif();
		$data['kriteria'] = $this->db->get('kriteria')->result_array();

		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_sidebar', $data);
		$this->load->view('templates/user_topbar', $data);
		$this->load->view('analyze/index', $data);
		$this->load->view('templates/user_footer');	
	}

	public function preproccessing(){
		$dataMentah = $this->ponpes->getDataToNorm();
		$this->_normalisasi($dataMentah);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Dataset berhasil diperbarui!</div>');
		redirect('analyze','refresh');
	}

	private function _normalisasi($fillData){
		$this->db->empty_table('alternatif');
		$maxJS = max(array_column($fillData, 'jumlah_santri'));
		$maxJT = max(array_column($fillData, 'jumlah_tenaga'));
		$maxPP = max(array_column($fillData, 'jumlah_unit'));
		$no = 1;
		foreach ($fillData as $data) {
			$hasil = array(
				'id_alternatif' => $no++,
				'id_dataponpes' => $data['id_ponpes'],
				'x1' => round(($data['jumlah_santri'] / $maxJS), 2),
				'x2' => round(($data['jumlah_tenaga'] / $maxJT), 2),
				'x3' => round(($data['jumlah_unit'] / $maxPP), 2)
			);
			$this->db->insert('alternatif', $hasil);
		}
	}

	private function _cluster($C, $iteration, $w, $eps){
		$points = $this->ponpes->getAlternate();
		$centers = [];
		$jumlahKlaster = $C;
		$maxIter = $iteration;
		$fuzzy = $w;
		$epsilon = $eps;
		$dist = distributeOverMatrixU($points, $fuzzy, $centers, $maxIter, $epsilon, $jumlahKlaster);
		$this->db->empty_table('hasil');
		$no = 1;
		$no2 = 1;
		$idPonpes = [];
		$idData = $this->ponpes->getId();
		foreach ($idData as $id) {
			$hasil = array(
				'id_ponpes' => $id
			);
			array_push($idPonpes, $hasil);
		}
		$final = [];
		foreach ($dist as $d) {
			$hasil = array(
				'id_hasil' => $no++,		
				'c1' => $d[0],
				'c2' => $d[1],
				'c3' => $d[2],
				'id_cluster' => $no2++
			);
			array_push($final, $hasil);
		}
		$dataReal = array_replace_recursive($final, $idData);
		$this->db->insert_batch('hasil', $dataReal);
	}

	public function result(){
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Clustering';
		$jumlahKlaster = $this->input->post('jcluster');
		$maxIter = $this->input->post('maxIter');
		$fuzzy = $this->input->post('bobot');
		$epsilon = $this->input->post('epsilon');


		$this->_cluster($jumlahKlaster, $maxIter, $fuzzy, $epsilon);
		$maxCluster = $this->ponpes->cluster();
		$this->db->empty_table('max_cluster');
		$no = 1;
		$cluster = [];
		foreach ($maxCluster as $val) {
			$max = array(
				'id_cluster' => $no++,
				'max' => $val['Cluster']
			);
			array_push($cluster, $max);
		}
		$this->db->insert_batch('max_cluster', $cluster);


		$data['hasil'] = $this->ponpes->finalDataCluster();
		$data['iterasi'] = $GLOBALS['iterations'];
		$data['fungsiObyektif'] = $GLOBALS['decisions'];
		$data['cluster'] = $jumlahKlaster;
		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_sidebar', $data);
		$this->load->view('templates/user_topbar', $data);
		$this->load->view('analyze/hitung', $data);
		$this->load->view('templates/user_footer');	

	}

	public function showResult(){
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Clustering';

		$data['hasil'] = $this->ponpes->joinHasilPonpes();
		$data['cluster'] = 3;
		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_sidebar', $data);
		$this->load->view('templates/user_topbar', $data);
		$this->load->view('analyze/hasil', $data);
		$this->load->view('templates/user_footer');	
	}

	public function print(){
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

		$data['hasil'] = $this->ponpes->joinHasilPonpes();
		$data['cluster'] = 3;

		$this->load->view('analyze/cetak', $data);
	}

	public function cluster_detail($id)
	{
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Detail';

		$user = $this->ponpes->getPonpesByIdHasil($id);
		$data['company'] = $user;

		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_sidebar', $data);
		$this->load->view('templates/user_topbar', $data);
		$this->load->view('analyze/detail_cluster', $data);
		$this->load->view('templates/user_footer');
	}
}