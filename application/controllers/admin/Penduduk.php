<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penduduk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('penduduk_m');
        $this->load->model('menu_m');
        $this->load->model('bantuan_sosial_m');
        $this->load->model('pemerintah_desa_m');
        $this->load->model('bansos_m');
        $this->load->model('jabatan_m');
        is_logged_in();
    }

    public function index()
    {
        $menu = $this->menu_m;
        $data['menu'] = $menu->getAll();
        $data['penduduk'] = $this->penduduk_m->getAll();
        $data['join'] = $this->penduduk_m->join4table();
        $data['title'] = "Penduduk";
        

        $this->load->view('_partials/header', $data);
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('_partials/top-menu');
        $this->load->view('admin/penduduk/index',$data);
        $this->load->view('_partials/footer');
    }

    public function tambah()
    {
        $menu = $this->menu_m;
        $penduduk = $this->penduduk_m;
        $rules = $penduduk->rules();
        $validation = $this->form_validation->set_rules($rules);

        if ($validation->run() == false) {
            $data['title'] = "Penduduk";
            $data['menu'] = $menu->getAll();
            $data['penduduk'] = $penduduk->getAll();

            // $data["penduduk"] = $this->Penduduk_m->tampil_data();
            $data["rt"] = $this->penduduk_m->tampil_rt();
            $data["dusun"] = $this->penduduk_m->tampil_dusun();
            $data["pendidikan"] = $this->penduduk_m->tampil_pendidikan();
            $data["pekerjaan"] = $this->penduduk_m->tampil_pekerjaan();
            $data["agama"] = $this->penduduk_m->tampil_agama();
            
            $this->load->view('_partials/header', $data);
            $this->load->view('_partials/sidebar', $data);
            $this->load->view('_partials/top-menu');
            $this->load->view('admin/penduduk/add', $data);
            $this->load->view('_partials/footer');
        } else {
            $penduduk->save();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Penduduk berhasil ditambahkan!</div>');
            redirect('admin/penduduk');
        }
    }

    public function edit($id = null)
    {
        $menu = $this->menu_m;
        $penduduk = $this->penduduk_m;
        $rules = $penduduk->editRules();
        $validation = $this->form_validation->set_rules($rules);

        if ($validation->run() == false) {
            $data['title'] = "Penduduk";
            $data['menu'] = $menu->getAll();
            $data['penduduk'] = $penduduk->getById($id);
            $data["pendidikan"] = $this->penduduk_m->tampil_pendidikan();
            $data["pekerjaan"] = $this->penduduk_m->tampil_pekerjaan();
            $data["agama"] = $this->penduduk_m->tampil_agama();
            $data["rt"] = $this->penduduk_m->tampil_rt();
            $data["dusun"] = $this->penduduk_m->tampil_dusun();
            $this->load->view('_partials/header', $data);
            $this->load->view('_partials/sidebar', $data);
            $this->load->view('_partials/top-menu');
            $this->load->view('admin/penduduk/edit');
            $this->load->view('_partials/footer');
        } else {
            $penduduk->update();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Penduduk berhasil diupdate!</div>');
            redirect('admin/penduduk');
        }
    }



    public function tambah_bantuan($id = null)
    {
        $menu = $this->menu_m;
        $penduduk = $this->penduduk_m;
        // $bantuan_sosial = $this->bantuan_sosial_m;
        $rules = $penduduk->editRules();
        $validation = $this->form_validation->set_rules($rules);

        if ($validation->run()) {
            $penduduk->update();
            
        }
            // redirect('admin/bantuan_sosial');
            $data['title'] = "Penduduk";
            $data['menu'] = $menu->getAll();
            $data['penduduk'] = $penduduk->getById1($id);
            $data["pendidikan"] = $this->penduduk_m->tampil_pendidikan();
            $data["pekerjaan"] = $this->penduduk_m->tampil_pekerjaan();
            $data["agama"] = $this->penduduk_m->tampil_agama();
            $data["rt"] = $this->penduduk_m->tampil_rt();
            $data["dusun"] = $this->penduduk_m->tampil_dusun();
            $data["bansos"] = $this->bansos_m->tampil_bansos();
            $this->load->view('_partials/header', $data);
            $this->load->view('_partials/sidebar', $data);
            $this->load->view('_partials/top-menu');
            $this->load->view('admin/bantuan_sosial/add', $data);
            $this->load->view('_partials/footer');
        
    }



    public function tambah_pemdes($id = null)
    {
        $menu = $this->menu_m;
        $penduduk = $this->penduduk_m;
        // $bantuan_sosial = $this->bantuan_sosial_m;
        $rules = $penduduk->editRules();
        $validation = $this->form_validation->set_rules($rules);

        if ($validation->run()) {
            $penduduk->update();
            
        }
            // redirect('admin/bantuan_sosial');
            $data['title'] = "Penduduk";
            $data['menu'] = $menu->getAll();
            $data['penduduk'] = $penduduk->getById1($id);
            $data["pendidikan"] = $this->penduduk_m->tampil_pendidikan();
            $data["pekerjaan"] = $this->penduduk_m->tampil_pekerjaan();
            $data["agama"] = $this->penduduk_m->tampil_agama();
            $data["rt"] = $this->penduduk_m->tampil_rt();
            $data["dusun"] = $this->penduduk_m->tampil_dusun();
            $data["jabatan"] = $this->jabatan_m->tampil_jabatan();
            $this->load->view('_partials/header', $data);
            $this->load->view('_partials/sidebar', $data);
            $this->load->view('_partials/top-menu');
            $this->load->view('admin/pemerintah_desa/add', $data);
            $this->load->view('_partials/footer');
        
    }


    public function hapus($id = null)
    {
        $penduduk = $this->penduduk_m;
        if (!isset($id))
            show_404();
        $delete = $penduduk->delete($id);

        if ($delete) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Penduduk berhasil dihapus!</div>');
            redirect('admin/penduduk');
        }
    }

    public function print()
    { 
        $data['join'] = $this->penduduk_m->tampil_data("join4table")->result();
        $data['join'] = $this->penduduk_m->join4table();
        $this->load->view('admin/penduduk/print', $data);
    }
}
