<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ketua extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Data Anggota Ekstrakurikuler';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('ketua/index', $data);
        $this->load->view('templates/footer');
    }

    public function masukan_informasi()
    {
        $data['title'] = 'Masukan Informasi';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('ketua/masukan_informasi', $data);
        $this->load->view('templates/footer');
    }
}
