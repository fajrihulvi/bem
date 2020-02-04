<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Permintaan_pinjam extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Peminjaman_model', 'm_peminjaman');
		if (!$this->session->userdata('nim')) {
            redirect('auth');
        }
	}

	public function index()
	{
		if ($this->session->userdata('hak_akses') == 'mahasiswa') {
            redirect('home');
        }
		$data['title']  = 'Permintaan Peminjaman';
		$data['record'] = $this->m_peminjaman->getMinta();
		$this->template->load('admin/template', 'master/kalender/permintaan_pinjam', $data);
	}

	public function terima()
	{
		if ($this->session->userdata('hak_akses') == 'mahasiswa') {
            redirect('home');
        }
		$data = [
			'isAccept' => 'diterima'
		];
		if($this->db->update('kalender_peminjaman', $data, ['id' => $_POST['id']])){
			$result = [
				'status' => true,
				'message'=> 'Permintaan Peminjaman disetujui'
			];
		}else{
			$result = [
				'status' => false,
				'message'=> 'Permintaan Peminjaman Gagal di Ubah'
			];
		}
		echo json_encode($result);
	}

	public function tolak()
	{
		if ($this->session->userdata('hak_akses') == 'mahasiswa') {
            redirect('home');
        }

        $data = [
			'isAccept' => 'ditolak'
		];
		if($this->db->update('kalender_peminjaman', $data, ['id' => $_POST['id']])){
			$result = [
				'status' => true,
				'message'=> 'Permintaan Peminjaman ditolak'
			];
		}else{
			$result = [
				'status' => false,
				'message'=> 'Permintaan Peminjaman Gagal di Ubah'
			];
		}
		echo json_encode($result);
	}

	public function tambah()
	{
		if(isset($_POST['submit'])){
			$lama_pinjam = (int)$this->input->post('lama_pinjam');
			$tgl_pinjam  = $this->input->post('tgl_pinjam');
			$tgl_kembali = date('m-d-Y', strtotime('+'.$lama_pinjam.' days', strtotime($tgl_pinjam)));

			$id_barang = $this->input->post('barang');
			$barang = $this->db->get_where('barang', ['id' => $id_barang])->row();
			$stok = [
				'stok' => $barang->stok - (int)$this->input->post('jumlah'),
			];	
			// var_dump($stok); die;
			$this->db->update('barang', $stok, ['id'=>$id_barang]);
			$data = [
				'tgl_pinjam' => $tgl_pinjam,
				'tgl_kembali' => $tgl_kembali,
				'lama_pinjam' => $lama_pinjam,
				'id_barang' => $this->input->post('barang'),
				'jumlah' => $this->input->post('jumlah'),
				'id_peminjam' => $this->input->post('peminjam'),
				'id_ormawa' => $this->input->post('ormawa'),
				'status' => '0',
			];

			if($this->db->insert('kalender_peminjaman', $data)){
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Tambah Data</div>');
            	redirect('kalender_peminjaman');
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Tambah Data!</div>');
            	redirect('kalender_peminjaman');
			}
		}else{
			redirect('kalender_peminjaman');
		}
	}

	public function edit($id)
	{
		if(isset($_POST['submit'])){
			$lama_pinjam = (int)$this->input->post('lama_pinjam');
			$tgl_pinjam  = $this->input->post('tgl_pinjam');
			$tgl_kembali = date('m-d-Y', strtotime('+'.$lama_pinjam.' days', strtotime($tgl_pinjam)));

			$id_barang = $this->input->post('barang');
			$barang = $this->db->get_where('barang', ['id' => $id_barang])->row();
			$stok = [
				'stok' => $barang->stok - (int)$this->input->post('jumlah'),
			];	
			// var_dump($stok); die;
			$this->db->update('barang', $stok, ['id'=>$id_barang]);
			$data = [
				'tgl_pinjam' => $tgl_pinjam,
				'tgl_kembali' => $tgl_kembali,
				'lama_pinjam' => $lama_pinjam,
				'id_barang' => $this->input->post('barang'),
				'jumlah' => $this->input->post('jumlah'),
				'id_peminjam' => $this->input->post('peminjam'),
				'id_ormawa' => $this->input->post('ormawa'),
				'status' => $this->input->post('status')
			];
			
			if($this->db->update('kalender_peminjaman', $data, ['id' => $id])){
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Ubah Data</div>');
            	redirect('kalender_peminjaman');
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Ubah Data!</div>');
            	redirect('kalender_peminjaman');
			}
		}else{
			redirect('kalender_peminjaman');
		}
	}

	public function hapus($id)
	{
		if ($this->session->userdata('hak_akses') != 'admin') {
            redirect('auth/blocked');
        }
		if($this->db->delete('kalender_peminjaman', ['id' => $id])){
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Hapus Data</div>');
        	redirect('kalender_peminjaman');
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Hapus Data!</div>');
        	redirect('kalender_peminjaman');
		}
	}
}