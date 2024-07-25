<?php
defined('BASEPATH') or exit ('No direct script access allowed');

class Galeri_model extends CI_Model {

    public $table = 'galeri';
    public $id = 'galeri.id';
    public function __construct()
    {
        parent::__construct();
    }
    public function get()
    {
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->result_array();
        echo $this->db->last_query();
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
        return $this->db->get('galeri', $limit, $start)->result();
    }
    public function get_keyword($keyword) {
        $this->db->select('*');
        $this->db->from('galeri');
        $this->db->like('gambar', $keyword);
        $this->db->or_like('judul', $keyword);
        $this->db->or_like('deskripsi', $keyword);
        return $this->db->get()->result_array();
    }
    public function count_keyword($keyword) {
        $this->db->like('gambar', $keyword);
        $this->db->or_like('judul', $keyword);
        $this->db->or_like('deskripsi', $keyword);
        return $this->db->get('galeri')->num_rows();
    }
}
?>
