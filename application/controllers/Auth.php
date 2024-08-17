<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model','userrole');
    }
    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('Auth');
        }
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email',[
            'valid_email' => 'Email harus valid',
            'required' => 'email wajib di isi'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required',[
            'required' => 'Password wajib di isi'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view("auth/auth_header");
            $this->load->view("auth/login");
            $this->load->view("auth/auth_footer");
        } else {
            $this->cek_login();
        }
    }
    public function registrasi()
{
    if ($this->session->userdata('email')) {
        redirect('LayananLab');
    }

    $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
        'is_unique' => 'Email ini sudah terdaftar!',
        'valid_email' => 'Email Harus Valid',
        'required' => 'Email wajib di isi'
    ]);
    $this->form_validation->set_rules(
        'password1',
        'Password',
        'required|trim|min_length[5]|matches[password2]',
        [
            'matches' => 'Password Tidak Sama',
            'min_length' => 'Password Terlalu Pendek',
            'required' => 'Password harus diisi'
        ]
    );
    $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
    
    if ($this->form_validation->run() == false) {
        $data['title'] = 'Registrasi';
        $this->load->view('auth/auth_header', $data);
        $this->load->view('auth/registrasi');
        $this->load->view('auth/auth_footer');
    } else {
        $hashed_password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'password' => $hashed_password,
            'gambar' => 'default.jpg',
            'role' => 'Admin',
            'date_created' => time()
        ];

        $this->userrole->insert($data);
        log_message('debug', 'User registered with email: ' . $data['email'] . ' and hashed password: ' . $hashed_password);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! Akunmu telah berhasil terdaftar. Silahkan Login!</div>');
        redirect('Auth');
    }
}



public function cek_login()
{
    $email = $this->input->post('email');
    $password = $this->input->post('password');
    $user = $this->db->get_where('user', ['email' => $email])->row_array();

    if ($user) {
        log_message('debug', 'User found with email: ' . $email);
        log_message('debug', 'User password from database: ' . $user['password']);
        // Jika pengguna ditemukan
        if (password_verify($password, $user['password'])) {
            log_message('debug', 'Password verification successful for email: ' . $email);
            // Jika password benar
            $data = [
                'email' => $user['email'],
                'role' => $user['role'],
                'id' => $user['id'],
                'nama' => $user['nama'] // Tambahkan nama admin ke session
            ];
            $this->session->set_userdata($data);
            if ($user['role'] == 'Admin') {
                redirect('Dashboard');
            } else {
                redirect('Dashboard');
            }
        } else {
            log_message('debug', 'Password verification failed for email: ' . $email);
            // Jika password salah
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah!</div>');
            redirect('auth');
        }
    } else {
        log_message('debug', 'User not found with email: ' . $email);
        // Jika email tidak ditemukan
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Belum Terdaftar!</div>');
        redirect('auth');
    }
}


    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil Logout! </div>');
        redirect('Auth');
    }
    }
?>