<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_m');
        $this->load->model('menu_m');
        is_logged_in();
    }

    public function index()
    {
        $menu = $this->menu_m;
        $admin = $this->admin_m;
        $data['menu'] = $menu->getAll();
        $data['admin'] = $admin->getAll();
        $data['title'] = "admin";

        $this->load->view('_partials/header', $data);
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('_partials/top-menu');
        $this->load->view('admin/admin/index');
        $this->load->view('_partials/footer');
    }

    public function tambah()
    {
        $menu = $this->menu_m;
        $admin = $this->admin_m;
        $rules = $admin->rules();
        $validation = $this->form_validation->set_rules($rules);

        if ($validation->run() == false) {
            $data['title'] = "admin";
            $data['menu'] = $menu->getAll();
            $data['admin'] = $admin->getAll();
            $this->load->view('_partials/header', $data);
            $this->load->view('_partials/sidebar', $data);
            $this->load->view('_partials/top-menu');
            $this->load->view('admin/admin/add');
            $this->load->view('_partials/footer');
        } else {
            $admin->save();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">admin berhasil ditambahkan!</div>');
            redirect('admin/admin');
        }
    }

    public function edit($id = null)
    {
        $menu = $this->menu_m;
        $admin = $this->admin_m;
        $rules = $admin->editRules();
        $validation = $this->form_validation->set_rules($rules);

        if ($validation->run() == false) {
            $data['title'] = "admin";
            $data['menu'] = $menu->getAll();
            $data['admin'] = $admin->getById($id);
            $this->load->view('_partials/header', $data);
            $this->load->view('_partials/sidebar', $data);
            $this->load->view('_partials/top-menu');
            $this->load->view('admin/admin/edit');
            $this->load->view('_partials/footer');
        } else {
            $admin->update();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">admin berhasil diupdate!</div>');
            redirect('admin/admin');
        }
    }

    public function hapus($id = null)
    {
        $admin = $this->admin_m;
        if (!isset($id))
            show_404();
        $delete = $admin->delete($id);

        if ($delete) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">admin berhasil dihapus!</div>');
            redirect('admin/admin');
        }
    }
}
