<?php 
class Akademik_model extends CI_model{

	public function getAll()
	{
		$this->db->select('kalender_akademik.id as kalender_id, kalender_akademik.tgl_mulai, kalender_akademik.tgl_selesai, kalender_akademik.keterangan, kalender_akademik.semester , kalender_akademik.tahun_ajar, jenis_akademik.id as jenis_id, jenis_akademik.jenis');
		$this->db->from('kalender_akademik');
		$this->db->join('jenis_akademik', 'jenis_akademik.id = kalender_akademik.id_jenis');
		return $this->db->order_by('kalender_akademik.id', 'DESC')->get()->result_array();
	}

	public function getById($id)
	{
		$this->db->select('kalender_akademik.id as kalender_id, kalender_akademik.tgl_mulai, kalender_akademik.tgl_selesai, kalender_akademik.keterangan, kalender_akademik.semester, kalender_akademik.tahun_ajar, jenis_akademik.id as jenis_id, jenis_akademik.jenis');
		$this->db->from('kalender_akademik');
		$this->db->join('jenis_akademik', 'jenis_akademik.id = kalender_akademik.id_jenis');
		$this->db->where('kalender_akademik.id', $id);
		return $this->db->get()->row();
	}

	public function getJenis($semester, $tahun_ajar)
	{
		$this->db->select('kalender_akademik.id, kalender_akademik.tgl_mulai, kalender_akademik.tgl_selesai, jenis_akademik.id as id_jenis, jenis_akademik.jenis');
		$this->db->from('kalender_akademik');
		$this->db->join('jenis_akademik', 'jenis_akademik.id = kalender_akademik.id_jenis');
		$this->db->group_by('jenis');
		$this->db->order_by('kalender_akademik.tgl_mulai');
		$this->db->where('kalender_akademik.semester', $semester);
		$this->db->where('kalender_akademik.tahun_ajar', $tahun_ajar);
		return $this->db->order_by('kalender_akademik.id', 'DESC')->get()->result_array();
	}

	public function getDataJenis($id)
	{
		$this->db->select('kalender_akademik.id, kalender_akademik.tgl_mulai, kalender_akademik.tgl_selesai, jenis_akademik.id as id_jenis, kalender_akademik.keterangan');
		$this->db->from('kalender_akademik');
		$this->db->join('jenis_akademik', 'jenis_akademik.id = kalender_akademik.id_jenis');
		$this->db->order_by('kalender_akademik.tgl_mulai');
		$this->db->where('jenis_akademik.id', $id);
		return $this->db->order_by('kalender_akademik.id', 'DESC')->get()->result_array();
	}

}