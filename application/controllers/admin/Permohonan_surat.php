<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Permohonan_surat extends CI_Controller
{

    public function __construct()//Method __construct() merupakan sebuah konstruktor. Method ini yang akan dieksekusi pertama kali saat Controller diakses.
    {//Pada method ini, kita melakukan load model (permohonan_surat_m) dan menu_m
        parent::__construct();
        $this->load->model('Permohonan_surat_m','permohonan_surat_m');
        $this->load->model('menu_m');
        is_logged_in();
    }

    public function index()//kita akan mengambil data dari model dengan memanggil method menu->getAll() dan permohonan_surat getall
    {//Lalu kita me-rendernya ke dalam view admin/permohonan_surat/index
        $menu = $this->menu_m;
        $permohonan_surat = $this->permohonan_surat_m;
        $data['menu'] = $menu->getAll();
        $data['permohonan_surat'] = $permohonan_surat->getAll();
        $data['title'] = "permohonan_surat";

        $this->load->view('_partials/header', $data);
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('_partials/top-menu');
        $this->load->view('admin/permohonan_surat/index');
        $this->load->view('_partials/footer');
    }

    public function tambah()//Method ini bertugas untuk menampilkan form add dan menyimpan data ke database.
    {//sebelum memanggil method save(), kita lakukan validasi terlebih dahulu dengan mengeksekusi method run() pada objek $validation.
        $menu = $this->menu_m;//objek model
        $permohonan_surat = $this->permohonan_surat_m;//objek model
        $rules = $permohonan_surat->rules();//terapkan rules
        $validation = $this->form_validation->set_rules($rules);//Library form_validation akan kita gunakan untuk memvalidasi input pada method add() dan edit().

        if ($validation->run() == false) {
            $data['title'] = "permohonan_surat";
            $data['menu'] = $menu->getAll();
            $data['permohonan_surat'] = $permohonan_surat->getAll();
            $this->load->view('_partials/header', $data);
            $this->load->view('_partials/sidebar', $data);
            $this->load->view('_partials/top-menu');
            $this->load->view('admin/permohonan_surat/add');
            $this->load->view('_partials/footer');
        } else {
            $permohonan_surat->save();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">permohonan_surat berhasil ditambahkan!</div>');
            redirect('admin/permohonan_surat');//Jika berhasil, maka pesan "Berhasil disimpan" akan ditampilkan.
        }//Terakhir, kita akan menampilkan view admin/permohonan_surat
    }

    public function edit($id = null)//id data yg akan diedit. default null agar data mdah dicek
    {
        $menu = $this->menu_m;
        $permohonan_surat = $this->permohonan_surat_m;
        $rules = $permohonan_surat->editRules();
        $validation = $this->form_validation->set_rules($rules);

        if ($validation->run() == false) {
            $data['title'] = "permohonan_surat";
            $data['menu'] = $menu->getAll();
            $data['permohonan_surat'] = $permohonan_surat->getById($id);
            $this->load->view('_partials/header', $data);
            $this->load->view('_partials/sidebar', $data);
            $this->load->view('_partials/top-menu');
            $this->load->view('admin/permohonan_surat/edit');
            $this->load->view('_partials/footer');
        } else {
            $permohonan_surat->update();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">permohonan surat berhasil diupdate!</div>');
            redirect('admin/permohonan_surat');
        }
    }

    public function hapus($id = null)
    {
        $permohonan_surat = $this->permohonan_surat_m;
        if (!isset($id))//isset digunakan untuk memeriksa ketersediaan variabel form
            show_404();
        $delete = $permohonan_surat->delete($id);

        if ($delete) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">permohonan surat berhasil dihapus!</div>');
            redirect('admin/permohonan_surat');
        }
    }
    
    // public function konfirmasiproses($id) {
    //     $query = $this->db->query("UPDATE permohonan_surat SET proses='sudah proses' WHERE id_surat_permohonan='$id'");
    //     if($query) {
    //         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Permohonan Surat Sudah Diproses!</div>');
    //         redirect('admin/permohonan_surat');
    //     }
    // }
}
