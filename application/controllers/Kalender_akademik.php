<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kalender_akademik extends CI_Controller
{	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Akademik_model', 'm_akademik');
		if (!$this->session->userdata('nim')) {
            redirect('auth');
        }
	}

	public function index()
	{
		if (!$this->session->userdata('hak_akses') == 'mahasiswa') {
            redirect('home');
        }
		$data['title'] = 'Kalender Akademik';
		$data['record'] =  $this->m_akademik->getAll();
		$data['jenis'] = $this->db->get('jenis_akademik')->result_array();
		$this->template->load('admin/template', 'master/kalender/akademik', $data);
	}

	public function tampilubah()
	{
		echo json_encode($this->m_akademik->getById($_POST['id']));
	}

	public function tambah()
	{
		if(isset($_POST['submit'])){

			$data = [
				'tgl_mulai' => $this->input->post('tgl_mulai'),
				'tgl_selesai' => $this->input->post('tgl_selesai'),
				'id_jenis' => $this->input->post('jenis'),
				'keterangan' => $this->input->post('keterangan'),
				'tahun_ajar' => $this->input->post('tahun_ajar')
			];

			if($this->db->insert('kalender_akademik', $data)){
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Tambah Data</div>');
            	redirect('kalender_akademik');
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Tambah Data!</div>');
            	redirect('kalender_akademik');
			}
		}else{
			redirect('kalender_akademik');
		}
	}

	public function edit($id)
	{
		if(isset($_POST['submit'])){
			$data = [
				'tgl_mulai' => $this->input->post('tgl_mulai'),
				'tgl_selesai' => $this->input->post('tgl_selesai'),
				'id_jenis' => $this->input->post('jenis'),
				'keterangan' => $this->input->post('keterangan'),
				'tahun_ajar' => $this->input->post('tahun_ajar')
			];
			// var_dump($id); die;
			if($this->db->update('kalender_akademik', $data, ['id' => $id])){
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Ubah Data</div>');
            	redirect('kalender_akademik');
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Ubah Data!</div>');
            	redirect('kalender_akademik');
			}
		}else{
			redirect('kalender_akademik');
		}
	}

	public function hapus($id)
	{
		if ($this->session->userdata('hak_akses') != 'admin') {
            redirect('kalender_akademik');
        }
		if($this->db->delete('kalender_akademik', ['id' => $id])){
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Hapus Data</div>');
        	redirect('kalender_akademik');
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Hapus Data!</div>');
        	redirect('kalender_akademik');
		}
	}
}