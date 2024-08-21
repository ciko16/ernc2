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
        // Jika tidak ada tahun atau bulan yang diberikan, gunakan tahun dan bulan saat ini
        $year = $year ?? date('Y');
        $month = $month ?? date('m');

        // Ambil data kalender dari model
        $data['kalender'] = $this->Kalender_model->getcalendar($year, $month);

        // Pastikan variabel kalender dikirim ke view
        $this->load->view('jadwalkalender/kalender', $data);
    }

    public function detail($tanggal) {
        // Debugging untuk melihat apakah metode ini dipanggil
        var_dump($tanggal); die();
        $data['detail'] = $this->Kalender_model->get_detail($tanggal);
    
        if ($data['detail']) {
            $this->load->view('jadwalkalender/detail', $data);
        } else {
            redirect('kalender');
        }
    }
    
}
?>