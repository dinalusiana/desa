<?php
defined('BASEPATH') or exit('No direct script access allowed');

class surat extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('surat_m');
        $this->load->model('menu_m');
        $this->load->model('kategori_m', 'kategori', true);
        is_logged_in();
    }

    public function index()
    {
        $menu = $this->menu_m;
        $surat = $this->surat_m;
        $data['menu'] = $menu->getAll();
        $data['surat'] = $surat->getAll();
        $data['title'] = "surat";

        $this->load->view('_partials/header', $data);
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('_partials/top-menu');
        $this->load->view('admin/surat/index');
        $this->load->view('_partials/footer');
        $this->load->view('themes/js_permohonan_surat');
    }

    public function tambah()
    {
        $menu = $this->menu_m;
        $surat = $this->surat_m;
        $rules = $surat->rules();
        $validation = $this->form_validation->set_rules($rules);

        if ($validation->run() == false) {
            $data['title'] = "surat";
            $data['menu'] = $menu->getAll();
            $data['surat'] = $surat->getAll();
            $this->load->view('_partials/header', $data);
            $this->load->view('_partials/sidebar', $data);
            $this->load->view('_partials/top-menu');
            $this->load->view('admin/surat/add');
            $this->load->view('_partials/footer');
            $this->load->view('themes/js_permohonan_surat');
        } else {
            $surat->save();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">surat berhasil ditambahkan!</div>');
            redirect('admin/surat');
        }
    }

    public function edit($id = null)
    {
        $menu = $this->menu_m;
        $surat = $this->surat_m;
        $rules = $surat->editRules();
        $validation = $this->form_validation->set_rules($rules);

        if ($validation->run() == false) {
            $data['title'] = "surat";
            $data['menu'] = $menu->getAll();
            $data['surat'] = $surat->getById($id);
            $this->load->view('_partials/header', $data);
            $this->load->view('_partials/sidebar', $data);
            $this->load->view('_partials/top-menu');
            $this->load->view('admin/surat/edit');
            $this->load->view('_partials/footer');
            $this->load->view('themes/js_permohonan_surat');
        } else {
            $surat->update();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">surat berhasil diupdate!</div>');
            redirect('admin/surat');
        }
    }

    public function hapus($id = null)
    {
        $surat = $this->surat_m;
        $result_old = $surat->getById($id);

        $surat = $this->surat_m;
        if (!isset($id))
            show_404();
        $delete = $surat->delete($id);

        if ($delete) {
            $filelama = $result_old['file_upload'];
            $pathfile = './upload_file/permohonan_surat/' . $filelama;
            unlink($pathfile);
        }


        if ($delete) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">surat berhasil dihapus!</div>');
            redirect('admin/surat');
        }
    }

    public function ctrl_SelectPemohonSurat()
    {

        $param = array(
            'aksi' => "SelectPemohonSurat",
            'id' => $this->input->get('id'),
            'name' => NULL,
            'ttl' => NULL,
            'kewarganegaraan' => NULL,
            'agama' => NULL,
            'pekerjaan' => NULL,
            'alamat' => NULL,
            'nik' => NULL,
            'keperluan' => NULL,
            'keterangan' => NULL,
            'nomer' => NULL,
            'bulan' => NULL,
            'tahun' => NULL,
            'file_upload' => NULL
        );
        $result = $this->kategori->exec_SelectPemohonSurat($param);

        echo json_encode($result);
    }


    public function ctrl_print($id = null)
    {
        $surat = $this->surat_m;
        $data['print'] = $surat->getById($id);
        // echo json_encode($data['print']);
        $this->load->view('admin/surat/print', $data);
        $this->load->view('themes/js_permohonan_surat');
    }
}
