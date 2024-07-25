<?php
defined ('BASEPATH') or exit ('No direct script access allowed');

class TentangKami extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('TentangKami_model');
    }

    public function index()
    {
        $data['judul'] = "Halaman Tentang Kami";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['tentangkami'] = $this->TentangKami_model->get();
        $this->load->view("layout/header", $data);
        $this->load->view("tentangkami/vw_tentangkami", $data);
        $this->load->view("layout/footer");
    }
    public function tambah()
    {
        $data['judul'] = "Tambah Tentang Kami";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('caption','Caption','required',[
            'required' => 'Caption Wajib di Isi'
        ]);
        if($this->form_validation->run()==false){
            $this->load->view("layout/header", $data);
        $this->load->view("tentangkami/vw_tambah_tentangkami", $data);
        $this->load->view("layout/footer");
        } else {
            $data = [
                'caption' => $this->input->post('caption')
            ];
            $upload_image = $_FILES['gambar']['name'];
       if ($upload_image) {
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_sizes'] = '2048';
        $config['upload_path'] = './assets/img/tentangkami/';
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('gambar')) {
            $new_image = $this->upload->data('file_name');
            $this->db->set('gambar', $new_image);
        } else {
            echo $this->upload->display_errors();
            return;
        }
       }
       $this->TentangKami_model->insert($data, $upload_image);
       $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
       Data Tentang Kami Berhasil Ditambah!</div>');
       redirect('TentangKami');
        }
    }
    public function edit($id)
    {
        $data['judul'] = "Edit Galeri";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['tentangkami'] = $this->TentangKami_model->getById($id);
        $this->form_validation->set_rules('caption','Caption','required',[
            'required' => 'Caption Wajib di Isi'
        ]);
        if($this->form_validation->run()==false){
            $this->load->view("layout/header", $data);
        $this->load->view("tentangkami/vw_ubah_tentangkami", $data);
        $this->load->view("layout/footer");
        } else {
            $data = [
                'caption' => $this->input->post('caption')
            ];
            $upload_image = $_FILES['gambar']['name'];
            if($upload_image){
                $config['allowed_types']='gif|png|jpg';
                $config['max_sized']='2048';
                $config['upload_path']='./assets/img/tentangkami';
                $this->load->library('upload',$config);
                if($this->upload->do_upload('gambar')){
                    $old_image = $data['tentang_kami']['gambar'];
                    if($old_image != 'default.jpg'){
                        unlink(FCPATH.'assets/img/tentangkami'.$old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar',$new_image);
                } else {
                    echo $this->upload->display_error();
                }
            }
            $id = $this->input->post('id');
            $this->TentangKami_model->update(['id'=>$id], $data, $upload_image);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Galeri Berhasil di Ubah!</div>');
            redirect('TentangKami'); 
        }
    }
    public function hapus($id)
    {
        $this->TentangKami_model->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data
        Tentang Kami Berhasil Dihapus!</div>');
        redirect('TentangKami');
    }
}
?>