<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    // Users Data
    public function getUserData()
    {
        $query = $this->db->get_where('user', ['email' => $this->session->userdata('email')]);
        return $query->row_array();
    }
    public function getUserDataById($id)
    {
        $query = $this->db->get_where('user', ['id' => $id]);
        return $query->row_array();
    }

    public function getUserDataAll()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('role_id', 2);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getUserDataAllJoin()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('user_role', 'user.role_id = user_role.id');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getUserDataRole()
    {
        $this->db->select('*');
        $this->db->from('user_role');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getAllroleById($id)
    {
        $this->db->select('*');
        $this->db->from('user_role');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
}
