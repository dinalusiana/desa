<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('profil_m');
        $this->load->model('artikel_m');
        $this->load->model('penduduk_m');
        $this->load->model('Halaman_m','halaman');
    }
    public function index()
    {
        $penduduk = $this->penduduk_m;
        $data['penduduk'] = $penduduk->countAll();
        $artikel = $this->artikel_m;
        $data['news'] = $artikel->kabarTerkini();
        $data['recent'] = $artikel->recentArtikel();
        $data['title'] = "Selamat Datang di Portal Resmi Desa Sejomulyo";
        $this->load->view('themes/header', $data);
        $this->load->view('themes/top-menu', $data);
        $this->load->view('themes/slide-show');
        $this->load->view('themes/kabar-terkini', $data);
        $this->load->view('themes/struktur-organisasi');
        $this->load->view('themes/jumlah-penduduk');
        $this->load->view('themes/testimoni');
        $this->load->view('themes/recent-artikel');
        $this->load->view('themes/footer');
    }
    
    public function page($slug)//method untuk membuat halaman otomatis
    {
        $profil = $this->profil_m;
        $artikel = $this->artikel_m;
        $data['profilBpd'] = $profil->getProfilBpd();
        $data['popular'] = $artikel->kabarTerkini();
        $halamanweb = $this->halaman->getBySlug($slug);
        $data['title'] = $halamanweb['judul_halaman'];
        $data['halweb'] = $halamanweb;
        $this->load->view('themes/header', $data);
        $this->load->view('themes/top-menu', $data);
        $this->load->view('themes/breadcrumb');
        $this->load->view('themes/page',$data);
        $this->load->view('themes/sidebar');
        $this->load->view('themes/footer');
    }
    
    
}
