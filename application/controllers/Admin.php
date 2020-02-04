<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('nim') || $this->session->userdata('hak_akses') == 'mahasiswa' ) {
            redirect('auth');
        }
        $this->load->library('pagination');
		date_default_timezone_set('Asia/Jakarta');
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
		$data['jmlAspirasi'] = $this->db->get('aspirasi')->num_rows();
		$data['jmlOrmawa']   = $this->db->get('ormawa')->num_rows();
		$data['jmluser']     = $this->db->get('users')->num_rows();
		$this->template->load('admin/template', 'admin/index', $data);
	}

	public function show_notif()
	{
		$data['title'] = 'Semua Notifikasi';
		$config['base_url'] = site_url('admin/show_notif'); //site url
		$config['total_rows'] = $this->db->count_all('notifikasi'); //total row
        $config['per_page'] = 10;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
 
        // Membuat Style pagination untuk BootStrap v4
      	$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
 
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
 
        //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
        $data['notif'] = $this->db->order_by('id', 'DESC')->get('notifikasi',$config["per_page"], $data['page'])->result_array();           
 
        $data['pagination'] = $this->pagination->create_links();
		$this->template->load('admin/template', 'admin/notifikasi', $data);
	}

	public function notif_clear()
	{
		if($this->db->update('notifikasi', ['status' => '1'])){
			redirect('admin');
		}else{
			redirect('admin');
		}
	}

	public function notif_read()
	{
		if($this->db->update('notifikasi', ['status' => '1'], ['id' => $_POST['id']])){
			$result = [
				'status' => true
			];
			echo json_encode($result);
		}else{
			$result = [
				'status' => false
			];
			echo json_encode($result);
		}
	}

	public function hapus_notif()
	{
		if($this->db->empty_table('notifikasi')){
			redirect('admin/show_notif');
		}else{
			redirect('admin/show_notif');
		}
	}

}