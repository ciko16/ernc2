<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Kalender extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kalender_model');
    }

    public function index($year = null, $month = null)
    {
        // ambil tahun dan bulan dari query string
        $year = $this->input->get('year') ?? date('Y');
        $month = $this->input->get('month') ?? date('m');

        // Panggil model untuk mendapatkan data kalender
        $data['kalender'] = $this->Kalender_model->generate_calendar($year, $month);

        // Variabel untuk menandai pilihan tahun dan bulan yang dipilih
        $data['selected_year'] = $year;
        $data['selected_month'] = $month;

        $data['kalender'] = $this->Kalender_model->getcalendar($year, $month);
        echo 'Selected Year: ' . $data['selected_year'];
        echo 'Selected Month: ' . $data['selected_month'];
        exit;

        $this->load->view('jadwalkalender/kalender', $data);
    }
    public function detail($tanggal) {
        // ambil detail data dari model berdasarkan tanggal
        $data['detail'] = $this->Kalender_model->get_detail($tanggal);

        if ($data['detail']) {
            // load view dengan data detail
            $this->load->view('jadwalkalender/detail', $data);
        } else {
            // Jika tidak ada data untuk tanggal tersebut, tampilkan halaman kalender
            $this->load->view('jadwalkalender/kalender');
        }
    }
}
?>