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
    $this->load->view("frontend/header");
    $this->load->view("frontend/galeri", $data);
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
}
