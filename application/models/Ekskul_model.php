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
}
