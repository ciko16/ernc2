<?php
defined ('BASEPATH') or exit ('No direct script access allowed');

class Inventaris extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Inventaris_model');
        $this->load->library('pagination');
    }

    public function index()
    {
        $config['base_url'] = site_url('Inventaris/index');
        $config['total_rows'] = $this->db->count_all('inventaris');
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
        $config['prev_tagl_close'] = '</span>Selanjutnya</li>';
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

        $data['judul'] = "Halaman Inventaris";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['inventaris'] = $this->Inventaris_model->get($config['per_page'], $page);
        $data['pagination'] = $this->pagination->create_links();
        $this->load->view("layout/header", $data);
        $this->load->view("inventaris/vw_inventaris", $data);
        $this->load->view("layout/footer");
    }
    public function tambah()
    {
        $data['judul'] = "Halaman Tambah Inventaris";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['inventaris'] = $this->Inventaris_model->get();
        $this->form_validation->set_rules('nama','Nama','required',[
            'required' => 'Nama Wajib di Isi'
        ]);
        $this->form_validation->set_rules('jenis','Jenis','required',[
            'required' => 'Jenis Wajib di Isi'
        ]);
        $this->form_validation->set_rules('deskripsi','Deskripsi','required',[
            'required' => 'Deskripsi Wajib di Isi'
        ]);
        $this->form_validation->set_rules('jumlah','Jumlah','required',[
            'required' => 'Jumlah Wajib di Isi'
        ]);
        $this->form_validation->set_rules('ketersediaan','Ketersediaan','required',[
            'required' => 'Ketersediaan Wajib di Isi'
        ]);
        if ($this->form_validation->run()==false) {
            $this->load->view("layout/header",$data);
            $this->load->view("inventaris/vw_tambah_inventaris", $data);
            $this->load->view("layout/footer");
        } else {
            $nama = $this->input->post('nama');
            $jenis = $this->input->post('jenis');
            $deskripsi = $this->input->post('deskripsi');
            $jumlah = $this->input->post('jumlah');
            $ketersediaan = $this->input->post('ketersediaan');
     
            $data = array (
             'nama' => $nama,
             'jenis' => $jenis,
             'deskripsi' => $deskripsi,
             'jumlah' => $jumlah,
             'ketersediaan' => $ketersediaan
            );
            $this->Inventaris_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data Inventaris Berhasil Ditambah!</div>');
            redirect('Inventaris');
        }
    }

    public function hapus($id)
    {
        $this->Inventaris_model->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data
        Inventaris Berhasil Dihapus!</div>');
        redirect('Inventaris');
    }

    public function edit($id) {
        $data['judul'] = "Halaman Tambah Inventaris";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['inventaris'] = $this->Inventaris_model->getById($id);
        $this->form_validation->set_rules('nama','Nama','required',[
            'required' => 'Nama Wajib di Isi'
        ]);
        $this->form_validation->set_rules('jenis','Jenis','required',[
            'required' => 'Jenis Wajib di Isi'
        ]);
        $this->form_validation->set_rules('deskripsi','Deskripsi','required',[
            'required' => 'Deskripsi Wajib di Isi'
        ]);
        $this->form_validation->set_rules('jumlah','Jumlah','required',[
            'required' => 'Jumlah Wajib di Isi'
        ]);
        $this->form_validation->set_rules('ketersediaan','Ketersediaan','required',[
            'required' => 'Ketersediaan Wajib di Isi'
        ]);
        if ($this->form_validation->run()==false) {
            $this->load->view("layout/header",$data);
            $this->load->view("inventaris/vw_ubah_inventaris", $data);
            $this->load->view("layout/footer");
        } else {
            $nama = $this->input->post('nama');
            $jenis = $this->input->post('jenis');
            $deskripsi = $this->input->post('deskripsi');
            $jumlah = $this->input->post('jumlah');
            $ketersediaan = $this->input->post('ketersediaan');
     
            $data = array (
             'nama' => $nama,
             'jenis' => $jenis,
             'deskripsi' => $deskripsi,
             'jumlah' => $jumlah,
             'ketersediaan' => $ketersediaan
            );
            $id = $this->input->post('id');
            $this->Inventaris_model->update(['id'=>$id], $data);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Inventaris Berhasil di Ubah!</div>');
            redirect('Inventaris'); 
        }
    }

    public function cari () {
        $data['judul'] = "Halaman Tabel Inventaris";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    
        // Mendapatkan keyword dari input post
        $keyword = $this->input->post('keyword');
    
        // Jika keyword kosong, redirect ke halaman utama
        if(empty($keyword)) {
            redirect('Inventaris');
        }
    
        // Load library pagination dan konfigurasi
        $this->load->library('pagination');
    
        // Konfigurasi pagination
        $config['base_url'] = base_url('Inventaris/cari');
        $config['total_rows'] = $this->Inventaris_model->count_keyword($keyword);
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $config['num_links'] = 2;
    
        // Style pagination (optional)
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
    
        // Initialize pagination
        $this->pagination->initialize($config);
    
        // Mendapatkan hasil pencarian dengan pagination
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['inventaris'] = $this->Inventaris_model->get_keyword($keyword, $config['per_page'], $page);
        $data['pagination'] = $this->pagination->create_links();
    
        // Load views
        $this->load->view("layout/header", $data);
        $this->load->view("inventaris/vw_inventaris", $data);
        $this->load->view("layout/footer");
    }
}
?>