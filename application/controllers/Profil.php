<?php
defined('BASEPATH') or exit ('No direct script access allowed');

class Profil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model','userrole');
        $this->load->library('upload');
    }
    public function index()
    {
        $data['judul'] = 'Halaman Profil';
        $data['user'] = $this->userrole->getBy();
        $this->load->view('layout/header', $data);
        $this->load->view('auth/vw_profil', $data);
        $this->load->view('layout/footer');
    }
    public function edit()
    {
        $data['judul'] = 'Edit Profil';
        $data['user'] = $this->userrole->getBy();
        $this->load->view('layout/header', $data);
        $this->load->view('auth/vw_edit_profil', $data);
        $this->load->view('layout/footer');
    }

    public function update_profile_picture() {
        $user = $this->userrole->getBy();
        $old_image = $user['gambar']; // simpan nama file foto lama
        $config['upload_path'] = './assets/img/profile/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2048;
        $config['file_name'] = $user['id'];

        $this->upload->initialize($config);

        if ($this->upload->do_upload('gambar')) {
            $upload_data = $this->upload->data();
            $new_image = $upload_data['file_name'];

            // mengupdate foto profil admin di database
            $this->userrole->update(array('id' => $user['id']), array('gambar' => $new_image));
            // hapus foto lama jika bukan default
            if ($old_image != 'default.jpg') {
                $old_image_path = FCPATH . 'assets/img/profile.' . $old_image;
                if (file_exists($old_image_path)) {
                    unlink($old_image_path);
                }
            }
            // notifikasi berhasil update foto profil
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Foto profil berhasil diubah!</div>');
            redirect('Profil');
        } else {
            // notifikasi gambar gagal diubah dan kembali ke halaman edit
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect('profil/edit');
        }
    }
}
?>