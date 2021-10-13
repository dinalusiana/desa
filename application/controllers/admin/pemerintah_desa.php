<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pemerintah_desa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pemerintah_desa_m');
        $this->load->model('penduduk_m');
        $this->load->model('jabatan_m');
        $this->load->model('menu_m');
        is_logged_in();
    }

    public function index()
    {
        $menu = $this->menu_m;
        // $pemerintah_desa = $this->pemerintah_desa_m;
        $data['menu'] = $menu->getAll();
        $data['pemerintah_desa'] = $this->pemerintah_desa_m->getAll();
        $data['joinpemdes'] = $this->pemerintah_desa_m->joinpemdes1();
        $data['title'] = "pemerintah_desa";

        $this->load->view('_partials/header', $data);
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('_partials/top-menu');
        $this->load->view('admin/pemerintah_desa/index', $data);
        $this->load->view('_partials/footer');
    }

    public function tambah()
    {
        $menu = $this->menu_m;
        $pemerintah_desa = $this->pemerintah_desa_m;
        $rules = $pemerintah_desa->rules();
        $validation = $this->form_validation->set_rules($rules);

        if ($validation->run() == false) {
            $this->session->set_tempdata('success', 'Berhasil dikeluarkan',1);
            $data['title'] = "pemerintah_desa";
            $data['menu'] = $menu->getAll();
            $data['pemerintah_desa'] = $pemerintah_desa->getAll();
            $data["jabatan"] = $this->jabatan_m->tampil_jabatan();

            
            $this->load->view('_partials/header', $data);
            $this->load->view('_partials/sidebar', $data);
            $this->load->view('_partials/top-menu');
            $this->load->view('admin/pemerintah_desa/add', $data);
            $this->load->view('_partials/footer');
        } 
        $pemerintah_desa->save();
        redirect('admin/pemerintah_desa');

        // else {
        //     $pemerintah_desa->save();
        //     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">pemerintah desa berhasil ditambahkan!</div>');
        //     redirect('admin/pemerintah_desa');
        // }
    }

    // public function edit($id = null)
    // {
    //     $menu = $this->menu_m;
    //     $pemerintah_desa = $this->pemerintah_desa_m;
    //     $rules = $pemerintah_desa->editRules();
    //     $validation = $this->form_validation->set_rules($rules);

    //     if ($validation->run() == false) {
    //         $data['title'] = "pemerintah_desa";
    //         $data['menu'] = $menu->getAll();
    //         $data['pemerintah_desa'] = $pemerintah_desa->getById($id);
    //         $this->load->view('_partials/header', $data);
    //         $this->load->view('_partials/sidebar', $data);
    //         $this->load->view('_partials/top-menu');
    //         $this->load->view('admin/pemerintah_desa/edit');
    //         $this->load->view('_partials/footer');
    //     } else {
    //         $pemerintah_desa->update();
    //         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">pemerintah desa berhasil diupdate!</div>');
    //         redirect('admin/pemerintah_desa');
    //     }
    // }


    public function edit($id_pemdes = null)
    {
        $menu = $this->menu_m;
        $pemerintah_desa = $this->pemerintah_desa_m;
        $rules = $pemerintah_desa->editRules();
        $validation = $this->form_validation->set_rules($rules);

        if ($validation->run() == false) {
            $this->session->set_tempdata('success', 'Berhasil dikeluarkan',1);
            $data['title'] = "pemerintah desa";
            $data['menu'] = $menu->getAll();
            $data['pemerintah_desa'] = $pemerintah_desa->getById($id_pemdes);
            // $data['bantuan_sosial'] = $bantuan_sosial->getAll();
            $data["jabatan"] = $this->jabatan_m->tampil_jabatan();
            
            $this->load->view('_partials/header', $data);
            $this->load->view('_partials/sidebar', $data);
            $this->load->view('_partials/top-menu');
            $this->load->view('admin/pemerintah_desa/edit', $data);
            $this->load->view('_partials/footer');
        } 
        // $bantuan_sosial->update();
        // redirect('admin/bantuan_sosial');
        
        else {
            $pemerintah_desa->update();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">pemerintah desa berhasil diupdate!</div>');
            redirect('admin/pemerintah_desa');
        }
    }



    public function hapus($id_pemdes = null)
    {
        $pemerintah_desa = $this->pemerintah_desa_m;
        if (!isset($id_pemdes))
            show_404();
        $delete = $pemerintah_desa->delete($id_pemdes);

        if ($delete) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">pemerintah desa berhasil dihapus!</div>');
            redirect('admin/pemerintah_desa');
        }
    }

    public function print()
    { 
        // $data['pemerintah_desa'] = $this->pemerintah_desa_m->tampil_data("pemerintah_desa")->result();
        $data['joinpemdes'] = $this->pemerintah_desa_m->tampil_data("joinpemdes1")->result();
        $data['joinpemdes'] = $this->pemerintah_desa_m->joinpemdes1();
        $this->load->view('admin/pemerintah_desa/print', $data);
    }
}
