<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landingpage extends CI_Controller
{

    public function index()
    {
        // $data['title'] = 'My Profile';
        $this->load->view('templates/header');
        // $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/landingpage_topbar');
        $this->load->view('landingpage/index');
        $this->load->view('templates/landingpage_footer');
    }
}
