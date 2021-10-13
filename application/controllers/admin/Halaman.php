<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Halaman extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('menu_m', 'menu', true);
        $this->load->model('Halaman_m', 'halaman', true);
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = "Halaman Web";
        $data['menu'] = $this->menu->getAll();
        $data['halamanweb'] = $this->halaman->getAll();
        $this->load->view('_partials/header', $data);
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('_partials/top-menu');
        $this->load->view('admin/halaman/index');
        $this->load->view('_partials/footer');
    }

    public function tambah()
    {
        $rules = $this->halaman->rules();
        $validation = $this->form_validation->set_rules($rules);

        if ($validation->run() == false) {
            $data['title'] = "Tambah Halaman Web";
            $data['menu'] = $this->menu->getAll();
            $data['halamanweb'] = $this->halaman->getAll();
            $this->load->view('_partials/header', $data);
            $this->load->view('_partials/sidebar', $data);
            $this->load->view('_partials/top-menu');
            $this->load->view('admin/halaman/add');
            $this->load->view('_partials/footer');
        } else {
            $this->halaman->save();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Halaman Web berhasil ditambahkan!</div>');
            redirect('index.php/admin/halaman-web');
        }
    }

    public function edit($id = null)
    {
        $rules = $this->halaman->rules();
        $validation = $this->form_validation->set_rules($rules);

        if ($validation->run() == false) {
            $data['title'] = "Edit Halaman Web";
            $data['menu'] = $this->menu->getAll();
            $data['halamanweb'] = $this->halaman->getById($id);
            $data['halweb'] = $this->halaman->getAll();
            $this->load->view('_partials/header', $data);
            $this->load->view('_partials/sidebar', $data);
            $this->load->view('_partials/top-menu');
            $this->load->view('admin/halaman/edit');
            $this->load->view('_partials/footer');
        } else {
            $this->halaman->update();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Halaman Web berhasil diupdate!</div>');
            redirect('admin/halaman-web');
        }
    }

    public function hapus($id = null)
    {
        if (!isset($id))
            show_404();
        $delete = $this->halaman->delete($id);

        if ($delete) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Halaman Web berhasil dihapus!</div>');
            redirect('admin/halaman-web');
        }
    }
}
