<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tambah_Informasi_model', 'tambah_informasi');
        $this->load->model('Siswa_model', 'siswa');
        is_logged_in();
    }

    public function daftar()
    {
        $data['title'] = 'Pendaftaran Ekstrakurikuler';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->siswa->getAllSiswa();
        $data['kelas'] = $this->siswa->getAllKelas();
        $data['ekskul'] = $this->siswa->getAllEkskul();
        $data['siswatolak'] = $this->siswa->getSiswaDitolak($data['user']['id']);
        $data['siswaterima'] = $this->siswa->getSiswaDiterima($data['user']['id']);
        $data['showSpecialContent'] = true;


        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('no_wa', 'Whatsapp', 'required');
        $this->form_validation->set_rules('alasan', 'Alasan', 'required');

        if ($this->form_validation->run() == false) {
            if (!$data['siswaterima']) {
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar_notif', $data);
                $this->load->view('siswa/index', $data);
                $this->load->view('templates/footer');
            } else {
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar_notif', $data);
                $this->load->view('siswa/diterima', $data);
                $this->load->view('templates/footer');
            }
        } else {
            $nama = $this->input->post('nama_lengkap');
            $wa = $this->input->post('no_wa');
            $kelas = $this->input->post('kelas');
            $ekskul = $this->input->post('ekskul');
            $alasan = $this->input->post('alasan');

            // var_dump($kelas, $ekskul, $nama, $alasan);
            // die();

            $this->db->set('nama_lengkap', $nama);
            $this->db->set('no_wa', $wa);
            $this->db->set('kelas_id', $kelas);
            $this->db->set('ekskul_id', $ekskul);
            $this->db->set('alasan', $alasan);
            $this->db->set('status', 'Pending');
            $this->db->set('user_id', $data['user']['id']);
            $this->db->insert('siswa');
            $this->session->set_flashdata('message', '<div class="alert alert-success text-white font-weight-bold" role="alert">
            Terimakasih sudah mendaftar!</div>');
            redirect('siswa/daftar');
        }
    }

    public function terima_informasi()
    {
        $data['title'] = 'Informasi Ekstrakurikuler';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['informasi'] = $this->tambah_informasi->getTambah_informasiDataAll($data['user']['id'], 'Diterima');

        // var_dump($data['informasi']);
        // die(); // Mengambil data berita dari model

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('siswa/terima_informasi', $data);
        $this->load->view('templates/footer');
    }

    public function detail_informasi($id)
    {
        $data['title'] = 'Detail Informasi';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['getinformasi'] = $this->tambah_informasi->getInformasiById($id);
        // var_dump(['getinformasi']);
        // die();



        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('siswa/detail_informasi', $data);
        $this->load->view('templates/footer');
    }
}
