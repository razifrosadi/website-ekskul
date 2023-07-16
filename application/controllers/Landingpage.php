<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landingpage extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Ekskul_model', 'ekskul');
        $this->load->model('Berita_model', 'berita');
        $this->load->model('Pelatih_model', 'pelatih');
    }

    public function index()
    {

        $data['title'] = 'Landing Page';
        $data['berita'] = $this->berita->getBeritaData(); // Mengambil data berita dari model
        $data['kategori'] = $this->ekskul->getAllKategori();
        $data['ekskul'] = $this->ekskul->getAllEkskul();
        $data['pelatih'] = $this->pelatih->getAllPelatih();

        // $data['pelatih'] = $this->db->get('pelatih')->result_array();

        $this->load->view('templates/header', $data);
        // $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/landingpage_topbar');
        $this->load->view('landingpage/index', $data);
        $this->load->view('templates/landingpage_footer');
    }

    public function detail_ekskul($id)
    {
        $data['title'] = 'Detail Ekstrakurikuler';
        $data['kategori'] = $this->ekskul->getAllKategoriById($id);
        // var_dump($data['kategori']);
        // die();
        $data['ekskul'] = $this->ekskul->getAllEkskul();


        $this->load->view('templates/header', $data);
        // $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/landingpage_topbar');
        $this->load->view('landingpage/detail_ekskul', $data);
        $this->load->view('templates/landingpage_footer');
    }

    public function detail_berita($id)
    {
        $data['title'] = 'Detail Ekstrakurikuler';
        $data['berita'] = $this->berita->getAllBeritaById($id);
        // var_dump($data['berita']);
        // die();

        $this->load->view('templates/header', $data);
        // $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/landingpage_topbar');
        $this->load->view('landingpage/detail_berita', $data);
        $this->load->view('templates/landingpage_footer');
    }

    public function deskripsi_ekskul($id)
    {
        $data['title'] = 'Deskripsi Ekstrakurikuler';

        $data['ekskul'] = $this->ekskul->getAllEkskulById($id);


        $this->load->view('templates/header', $data);
        // $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/landingpage_topbar');
        $this->load->view('landingpage/deskripsi_ekskul', $data);
        $this->load->view('templates/landingpage_footer');
    }
}
