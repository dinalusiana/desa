<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Demografi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pendidikan_m');
        $this->load->model('Pekerjaan_m');
        $this->load->model('agama_m');
        $this->load->model('penduduk_m');
        $this->load->model('artikel_m');
    }

    public function index()
    {
        $data['popular'] = $this->artikel_m->kabarTerkini();

        $penduduk = $this->penduduk_m->exec_ChartPenduduk();

        $data['pendudukwanita'] = [];
        $data['pendudukwanita_jumlah'] = [];
        $data['pendudukpria'] = [];
        $data['pendudukpria_jumlah'] = [];

        for ($x = 0; $x <= 3; $x++) {
            array_push($data['pendudukwanita'], $penduduk[$x]['kategori_usia']);
            array_push($data['pendudukwanita_jumlah'], $penduduk[$x]['jumlah']);
        }

        for ($x = 4; $x <= 7; $x++) {
            array_push($data['pendudukpria'], $penduduk[$x]['kategori_usia']);
            array_push($data['pendudukpria_jumlah'], $penduduk[$x]['jumlah']);
        }

        $data['title'] = "Demografi Penduduk";

        $data["pendidikan"] = $this->penduduk_m->tampil_pendidikan();
        $data["pekerjaan"] = $this->penduduk_m->tampil_pekerjaan();
        $data["agama"] = $this->penduduk_m->tampil_agama();

        $data['hasil'] = $this->penduduk_m->pendidikan_jumlah();
        $data['hasil1'] = $this->penduduk_m->pekerjaan_jumlah();
        $data['hasil2'] = $this->penduduk_m->agama_jumlah();

        // echo "<pre>";
        // var_dump($data['hasil1']);
        // die();

        $this->load->view('themes/header', $data);
        $this->load->view('themes/top-menu', $data);
        $this->load->view('themes/breadcrumb');
        $this->load->view('demografi/canvas', $data);
        $this->load->view('themes/sidebar');
        $this->load->view('demografi/footer');
    }
}
