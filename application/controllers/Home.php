<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
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
		$data['title'] = 'Keluarga Besar Mahasiswa STT-PLN';
		$this->load->view('home/index',$data);
	}

}