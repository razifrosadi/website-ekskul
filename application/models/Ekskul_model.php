<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ekskul_model extends CI_Model
{
    public function getAllEkskul()
    {
        $this->db->select('*');
        $this->db->from('ekskul');
        $this->db->join('kategori_ekskul', 'ekskul.kategori_ekskul_id = kategori_ekskul.id_kategori');
        $query = $this->db->get();
        return $query->result_array();
    }


    public function getAllKategori()
    {
        $this->db->select('*');
        $this->db->from('kategori_ekskul');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getEkskulData()
    {
        $query = $this->db->get('ekskul');
        return $query->result_array();
    }

    public function getEkskulDataById($id)
    {
        $queryEkskul = "SELECT * FROM ekskul WHERE ekskul_id = $id AND is_active = 1";
        return $this->db->query($queryEkskul)->result_array();
    }

    public function getEkskulDataAll()
    {
        return $this->db->get_where('ekskul', ['ekskul_id !=' => 1])->result_array();
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
        if ($table == 'ekskul') {
            // Hapus data ketua yang memiliki ekskul_nama yang sama dengan ekskul_id yang dihapus
            $ekskul_row = $this->getEkskulRow($where['ekskul_id']);
            $ekskul_nama = $ekskul_row['nama_ekskul'];
            $this->db->delete('ketua', ['ekskul_nama' => $ekskul_nama]);
        }

        $this->db->where($where);
        $this->db->delete($table);
    }

    function getEkskulRow($id)
    {
        $this->db->select('*');
        $this->db->from('ekskul');
        $this->db->where('ekskul_id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
}
