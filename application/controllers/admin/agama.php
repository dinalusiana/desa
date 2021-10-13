<?php
defined('BASEPATH') or exit('No direct script access allowed');//validasi, untuk memproteksi untuk memproteksi agar script yang kita buat tidak dapat dialses secara langsung dan harus melalui www.namaweb.com/controller

class agama extends CI_Controller//disini kita akan mmebuat sebuah class agama. class agama ini diatur dengan extend supaya bisa menggunakan fitur dari class CI controller yg dpt menghubungkan view dengan model 
{

    public function __construct() //Method __construct() merupakan sebuah konstruktor. Method ini yang akan dieksekusi pertama kali saat Controller diakses.
    {//Pada method ini, kita melakukan load model (agama_m) dan menu_m
        parent::__construct();
        $this->load->model('agama_m');
        $this->load->model('menu_m');
        is_logged_in();
    }

    public function index()//kita akan mengambil data dari model dengan memanggil method menu->getAll() dan agama
    { //Lalu kita me-rendernya ke dalam view admin/agama/index
        $menu = $this->menu_m;
        $agama = $this->agama_m;
        $data['menu'] = $menu->getAll();
        $data['agama'] = $agama->getAll();
        $data['title'] = "agama";

        $this->load->view('_partials/header', $data);
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('_partials/top-menu');
        $this->load->view('admin/agama/index');
        $this->load->view('_partials/footer');
    }

    public function tambah()//Method ini bertugas untuk menampilkan form add dan menyimpan data ke database.
    {//sebelum memanggil method save(), kita lakukan validasi terlebih dahulu dengan mengeksekusi method run() pada objek $validation.
        $menu = $this->menu_m;//objek model
        $agama = $this->agama_m;//objek model
        $rules = $agama->rules();//terapkan rules
        $validation = $this->form_validation->set_rules($rules);//Library form_validation akan kita gunakan untuk memvalidasi input pada method add() dan edit().

        if ($validation->run() == false) {
            $data['title'] = "agama";
            $data['menu'] = $menu->getAll();
            $data['agama'] = $agama->getAll();
            $this->load->view('_partials/header', $data);
            $this->load->view('_partials/sidebar', $data);
            $this->load->view('_partials/top-menu');
            $this->load->view('admin/agama/add');
            $this->load->view('_partials/footer');
        } else {
            $agama->save();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">agama berhasil ditambahkan!</div>');
            redirect('admin/agama');//Jika berhasil, maka pesan "Berhasil disimpan" akan ditampilkan.
            //Terakhir, kita akan menampilkan view admin/agama
        }
    }

    public function edit($id = null)//id data yg akan diedit. default null agar data mdah dicek
    {
        $menu = $this->menu_m;//objek model
        $agama = $this->agama_m;//objjek model
        $rules = $agama->editRules();//terapkan rules
        $validation = $this->form_validation->set_rules($rules);

        if ($validation->run() == false) {
            $data['title'] = "agama";
            $data['menu'] = $menu->getAll();
            $data['agama'] = $agama->getById($id);
            $this->load->view('_partials/header', $data);
            $this->load->view('_partials/sidebar', $data);
            $this->load->view('_partials/top-menu');
            $this->load->view('admin/agama/edit');
            $this->load->view('_partials/footer');
        } else {
            $agama->update();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">agama berhasil diupdate!</div>');
            redirect('admin/agama');
        }
    }

    public function hapus($id = null)
    {
        $agama = $this->agama_m;
        if (!isset($id)) //isset digunakan untuk memeriksa ketersediaan variabel form
            show_404();
        $delete = $agama->delete($id);

        if ($delete) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">agama berhasil dihapus!</div>');
            redirect('admin/agama');
        }
    }

    public function print()
    { 
        $data['agama'] = $this->agama_m->tampil_data("agama")->result();
        $this->load->view('admin/agama/print', $data);
    }


}
