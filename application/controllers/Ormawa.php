<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ormawa extends CI_Controller
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
		$data['title'] = 'Ormawa';
		$data['record'] = $this->db->order_by('id', 'DESC')->get('ormawa')->result_array();
		$this->template->load('admin/template', 'master/ormawa/index', $data);
	}

	public function tampilubah()
	{
		echo json_encode($this->db->get_where('ormawa', ['id'=>$_POST['id']])->row());
	}

	public function tambah()
	{
		if(isset($_POST['submit'])){
			$config['upload_path'] = 'assets/images/ormawa/logo/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = '2048'; // kb
            $config['overwrite'] = true;
            $this->load->library('upload', $config);
            $this->upload->do_upload('foto');
            $hasil = $this->upload->data();

			$data = [
				'nama' => $this->input->post('nama_ormawa'),
				'logo' => $hasil['file_name']
			];

			if($this->db->insert('ormawa', $data)){
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Tambah Data</div>');
            	redirect('ormawa');
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Tambah Data!</div>');
            	redirect('ormawa');
			}
		}else{
			redirect('ormawa');
		}
	}

	public function edit($id)
	{
		if(isset($_POST['submit'])){

			$config['upload_path'] = 'assets/images/ormawa/logo/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = '2048'; // kb
            $config['overwrite'] = true;
            $this->load->library('upload', $config);
            $this->upload->do_upload('foto');
            $hasil = $this->upload->data();

            if($hasil['file_name'] != ''){
            	$data = [
					'nama' => $this->input->post('nama_ormawa'),
					'logo' => $hasil['file_name']
				];
            }else{
            	$data = [
					'nama' => $this->input->post('nama_ormawa')
				];
            }

			if($this->db->update('ormawa', $data, ['id' => $id])){
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Ubah Data</div>');
            	redirect('ormawa');
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Ubah Data!</div>');
            	redirect('ormawa');
			}
		}else{
			redirect('ormawa');
		}
	}

	public function hapus($id)
	{
		if ($this->session->userdata('hak_akses') != 'admin') {
            redirect('ormawa');
        }
		if($this->db->delete('ormawa', ['id' => $id])){
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Hapus Data</div>');
        	redirect('ormawa');
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Hapus Data!</div>');
        	redirect('ormawa');
		}
	}
}