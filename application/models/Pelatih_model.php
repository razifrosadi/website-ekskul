<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelatih_model extends CI_Model
{
    public function getAllPelatih()
    {
        $this->db->select('*');
        $this->db->from('pelatih');
        $this->db->join('ekskul', 'pelatih.id_ekskul = ekskul.ekskul_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getPelatihData()
    {
        $query = $this->db->get_where('pelatih');
        return $query->result_array();
    }
    public function getPelatihDataById($id_pelatih)
    {
        $queryPelatih = "SELECT * FROM pelatih  WHERE id_pelatih = $id_pelatih AND is_active = 1";
        return $this->db->query($queryPelatih)->result_array();
    }
    public function getPelatihDataAll()
    {
        return $this->db->get_where('pelatih', ['id_pelatih !=' => 1])->result_array();
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

    function getPelatihRow($id_pelatih)
    {
        $this->db->select('*');
        $this->db->from('pelatih');
        $this->db->where('id_pelatih', $id_pelatih);
        $query = $this->db->get();
        return $query->row_array();
    }
}
