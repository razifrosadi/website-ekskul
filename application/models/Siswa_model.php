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

    public function getAllSiswaByEkskul($id)
    {
        // $this->db->select('*');
        // $this->db->from('siswa');
        // $this->db->join('ekskul', 'siswa.ekskul_id = ekskul.ekskul_id');
        // $this->db->where('user', )

        $query = "SELECT * FROM siswa JOIN ekskul ON siswa.ekskul_id = ekskul.ekskul_id JOIN user ON ekskul.ketua_id = user.id JOIN kelas ON siswa.kelas_id = kelas.id_kelas WHERE user.id = $id AND siswa.status = 'Diterima'";
        return $this->db->query($query)->result_array();
    }

    public function getAllSiswaByRegister($id)
    {
        // $this->db->select('*');
        // $this->db->from('siswa');
        // $this->db->join('ekskul', 'siswa.ekskul_id = ekskul.ekskul_id');
        // $this->db->where('user', )

        $query = "SELECT * FROM siswa JOIN ekskul ON siswa.ekskul_id = ekskul.ekskul_id JOIN user ON ekskul.ketua_id = user.id JOIN kelas ON siswa.kelas_id = kelas.id_kelas WHERE user.id = $id AND siswa.status = 'Pending'";
        return $this->db->query($query)->result_array();
    }

    public function getSiswaDitolak($id)
    {
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->join('ekskul', 'siswa.ekskul_id = ekskul.ekskul_id');
        $this->db->where('user_id', $id);
        $this->db->where('status', 'Ditolak');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getSiswaDiterima($id)
    {
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->join('ekskul', 'siswa.ekskul_id = ekskul.ekskul_id');
        $this->db->where('user_id', $id);
        $this->db->where('status', 'Diterima');
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
}
