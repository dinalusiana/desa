<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pekerjaan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pekerjaan_m');
        $this->load->model('menu_m');
        is_logged_in();
    }

    public function index()
    {
        $menu = $this->menu_m;
        $pekerjaan = $this->pekerjaan_m;
        $data['menu'] = $menu->getAll();
        $data['pekerjaan'] = $pekerjaan->getAll();
        $data['title'] = "pekerjaan";

        $this->load->view('_partials/header', $data);
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('_partials/top-menu');
        $this->load->view('admin/pekerjaan/index');
        $this->load->view('_partials/footer');
    }

    public function tambah()
    {
        $menu = $this->menu_m;
        $pekerjaan = $this->pekerjaan_m;
        $rules = $pekerjaan->rules();
        $validation = $this->form_validation->set_rules($rules);

        if ($validation->run() == false) {
            $data['title'] = "pekerjaan";
            $data['menu'] = $menu->getAll();
            $data['pekerjaan'] = $pekerjaan->getAll();
            $this->load->view('_partials/header', $data);
            $this->load->view('_partials/sidebar', $data);
            $this->load->view('_partials/top-menu');
            $this->load->view('admin/pekerjaan/add');
            $this->load->view('_partials/footer');
        } else {
            $pekerjaan->save();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">pekerjaan berhasil ditambahkan!</div>');
            redirect('admin/pekerjaan');
        }
    }

    public function edit($id = null)
    {
        $menu = $this->menu_m;
        $pekerjaan = $this->pekerjaan_m;
        $rules = $pekerjaan->editRules();
        $validation = $this->form_validation->set_rules($rules);

        if ($validation->run() == false) {
            $data['title'] = "pekerjaan";
            $data['menu'] = $menu->getAll();
            $data['pekerjaan'] = $pekerjaan->getById($id);
            $this->load->view('_partials/header', $data);
            $this->load->view('_partials/sidebar', $data);
            $this->load->view('_partials/top-menu');
            $this->load->view('admin/pekerjaan/edit');
            $this->load->view('_partials/footer');
        } else {
            $pekerjaan->update();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">pekerjaan berhasil diupdate!</div>');
            redirect('admin/pekerjaan');
        }
    }

    public function hapus($id = null)
    {
        $pekerjaan = $this->pekerjaan_m;
        if (!isset($id))
            show_404();
        $delete = $pekerjaan->delete($id);

        if ($delete) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">pekerjaan berhasil dihapus!</div>');
            redirect('admin/pekerjaan');
        }
    }

    public function print()
    { 
        $data['pekerjaan'] = $this->pekerjaan_m->tampil_data("pekerjaan")->result();
        $this->load->view('admin/pekerjaan/print', $data);
    }
}
