<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ketua extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tambah_informasi_model', 'tambah_informasi');
        $this->load->model('Siswa_model', 'siswa');
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Data Anggota Ekstrakurikuler';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        // $data['siswa'] = $this->siswa->getAllSiswa();
        $data['siswa'] = $this->siswa->getAllSiswaByEkskul($data['user']['id']);
        // var_dump($data['siswa']);
        // die();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('ketua/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_informasi()
    {
        $data['title'] = 'Tambah Informasi';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['informasi'] = $this->db->get('tambah_informasi')->result_array();

        $this->form_validation->set_rules('judul_informasi', 'Judul', 'required');
        $this->form_validation->set_rules('deskripsi_informasi', 'Deskripsi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('ketua/tambah_informasi', $data);
            $this->load->view('templates/footer');
        } else {
            $judul = $this->input->post('judul_informasi');
            $deskripsi = $this->input->post('deskripsi_informasi');
            $tanggal = $this->input->post('tanggal_informasi');
            $upload_img = $_FILES['image_informasi']['name'];

            // var_dump($upload_img);
            // die;

            if ($upload_img) {
                $config['upload_path']      = './assets/img/logo_ekskul/';
                $config['allowed_types']    = 'jpg|png|jpeg';
                $config['max_size']         = '2048';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('image_informasi')) {
                    echo "Upload gagal";
                    die();
                } else {
                    $upload_img = $this->upload->data('file_name');
                    $this->db->set('image_informasi', $upload_img);
                }
            }

            // Mengubah format tanggal ke format datetime
            $tanggal_obj = new DateTime($tanggal);
            $tanggal_db = $tanggal_obj->format('Y-m-d H:i:s');

            $this->db->set('judul_informasi', $judul);
            $this->db->set('deskripsi_informasi', $deskripsi);
            $this->db->set('tanggal_informasi', $tanggal_db);
            $this->db->insert('tambah_informasi');
            $this->session->set_flashdata('message', '<div class="alert alert-success text-white font-weight-bold" role="alert">
        New informasi added!</div>');
            redirect('ketua/tambah_informasi');
        }
    }

    function edit_tambah_informasi($id_informasi)
    {
        $where = array('id_informasi' => $id_informasi);
        $data['title'] = 'Tambahkan Informasi';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['tambah_informasi'] = $this->tambah_informasi->edit_data($where, 'tambah_informasi')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('ketua/edit_tambah_informasi', $data);
        $this->load->view('templates/footer');
    }

    function update_tambah_informasi()
    {
        $id_informasi = $this->input->post('id_informasi');
        $data['tambah_informasi_row'] = $this->tambah_informasi->getTambah_informasiRow($id_informasi);

        $judul = $this->input->post('judul_informasi');
        $deskripsi = $this->input->post('deskripsi_informasi');
        $tanggal = $this->input->post('tanggal_informasi');

        $upload_img = $_FILES['image_informasi']['name'];

        if ($upload_img) {
            $config['upload_path']      = './assets/img/logo_ekskul';
            $config['allowed_types']    = 'jpg|png|jpeg';
            $config['max_size']         = '2048';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image_informasi')) {
                echo "Upload gagal";
                die();
            } else {
                $upload_img = $this->upload->data('file_name');
                $data['tambah_informasi_row']['image_informasi'] = $upload_img; // Update nama file logo pada data informasi_row
            }
        }

        // Mengubah format tanggal ke format datetime
        $tanggal_obj = new DateTime($tanggal);
        $tanggal_db = $tanggal_obj->format('Y-m-d H:i:s');

        $data['tambah_informasi_row']['judul_informasi'] = $judul; // Update nama tambah_informasi pada data tambah_informasi_row
        $data['tambah_informasi_row']['deskripsi_informasi'] = $deskripsi; // Update kategori tambah_informasi pada data ekskul_row
        $data['tambah_informasi_row']['tanggal_informasi'] = $tanggal_db; // Update

        $this->tambah_informasi->update_data(['id_informasi' => $id_informasi], $data['tambah_informasi_row'], 'tambah_informasi'); // Mengupdate data tambah_informasi menggunakan model

        redirect('ketua/tambah_informasi');
    }


    function delete_tambah_informasi($id_informasi)
    {
        $where = array('id_informasi' => $id_informasi);
        $this->tambah_informasi->delete_data($where, 'tambah_informasi');
        redirect('ketua/tambah_informasi');
    }

    public function anggota()
    {
        $data['title'] = 'Anggota';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->siswa->getAllSiswaByEkskul($data['user']['id']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('ketua/anggota', $data);
        $this->load->view('templates/footer');
    }

    public function diterima($id)
    {
        var_dump($id);
    }
    public function ditolak($id)
    {
        $data['siswa']['status'] = 'Ditolak';
        $this->siswa->update_data(['id_siswa' => $id], $data['siswa'], 'siswa'); // Mengupdate data berita menggunakan model

        // redirect('ketua');
        // $where = array('id_siswa' => $id);
        // $this->siswa->update_data($where, 'siswa', ['status' => 'Ditolak']);
        redirect('ketua');
    }
}
