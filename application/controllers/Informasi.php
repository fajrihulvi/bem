<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi extends CI_Controller
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
		$data['title'] = 'Informasi';
		$data['record'] = $this->db->order_by('id', 'DESC')->get('informasi')->result_array();
		$this->template->load('admin/template', 'master/informasi/index', $data);
	}

	public function tambah()
	{
		if(isset($_POST['submit'])){
			$config['upload_path'] = 'assets/images/informasi';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = '2048'; // kb
            $config['overwrite'] = true;
            $this->load->library('upload', $config);
            $this->upload->do_upload('foto');
            $hasil = $this->upload->data();
            // var_dump($hasil); die;
			$data = [
				'tanggal' => $this->input->post('tanggal'),
				'judul' => $this->input->post('judul'),
				'isi' => $this->input->post('isi'),
				'foto' => $hasil['file_name']
			];

			if($this->db->insert('informasi', $data)){
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Tambah Data</div>');
            	redirect('informasi');
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Tambah Data!</div>');
            	redirect('informasi');
			}
		}else{
			$data['title'] = 'Tambah Informasi';
			$this->template->load('admin/template', 'master/informasi/tambah', $data);
		}
	}

	public function edit($id)
	{
		if(isset($_POST['submit'])){
			$config['upload_path'] = 'assets/images/informasi';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = '2048'; // kb
            $config['overwrite'] = true;
            $this->load->library('upload', $config);
            $this->upload->do_upload('foto');
            $hasil = $this->upload->data();
            if($hasil['file_name'] != ''){
            	$data = [
					'tanggal' => $this->input->post('tanggal'),
					'judul' => $this->input->post('judul'),
					'isi' => $this->input->post('isi'),
					'foto' => $hasil['file_name']
				];
            }else{
            	$data = [
					'tanggal' => $this->input->post('tanggal'),
					'judul' => $this->input->post('judul'),
					'isi' => $this->input->post('isi')
				];
            }
			
			if($this->db->update('informasi', $data, ['id' => $id])){
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Ubah Data</div>');
            	redirect('informasi');
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Ubah Data!</div>');
            	redirect('informasi');
			}
		}else{
			$data['title'] = 'Tambah Informasi';
			$data['informasi'] = $this->db->get_where('informasi', ['id' => $id])->row();
			$this->template->load('admin/template', 'master/informasi/edit', $data);
		}
	}

	public function hapus($id)
	{
		if ($this->session->userdata('hak_akses') != 'admin') {
            redirect('informasi');
        }
		if($this->db->delete('informasi', ['id' => $id])){
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Hapus Data</div>');
        	redirect('informasi');
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Hapus Data!</div>');
        	redirect('informasi');
		}
	}

}