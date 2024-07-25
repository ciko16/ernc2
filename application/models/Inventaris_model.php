<?php
defined('BASEPATH') or exit ('No direct script access allowed');

class Inventaris_model extends CI_Model
{
    public $table = 'inventaris';
    public $id = 'inventaris.id';
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
        return $this->db->get('inventaris', $limit, $start)->result();
    }
    public function get_keyword($keyword) {
        $this->db->select('*');
        $this->db->from('inventaris');
        $this->db->like('nama', $keyword);
        $this->db->or_like('jenis', $keyword);
        $this->db->or_like('deskripsi', $keyword);
        $this->db->or_like('jumlah', $keyword);
        $this->db->or_like('ketersediaan', $keyword);
        return $this->db->get()->result_array();
    }
    public function count_keyword($keyword) {
        $this->db->like('nama', $keyword);
        $this->db->or_like('jenis', $keyword);
        $this->db->or_like('deskripsi', $keyword);
        $this->db->or_like('jumlah', $keyword);
        $this->db->or_like('ketersediaan', $keyword);
        return $this->db->get('inventaris')->num_rows();
    }
    public function tinventaris()
    {
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->num_rows();
    }
}
?>