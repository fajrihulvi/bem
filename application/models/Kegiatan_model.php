<?php 
class Kegiatan_model extends CI_model{

	public function getAll()
	{
		$this->db->select('kalender_kegiatan.id as kalender_id, kalender_kegiatan.tgl_mulai, kalender_kegiatan.tgl_selesai, kalender_kegiatan.nama_kegiatan, kalender_kegiatan.foto, jenis_kegiatan.id as jenis_id, jenis_kegiatan.jenis, ormawa.nama as nama_ormawa');
		$this->db->from('kalender_kegiatan');
		$this->db->join('jenis_kegiatan', 'jenis_kegiatan.id = kalender_kegiatan.id_jenis_kegiatan');
		$this->db->join('ormawa', 'ormawa.id = kalender_kegiatan.id_ormawa');
		return $this->db->order_by('kalender_kegiatan.id', 'DESC')->get()->result_array();
	}

	public function getById($id)
	{
		$this->db->select('kalender_kegiatan.id as kalender_id, kalender_kegiatan.tgl_mulai, kalender_kegiatan.tgl_selesai, kalender_kegiatan.nama_kegiatan, kalender_kegiatan.foto, jenis_kegiatan.id as jenis_id, jenis_kegiatan.jenis, ormawa.nama as nama_ormawa, ormawa.id as id_ormawa');
		$this->db->from('kalender_kegiatan');
		$this->db->join('jenis_kegiatan', 'jenis_kegiatan.id = kalender_kegiatan.id_jenis_kegiatan');
		$this->db->join('ormawa', 'ormawa.id = kalender_kegiatan.id_ormawa');
		$this->db->where('kalender_kegiatan.id', $id);
		return $this->db->order_by('kalender_kegiatan.id', 'DESC')->get()->row();
	}

	public function getKegiatanTgl($bulan, $tahun)
	{
		$this->db->select('kalender_kegiatan.tgl_mulai, kalender_kegiatan.tgl_selesai, kalender_kegiatan.nama_kegiatan, jenis_kegiatan.jenis, ormawa.nama as nama_ormawa');
		$this->db->from('kalender_kegiatan');
		$this->db->join('jenis_kegiatan', 'jenis_kegiatan.id = kalender_kegiatan.id_jenis_kegiatan');
		$this->db->join('ormawa', 'ormawa.id = kalender_kegiatan.id_ormawa');
		$this->db->order_by('kalender_kegiatan.tgl_mulai', 'DESC');
		$this->db->where('MONTH(tgl_mulai)', $bulan);
		$this->db->where('YEAR(tgl_mulai)', $tahun);
		return $this->db->get()->result_array();
	}

}