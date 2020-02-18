<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_autonumber extends CI_Model {

	function __construct(){
		parent::__construct();
	}
	
	public function kodePonpes()
	{
		$this->db->select('RIGHT(dataponpes.id_ponpes, 4) as kode', FALSE);
		$this->db->order_by('id_ponpes', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('dataponpes');
		if($query->num_rows() <> 0){
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		} else {
			$kode = 1;
		}

		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
		$createKode = "P".$kodemax;
		return $createKode;
	}

	

}

/* End of file Model_autonumber.php */
/* Location: ./application/models/Model_autonumber.php */