<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita_model extends CI_Model
{
    public function getBeritaData()
    {
        $query = $this->db->get_where('berita');
        return $query->result_array();
    }
    public function getBeritaDataById($id_berita)
    {
        $queryBerita = "SELECT * FROM berita  WHERE id_berita = $id_berita AND is_active = 1";
        return $this->db->query($queryBerita)->result_array();
    }
    public function getBeritaDataAll()
    {
        return $this->db->get_where('berita', ['id_berita !=' => 1])->result_array();
    }

    public function getAllBeritaById($id)
    {
        $this->db->select('*');
        $this->db->from('berita');
        $this->db->where('id_berita', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function delete_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    function getBeritaRow($id_berita)
    {
        $this->db->select('*');
        $this->db->from('berita');
        $this->db->where('id_berita', $id_berita);
        $query = $this->db->get();
        return $query->row_array();
    }
}
