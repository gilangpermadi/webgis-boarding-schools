<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_geojsonFeature extends CI_Model {
	public function getWilayahKab(){
		$query = "SELECT * FROM `dataponpes`
					WHERE `id_daerah` = 1";
		return $this->db->query($query)->result_array();
	}
	public function getWilayahKota(){
		$query = "SELECT * FROM `dataponpes`
					WHERE `id_daerah` = 2";
		return $this->db->query($query)->result_array();
	}
	public function getC1(){
		$query = "SELECT *
					FROM ((`hasil`
					JOIN `dataponpes` ON `hasil`.`id_ponpes` = `dataponpes`.`id_ponpes`)
					JOIN `max_cluster` ON `hasil`.`id_cluster` = `max_cluster`.`id_cluster`)
					WHERE `max` = 'C1' ORDER BY `id_hasil` ASC";
		return $this->db->query($query)->result_array();
	}

	public function getC2(){
		$query = "SELECT *
					FROM ((`hasil`
					JOIN `dataponpes` ON `hasil`.`id_ponpes` = `dataponpes`.`id_ponpes`)
					JOIN `max_cluster` ON `hasil`.`id_cluster` = `max_cluster`.`id_cluster`)
					WHERE `max` = 'C2' ORDER BY `id_hasil` ASC";
		return $this->db->query($query)->result_array();
	}

	public function getC3(){
		$query = "SELECT *
					FROM ((`hasil`
					JOIN `dataponpes` ON `hasil`.`id_ponpes` = `dataponpes`.`id_ponpes`)
					JOIN `max_cluster` ON `hasil`.`id_cluster` = `max_cluster`.`id_cluster`)
					WHERE `max` = 'C3' ORDER BY `id_hasil` ASC";
		return $this->db->query($query)->result_array();
	}


	

}

/* End of file Model_geojsonFeature.php */
/* Location: ./application/models/Model_geojsonFeature.php */ ?>