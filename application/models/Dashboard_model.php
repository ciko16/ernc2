<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model {
	public function __construct()
    {
        parent::__construct();
    }

    public function get_count($table){
        return $this->db->count_all($table);
    }
    
    public function get_layanan_lab_by_status(){
        $this->db->select('status, COUNT(*) as count');
        $this->db->group_by('status');
        $query = $this->db->get('layanan_lab');
        return $query->result_array();
    }

    public function get_peminjaman_by_status() {
        $this->db->select('status_peminjaman, COUNT(*) as count');
        $this->db->group_by('status_peminjaman');
        $query = $this->db->get('peminjaman_lab');
        return $query->result_array();
    }

    public function get_inventaris_by_ketersediaan() {
        $this->db->select('ketersediaan, COUNT(*) as count');
        $this->db->group_by('ketersediaan');
        $query = $this->db->get('inventaris');
        return $query->result_array();
    }

    public function get_total_pendapatan_by_status() {
        // Menghitung total pendapatan dari tabel layanan_lab
        $this->db->select_sum('biaya'); // Pastikan nama kolom sesuai
        $this->db->from('layanan_lab');
        $this->db->where('status', 'Selesai');
        $query_layanan = $this->db->get();
        $result_layanan = $query_layanan->row();
        $total_layanan = $result_layanan ? $result_layanan->pendapatan : 0;

        // Menghitung total pendapatan dari tabel peminjaman_lab
        $this->db->select_sum('biaya'); // Pastikan nama kolom sesuai
        $this->db->from('peminjaman_lab');
        $this->db->where('status', 'Selesai');
        $query_peminjaman = $this->db->get();
        $result_peminjaman = $query_peminjaman->row();
        $total_peminjaman = $result_peminjaman ? $result_peminjaman->pendapatan : 0;

        // Menjumlahkan total pendapatan dari kedua tabel
        return $total_layanan + $total_peminjaman;
    }

    public function getByMonthYear() { 
        // mengekstrak bulan dari kolom tanggal dengan SQL MONTH()
        $this->db->select('YEAR(tanggal) as tahun, MONTH(tanggal) as bulan, COUNT(*) as jumlah');
        $this->db->group_by('YEAR(tanggal), MONTH(tanggal)');
        $query = $this->db->get('kalenderbaru');
        return $query->result_array();
    }

    public function get_pendapatan_layanan() {
        $this->db->select('YEAR(created_date) as year, MONTH(created_date) as month, SUM(biaya) as total_pendapatan_layanan');
        $this->db->from('layanan_lab');
        $this->db->where('status', 'selesai');
        $this->db->group_by(array('year', 'month'));
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_pendapatan_peminjaman() {
        $this->db->select('YEAR(created_date) as year, MONTH(created_date) as month, SUM(biaya) as total_pendapatan_peminjaman');
        $this->db->from('peminjaman_lab');
        $this->db->where('status_peminjaman', 'selesai');
        $this->db->group_by(array('year', 'month'));
        $query = $this->db->get();
        return $query->result_array();
    }
}
?>