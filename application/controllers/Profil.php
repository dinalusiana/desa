<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('profil_m');
        $this->load->model('artikel_m');
        $artikel = $this->artikel_m;
        $data['popular'] = $artikel->kabarTerkini();
    }

    public function desa()
    {
        $profil = $this->profil_m;
        $data['gambaran_umum'] = $profil->getGambaranUmum();
        $artikel = $this->artikel_m;
        $data['popular'] = $artikel->kabarTerkini();
        $data['title'] = "Profil Desa Sejomulyo";

        $this->load->view('themes/header', $data);
        $this->load->view('themes/top-menu', $data);
        $this->load->view('themes/breadcrumb');
        $this->load->view('profil/desa');
        $this->load->view('themes/sidebar');
        $this->load->view('themes/footer');
    }


    public function pemdes()
    {
        $profil = $this->profil_m;
        $data['profilPemdes'] = $profil->getProfilPemdes();
        $artikel = $this->artikel_m;
        $data['popular'] = $artikel->kabarTerkini();
        $data['title'] = "Profil Pemerintah Desa Bahari";

        $this->load->view('themes/header', $data);
        $this->load->view('themes/top-menu', $data);
        $this->load->view('themes/breadcrumb');
        $this->load->view('profil/pemdes');
        $this->load->view('themes/sidebar');
        $this->load->view('themes/footer');
    }

    public function bpd()
    {
        $profil = $this->profil_m;
        $data['profilBpd'] = $profil->getProfilBpd();
        $artikel = $this->artikel_m;
        $data['popular'] = $artikel->kabarTerkini();
        $data['title'] = "Profil Badan Permusyawaratan Desa Sejomulyo";

        $this->load->view('themes/header', $data);
        $this->load->view('themes/top-menu', $data);
        $this->load->view('themes/breadcrumb');
        $this->load->view('profil/bpd');
        $this->load->view('themes/sidebar');
        $this->load->view('themes/footer');
    }

    public function sejarah()
    {
        $profil = $this->profil_m;
        $data['sejarah'] = $profil->getsejarah();
        $artikel = $this->artikel_m;
        $data['popular'] = $artikel->kabarTerkini();
        $data['title'] = "sejarah Desa Sejomulyo";

        $this->load->view('themes/header', $data);
        $this->load->view('themes/top-menu', $data);
        $this->load->view('themes/breadcrumb');
        $this->load->view('profil/sejarah');
        $this->load->view('themes/sidebar');
        $this->load->view('themes/footer');
    }

    public function visimisi()
    {
        $profil = $this->profil_m;
        $data['visimisi'] = $profil->getvisimisi();
        $artikel = $this->artikel_m;
        $data['popular'] = $artikel->kabarTerkini();
        $data['title'] = "Visi Misi Desa Sejomulyo";

        $this->load->view('themes/header', $data);
        $this->load->view('themes/top-menu', $data);
        $this->load->view('themes/breadcrumb');
        $this->load->view('profil/visimisi');
        $this->load->view('themes/sidebar');
        $this->load->view('themes/footer');
    }

    public function potensi()
    {
        $profil = $this->profil_m;
        $data['potensi'] = $profil->getpotensi();
        $artikel = $this->artikel_m;
        $data['popular'] = $artikel->kabarTerkini();
        $data['title'] = "Potensi Desa Sejomulyo";

        $this->load->view('themes/header', $data);
        $this->load->view('themes/top-menu', $data);
        $this->load->view('themes/breadcrumb');
        $this->load->view('profil/potensi');
        $this->load->view('themes/sidebar');
        $this->load->view('themes/footer');
    }

    public function karangtaruna()
    {
        $profil = $this->profil_m;
        $data['karangtaruna'] = $profil->getkarangtaruna();
        $artikel = $this->artikel_m;
        $data['popular'] = $artikel->kabarTerkini();
        $data['title'] = "Karang Taruna Desa Sejomulyo";

        $this->load->view('themes/header', $data);
        $this->load->view('themes/top-menu', $data);
        $this->load->view('themes/breadcrumb');
        $this->load->view('profil/karangtaruna');
        $this->load->view('themes/sidebar');
        $this->load->view('themes/footer');
    }

    public function pkk()
    {
        $profil = $this->profil_m;
        $data['pkk'] = $profil->getpkk();
        $artikel = $this->artikel_m;
        $data['popular'] = $artikel->kabarTerkini();
        $data['title'] = "PKK Desa Sejomulyo";

        $this->load->view('themes/header', $data);
        $this->load->view('themes/top-menu', $data);
        $this->load->view('themes/breadcrumb');
        $this->load->view('profil/pkk');
        $this->load->view('themes/sidebar');
        $this->load->view('themes/footer');
    }
    public function lpmd()
    {
        $profil = $this->profil_m;
        $data['lpmd'] = $profil->getlpmd();
        $artikel = $this->artikel_m;
        $data['popular'] = $artikel->kabarTerkini();
        $data['title'] = "LPMD Desa Sejomulyo";

        $this->load->view('themes/header', $data);
        $this->load->view('themes/top-menu', $data);
        $this->load->view('themes/breadcrumb');
        $this->load->view('profil/lpmd');
        $this->load->view('themes/sidebar');
        $this->load->view('themes/footer');
    }
    public function kpmd()
    {
        $profil = $this->profil_m;
        $data['kpmd'] = $profil->getkpmd();
        $artikel = $this->artikel_m;
        $data['popular'] = $artikel->kabarTerkini();
        $data['title'] = "KPMD Desa Sejomulyo";

        $this->load->view('themes/header', $data);
        $this->load->view('themes/top-menu', $data);
        $this->load->view('themes/breadcrumb');
        $this->load->view('profil/kpmd');
        $this->load->view('themes/sidebar');
        $this->load->view('themes/footer');
    }

    public function ktp()
    {
        $profil = $this->profil_m;
        $data['ktp'] = $profil->getktp();
        $artikel = $this->artikel_m;
        $data['popular'] = $artikel->kabarTerkini();
        $data['title'] = "KTP Desa Sejomulyo";

        $this->load->view('themes/header', $data);
        $this->load->view('themes/top-menu', $data);
        $this->load->view('themes/breadcrumb');
        $this->load->view('profil/ktp');
        $this->load->view('themes/sidebar');
        $this->load->view('themes/footer');
    }

    public function infosurat()
    {
        $profil = $this->profil_m;
        $data['infosurat'] = $profil->getinfosurat();
        $artikel = $this->artikel_m;
        $data['popular'] = $artikel->kabarTerkini();
        $data['title'] = "info surat Desa Sejomulyo";

        $this->load->view('themes/header', $data);
        $this->load->view('themes/top-menu', $data);
        $this->load->view('themes/breadcrumb');
        $this->load->view('profil/infosurat');
        $this->load->view('themes/sidebar');
        $this->load->view('themes/footer');
    }



}
