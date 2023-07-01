<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tambah_Informasi_model', 'tambah_informasi');
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Pendaftaran Ekstrakurikuler';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('siswa/index', $data);
        $this->load->view('templates/footer');
    }

    public function terima_informasi()
    {
        $data['title'] = 'Informasi Ekstrakurikuler';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['informasi'] = $this->tambah_informasi->getTambah_informasiData(); // Mengambil data berita dari model

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('siswa/terima_informasi', $data);
        $this->load->view('templates/footer');
    }
}
