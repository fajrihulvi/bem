<?php 
class Akademik_model extends CI_model{

	public function getAll()
	{
		$this->db->select('kalender_akademik.id as kalender_id, kalender_akademik.tgl_mulai, kalender_akademik.tgl_selesai, kalender_akademik.keterangan, , kalender_akademik.tahun_ajar, jenis_akademik.id as jenis_id, jenis_akademik.jenis');
		$this->db->from('kalender_akademik');
		$this->db->join('jenis_akademik', 'jenis_akademik.id = kalender_akademik.id_jenis');
		return $this->db->order_by('kalender_akademik.id', 'DESC')->get()->result_array();
	}

	public function getById($id)
	{
		$this->db->select('kalender_akademik.id as kalender_id, kalender_akademik.tgl_mulai, kalender_akademik.tgl_selesai, kalender_akademik.keterangan, , kalender_akademik.tahun_ajar, jenis_akademik.id as jenis_id, jenis_akademik.jenis');
		$this->db->from('kalender_akademik');
		$this->db->join('jenis_akademik', 'jenis_akademik.id = kalender_akademik.id_jenis');
		$this->db->where('kalender_akademik.id', $id);
		return $this->db->get()->row();
	}

}