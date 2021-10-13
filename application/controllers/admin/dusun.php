<?php
defined('BASEPATH') or exit('No direct script access allowed');

class dusun extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('dusun_m');
        $this->load->model('menu_m');
        is_logged_in();
    }

    public function index()
    {

        //coba
        // $dusun = $this->ctrl_Chartdusun();
        // $data['dusun'] = [];
		// $data['dusun_jumlah'] = [];
        // for ($x = 0; $x <= 6; $x++) {
		// 	// echo json_encode($data['dusun'][$x]['tingkat_dusun']);
		// 	array_push($data['dusun'], $dusun[$x]['kategori_dusun']);
		// 	array_push($data['dusun_jumlah'], $dusun[$x]['jumlah']);
		// }

        $menu = $this->menu_m;
        $dusun = $this->dusun_m;
        $data['menu'] = $menu->getAll();
        $data['dusun'] = $dusun->getAll();
        $data['title'] = "dusun";

        $this->load->view('_partials/header', $data);
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('_partials/top-menu');
        $this->load->view('admin/dusun/index');
        $this->load->view('_partials/footer');

    }
    
    // public function ctrl_Chartdusun()
	// {
	// 	$result = $this->dusun_m->exec_Chartdusun();

	// 	return $result;
	// }

    public function tambah()
    {
        $menu = $this->menu_m;
        $dusun = $this->dusun_m;
        $rules = $dusun->rules();
        $validation = $this->form_validation->set_rules($rules);

        if ($validation->run() == false) {
            $data['title'] = "dusun";
            $data['menu'] = $menu->getAll();
            $data['dusun'] = $dusun->getAll();
            $this->load->view('_partials/header', $data);
            $this->load->view('_partials/sidebar', $data);
            $this->load->view('_partials/top-menu');
            $this->load->view('admin/dusun/add');
            $this->load->view('_partials/footer');
        } else {
            $dusun->save();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">dusun berhasil ditambahkan!</div>');
            redirect('admin/dusun');
        }
    }

    public function edit($id = null)
    {
        $menu = $this->menu_m;
        $dusun = $this->dusun_m;
        $rules = $dusun->editRules();
        $validation = $this->form_validation->set_rules($rules);

        if ($validation->run() == false) {
            $data['title'] = "dusun";
            $data['menu'] = $menu->getAll();
            $data['dusun'] = $dusun->getById($id);
            $this->load->view('_partials/header', $data);
            $this->load->view('_partials/sidebar', $data);
            $this->load->view('_partials/top-menu');
            $this->load->view('admin/dusun/edit');
            $this->load->view('_partials/footer');
        } else {
            $dusun->update();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">dusun berhasil diupdate!</div>');
            redirect('admin/dusun');
        }
    }

    public function hapus($id = null)
    {
        $dusun = $this->dusun_m;
        if (!isset($id))
            show_404();
        $delete = $dusun->delete($id);

        if ($delete) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">dusun berhasil dihapus!</div>');
            redirect('admin/dusun');
        }
    }

    public function print()
    { 
        $data['dusun'] = $this->dusun_m->tampil_data("dusun")->result();
        $this->load->view('admin/dusun/print', $data);
    }

}
