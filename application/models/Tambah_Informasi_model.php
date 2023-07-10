<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tambah_informasi_model extends CI_Model
{
    public function getTambah_informasiData()
    {
        $query = $this->db->get_where('tambah_informasi');
        return $query->result_array();
    }
    public function getTambah_informasiDataById($id_informasi)
    {
        $queryTambah_informasi = "SELECT * FROM tambah_informasi  WHERE id_informasi = $id_informasi AND is_active = 1";
        return $this->db->query($queryTambah_informasi)->result_array();
    }
    public function getTambah_informasiDataAll($id,  $status = 'Diterima')
    {
        $query = "SELECT * FROM tambah_informasi JOIN ekskul ON tambah_informasi.ekskul_id = ekskul.ekskul_id JOIN siswa ON ekskul.ekskul_id = siswa.ekskul_id WHERE siswa.user_id = $id AND siswa.status = '$status'";
        return $this->db->query($query)->result_array();
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

    function getTambah_informasiRow($id_informasi)
    {
        $this->db->select('*');
        $this->db->from('tambah_informasi');
        $this->db->where('id_informasi', $id_informasi);
        $query = $this->db->get();
        return $query->row_array();
    }
}
