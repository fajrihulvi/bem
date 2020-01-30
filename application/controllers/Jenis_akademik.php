<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_akademik extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('nim')) {
            redirect('auth');
        }
	}
	
	public function index()
	{
		if (!$this->session->userdata('hak_akses') == 'mahasiswa') {
            redirect('home');
        }
		$data['title'] = 'Jenis Akademik';
		$data['record'] = $this->db->order_by('id', 'DESC')->get('jenis_akademik')->result_array();
		$this->template->load('admin/template', 'master/jenis_akademik/index', $data);
	}

	public function tampilubah()
	{
		echo json_encode($this->db->get_where('jenis_akademik', ['id'=>$_POST['id']])->row());
	}

	public function tambah()
	{
		if(isset($_POST['submit'])){

			$data = [
				'jenis' => $this->input->post('jenis')
			];

			if($this->db->insert('jenis_akademik', $data)){
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Tambah Data</div>');
            	redirect('jenis_akademik');
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Tambah Data!</div>');
            	redirect('jenis_akademik');
			}
		}else{
			redirect('jenis_akademik');
		}
	}

	public function edit()
	{
		if(isset($_POST['submit'])){
			$id = $this->input->post('id');
			$data = [
				'jenis' => $this->input->post('jenis')
			];

			if($this->db->update('jenis_akademik', $data, ['id' => $id])){
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Ubah Data</div>');
            	redirect('jenis_akademik');
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Ubah Data!</div>');
            	redirect('jenis_akademik');
			}
		}else{
			redirect('jenis_akademik');
		}
	}

	public function hapus($id)
	{
		if ($this->session->userdata('hak_akses') != 'admin') {
            redirect('jenis_akademik');
        }
		if($this->db->delete('jenis_akademik', ['id' => $id])){
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Hapus Data</div>');
        	redirect('jenis_akademik');
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Hapus Data!</div>');
        	redirect('jenis_akademik');
		}
	}

}