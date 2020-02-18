<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Model_ponpes extends CI_Model
{	
	public function getPonpes()
	{
		$kueri = "SELECT `dataponpes`.*, `daerah`.`jenis_daerah`,`kecamatan`.`kec`
				  FROM ((`dataponpes`
				  JOIN `daerah` ON `dataponpes`.`id_daerah` = `daerah`.`id_daerah`)
				  JOIN `kecamatan` ON `dataponpes`.`id_kecamatan` = `kecamatan`.`id_kecamatan`) ORDER BY `id_ponpes` ASC";
    	return $this->db->query($kueri)->result_array();
	}

	public function test(){
		$this->db->select('dataponpes.*, kecamatan.kec');
		$this->db->from('dataponpes');
		$this->db->join('kecamatan', 'dataponpes.id_kecamatan = kecamatan.id_kecamatan');
		$query = $this->db->get();
		return $query;
	}

	public function getPonpesById($id)
	{
		$query = $this->db->get_where('dataponpes', array('id_ponpes' => $id ))->row_array();
		return $query;
	}

	public function getAlternate() {
		$query = "SELECT `id_alternatif`, `id_dataponpes`, `x1`, `x2`, `x3`
					FROM `alternatif` ORDER BY `id_dataponpes` ASC";
					return $this->db->query($query)->result();
	}

	public function getDataToNorm() {
		$query = "SELECT `id_ponpes`, `jumlah_santri`, `jumlah_tenaga`, `jumlah_unit`
					FROM `dataponpes` ORDER BY `id_ponpes` ASC";
		return $this->db->query($query)->result_array();
	}

	public function editPonpesById($where, $table){
		return $this->db->get_where($table, $where);
	}

	public function update($where, $data, $table){
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	public function hapus_data($where, $table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function user() {
		$query = "select `tb_user`.*, `dataponpes`.*
				  from (`tb_user`
				  join `dataponpes` on `tb_user`.`nspp` = `dataponpes`.`nspp`)";
		return $this->db->query($query)->result_array();
	}

	public function approved(){
		$query = "SELECT COUNT(IF(`status` = 1 AND `role_id` = 2, `status`, NULL)) AS `stts`
					FROM `tb_user`";
		return $this->db->query($query)->row_array();
	}

	public function pending(){
		$query = "SELECT COUNT(IF(`status` = 0 AND `role_id` = 2, `status`, NULL)) AS `stts`
					FROM `tb_user`";
		return $this->db->query($query)->row_array();
	}

	public function totalOperator(){
		$query = "SELECT COUNT(IF(`role_id` = 2, `status`, NULL)) AS `stts`
					FROM `tb_user`";
		return $this->db->query($query)->row_array();
	}	

	public function getUserById($id)
	{
		$query = $this->db->get_where('tb_user', array('id' => $id ))->row_array();
		return $query;
	}

	public function id_ponpes(){
		$query = "SELECT `id_ponpes` FROM `dataponpes` ORDER BY `id_ponpes` ASC";
		return $this->db->query($query)->result_array();
	}

	public function cluster(){
		$query = "SELECT CASE greatest(c1, c2, c3)
				          WHEN c1      THEN 'C1'
				          WHEN c2      THEN 'C2'
				          WHEN c3      THEN 'C3'
				       END AS Cluster
					FROM hasil ORDER BY id_hasil";
		return $this->db->query($query)->result_array();
	}

	public function finalDataCluster(){
		$query = "SELECT `hasil`.*, `max_cluster`.`max`
					FROM (`hasil`
					JOIN `max_cluster` ON `hasil`.`id_cluster` = `max_cluster`.`id_cluster`)
					ORDER BY `id_hasil` ASC";
		return $this->db->query($query)->result_array();
	}

	public function getUnitById($id){
		$query = "SELECT * FROM `ponpes_unit` WHERE `id_ponpes` = '". $id ."'";
		$this->db->query($query)->result_array();
	}

	public function getId(){
		$query = "SELECT `id_ponpes` FROM `dataponpes` ORDER BY `id_ponpes` ASC";
		return $this->db->query($query)->result_array();
	}

	public function getAlternatif(){
		$query = "SELECT `alternatif`.*,`dataponpes`.`nama_ponpes`
					FROM (`alternatif`
					JOIN `dataponpes` ON `alternatif`.`id_dataponpes` = `dataponpes`.`id_ponpes`)
					ORDER BY `id_alternatif` ASC";
		return $this->db->query($query)->result_array();
	}

	public function joinHasilPonpes(){
		$this->db->select('*');
		$this->db->from('hasil');
		$this->db->join('dataponpes', 'dataponpes.id_ponpes = hasil.id_ponpes');
		$this->db->join('max_cluster', 'max_cluster.id_cluster = hasil.id_cluster');
		return $this->db->get()->result_array();
	}

	public function chart(){
		$query = "SELECT `max`, COUNT(*) AS `nilai`
					FROM 	`max_cluster`
					GROUP BY `max`";
		return $this->db->query($query)->result_array();
	}

	public function getPonpesByIdHasil($id)
	{
		$query = $this->db->get_where('hasil', array('id_hasil' => $id ))->row_array();
		return $query;
	}
}