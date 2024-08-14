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

    public function getByMonthYear() { 
        // mengekstrak bulan dan tahun dari kolom tanggal dengan SQL MONTH() dan YEAR()
        $this->db->select('MONTH(tanggal) as bulan, YEAR(tanggal) as tahun, COUNT(*) as jumlah');
        $this->db->group_by('YEAR(tanggal)');
        $this->db->group_by('MONTH(tanggal)'); // Mengurutkan data berdasarkan tahun dan bulan
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