<?php
defined('BASEPATH') or exit ('No direct script access allowed');

class Peminjaman_model extends CI_Model
{
    public $table = 'peminjaman_lab';
    public $id = 'peminjaman_lab.id';
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
        return $query->result_array();
    }
    public function getById($id)
    {
        $this->db->where($this->id, $id);
        $query = $this->db->get($this->table);
        return $query->row_array();
    }
    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }
    public function insert($data)
    {
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
        return $this->db->get('peminjaman_lab', $limit, $start)->result();
    }
    public function get_keyword($keyword) {
        $this->db->select('*');
        $this->db->from('peminjaman_lab');
        $this->db->like('nama', $keyword);
        $this->db->or_like('asal_instansi', $keyword);
        $this->db->or_like('keperluan', $keyword);
        $this->db->or_like('biaya', $keyword);
        $this->db->or_like('no_whatsapp', $keyword);
        $this->db->or_like('status_peminjaman', $keyword);
        return $this->db->get()->result_array();
    }
    public function count_keyword($keyword) {
        $this->db->like('nama', $keyword);
        $this->db->or_like('asal_instansi', $keyword);
        $this->db->or_like('keperluan', $keyword);
        $this->db->or_like('biaya', $keyword);
        $this->db->or_like('no_whatsapp', $keyword);
        $this->db->or_like('status_peminjaman', $keyword);
        return $this->db->get('peminjaman_lab')->num_rows();
    }
    public function tpeminjaman() 
    {
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function insert_data($data) {
        $this->db->insert('peminjaman_lab', $data);
    }

     public function get_all_biaya_layanan()
    {
        $this->db->select('*');
        $this->db->from('biaya_layanan');
        $query = $this->db->get();
        return $query->result_array();
    }
     // mengambil data biaya layanan berdasarkan kategori
    public function get_by_category($category) {
        $this->db->where('kategori', $category);
        $query = $this->db->get('biaya_layanan');
        return $query->result_array();
    }
}
?>