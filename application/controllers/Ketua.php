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
}
