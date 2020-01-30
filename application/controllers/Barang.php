<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller
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
		$data['title'] = 'Barang';
		$data['record'] = $this->db->order_by('id', 'DESC')->get('barang')->result_array();
		$this->template->load('admin/template', 'master/barang/index', $data);
	}

	public function tampilubah()
	{
		echo json_encode($this->db->get_where('barang', ['id'=>$_POST['id']])->row());
	}

	public function tambah()
	{
		if(isset($_POST['submit'])){

			$data = [
				'kode_barang' => $this->input->post('kode_barang'),
				'nama_barang' => $this->input->post('nama_barang'),
				'stok' => $this->input->post('stok'),
				'satuan' => $this->input->post('satuan')
			];

			if($this->db->insert('barang', $data)){
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Tambah Data</div>');
            	redirect('barang');
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Tambah Data!</div>');
            	redirect('barang');
			}
		}else{
			redirect('barang');
		}
	}

	public function edit($id)
	{
		if(isset($_POST['submit'])){
			$data = [
				'kode_barang' => $this->input->post('kode_barang'),
				'nama_barang' => $this->input->post('nama_barang'),
				'stok' => $this->input->post('stok'),
				'satuan' => $this->input->post('satuan')
			];

			if($this->db->update('barang', $data, ['id' => $id])){
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Ubah Data</div>');
            	redirect('barang');
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Ubah Data!</div>');
            	redirect('barang');
			}
		}else{
			redirect('barang');
		}
	}

	public function hapus($id)
	{
		if ($this->session->userdata('hak_akses') != 'admin') {
            redirect('barang');
        }
		if($this->db->delete('barang', ['id' => $id])){
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Hapus Data</div>');
        	redirect('barang');
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Hapus Data!</div>');
        	redirect('barang');
		}
	}

}