<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('nim')) {
            redirect('home');
        }

        $this->form_validation->set_rules('nim', 'nim', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            // $this->template->load('home/template', 'auth/m_login', $data);
            $this->load->view('auth/m_login', $data);
        } else {
            // validasinya success
            $this->_login();
        }
    }


    private function _login()
    {
        $nim = $this->input->post('nim');
        $password = $this->input->post('password');

        $user = $this->db->get_where('users', ['nim' => $nim])->row_array();

        // jika usernya ada
        if ($user) {
            // cek password
            if (password_verify($password, $user['password'])) {
                $data = [
                    'nim'  => $user['nim'],
                    'nama' => $user['nama'],
                    'hak_akses' => $user['hak_akses']
                ];
                $this->session->set_userdata($data);
                redirect('admin');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Salah Password!</div>');
                redirect('auth');
            }
        }else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">NIM Belum Terdaftar!</div>');
            redirect('auth');
        }
    }


    public function admin_login()
    {
        if ($this->session->userdata('nim')) {
            redirect('home');
        }

        $this->form_validation->set_rules('nim', 'nim', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->template->load('auth/template', 'auth/admin_login', $data);
        } else {
            // validasinya success
            $this->_login();
        }
    }


    public function registration()
    {
        if ($this->session->userdata('nim')) {
            redirect('home');
        }

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('nim', 'NIM', 'required|trim|is_unique[users.nim]', [
            'is_unique' => 'NIM Telah Terdaftar!'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('no_telp', 'No Telepon', 'required|trim');
        $this->form_validation->set_rules('ormawa', 'Ormawa', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|matches[konfir-password]', [
            'matches' => 'Password Tidak Cocok!',
            'min_length' => 'Password Terlalu Pendek!'
        ]);
        $this->form_validation->set_rules('konfir-password', 'Konfirmasi Password', 'required|trim|matches[password]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Register';
            $data['ormawa'] = $this->db->get('ormawa')->result_array();
            $this->template->load('auth/template', 'auth/m_register', $data);
        } else {
            $nim = $this->input->post('nim', true);
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'nim' => htmlspecialchars($nim),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'no_telp' => htmlspecialchars($this->input->post('no_telp', true)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'id_ormawa' => htmlspecialchars($this->input->post('ormawa', true)),
                'hak_akses' => 'mahasiswa'
            ];
            $notif = [
                'judul' => 'Registrasi',
                'isi'   => $this->input->post('nama').' berhasil mendaftar',
                'link'  => 'user',
                'status'=> '0'
            ];
            if($this->db->insert('users', $data) && $this->db->insert('notifikasi', $notif)){
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat!<br>Akun anda berhasil dibuat</div>');
                redirect('auth');
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Maaf! Akun anda gagal dibuat</div>');
                redirect('auth');
            }
            
        }
    }


    private function _sendnim($token, $type)
    {
        $config = [
            'protocol'  => 'smtp', 
            'smtp_host' => 'ssl://smtp.googlnim.com',
            'smtp_user' => 'kelompok2tekan@gmail.com',
            'smtp_pass' => 'kelompok2imut',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];

        $this->email->initialize($config);

        $this->email->from('wpunpas@gmail.com', 'Web Programming UNPAS');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {
            $this->email->subject('Account Verification');
            $this->email->message('Click this link to verify you account : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
        } else if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Click this link to reset your password : <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }


    public function verify()
    {
        $nim = $this->input->get('nim');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['nim' => $nim])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('nim', $nim);
                    $this->db->update('user');

                    $this->db->delete('user_token', ['nim' => $nim]);

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $nim . ' has been activated! Please login.</div>');
                    redirect('auth');
                } else {
                    $this->db->delete('user', ['nim' => $nim]);
                    $this->db->delete('user_token', ['nim' => $nim]);

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Token expired.</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong token.</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong nim.</div>');
            redirect('auth');
        }
    }


    public function logout()
    {
        $this->session->unset_userdata('nim');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('hak_akses');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
        redirect('auth');
    }


    public function blocked()
    {
        $this->load->view('auth/blocked');
    }

    public function notfound()
    {
        $this->load->view('auth/404');
    }

    public function forgotPassword()
    {
        $this->form_validation->set_rules('nim', 'nim', 'trim|required|valid_nim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Forgot Password';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/forgot-password');
            $this->load->view('templates/auth_footer');
        } else {
            $nim = $this->input->post('nim');
            $user = $this->db->get_where('user', ['nim' => $nim, 'is_active' => 1])->row_array();

            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'nim' => $nim,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('user_token', $user_token);
                $this->_sendnim($token, 'forgot');

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Please check your nim to reset your password!</div>');
                redirect('auth/forgotpassword');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">nim is not registered or activated!</div>');
                redirect('auth/forgotpassword');
            }
        }
    }


    public function resetPassword()
    {
        $nim = $this->input->get('nim');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['nim' => $nim])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                $this->session->set_userdata('reset_nim', $nim);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed! Wrong token.</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed! Wrong nim.</div>');
            redirect('auth');
        }
    }


    public function changePassword()
    {
        if (!$this->session->userdata('reset_nim')) {
            redirect('auth');
        }

        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[3]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Change Password';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/change-password');
            $this->load->view('templates/auth_footer');
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $nim = $this->session->userdata('reset_nim');

            $this->db->set('password', $password);
            $this->db->where('nim', $nim);
            $this->db->update('user');

            $this->session->unset_userdata('reset_nim');

            $this->db->delete('user_token', ['nim' => $nim]);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password has been changed! Please login.</div>');
            redirect('auth');
        }
    }
}
