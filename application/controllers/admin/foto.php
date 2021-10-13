<?php
defined('BASEPATH') or exit('No direct script access allowed');

class foto extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('foto_m', 'foto', true);
        $this->load->model('menu_m', 'menu', true);
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = "foto";
        $data['menu'] = $this->menu->getAll();
        $data['foto'] = $this->foto->getAll();
        $this->load->view('_partials/header', $data);
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('_partials/top-menu');
        $this->load->view('admin/foto/index');
        $this->load->view('_partials/footer');
    }

    public function tambah()
    {
        $rules = $this->foto->rules();
        $validation = $this->form_validation->set_rules($rules);

        if ($validation->run() == false) {
            $data['title'] = "foto";
            $data['menu'] = $this->menu->getAll();
            $data['foto'] = $this->foto->getAll();
            $this->load->view('_partials/header', $data);
            $this->load->view('_partials/sidebar', $data);
            $this->load->view('_partials/top-menu');
            $this->load->view('admin/foto/add');
            $this->load->view('_partials/footer');
        } else {
            $this->foto->save();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Info desa berhasil ditambahkan!</div>');
            redirect('admin/foto');
        }
    }

    public function edit($id = null)
    {
        $rules = $this->foto->rules();
        $validation = $this->form_validation->set_rules($rules);

        if ($validation->run() == false) {
            $data['title'] = "foto";
            $data['menu'] = $this->menu->getAll();
            $data['foto'] = $this->foto->getById($id);
            $this->load->view('_partials/header', $data);
            $this->load->view('_partials/sidebar', $data);
            $this->load->view('_partials/top-menu');
            $this->load->view('admin/foto/edit');
            $this->load->view('_partials/footer');
        } else {
            $this->foto->update();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Info desa berhasil diupdate!</div>');
            redirect('admin/foto');
        }
    }

    public function hapus($id = null)
    {
        if (!isset($id))
            show_404();
        $delete = $this->foto->delete($id);

        if ($delete) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Info desa berhasil dihapus!</div>');
            redirect('admin/foto');
        }
    }
}
