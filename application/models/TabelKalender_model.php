<?php
defined('BASEPATH') or exit ('No direct script access allowed');

class TabelKalender_model extends CI_Model
{
    public $table = 'kalenderbaru';
    public $id = 'kalenderbaru.id';
    public function __construct()
    {
        parent::__construct();
    }
    public function get($limit = null, $start = null, $order = 'desc')
    {
        $this->db->from($this->table);
        $this->db->order_by('id', $order);
         // If limit and start are provided, use them for pagination
        if ($limit !== null && $start !== null) {
            if (!is_int($limit) || !is_int($start)) {
            throw new InvalidArgumentException('Limit and start must be integers.');
        }
        $this->db->limit($limit, $start);
    }
        $query = $this->db->get();
        $result = $query->result_array();

        // konversi format tanggal menjadi format indonesia (dd-mm-yyyy)
        foreach ($result as &$row) {
            $row['tanggal'] = date("d-m-Y", strtotime($row['tanggal']));
        }
        return $result;
    }
    public function getById($id)
    {
        $this->db->where($this->id, $id);
        $query = $this->db->get($this->table);
        $result = $query->row_array();

        // konversi format tanggal menjadi format indonesia (dd-mm-yyyy)
        if ($result) {
            $result['tanggal'] = date("d-m-Y", strtotime($result['tanggal']));
        }
        return $result;
    }
    public function update($where, $data)
    {
        // konversi format tanggal menjadi format indonesia sebelum update
        if (isset($data['tanggal'])) {
            $data['tanggal'] = date("Y-m-d", strtotime(str_replace('-', '/', $data['tanggal'])));
        }
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }
    public function insert($data)
    {
        // konversi format tanggal menjadi format indonesia sebelum update
        if (isset($data['tanggal'])) {
            $data['tanggal'] = date("Y-m-d", strtotime(str_replace('-', '/', $data['tanggal'])));
        }
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    public function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }
    public function get_data($limit, $start) {
        $result = $this->db->get('kalenderbaru', $limit, $start)->result_array();

        // konversi ke format tanggal indonesia (dd-mm-yyyy)
        foreach ($result as &$row) {
            $row['tanggal'] = date("d-m-Y", strtotime($row['tanggal']));
        }
        return $result;
    }
    public function get_keyword($keyword) {
        $this->db->select('*');
        $this->db->from('kalenderbaru');
        $this->db->like('tanggal', $keyword);
        $this->db->or_like('isi', $keyword);
        $this->db->or_like('booking', $keyword);
        $result = $this->db->get()->result_array();

        // konversi ke format tanggal indonesia (dd-mm-yyyy)
        foreach ($result as &$row) {
            $row['tanggal'] = date("d-m-Y", strtotime($row['tanggal']));
        }
        return $result;
    }
    public function count_keyword($keyword) {
        $this->db->like('tanggal', $keyword);
        $this->db->or_like('isi', $keyword);
        $this->db->or_like('booking', $keyword);
        return $this->db->get('kalenderbaru')->num_rows();
    }
    public function tkalender() {
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->num_rows();
    }
    // public function getInventaris() {

    //     // Ambil hanya kolom 'id', 'nama', dan 'jumlah' dari tabel 'Inventaris'
    //     $this->db->select('id, nama, jumlah');
    //     $query = $this->db->get('inventaris');
    
    //     // Periksa apakah query berhasil
    //     if (!$query) {
    //     $error = $this->db->error();
    //     log_message('error', 'Database query error: ' . $error['message']);
    //     return [];
    //     }

    //     return $query->result_array();
    // }
    // public function updateInventaris($id) {
    //     // Cek apakah jumlah lebih dari 0
    //     $this->db->where('id', $id);
    //     $inventaris = $this->db->get('inventaris')->row_array();

    //     // Kurangi jumlah inventaris yang dipesan
    //     if ($inventaris && $inventaris['jumlah'] > 0) {
    //         $this->db->set('jumlah', 'jumlah-1', FALSE);
    //         $this->db->where('id', $id);
    //         $this->db->update('Inventaris');
    //     }
    // }
    // public function getWithBooking() {
    //     $this->db->select('k.*, i.nama AS booking_name');
    //     $this->db->from('kalenderbaru k');
    //     $this->db->join('Inventaris i', 'k.booking = i.id', 'left');
    //     $query = $this->db->get();
    
    //     if (!$query) {
    //         // Cek kesalahan query
    //         $error = $this->db->error();
    //         log_message('error', 'Query error: ' . print_r($error, true));
    //         return false;
    //     }
    
    //     return $query->result_array();
    // }
}
?>