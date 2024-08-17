<?php
defined ('BASEPATH') or exit ('No direct script access allowed');

class Galeri extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Galeri_model');
        $this->load->library('pagination');
    }

    public function index()
    {
        $config['base_url'] = site_url('Galeri/index');
        $config['total_rows'] = $this->db->count_all('galeri');
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


        $data['judul'] = "Halaman Galeri";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['galeri'] = $this->Galeri_model->get($config['per_page'], $page);
        $data['pagination'] = $this->pagination->create_links();
        $this->load->view("layout/header",$data);
        $this->load->view("galeri/vw_galeri", $data);
        $this->load->view("layout/footer");
    }
    public function tambah()
    {
        $data['judul'] = "Tambah galeri";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['galeri'] = $this->Galeri_model->get();
        $this->form_validation->set_rules('judul','Judul','required',[
            'required' => 'Judul Wajib di Isi'
        ]);
        $this->form_validation->set_rules('deskripsi','Deskripsi','required',[
            'required' => 'Deskripsi Wajib di Isi'
        ]);
        if($this->form_validation->run()==false){
            $this->load->view("layout/header",$data);
        $this->load->view("galeri/vw_tambah_galeri", $data);
        $this->load->view("layout/footer");
        } else {
            $data = [
                'judul' => $this->input->post('judul'),
                'deskripsi' => $this->input->post('deskripsi')
            ];
            $upload_image = $_FILES['gambar']['name'];
       if ($upload_image) {
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_sizes'] = '2048';
        $config['upload_path'] = './assets/img/galeri/';
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('gambar')) {
            $new_image = $this->upload->data('file_name');
            $this->db->set('gambar', $new_image);
        } else {
            echo $this->upload->display_errors();
            return;
        }
       }
       $this->Galeri_model->insert($data, $upload_image);
       $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
       Data Galeri Berhasil Ditambah!</div>');
       redirect('Galeri');
        }
    }
    public function edit($id)
    {
        $data['judul'] = "Edit Galeri";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['galeri'] = $this->Galeri_model->getById($id);
        $this->form_validation->set_rules('judul','Judul','required',[
            'required' => 'Judul Wajib di Isi'
        ]);
        $this->form_validation->set_rules('deskripsi','Deskripsi','required',[
            'required' => 'Deskripsi Wajib di Isi'
        ]);
        if($this->form_validation->run()==false){
            $this->load->view("layout/header", $data);
        $this->load->view("galeri/vw_ubah_galeri", $data);
        $this->load->view("layout/footer");
        } else {
            $data = [
                'judul' => $this->input->post('judul'),
                'deskripsi' => $this->input->post('deskripsi')
            ];
            $upload_image = $_FILES['gambar']['name'];
            if($upload_image){
                $config['allowed_types']='gif|png|jpg|jpeg';
                $config['max_sized']='2048';
                $config['upload_path']='./assets/img/galeri';
                $this->load->library('upload',$config);
                if($this->upload->do_upload('gambar')){
                    $old_image = $data['galeri']['gambar'];
                    if($old_image != 'default.jpg'){
                        unlink(FCPATH.'./assets/img/galeri'.$old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar',$new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $id = $this->input->post('id');
            $this->Galeri_model->update(['id'=>$id], $data, $upload_image);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Galeri Berhasil di Ubah!</div>');
            redirect('Galeri'); 
        }
    }
    public function hapus($id)
    {
        $this->Galeri_model->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data
        Galeri Berhasil Dihapus!</div>');
        redirect('Galeri');
    }
    public function cari() {
        $data['judul'] = "Halaman Galeri";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    
        // Mendapatkan keyword dari input post
        $keyword = $this->input->post('keyword');
    
        // Jika keyword kosong, redirect ke halaman utama
        if(empty($keyword)) {
            redirect('Galeri');
        }
    
        // Load library pagination dan konfigurasi
        $this->load->library('pagination');
    
        // Konfigurasi pagination
        $config['base_url'] = base_url('Galeri/cari');
        $config['total_rows'] = $this->Galeri_model->count_keyword($keyword);
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
        $data['galeri'] = $this->Galeri_model->get_keyword($keyword, $config['per_page'], $page);
        $data['pagination'] = $this->pagination->create_links();
    
        // Load views
        $this->load->view("layout/header", $data);
        $this->load->view("galeri/vw_galeri", $data);
        $this->load->view("layout/footer"); 
    }
    public function webprofil() {
        $this->load->model('Galeri_model');

        $galeri = $this->Galeri_model->get_all_galeri();

        // tentukan jumlah gambar per halaman
        $limit = 6;

        // dapatkan halaman saat ini dari URL, default ke halaman 1 jika tidak ada
        $page = $this->input->get('page') ? $this->input->get('page') : 1;

        // hitung offset data berdasarkan halaman saat ini
        $offset = ($page -1) * $limit;

        // ambil total jumlah gambar
        $total_data = count($galeri);

        // hitung total halaman yang tersedia
        $total_pages = ceil($total_data / $limit);

        // ambil data galeri untuk halaman saat ini
        $current_page_galeri = array_slice($galeri, $offset, $limit);

        // kirim data ke view
        $data['galeri'] = $current_page_galeri;
        $data['total_page'] = $total_pages;
        $data['current_page'] = $page;

        // load view
        $this->load->view('frontend/galeri', $data);
    }
}
?>