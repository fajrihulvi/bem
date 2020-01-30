<?php 
class Peminjaman_model extends CI_model{

	public function getAll()
	{
		$this->db->select('kalender_peminjaman.id as kalender_id, kalender_peminjaman.tgl_pinjam, kalender_peminjaman.tgl_kembali, kalender_peminjaman.lama_pinjam, kalender_peminjaman.jumlah, kalender_peminjaman.status, barang.nama_barang, barang.satuan,  ormawa.nama, users.nama as peminjam');
		$this->db->from('kalender_peminjaman');
		$this->db->join('barang', 'barang.id = kalender_peminjaman.id_barang');
		$this->db->join('ormawa', 'ormawa.id = kalender_peminjaman.id_ormawa');
		$this->db->join('users', 'users.nim = kalender_peminjaman.id_peminjam');
		return $this->db->order_by('kalender_peminjaman.id', 'DESC')->get()->result_array();
	}

	public function getById($id)
	{
		$this->db->select('kalender_peminjaman.id as kalender_id, kalender_peminjaman.tgl_pinjam, kalender_peminjaman.tgl_kembali, kalender_peminjaman.lama_pinjam, kalender_peminjaman.jumlah, kalender_peminjaman.status, barang.id as id_barang, barang.satuan, ormawa.id as id_ormawa, users.nim');
		$this->db->from('kalender_peminjaman');
		$this->db->join('barang', 'barang.id = kalender_peminjaman.id_barang');
		$this->db->join('ormawa', 'ormawa.id = kalender_peminjaman.id_ormawa');
		$this->db->join('users', 'users.nim = kalender_peminjaman.id_peminjam');
		$this->db->where('kalender_peminjaman.id', $id);
		return $this->db->get()->row();
	}

}