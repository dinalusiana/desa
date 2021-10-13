<?php
defined('BASEPATH') or exit('No direct script access allowed');

class bantuan_sosial extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('bantuan_sosial_m');
        $this->load->model('penduduk_m');
        $this->load->model('bansos_m');
        $this->load->model('menu_m');
        is_logged_in();
    }

    public function index()
    {
        $menu = $this->menu_m;
        // $bantuan_sosial = $this->bantuan_sosial_m;
        $data['menu'] = $menu->getAll();
        $data['bantuan_sosial'] = $this->bantuan_sosial_m->getAll();
        // $data['Penduduk'] = $this->penduduk_m->getAll();
        $data['joinbantuan'] = $this->bantuan_sosial_m->joinbantuan1();
        $data['title'] = "bantuan_sosial";

        $this->load->view('_partials/header', $data);
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('_partials/top-menu');
        $this->load->view('admin/bantuan_sosial/index',$data);
        $this->load->view('_partials/footer');
    }

    public function tambah()
    {
        $menu = $this->menu_m;
        // $penduduk = $this->penduduk_m;
        $bantuan_sosial = $this->bantuan_sosial_m;
        $rules = $bantuan_sosial->rules();
        $validation = $this->form_validation->set_rules($rules);


        if ($validation->run()) {
            // $bantuan_sosial->save();
            $this->session->set_tempdata('success', 'Berhasil dikeluarkan',1);

            $data['title'] = "bantuan_sosial";
            $data['menu'] = $menu->getAll();
            // $data['penduduk'] = $penduduk->getById1($id);
            $data['bantuan_sosial'] = $bantuan_sosial->getAll();


            $data["bansos"] = $this->bansos_m->tampil_bansos();



            $this->load->view('_partials/header', $data);
            $this->load->view('_partials/sidebar', $data);
            $this->load->view('_partials/top-menu');
            $this->load->view('admin/bantuan_sosial/add', $data);
            $this->load->view('_partials/footer');
        }
        $bantuan_sosial->save();
        redirect('admin/bantuan_sosial');

        // if ($validation->run() == false) {
        //     $data['title'] = "bantuan_sosial";
        //     $data['menu'] = $menu->getAll();
        //     $data['penduduk'] = $penduduk->getById1($id);
        //     $data['bantuan_sosial'] = $bantuan_sosial->getAll();
        //     $this->load->view('_partials/header', $data);
        //     $this->load->view('_partials/sidebar', $data);
        //     $this->load->view('_partials/top-menu');
        //     $this->load->view('admin/bantuan_sosial/add', $data);
        //     $this->load->view('_partials/footer');
        // } else {
        //     $bantuan_sosial->save();
        //     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">bantuan_sosial berhasil ditambahkan!</div>');
        //     redirect('admin/bantuan_sosial');
        // }
    }

    public function edit($id_bantuan = null)
    {
        $menu = $this->menu_m;
        $bantuan_sosial = $this->bantuan_sosial_m;
        $rules = $bantuan_sosial->editRules();
        $validation = $this->form_validation->set_rules($rules);

        if ($validation->run() == false) {
            $data['title'] = "bantuan sosial";
            $data['menu'] = $menu->getAll();
            $data['bantuan_sosial'] = $bantuan_sosial->getById($id_bantuan);
            // $data['bantuan_sosial'] = $bantuan_sosial->getAll();
            

            $data["bansos"] = $this->bansos_m->tampil_bansos();
            
            $this->load->view('_partials/header', $data);
            $this->load->view('_partials/sidebar', $data);
            $this->load->view('_partials/top-menu');
            $this->load->view('admin/bantuan_sosial/edit');
            $this->load->view('_partials/footer');
        } 

        else {
            $bantuan_sosial->update();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">bantuan sosial berhasil diupdate!</div>');
            redirect('admin/bantuan_sosial');
        }
    }

    public function hapus($id_bantuan = null)
    {
        $bantuan_sosial = $this->bantuan_sosial_m;
        if (!isset($id_bantuan))
            show_404();
        $delete = $bantuan_sosial->delete($id_bantuan);

        if ($delete) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">bantuan sosial berhasil dihapus!</div>');
            redirect('admin/bantuan_sosial');
        }
    }

    public function print()
    { 
        $data['joinbantuan'] = $this->bantuan_sosial_m->tampil_data("joinbantuan1")->result();
        $data['joinbantuan'] = $this->bantuan_sosial_m->joinbantuan1();
        $this->load->view('admin/bantuan_sosial/print', $data);
    }
    

}
