<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Aspirasi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Aspirasi_model', 'm_aspirasi');
		if (!$this->session->userdata('nim')) {
            redirect('auth');
        }
	}

	public function index()
	{
		if ($this->session->userdata('hak_akses') == 'mahasiswa') {
            redirect('home');
        }
		$data['title'] = 'Aspirasi';
		$data['record'] = $this->m_aspirasi->getAll();
		$this->template->load('admin/template', 'master/aspirasi/index', $data);
	}

	public function tambah()
	{
		if(isset($_POST['submit'])){

			$data = [
				'tanggal' => $this->input->post('tanggal'),
				'id_jenis_aspirasi' => $this->input->post('jenis'),
				'id_ormawa' => $this->input->post('ormawa'),
				'isi' => $this->input->post('isi')
			];

			if($this->db->insert('aspirasi', $data)){
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Tambah Data</div>');
            	redirect('aspirasi');
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Tambah Data!</div>');
            	redirect('aspirasi');
			}
		}else{
			$data['title'] = 'Tambah aspirasi';
			$data['jenis'] = $this->db->get('jenis_aspirasi')->result_array();
			$data['ormawa'] = $this->db->get('ormawa')->result_array();
			$this->template->load('admin/template', 'master/aspirasi/tambah', $data);
		}
	}

	public function edit($id)
	{
		if(isset($_POST['submit'])){
			
			$data = [
				'tanggal' => $this->input->post('tanggal'),
				'id_jenis_aspirasi' => $this->input->post('jenis'),
				'id_ormawa' => $this->input->post('ormawa'),
				'isi' => $this->input->post('isi')
			];
			
			if($this->db->update('aspirasi', $data, ['id' => $id])){
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Ubah Data</div>');
            	redirect('aspirasi');
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Ubah Data!</div>');
            	redirect('aspirasi');
			}
		}else{
			$data['title'] = 'Ubah aspirasi';
			$data['aspirasi'] = $this->m_aspirasi->getById($id);
			$data['jenis'] = $this->db->get('jenis_aspirasi')->result_array();
			$data['ormawa'] = $this->db->get('ormawa')->result_array();
			// var_dump($data['aspirasi']); die;
			$this->template->load('admin/template', 'master/aspirasi/edit', $data);
		}
	}

	public function hapus($id)
	{
		if ($this->session->userdata('hak_akses') != 'admin') {
            redirect('aspirasi');
        }
		if($this->db->delete('aspirasi', ['id' => $id])){
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Hapus Data</div>');
        	redirect('aspirasi');
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Hapus Data!</div>');
        	redirect('aspirasi');
		}
	}

}