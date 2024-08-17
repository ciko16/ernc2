<?php
defined ('BASEPATH') or exit ('No direct script access allowed');

class TabelKalender extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('TabelKalender_model');
        $this->load->library('pagination','session');

        // Cek apakah sesi sudah habis
        if (!$this->session->userdata('logged_in')) {
            // Redirect ke halaman login
            redirect('Auth');
        }
    }

    public function index()
    {
        $config['base_url'] = site_url('TabelKalender/index');
        $config['total_rows'] = $this->db->count_all('kalenderbaru');
        $config['per_page'] = 5;
        $config['uri_segment'] = 3;
        $choice = $config['total_rows'] / $config['per_page'];
        $config['num_links'] = floor($choice);

        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['next_link'] = 'Selanjutnya';
        $config['prev_link'] = 'Sebelumnya';
        $config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center pagination-green">';
        $config['full_tag_close'] = '</ul></nav></div>';
        $config['num_tag_open'] = '<li class="page-item pagination-green"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item active pagination-green"><span class="page-link">';
        $config['cur_tag_close'] = '</span></li>';
        $config['next_tag_open'] = '<li class="page-item pagination-green"><span class="page-link">';
        $config['next_tagl_close'] = '<span aria-hidden="true">&raquo</span></span></li>';
        $config['prev_tag_open'] = '<li class="page-item pagination-green"><span class="page-link">';
        $config['prev_tagl_close'] = '</span>&raquo;</li>';
        $config['first_tag_open'] = '<li class="page-item pagination-green"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open'] = '<li class="page-item pagination-green"><span class="page-link">';
        $config['last_tagl_close'] = '</span></li>';
       // Fetch the current page number from the URL and ensure it's valid
       $page = $this->uri->segment($config['uri_segment']);
       if ($page === null) {
           $page = '0';
       } else if (!ctype_digit($page) || (int)$page < 1) {
           $page = '0';
       }
    

    // Convert the valid page string back to integer
    $page = (int)$page;

    // Initialize pagination with the validated page number
    $this->pagination->initialize($config);

    $data['page'] = $page;

        $data['judul'] = "Halaman Tabel Kalender";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kalenderbaru'] = $this->TabelKalender_model->get($config['per_page'], $page);
        $data['pagination'] = $this->pagination->create_links();
        $this->load->view("layout/header", $data);
        $this->load->view("tabelkalender/vw_tb_kalender", $data);
        $this->load->view("layout/footer");
    }

    public function tambah()
    {
        $data['judul'] = "Halaman Tambah Kalender";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kalenderbaru'] = $this->TabelKalender_model->get();
        $this->form_validation->set_rules('tanggal','Tanggal','required',[
            'required' => 'Tanggal Wajib di Isi'
        ]);
        $this->form_validation->set_rules('isi','Deskripsi','required',[
            'required' => 'Deskripsi Wajib di Isi'
        ]);
        if ($this->form_validation->run()==false) {
            $this->load->view("layout/header", $data);
            $this->load->view("tabelkalender/vw_tambah_tb_kalender", $data);
            $this->load->view("layout/footer");
        } else {
            $data = [
                'tanggal' => $this->input->post('tanggal'),
                'isi' => $this->input->post('isi'),
                'status' => 1
            ];
       $this->TabelKalender_model->insert($data);
       $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
       Data Kalender Berhasil Ditambah!</div>');
       redirect('TabelKalender');
        }
        
    }
    public function hapus($id)
    {
        $this->TabelKalender_model->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data
        Kalender Berhasil Dihapus!</div>');
        redirect('TabelKalender');
    }
    
    public function edit ($id)
    {
        $data['judul'] = "Halaman Edit Kalender";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kalenderbaru'] = $this->TabelKalender_model->getById($id);

        $this->form_validation->set_rules('tanggal','Tanggal','required',[
            'required'=> 'Tanggal Wajib di Isi'
        ]);
        $this->form_validation->set_rules('isi','Deskripsi','required',[
            'required' => 'Deskripsi Wajib di Isi'
        ]);
        if($this->form_validation->run()==false){
            $this->load->view("layout/header",$data);
            $this->load->view("tabelkalender/vw_ubah_tb_kalender", $data);
            $this->load->view("layout/footer");
        } else {
            $data = [
                'tanggal' => $this->input->post('tanggal'),
                'isi' => $this->input->post('isi'),
                'status' => 1
            ];
            $id = $this->input->post('id');
            $this->TabelKalender_model->update(['id'=>$id], $data);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Kalender Berhasil di Ubah!</div>');
            redirect('TabelKalender'); 
        }   
    }

    public function cari () {
        $data['judul'] = "Halaman Tabel Kalender";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    
        // Mendapatkan keyword dari input post
        $keyword = $this->input->post('keyword');
    
        // Jika keyword kosong, redirect ke halaman utama
        if(empty($keyword)) {
            redirect('TabelKalender');
        }
    
        // Load library pagination dan konfigurasi
        $this->load->library('pagination');
    
        // Konfigurasi pagination
        $config['base_url'] = base_url('TabelKalender/cari');
        $config['total_rows'] = $this->TabelKalender_model->count_keyword($keyword);
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $config['num_links'] = 2;
    
        // Style pagination (optional)
        $config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center pagination-green">';
        $config['full_tag_close'] = '</ul></nav></div>';
        $config['num_tag_open'] = '<li class="page-item pagination-green"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item active pagination-green"><span class="page-link">';
        $config['cur_tag_close'] = '</span></li>';
        $config['next_tag_open'] = '<li class="page-item pagination-green"><span class="page-link">';
        $config['next_tagl_close'] = '<span aria-hidden="true">&raquo</span></span></li>';
        $config['prev_tag_open'] = '<li class="page-item pagination-green"><span class="page-link">';
        $config['prev_tagl_close'] = '</span>Selanjutnya</li>';
        $config['first_tag_open'] = '<li class="page-item pagination-green"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open'] = '<li class="page-item pagination-green"><span class="page-link">';
        $config['last_tagl_close'] = '</span></li>';
    
        // Initialize pagination
        $this->pagination->initialize($config);
    
        // Mendapatkan hasil pencarian dengan pagination
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['kalenderbaru'] = $this->TabelKalender_model->get_keyword($keyword, $config['per_page'], $page);
        $data['pagination'] = $this->pagination->create_links();
    
        // Load views
        $this->load->view("layout/header", $data);
        $this->load->view("tabelkalender/vw_tb_kalender", $data);
        $this->load->view("layout/footer");
    }
}
?>