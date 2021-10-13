<?php
defined('BASEPATH') or exit('No direct script access allowed');

class foto extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('foto_m', 'foto', true);
        $this->load->model('artikel_m');
    }
    public function index()
    {
        $data['foto'] = $this->foto->getAll();
        $data['title'] = "foto";
        $artikel = $this->artikel_m;
        $data['popular'] = $artikel->kabarTerkini();
        $data['title'] = "Galery Desa";
        

        
        $this->load->view('themes/header', $data);
        $this->load->view('themes/top-menu', $data);
        $this->load->view('themes/breadcrumb');
        $this->load->view('foto/index');
        $this->load->view('themes/sidebar');
        $this->load->view('themes/footer');
    }
}
