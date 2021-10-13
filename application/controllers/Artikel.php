<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artikel extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('artikel_m');
        $this->load->helper('text');
    }
    public function index()
    {
        $artikel = $this->artikel_m;
        $data['artikel'] = $artikel->getAll();
        $artikel = $this->artikel_m;
        $data['popular'] = $artikel->kabarTerkini();
        $data['title'] = "Artikel";
        $this->load->view('themes/header', $data);
        $this->load->view('themes/top-menu', $data);
        $this->load->view('themes/breadcrumb');
        $this->load->view('artikel/index');
        $this->load->view('themes/sidebar');
        $this->load->view('themes/footer');
    }

    public function readmore()
    {
        $artikel = $this->artikel_m;
        $id = $this->uri->segment(3);
        $data['artikel'] = $artikel->readMore($id);
        $artikel = $this->artikel_m;
        $data['popular'] = $artikel->kabarTerkini();
        $data['title'] = "Artikel";
        $this->load->view('themes/header', $data);
        $this->load->view('themes/top-menu', $data);
        $this->load->view('themes/breadcrumb');
        $this->load->view('artikel/readmore');
        $this->load->view('themes/sidebar');
        $this->load->view('themes/footer');
    }
}
