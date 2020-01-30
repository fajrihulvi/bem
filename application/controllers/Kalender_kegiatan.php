<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kalender_kegiatan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Kegiatan_model', 'm_kegiatan');
		if (!$this->session->userdata('nim')) {
            redirect('auth');
        }
	}

	public function index()
	{
		if (!$this->session->userdata('hak_akses') == 'mahasiswa') {
            redirect('home');
        }
		$data['title']  = 'Kalender Kegiatan';
		$data['record'] = $this->m_kegiatan->getAll();
		$data['jenis']  = $this->db->get('jenis_kegiatan')->result_array();
		$data['ormawa'] = $this->db->get('ormawa')->result_array();
		$this->template->load('admin/template', 'master/kalender/kegiatan', $data);
	}

	public function tampilubah()
	{
		echo json_encode($this->m_kegiatan->getById($_POST['id']));
	}

	public function tambah()
	{
		if(isset($_POST['submit'])){
			$config['upload_path'] = 'assets/images/kegiatan';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = '2048'; // kb
            $config['overwrite'] = true;
            $this->load->library('upload', $config);
            $this->upload->do_upload('foto');
            $hasil = $this->upload->data();
            // var_dump($hasil); die;
			$data = [
				'tgl_mulai' => $this->input->post('tgl_mulai'),
				'tgl_selesai' => $this->input->post('tgl_selesai'),
				'nama_kegiatan' => $this->input->post('nama_kegiatan'),
				'id_ormawa' => $this->input->post('ormawa'),
				'id_jenis_kegiatan' => $this->input->post('jenis'),
				'foto' => ($hasil['file_name'] != '')?$hasil['file_name']:''
			];

			if($this->db->insert('kalender_kegiatan', $data)){
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Tambah Data</div>');
            	redirect('kalender_kegiatan');
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Tambah Data!</div>');
            	redirect('kalender_kegiatan');
			}
		}else{
			redirect('kalender_kegiatan');
		}
	}

	public function edit($id)
	{
		if(isset($_POST['submit'])){
			$config['upload_path'] = 'assets/images/kegiatan';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = '2048'; // kb
            $config['overwrite'] = true;
            $this->load->library('upload', $config);
            $this->upload->do_upload('foto');
            $hasil = $this->upload->data();

            if($hasil['file_name'] != ''){
            	$data = [
					'tgl_mulai' => $this->input->post('tgl_mulai'),
					'tgl_selesai' => $this->input->post('tgl_selesai'),
					'nama_kegiatan' => $this->input->post('nama_kegiatan'),
					'id_ormawa' => $this->input->post('ormawa'),
					'id_jenis_kegiatan' => $this->input->post('jenis'),
					'foto' => $hasil['file_name']
				];
            }else{
            	$data = [
					'tgl_mulai' => $this->input->post('tgl_mulai'),
					'tgl_selesai' => $this->input->post('tgl_selesai'),
					'nama_kegiatan' => $this->input->post('nama_kegiatan'),
					'id_ormawa' => $this->input->post('ormawa'),
					'id_jenis_kegiatan' => $this->input->post('jenis')
				];
            }
        	

			if($this->db->update('kalender_kegiatan', $data, ['id' => $id])){
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Ubah Data</div>');
            	redirect('kalender_kegiatan');
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Ubah Data!</div>');
            	redirect('kalender_kegiatan');
			}
		}else{
			redirect('kalender_kegiatan');
		}
	}

	public function hapus($id)
	{
		if ($this->session->userdata('hak_akses') != 'admin') {
            redirect('kalender_kegiatan');
        }
		if($this->db->delete('kalender_kegiatan', ['id' => $id])){
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Hapus Data</div>');
        	redirect('kalender_kegiatan');
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Hapus Data!</div>');
        	redirect('kalender_kegiatan');
		}
	}
}