<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('profil_m');
        $this->load->model('menu_m');
        is_logged_in();
    }

    public function desa()
    {
        $menu = $this->menu_m;
        $profil = $this->profil_m;
        $data['menu'] = $menu->getAll();
        $data['gambaran_umum'] = $profil->getGambaranUmum();
        $data['title'] = "Profil";

        $this->load->view('_partials/header', $data);
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('_partials/top-menu');
        $this->load->view('admin/profil/desa');
        $this->load->view('_partials/footer');
    }

    public function updateProfilDesa($id = null)
    {
        $menu = $this->menu_m;
        $profil = $this->profil_m;
        $rules = $profil->rules();
        $validation = $this->form_validation->set_rules($rules);

        if ($validation->run() == false) {
            $data['title'] = "Profil";
            $data['menu'] = $menu->getAll();
            $data['profilDesa'] = $profil->getById($id);
            $this->load->view('_partials/header', $data);
            $this->load->view('_partials/sidebar', $data);
            $this->load->view('_partials/top-menu');
            $this->load->view('admin/profil/edit_profil_desa');
            $this->load->view('_partials/footer');
        } else {
            $profil->updateProfilDesa();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">profil desa berhasil diupdate!</div>');
            redirect('admin/profil/desa');
        }
    }

    public function pemdes()
    {
        $menu = $this->menu_m;
        $profil = $this->profil_m;
        $data['menu'] = $menu->getAll();
        $data['profilPemdes'] = $profil->getProfilPemdes();
        $data['title'] = "Profil";

        $this->load->view('_partials/header', $data);
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('_partials/top-menu');
        $this->load->view('admin/profil/pemdes');
        $this->load->view('_partials/footer');
    }

    public function updateProfilPemdes($id = null)
    {
        $menu = $this->menu_m;
        $profil = $this->profil_m;
        $rules = $profil->rules();
        $validation = $this->form_validation->set_rules($rules);

        if ($validation->run() == false) {
            $data['title'] = "Profil";
            $data['menu'] = $menu->getAll();
            $data['profilPemdes'] = $profil->getById($id);
            $this->load->view('_partials/header', $data);
            $this->load->view('_partials/sidebar', $data);
            $this->load->view('_partials/top-menu');
            $this->load->view('admin/profil/edit_profil_pemdes');
            $this->load->view('_partials/footer');
        } else {
            $profil->updateProfilPemdes();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profil pemerintah desa berhasil diupdate!</div>');
            redirect('admin/profil/pemdes');
        }
    }

    public function bpd()
    {
        $menu = $this->menu_m;
        $profil = $this->profil_m;
        $data['menu'] = $menu->getAll();
        $data['profilBpd'] = $profil->getProfilBpd();
        $data['title'] = "Profil";

        $this->load->view('_partials/header', $data);
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('_partials/top-menu');
        $this->load->view('admin/profil/bpd');
        $this->load->view('_partials/footer');
    }

    public function updateProfilBpd($id = null)
    {
        $menu = $this->menu_m;
        $profil = $this->profil_m;
        $rules = $profil->rules();
        $validation = $this->form_validation->set_rules($rules);

        if ($validation->run() == false) {
            $data['title'] = "Profil";
            $data['menu'] = $menu->getAll();
            $data['profilBpd'] = $profil->getById($id);
            $this->load->view('_partials/header', $data);
            $this->load->view('_partials/sidebar', $data);
            $this->load->view('_partials/top-menu');
            $this->load->view('admin/profil/edit_profil_bpd');
            $this->load->view('_partials/footer');
        } else {
            $profil->updateProfilBpd();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">profil BPD berhasil diupdate!</div>');
            redirect('admin/profil/bpd');
        }
    }

    public function sejarah()
    {
        $menu = $this->menu_m;
        $profil = $this->profil_m;
        $data['menu'] = $menu->getAll();
        $data['sejarah'] = $profil->getsejarah();
        $data['title'] = "Profil";

        $this->load->view('_partials/header', $data);
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('_partials/top-menu');
        $this->load->view('admin/profil/sejarah');
        $this->load->view('_partials/footer');
    }

    public function updatesejarah($id = null)
    {
        $menu = $this->menu_m;
        $profil = $this->profil_m;
        $rules = $profil->rules();
        $validation = $this->form_validation->set_rules($rules);

        if ($validation->run() == false) {
            $data['title'] = "Profil";
            $data['menu'] = $menu->getAll();
            $data['sejarah'] = $profil->getById($id);
            $this->load->view('_partials/header', $data);
            $this->load->view('_partials/sidebar', $data);
            $this->load->view('_partials/top-menu');
            $this->load->view('admin/profil/edit_sejarah');
            $this->load->view('_partials/footer');
        } else {
            $profil->updatesejarah();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">sejarah desa berhasil diupdate!</div>');
            redirect('admin/profil/sejarah');
        }
    }

    public function visimisi()
    {
        $menu = $this->menu_m;
        $profil = $this->profil_m;
        $data['menu'] = $menu->getAll();
        $data['visimisi'] = $profil->getvisimisi();
        $data['title'] = "Profil";

        $this->load->view('_partials/header', $data);
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('_partials/top-menu');
        $this->load->view('admin/profil/visimisi');
        $this->load->view('_partials/footer');
    }

    public function updatevisimisi($id = null)
    {
        $menu = $this->menu_m;
        $profil = $this->profil_m;
        $rules = $profil->rules();
        $validation = $this->form_validation->set_rules($rules);

        if ($validation->run() == false) {
            $data['title'] = "Profil";
            $data['menu'] = $menu->getAll();
            $data['visimisi'] = $profil->getById($id);
            $this->load->view('_partials/header', $data);
            $this->load->view('_partials/sidebar', $data);
            $this->load->view('_partials/top-menu');
            $this->load->view('admin/profil/edit_visimisi');
            $this->load->view('_partials/footer');
        } else {
            $profil->updatevisimisi();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">visi misi desa berhasil diupdate!</div>');
            redirect('admin/profil/visimisi');
        }
    }

    public function potensi()
    {
        $menu = $this->menu_m;
        $profil = $this->profil_m;
        $data['menu'] = $menu->getAll();
        $data['potensi'] = $profil->getpotensi();
        $data['title'] = "Profil";

        $this->load->view('_partials/header', $data);
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('_partials/top-menu');
        $this->load->view('admin/profil/potensi');
        $this->load->view('_partials/footer');
    }

    public function updatepotensi($id = null)
    {
        $menu = $this->menu_m;
        $profil = $this->profil_m;
        $rules = $profil->rules();
        $validation = $this->form_validation->set_rules($rules);

        if ($validation->run() == false) {
            $data['title'] = "Profil";
            $data['menu'] = $menu->getAll();
            $data['potensi'] = $profil->getById($id);
            $this->load->view('_partials/header', $data);
            $this->load->view('_partials/sidebar', $data);
            $this->load->view('_partials/top-menu');
            $this->load->view('admin/profil/edit_potensi');
            $this->load->view('_partials/footer');
        } else {
            $profil->updatepotensi();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">potensi desa berhasil diupdate!</div>');
            redirect('admin/profil/potensi');
        }
    }
    public function karangtaruna()
    {
        $menu = $this->menu_m;
        $profil = $this->profil_m;
        $data['menu'] = $menu->getAll();
        $data['karangtaruna'] = $profil->getkarangtaruna();
        $data['title'] = "Profil";

        $this->load->view('_partials/header', $data);
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('_partials/top-menu');
        $this->load->view('admin/profil/karangtaruna');
        $this->load->view('_partials/footer');
    }

    public function updatekarangtaruna($id = null)
    {
        $menu = $this->menu_m;
        $profil = $this->profil_m;
        $rules = $profil->rules();
        $validation = $this->form_validation->set_rules($rules);

        if ($validation->run() == false) {
            $data['title'] = "Profil";
            $data['menu'] = $menu->getAll();
            $data['karangtaruna'] = $profil->getById($id);
            $this->load->view('_partials/header', $data);
            $this->load->view('_partials/sidebar', $data);
            $this->load->view('_partials/top-menu');
            $this->load->view('admin/profil/edit_karangtaruna');
            $this->load->view('_partials/footer');
        } else {
            $profil->updatekarangtaruna();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Karang taruna desa berhasil diupdate!</div>');
            redirect('admin/profil/karangtaruna');
        }
    }
    public function pkk()
    {
        $menu = $this->menu_m;
        $profil = $this->profil_m;
        $data['menu'] = $menu->getAll();
        $data['pkk'] = $profil->getpkk();
        $data['title'] = "Profil";

        $this->load->view('_partials/header', $data);
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('_partials/top-menu');
        $this->load->view('admin/profil/pkk');
        $this->load->view('_partials/footer');
    }

    public function updatepkk($id = null)
    {
        $menu = $this->menu_m;
        $profil = $this->profil_m;
        $rules = $profil->rules();
        $validation = $this->form_validation->set_rules($rules);

        if ($validation->run() == false) {
            $data['title'] = "Profil";
            $data['menu'] = $menu->getAll();
            $data['pkk'] = $profil->getById($id);
            $this->load->view('_partials/header', $data);
            $this->load->view('_partials/sidebar', $data);
            $this->load->view('_partials/top-menu');
            $this->load->view('admin/profil/edit_pkk');
            $this->load->view('_partials/footer');
        } else {
            $profil->updatepkk();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Karang taruna desa berhasil diupdate!</div>');
            redirect('admin/profil/pkk');
        }
    }
    public function lpmd()
    {
        $menu = $this->menu_m;
        $profil = $this->profil_m;
        $data['menu'] = $menu->getAll();
        $data['lpmd'] = $profil->getlpmd();
        $data['title'] = "Profil";

        $this->load->view('_partials/header', $data);
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('_partials/top-menu');
        $this->load->view('admin/profil/lpmd');
        $this->load->view('_partials/footer');
    }

    public function updatelpmd($id = null)
    {
        $menu = $this->menu_m;
        $profil = $this->profil_m;
        $rules = $profil->rules();
        $validation = $this->form_validation->set_rules($rules);

        if ($validation->run() == false) {
            $data['title'] = "Profil";
            $data['menu'] = $menu->getAll();
            $data['lpmd'] = $profil->getById($id);
            $this->load->view('_partials/header', $data);
            $this->load->view('_partials/sidebar', $data);
            $this->load->view('_partials/top-menu');
            $this->load->view('admin/profil/edit_lpmd');
            $this->load->view('_partials/footer');
        } else {
            $profil->updatelpmd();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> LPMD desa berhasil diupdate!</div>');
            redirect('admin/profil/lpmd');
        }
    }

    public function kpmd()
    {
        $menu = $this->menu_m;
        $profil = $this->profil_m;
        $data['menu'] = $menu->getAll();
        $data['kpmd'] = $profil->getkpmd();
        $data['title'] = "Profil";

        $this->load->view('_partials/header', $data);
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('_partials/top-menu');
        $this->load->view('admin/profil/kpmd');
        $this->load->view('_partials/footer');
    }

    public function updatekpmd($id = null)
    {
        $menu = $this->menu_m;
        $profil = $this->profil_m;
        $rules = $profil->rules();
        $validation = $this->form_validation->set_rules($rules);

        if ($validation->run() == false) {
            $data['title'] = "Profil";
            $data['menu'] = $menu->getAll();
            $data['kpmd'] = $profil->getById($id);
            $this->load->view('_partials/header', $data);
            $this->load->view('_partials/sidebar', $data);
            $this->load->view('_partials/top-menu');
            $this->load->view('admin/profil/edit_kpmd');
            $this->load->view('_partials/footer');
        } else {
            $profil->updatekpmd();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> KPMD desa berhasil diupdate!</div>');
            redirect('admin/profil/kpmd');
        }
    }


    public function ktp()
    {
        $menu = $this->menu_m;
        $profil = $this->profil_m;
        $data['menu'] = $menu->getAll();
        $data['ktp'] = $profil->getktp();
        $data['title'] = "Profil";

        $this->load->view('_partials/header', $data);
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('_partials/top-menu');
        $this->load->view('admin/profil/ktp');
        $this->load->view('_partials/footer');
    }

    public function updatektp($id = null)
    {
        $menu = $this->menu_m;
        $profil = $this->profil_m;
        $rules = $profil->rules();
        $validation = $this->form_validation->set_rules($rules);

        if ($validation->run() == false) {
            $data['title'] = "Profil";
            $data['menu'] = $menu->getAll();
            $data['ktp'] = $profil->getById($id);
            $this->load->view('_partials/header', $data);
            $this->load->view('_partials/sidebar', $data);
            $this->load->view('_partials/top-menu');
            $this->load->view('admin/profil/edit_ktp');
            $this->load->view('_partials/footer');
        } else {
            $profil->updatektp();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> KTP desa berhasil diupdate!</div>');
            redirect('admin/profil/ktp');
        }
    }

    public function infosurat()
    {
        $menu = $this->menu_m;
        $profil = $this->profil_m;
        $data['menu'] = $menu->getAll();
        $data['infosurat'] = $profil->getinfosurat();
        $data['title'] = "Profil";

        $this->load->view('_partials/header', $data);
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('_partials/top-menu');
        $this->load->view('admin/profil/infosurat');
        $this->load->view('_partials/footer');
    }

    public function updateinfosurat($id = null)
    {
        $menu = $this->menu_m;
        $profil = $this->profil_m;
        $rules = $profil->rules();
        $validation = $this->form_validation->set_rules($rules);

        if ($validation->run() == false) {
            $data['title'] = "Profil";
            $data['menu'] = $menu->getAll();
            $data['infosurat'] = $profil->getById($id);
            $this->load->view('_partials/header', $data);
            $this->load->view('_partials/sidebar', $data);
            $this->load->view('_partials/top-menu');
            $this->load->view('admin/profil/edit_infosurat');
            $this->load->view('_partials/footer');
        } else {
            $profil->updateinfosurat();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> infosurat berhasil diupdate!</div>');
            redirect('admin/profil/infosurat');
        }
    }


}
