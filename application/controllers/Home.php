<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kalender_model');
        $this->load->model('Layanan_model');
        $this->load->model('Peminjaman_model');
        $this->load->model('Galeri_model');
    }

  public function index() {
   $this->load->view("frontend/header");
   $this->load->view("frontend/landingpage");
   $this->load->view("frontend/footer");
  }

  public function layananlab() {
    $data['biaya_layanan'] = $this->Layanan_model->get_by_category('Layanan');
    $this->load->view("frontend/header");
    $this->load->view("frontend/layananlab", $data);
    $this->load->view("frontend/footer");
  }
  
  public function peminjamanlab() {
    $data['biaya_layanan'] = $this->Peminjaman_model->get_by_category('Peminjaman');
    $this->load->view("frontend/header");
    $this->load->view("frontend/peminjamanlab", $data);
    $this->load->view("frontend/footer");
  }

  public function layananlaboratorium() {
    $data['biaya_layanan'] = $this->Peminjaman_model->get_all_biaya_layanan();
    $this->load->view("frontend/header");
    $this->load->view("frontend/layananlaboratorium", $data);
    $this->load->view("frontend/footer");
  }

  public function galeri() {
    $data['galeri'] = $this->Galeri_model->get();
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
  $this->load->view("frontend/header");
  $this->load->view('frontend/galeri', $data);
  $this->load->view("frontend/footer");
  }

  public function tentangkami() {
    $this->load->view("frontend/header");
    $this->load->view("frontend/tentangkami");
    $this->load->view("frontend/footer");
  }

  public function kalender($year = null, $month = null) {
    if ($year === null) {
        $year = date('Y');
    }
    if ($month === null) {
        $month = date('m');
    }

    $data['kalender'] = $this->Kalender_model->getcalendar($year, $month);

    $this->load->view('frontend/header');
    $this->load->view('jadwalkalender/kalender', $data);
    $this->load->view('frontend/footer');
}
public function webprofil() {
  $this->load->model('Galeri_model');

  $galeri = $this->Galeri_model->get_all_galeri();

  
}
}
