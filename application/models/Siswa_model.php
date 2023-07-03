<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa_model extends CI_Model
{

    public function getAllSiswa()
    {
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->join('kelas', 'siswa.kelas_id = kelas.id_kelas');
        $this->db->join('ekskul', 'siswa.ekskul_id = ekskul.ekskul_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getAllEkskul()
    {
        $this->db->select('*');
        $this->db->from('ekskul');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getAllKelas()
    {
        $this->db->select('*');
        $this->db->from('kelas');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getSiswaData()
    {
        $query = $this->db->get('siswa');
        return $query->result_array();
    }
}
