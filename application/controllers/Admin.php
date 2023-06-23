<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Ekskul_model', 'ekskul');
        $this->load->library('form_validation');
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }


    public function add_new_ekskul()
    {
        $data['title'] = 'Add New Extracurriculars';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['ekskul'] = $this->ekskul->getAllEkskul();
        $data['kategori'] = $this->ekskul->getAllKategori();
        $data['ketua'] = $this->ekskul->getAllKetua();
        $data['ketuaekskul'] = $this->ekskul->getAllKetuaEkskul();

        $this->form_validation->set_rules('nama_ekskul', 'Ekskul', 'required');
        $this->form_validation->set_rules('kategori_ekskul_id', 'Kategori', 'required');
        $this->form_validation->set_rules('logo_ekskul', 'Logo', 'required');

        // var_dump($data['ekskul']);
        // die;
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/add_new_ekskul', $data);
            $this->load->view('templates/footer');
        } else {

            $ekskulData = [
                'nama_ekskul' => $this->input->post('nama_ekskul'),
                'kategori_ekskul_id' => $this->input->post('kategori_ekskul_id'),
                'ketua_id' => $this->input->post('ketua_id'),
                // 'logo_ekskul' => $this->input->post('logo_ekskul'),

            ];
            $upload_img = $_FILES['logo_ekskul']['name'];

            // var_dump($upload_img);
            // die;

            if ($upload_img) {
                $config['upload_path'] = './assets/img/logo_ekskul/';
                $config['allowed_types'] = 'gif|jpg|JPG|png|ico|jpeg';
                $config['max_size']     = '2048';

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('logo_ekskul')) {
                    $old_img = $data['ekskul']['logo_ekskul'];
                    if ($old_img != 'default_mobil.jpg') {
                        unlink(FCPATH . 'assets/img/logo_ekskul/' . $old_img);
                    }
                    $new_img = $this->upload->data('file_name');
                    $this->db->set('logo_ekskul', $new_img);
                    $this->db->insert('ekskul', $ekskulData);
                } else {
                    echo $this->upload->display_errors();
                };
                $this->db->insert('ekskul', $ekskulData);
                $this->session->set_flashdata('message', '<div class="alert alert-success text-white font-weight-bold" role="alert">
			New Extracurriculars added!</div>');
                redirect('admin/add_new_ekskul');
            }
        }
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
            $data['title'] = 'Registration';
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
}
