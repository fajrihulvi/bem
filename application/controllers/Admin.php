<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('nim') || $this->session->userdata('hak_akses') == 'mahasiswa' ) {
            redirect('auth');
        }
    }

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['jmlBarang']   = $this->db->get('barang')->num_rows();
		$data['jmlPinjam']   = $this->db->get_where('kalender_peminjaman', ['status' => '0'])->num_rows();
		$data['jmlKembali']  = $this->db->get_where('kalender_peminjaman', ['status' => '1'])->num_rows();
		$data['jmlKegiatan'] = $this->db->get_where('kalender_kegiatan')->num_rows();
		$data['kegiatanSelesai'] = $this->db->get_where('kalender_kegiatan', ['tgl_selesai <=' => date('Y-m-d')])->num_rows();
		$data['kegiatanMendatang'] = $this->db->get_where('kalender_kegiatan', ['tgl_mulai >=' => date('Y-m-d')])->num_rows();
		$this->template->load('admin/template', 'admin/index', $data);
	}

}