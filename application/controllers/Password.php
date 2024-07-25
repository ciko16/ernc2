<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Password extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model','userrole');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $this->userrole->getBy();
        $email = $this->input->get('email');
        $this->form_validation->set_rules('password1', 'Password Baru', 'required|trim|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Konfirmasi Password Baru', 'required|trim|min_length[3]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view("auth/auth_header");
            $this->load->view("auth/password");
            $this->load->view("auth/auth_footer");
        } else {
            $password1 = $this->input->post('password1');
            $password2 = $this->input->post('password2');
            if (!$password1 == $password2) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Tidak Sesuai!</div>');
                redirect('auth/password');
            } else {
                $data = [
                    'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                ];
            }
            $email = $this->input->post('email');
            $this->userrole->update(['email' => $email], $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Berhasil Diubah!</div>');
            redirect('Auth');
        }
    }
}

?>