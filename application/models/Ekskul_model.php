<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ekskul_model extends CI_Model
{
    public function getAllEkskul()
    {
        $this->db->select('*');
        $this->db->from('ekskul');
        $this->db->join('kategori_ekskul', 'ekskul.kategori_ekskul_id = kategori_ekskul.id_kategori');
        $this->db->order_by('nama_ekskul', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }


    public function getEkskulByKetua($id)
    {
        $query = "SELECT * FROM ekskul JOIN user ON ekskul.ketua_id = user.id  WHERE ekskul.ketua_id = $id AND user.role_id = '2'";
        return $this->db->query($query)->result_array();
    }

    public function updateKetuaEskul($ekskul_id, $ketua_id)
    {
        $this->db->set('ketua_id', $ketua_id);
        $this->db->where('ekskul_id', $ekskul_id);
        $this->db->update('ekskul');
    }

    function getEkskulByKategori($id)
    {
        $this->db->select('*');
        $this->db->from('ekskul');
        $this->db->where('kategori_ekskul_id', $id);
        $this->db->join('kategori_ekskul', 'kategori_ekskul.id_kategori = ekskul.ekskul_id');

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
    public function getAllKategoriById($id)
    {
        $this->db->select('*');
        $this->db->from('kategori_ekskul');
        $this->db->where('id_kategori', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getEkskulData()
    {
        $query = $this->db->get('ekskul');
        return $query->result_array();
    }

    public function getEkskulByKetuaId($id)
    {
        $query = $this->db->get_where('ekskul', ['ketua_id' => $id]);
        return $query->row_array();
    }

    public function getEkskulDataById($id)
    {
        $queryEkskul = "SELECT * FROM ekskul WHERE ekskul_id = $id AND is_active = 1";
        return $this->db->query($queryEkskul)->result_array();
    }

    public function getAllEkskulById($id)
    {
        $this->db->select('*');
        $this->db->from('ekskul');
        $this->db->where('ekskul_id', $id);
        $query = $this->db->get();
        return $query->result_array();
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
