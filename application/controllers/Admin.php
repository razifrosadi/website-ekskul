<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'user');
        $this->load->model('Ekskul_model', 'ekskul');
        $this->load->model('Berita_model', 'berita');
        $this->load->model('Pelatih_model', 'pelatih');
        $this->load->library('form_validation');
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['user'] = $this->user->getUserData();
        $data['all_user'] = $this->user->getUserDataAll();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer', $data);
    }


    public function add_new_ekskul()
    {
        $data['title'] = 'Add New Ekskul';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['ekskul'] = $this->ekskul->getAllEkskul();
        $data['kategori'] = $this->ekskul->getAllKategori();

        $this->form_validation->set_rules('nama_ekskul', 'Ekskul', 'required');
        $this->form_validation->set_rules('kategori_ekskul_id', 'Kategori', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/add_new_ekskul', $data);
            $this->load->view('templates/footer');
        } else {
            $nama = $this->input->post('nama_ekskul');
            $kategori = $this->input->post('kategori_ekskul_id');
            $upload_img = $_FILES['logo_ekskul']['name'];

            if ($upload_img) {
                $config['upload_path']      = './assets/img/logo_ekskul/';
                $config['allowed_types']    = 'jpg|png|jpeg';
                $config['max_size']         = '2048';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('logo_ekskul')) {
                    echo "Upload gagal";
                    die();
                } else {
                    $upload_img = $this->upload->data('file_name');
                    $this->db->set('logo_ekskul', $upload_img);
                }
            }

            $this->db->set('nama_ekskul', $nama);
            $this->db->set('kategori_ekskul_id', $kategori);
            $this->db->insert('ekskul');
            $this->session->set_flashdata('message', '<div class="alert alert-success text-white font-weight-bold" role="alert">
            New Extracurriculars added!</div>');
            redirect('admin/add_new_ekskul');
        }
    }

    function edit_ekskul($id)
    {
        $where = array('ekskul_id' => $id);
        $data['title'] = 'Edit Ekskul';
        $data['ekskul'] = $this->ekskul->edit_data($where, 'ekskul')->result_array();
        $data['kategori'] = $this->ekskul->getAllKategori();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/edit_ekskul', $data);
        $this->load->view('templates/footer');
    }



    function update()
    {
        $id = $this->input->post('ekskul_id');
        $data['ekskul_row'] = $this->ekskul->getEkskulRow($id);

        $nama = $this->input->post('nama_ekskul');
        $kategori = $this->input->post('kategori_ekskul_id');

        $upload_img = $_FILES['logo_ekskul']['name'];

        if ($upload_img) {
            $config['upload_path']      = './assets/img/logo_ekskul';
            $config['allowed_types']    = 'jpg|png|jpeg';
            $config['max_size']         = '2048';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('logo_ekskul')) {
                echo "Upload gagal";
                die();
            } else {
                $upload_img = $this->upload->data('file_name');
                $data['ekskul_row']['logo_ekskul'] = $upload_img; // Update nama file logo pada data ekskul_row
            }
        }

        $data['ekskul_row']['nama_ekskul'] = $nama; // Update nama ekskul pada data ekskul_row
        $data['ekskul_row']['kategori_ekskul_id'] = $kategori; // Update kategori ekskul pada data ekskul_row

        $this->ekskul->update_data(['ekskul_id' => $id], $data['ekskul_row'], 'ekskul'); // Mengupdate data ekskul menggunakan model

        redirect('admin/add_new_ekskul');
    }



    function delete($id)
    {
        $where = array('ekskul_id' => $id);
        $this->ekskul->delete_data($where, 'ekskul');
        redirect('admin/add_new_ekskul');
    }


    public function registrasi_ketua()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
            'matches' => 'Password does not match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');


        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Registrasi Akun Ketua';
            $data['user'] = $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/registrasi_ketua', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 3,
                'is_active' => 1,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success text-white font-weight-bold" role="alert">
			Congratulations! youre account registered. Please log in now!</div>');
            redirect('admin');
        }
    }


    // CONTROLLER BERITA 
    public function berita()
    {
        $data['title'] = 'Berita';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['berita'] = $this->db->get('berita')->result_array();

        $this->form_validation->set_rules('judul_berita', 'Judul', 'required');
        $this->form_validation->set_rules('deskripsi_berita', 'Deskripsi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/berita', $data);
            $this->load->view('templates/footer');
        } else {
            $judul = $this->input->post('judul_berita');
            $deskripsi = $this->input->post('deskripsi_berita');
            $tanggal = $this->input->post('tanggal_berita');
            $upload_img = $_FILES['image_berita']['name'];

            // var_dump($upload_img);
            // die;

            if ($upload_img) {
                $config['upload_path']      = './assets/img/logo_ekskul/';
                $config['allowed_types']    = 'jpg|png|jpeg';
                $config['max_size']         = '2048';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('image_berita')) {
                    echo "Upload gagal";
                    die();
                } else {
                    $upload_img = $this->upload->data('file_name');
                    $this->db->set('image_berita', $upload_img);
                }
            }

            // Mengubah format tanggal ke format datetime
            $tanggal_obj = new DateTime($tanggal);
            $tanggal_db = $tanggal_obj->format('Y-m-d H:i:s');

            $this->db->set('judul_berita', $judul);
            $this->db->set('deskripsi_berita', $deskripsi);
            $this->db->set('tanggal_berita', $tanggal_db);
            $this->db->insert('berita');
            $this->session->set_flashdata('message', '<div class="alert alert-success text-white font-weight-bold" role="alert">
        New Berita added!</div>');
            redirect('admin/berita');
        }
    }

    function edit_berita($id_berita)
    {
        $where = array('id_berita' => $id_berita);
        $data['title'] = 'Tambahkan Berita';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['berita'] = $this->berita->edit_data($where, 'berita')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/edit_berita', $data);
        $this->load->view('templates/footer');
    }

    function update_berita()
    {
        $id_berita = $this->input->post('id_berita');
        $data['berita_row'] = $this->berita->getBeritaRow($id_berita);

        $judul = $this->input->post('judul_berita');
        $deskripsi = $this->input->post('deskripsi_berita');
        $tanggal = $this->input->post('tanggal_berita');

        $upload_img = $_FILES['image_berita']['name'];

        if ($upload_img) {
            $config['upload_path']      = './assets/img/logo_ekskul';
            $config['allowed_types']    = 'jpg|png|jpeg';
            $config['max_size']         = '2048';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image_berita')) {
                echo "Upload gagal";
                die();
            } else {
                $upload_img = $this->upload->data('file_name');
                $data['ekskul_row']['image_berita'] = $upload_img; // Update nama file logo pada data berita_row
            }
        }

        // Mengubah format tanggal ke format datetime
        $tanggal_obj = new DateTime($tanggal);
        $tanggal_db = $tanggal_obj->format('Y-m-d H:i:s');

        $data['berita_row']['judul_berita'] = $judul; // Update nama berita pada data berita_row
        $data['berita_row']['deskripsi_berita'] = $deskripsi; // Update kategori berita pada data ekskul_row
        $data['berita_row']['tanggal_berita'] = $tanggal_db; // Update

        $this->berita->update_data(['id_berita' => $id_berita], $data['berita_row'], 'berita'); // Mengupdate data berita menggunakan model

        redirect('admin/berita');
    }


    function delete_berita($id_berita)
    {
        $where = array('id_berita' => $id_berita);
        $this->berita->delete_data($where, 'berita');
        redirect('admin/berita');
    }

    // CONTROLLER PELATIH
    public function pelatih()
    {
        $data['title'] = 'Pelatih';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        // $data['pelatih'] = $this->db->get('pelatih')->result_array();
        $data['ekskul'] = $this->ekskul->getAllEkskul();
        $data['pelatih'] = $this->pelatih->getAllPelatih();

        $this->form_validation->set_rules('nama_pelatih', 'Nama Pelatih', 'required');
        $this->form_validation->set_rules('id_ekskul', 'Ekskul', 'required');
        $this->form_validation->set_rules('deskripsi_pelatih', 'Deskripsi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/pelatih', $data);
            $this->load->view('templates/footer');
        } else {
            $pelatih = $this->input->post('nama_pelatih');
            $ekskulid = $this->input->post('id_ekskul');
            $deskpelatih = $this->input->post('deskripsi_pelatih');
            $upload_img = $_FILES['image_pelatih']['name'];

            // var_dump($upload_img);
            // die;

            if ($upload_img) {
                $config['upload_path']      = './assets/img/logo_ekskul/';
                $config['allowed_types']    = 'jpg|png|jpeg';
                $config['max_size']         = '2048';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('image_pelatih')) {
                    echo "Upload gagal";
                    die();
                } else {
                    $upload_img = $this->upload->data('file_name');
                    $this->db->set('image_pelatih', $upload_img);
                }
            }


            $this->db->set('nama_pelatih', $pelatih);
            $this->db->set('id_ekskul', $ekskulid);
            $this->db->set('deskripsi_pelatih', $deskpelatih);
            $this->db->insert('pelatih');
            $this->session->set_flashdata('message', '<div class="alert alert-success text-white font-weight-bold" role="alert">
        Tambahkan Pelatih Baru!</div>');
            redirect('admin/pelatih');
        }
    }
}
