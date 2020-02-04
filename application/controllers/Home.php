<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('nim')) {
            redirect('auth');
        }
        //load libary pagination
        $this->load->library('pagination');
        $this->load->helper('engine');
 
        //load the department_model
        $this->load->model('Informasi_model', 'm_informasi');
        $this->load->model('Akademik_model', 'm_akademik');
        $this->load->model('Kegiatan_model', 'm_kegiatan');
        $this->load->model('Peminjaman_model', 'm_pinjam');
    }

	public function index()
	{
		$data['active'] = 'index';
		$this->template->load('home/template','home/index',$data);
	}

	public function kalender_akademik()
	{
		$data['active']   = 'kalender';
        if (isset($_POST['submit'])) {
            $semester   = $this->input->post('semester');
            $tahun_ajar = $this->input->post('tahun_ajar');
            $data['kalender'] = (object)[
                'semester' => $semester,
                'tahun_ajar' => $tahun_ajar
            ];
            $data['jenis']    = $this->m_akademik->getJenis($semester, $tahun_ajar);
        }elseif(isset($_POST['download'])){
            $semester   = $this->input->post('semester');
            $tahun_ajar = $this->input->post('tahun_ajar');
            $data['kalender'] = (object)[
                'semester' => $semester,
                'tahun_ajar' => $tahun_ajar
            ];
            $data['jenis']    = $this->m_akademik->getJenis($semester, $tahun_ajar);
            $this->load->library('pdf');
            $this->pdf->setPaper('A3', 'potrait');
            $this->pdf->filename = "kalender-akademik.pdf";
            $this->pdf->load_view('home/cetak/kalender_akademik', $data);
        }else{
            $data['kalender'] = $this->db->order_by('id', 'DESC')->get('kalender_akademik')->row();
            $semester   = $data['kalender']->semester;
            $tahun_ajar = $data['kalender']->tahun_ajar;
            $data['jenis']    = $this->m_akademik->getJenis($semester, $tahun_ajar);
        }
		$this->template->load('home/template','home/kalender_akademik',$data);
        
	}

	public function kalender_kegiatan()
	{
		$data['active']   = 'kalender';
        if (isset($_POST['submit'])) {
            $data['bulan'] = $this->input->post('bulan');
            $data['tahun'] = $this->input->post('tahun');
            $data['kegiatan'] = $this->m_kegiatan->getKegiatanTgl($data['bulan'], $data['tahun']);
            // var_dump($data); die;
        }elseif(isset($_POST['download'])){
            $data['bulan'] = $this->input->post('bulan');
            $data['tahun'] = $this->input->post('tahun');
            $data['kegiatan'] = $this->m_kegiatan->getKegiatanTgl($data['bulan'], $data['tahun']);

            $this->load->library('pdf');
            $this->pdf->setPaper('A3', 'potrait');
            $this->pdf->filename = "kalender-kegiatan.pdf";
            $this->pdf->load_view('home/cetak/kalender_kegiatan', $data);
        }else{
            $data['bulan'] = date('m');
            $data['tahun'] = date('Y');
            $data['kegiatan'] = $this->m_kegiatan->getKegiatanTgl($data['bulan'], $data['tahun']);
        }
		$this->template->load('home/template','home/kalender_kegiatan',$data);
	}

	public function kalender_peminjaman()
	{
		$data['active'] = 'kalender';
        if (isset($_POST['submit'])) {
            $data['bulan'] = $this->input->post('bulan');
            $data['tahun'] = $this->input->post('tahun');
            $data['peminjaman'] = $this->m_pinjam->getByTgl($data['bulan'], $data['tahun']);
            // var_dump($data); die;
        }elseif(isset($_POST['download'])){
            $data['bulan'] = $this->input->post('bulan');
            $data['tahun'] = $this->input->post('tahun');
            $data['peminjaman'] = $this->m_pinjam->getByTgl($data['bulan'], $data['tahun']);

            $this->load->library('pdf');
            $this->pdf->setPaper('A3', 'potrait');
            $this->pdf->filename = "kalender-peminjaman.pdf";
            $this->pdf->load_view('home/cetak/kalender_peminjaman', $data);
        }else{
            $data['bulan'] = date('m');
            $data['tahun'] = date('Y');
            $data['peminjaman'] = $this->m_pinjam->getByTgl($data['bulan'], $data['tahun']);
        }
		$this->template->load('home/template','home/kalender_peminjaman',$data);
	}

    public function ajukan_pinjam()
    {
        if(isset($_POST['submit-form'])){
            $user = $this->db->get_where('users', ['nim' => $this->session->userdata('nim')])->row();

            $id_barang = $this->input->post('barang');
            $barang = $this->db->get_where('barang', ['id' => $id_barang])->row();
            $stok = [
                'stok' => $barang->stok - (int)$this->input->post('jumlah'),
            ];  
            // var_dump($stok); die;
            $this->db->update('barang', $stok, ['id'=>$id_barang]);
            $data = [
                'tgl_pinjam' => $this->input->post('tgl_pinjam'),
                'lama_pinjam' => $this->input->post('lama_pinjam'),
                'id_barang' => $this->input->post('barang'),
                'jumlah' => $this->input->post('jumlah'),
                'id_peminjam' => $user->nim,
                'id_ormawa' => $user->id_ormawa,
                'status' => '0',
                'isAccept' => 'pending'
            ];
            $notif = [
                'judul' => 'Peminjaman',
                'isi'   => $user->nama.' mengajukan peminjaman',
                'link'  => 'permintaan_pinjam',
                'status'=> '0'
            ];

            if($this->db->insert('kalender_peminjaman', $data) && $this->db->insert('notifikasi', $notif)){
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><strong>Berhasil</strong>, silahkan menunggu konfirmasi dari admin</div>');
                redirect('home/ajukan_pinjam');
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal mengajukan peminjaman!</div>');
                redirect('home/ajukan_pinjam');
            }
        }else{
            $data['active'] = 'kalender';
            $data['barang'] = $this->db->get_where('barang', ['stok !='=> 0])->result_array();
            $this->template->load('home/template','home/ajukan_peminjaman',$data);
        }
    }

	public function informasi()
	{
		$data['title']  = '';
		$data['active'] = 'informasi';

		$config['base_url'] = site_url('home/informasi'); //site url
		$config['total_rows'] = $this->db->count_all('informasi'); //total row
        $config['per_page'] = 3;  //show record per halaman
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
        $data['data'] = $this->m_informasi->getData($config["per_page"], $data['page']);           
 
        $data['pagination'] = $this->pagination->create_links();
		$this->template->load('home/template','home/informasi',$data);
	}

    public function aspirasi()
    {
        if(isset($_POST['submit-form'])){
            date_default_timezone_set('Asia/Jakarta');
            $date = date('m/d/Y h:i:s a', time());
            $user = $this->db->get_where('users', ['nim' => $this->session->userdata('nim')])->row();
            $data = [
                'tanggal' => date('Y-m-d'),
                'id_jenis_aspirasi' => $this->input->post('jenis'),
                'id_ormawa' => $user->id_ormawa,
                'isi' => $this->input->post('isi')
            ];
            $notif = [
                'judul' => 'Aspirasi',
                'isi'   => $user->nama.' menambah aspirasi',
                'link'  => 'aspirasi',
                'status'=> '0'
            ];

            // var_dump($data); die;
            if($this->db->insert('aspirasi', $data) && $this->db->insert('notifikasi', $notif)){
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><strong>Berhasil</strong>, aspirasi telah disampaikan</div>');
                redirect('home/aspirasi');
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><strong>Gagal</strong>, aspirasi gagal disampaikan</div>');
                redirect('home/aspirasi');
            }
        }else{
            $data['active'] = 'aspirasi';
            $data['record'] = $this->db->get('jenis_aspirasi')->result_array();
            $this->template->load('home/template','home/aspirasi',$data);
        }
    }

}