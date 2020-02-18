<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
	public function __construct(){
		parent::__construct();
		$this->load->model('Model_geojsonFeature', 'feature');
	}

	public function index() {
		$this->load->view('templates/main_header');
		$this->load->view('templates/main_navbar');
		$this->load->view('main/content');
		$this->load->view('templates/main_footer');
	}

	public function geoJSON(){
		$data = $this->db->get('dataponpes')->result_array();
		echo geoJSON($data);
	}

	public function geoJsonWilayahKab(){
		$data = $this->feature->getWilayahKab();
		echo geoJSON($data);
	}

	public function geoJsonWilayahKota(){
		$data = $this->feature->getWilayahKota();
		echo geoJSON($data);
	}

	public function geoJsonC1(){
		$data = $this->feature->getC1();
		echo geoJSON($data);
	}

	public function geoJsonC2(){
		$data = $this->feature->getC2();
		echo geoJSON($data);
	}

	public function geoJsonC3(){
		$data = $this->feature->getC3();
		echo geoJSON($data);
	}

	public function map(){
		$this->load->view('templates/main_header');
		$this->load->view('templates/main_navbar');
		$this->load->view('main/map');
		$this->load->view('templates/main_footer');
	}

	public function about(){
		$this->load->view('templates/main_header');
		$this->load->view('templates/main_navbar');
		$this->load->view('main/about');
		$this->load->view('templates/main_footer');
	}

	public function contact(){
		$this->load->view('templates/main_header');
		$this->load->view('templates/main_navbar');
		$this->load->view('main/contact');
		$this->load->view('templates/main_footer');
	}
}
