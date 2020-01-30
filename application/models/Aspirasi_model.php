<?php 
class Aspirasi_model extends CI_model{

	public function getAll()
	{
		$this->db->select('aspirasi.id as aspirasi_id, aspirasi.tanggal, aspirasi.isi, jenis_aspirasi.id as jenis_id,
		jenis_aspirasi.jenis, ormawa.id as ormawa_id, ormawa.nama as nama_ormawa');
		$this->db->from('aspirasi');
		$this->db->join('jenis_aspirasi', 'jenis_aspirasi.id = aspirasi.id_jenis_aspirasi');
		$this->db->join('ormawa', 'ormawa.id = aspirasi.id_ormawa');
		return $this->db->order_by('aspirasi_id', 'DESC')->get()->result_array();
	}

	public function getById($id)
	{
		$this->db->select('aspirasi.id as aspirasi_id, aspirasi.tanggal, aspirasi.isi, jenis_aspirasi.id as jenis_id,
		jenis_aspirasi.jenis, ormawa.id as ormawa_id, ormawa.nama as nama_ormawa');
		$this->db->from('aspirasi');
		$this->db->join('jenis_aspirasi', 'jenis_aspirasi.id = aspirasi.id_jenis_aspirasi');
		$this->db->join('ormawa', 'ormawa.id = aspirasi.id_ormawa');
		$this->db->where('aspirasi.id', $id);
		return $this->db->order_by('aspirasi_id', 'DESC')->get()->row();
	}

}