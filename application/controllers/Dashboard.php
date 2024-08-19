<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Dashboard_model');
    }

    public function index()
    {
        $data['judul'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        // Mengambil seluruh data dari tabel untuk dashboard
        $data['layanan_lab_count'] = $this->Dashboard_model->get_count('layanan_lab');
        $data['peminjaman_lab_count'] = $this->Dashboard_model->get_count('peminjaman_lab');
        $data['inventaris_count'] = $this->Dashboard_model->get_count('inventaris');
        $data['kalender_count'] = $this->Dashboard_model->get_count('kalenderbaru');

        // Mengambil layanan_lab berdasarkan status
        $data['layanan_lab_by_status'] = $this->Dashboard_model->get_layanan_lab_by_status();
        // Mengambil data peminjaman lab berdasarkan status
        $data['peminjaman_by_status'] = $this->Dashboard_model->get_peminjaman_by_status();
        // Mengambil data inventaris berdasarkan ketersediaan
        $data['inventaris_by_ketersediaan'] = $this->Dashboard_model->get_inventaris_by_ketersediaan();
        // Menghitung total pendapatan keseluruhan
        $total_pendapatan = $this->Dashboard_model->get_total_pendapatan_by_status();

        // Format total pendapatan ke dalam format Rupiah
         $data['total_pendapatan'] = 'Rp ' . number_format($total_pendapatan, 0, ',', '.');
        
        // Mengambil data jumlah berdasarkan bulan dari model
        $dataPerBulan = $this->Dashboard_model->getByMonthYear();

        $labels = [];
        $jumlah_data = [];

        foreach ($dataPerBulan as $row) {
            $labels[] = DateTime::createFromFormat('!m', $row['bulan'])->format('F') . ' ' . $row['tahun'];
            $jumlah_data[] = $row['jumlah'];
        }

        $data['dataPerBulan'] = [
            'labels' => $labels,
            'data' => $jumlah_data
        ];

        // menampilkan data pendapatan layanan dan peminjaman lab
        $data['pendapatan_layanan'] = $this->Dashboard_model->get_pendapatan_layanan();
        $data['pendapatan_peminjaman'] = $this->Dashboard_model->get_pendapatan_peminjaman();

        $this->load->view('layout/header', $data);
        $this->load->view('dashboard/index', $data); // Pastikan data yang dikirimkan sesuai dengan kebutuhan view
        $this->load->view('layout/footer');
    }
}
?>
