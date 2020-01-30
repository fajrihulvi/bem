<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model', 'users');
		if (!$this->session->userdata('nim')) {
            redirect('auth');
        }
	}

	public function index()
	{
		if (!$this->session->userdata('hak_akses') == 'mahasiswa') {
            redirect('home');
        }
		$data['title'] = 'Data User';
		$data['users'] = $this->db->get('users')->result_array();
		$this->template->load('admin/template', 'user/index', $data);
	}

	public function profile()
	{
		if (!$this->session->userdata('hak_akses') == 'mahasiswa') {
            redirect('home');
        }
		$data['title'] = 'Profil User';
		$data['user'] = $this->db->get_where('users', ['nim' => $this->session->userdata('nim')])->row();
		$this->template->load('admin/template', 'user/profile', $data);
	}

	public function ubah_pass()
	{
		$data['title'] = 'Ubah Password';

		$this->form_validation->set_rules('pass_lama', 'Password Lama', 'trim|required');
		$this->form_validation->set_rules('pass_baru', 'Password Baru', 'trim|required|min_length[3]|matches[konfir_pass]');
		$this->form_validation->set_rules('konfir_pass', 'Konfirmasi Password', 'trim|required|min_length[3]|matches[pass_baru]');
		
		if($this->form_validation->run() == TRUE){
			$pass_lama = $this->db->get_where('users', ['nim' => $this->session->userdata('nim')])->row()->password;
			$inputpass = $this->input->post('pass_lama');
			$pass_baru = password_hash($this->input->post('pass_baru'), PASSWORD_DEFAULT);
			if(password_verify($inputpass, $pass_lama)){
				$data = [
					'password' => $pass_baru
				];
				if($this->db->update('users', $data, ['nim' => $this->session->userdata('nim')])){
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Ubah Password</div>');
					redirect('user/ubah_pass', 'refresh');
				}else{
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Ubah Password Gagal!</div>');
					redirect('user/ubah_pass', 'refresh');
				}

			}else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Password Lama Salah!</div>');
				redirect('user/ubah_pass', 'refresh');
			}
		}else{
			$this->template->load('admin/template', 'user/ubah_pass', $data);
		}
	}

	public function tampilubah()
	{
		if (!$this->ion_auth->is_admin()){
			redirect('home', 'refresh');
		}
		echo json_encode($this->db->get_where('users', ['id' => $_POST['id']])->row());
	}

	public function edit()
	{

		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('nim', 'NIM', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('no_telp', 'No Telepon', 'trim|required');

		if ($this->form_validation->run() === TRUE)
		{
			$data = [
				'nama' => $this->input->post('nama'),
				'email' => $this->input->post('email'),
				'no_telp' => $this->input->post('no_telp'),
			];
			$this->db->where('nim', $this->input->post('nim'));
			$this->db->update('users', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil Ubah Data!</div>');
			redirect('user/profile', 'refresh');
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert"> Gagal Ubah Data!</div>');
			redirect('user/profile', 'refresh');
		}
	}

	public function hapus($id)
	{
		if ($this->session->userdata('hak_akses') != 'admin') {
            redirect('auth/blocked');
        }
		
		if($this->db->delete('users', ['id' => $id])){
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil Hapus Data!</div>');
			redirect('user', 'refresh');
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Gagal Hapus Data!</div>');
			redirect('user', 'refresh');
		}
	}

}