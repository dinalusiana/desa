<?php
defined('BASEPATH') or exit('No direct script access allowed');

class bansos extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('bansos_m');
        $this->load->model('menu_m');
        is_logged_in();
    }

    public function index()
    {

        //coba
        // $bansos = $this->ctrl_Chartbansos();
        // $data['bansos'] = [];
		// $data['bansos_jumlah'] = [];
        // for ($x = 0; $x <= 6; $x++) {
		// 	// echo json_encode($data['bansos'][$x]['tingkat_bansos']);
		// 	array_push($data['bansos'], $bansos[$x]['kategori_bansos']);
		// 	array_push($data['bansos_jumlah'], $bansos[$x]['jumlah']);
		// }

        $menu = $this->menu_m;
        $bansos = $this->bansos_m;
        $data['menu'] = $menu->getAll();
        $data['bansos'] = $bansos->getAll();
        $data['title'] = "bansos";

        $this->load->view('_partials/header', $data);
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('_partials/top-menu');
        $this->load->view('admin/bansos/index');
        $this->load->view('_partials/footer');

    }
    
    // public function ctrl_Chartbansos()
	// {
	// 	$result = $this->bansos_m->exec_Chartbansos();

	// 	return $result;
	// }

    public function tambah()
    {
        $menu = $this->menu_m;
        $bansos = $this->bansos_m;
        $rules = $bansos->rules();
        $validation = $this->form_validation->set_rules($rules);

        if ($validation->run() == false) {
            $data['title'] = "bansos";
            $data['menu'] = $menu->getAll();
            $data['bansos'] = $bansos->getAll();
            $this->load->view('_partials/header', $data);
            $this->load->view('_partials/sidebar', $data);
            $this->load->view('_partials/top-menu');
            $this->load->view('admin/bansos/add');
            $this->load->view('_partials/footer');
        } else {
            $bansos->save();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">bansos berhasil ditambahkan!</div>');
            redirect('admin/bansos');
        }
    }

    public function edit($id = null)
    {
        $menu = $this->menu_m;
        $bansos = $this->bansos_m;
        $rules = $bansos->editRules();
        $validation = $this->form_validation->set_rules($rules);

        if ($validation->run() == false) {
            $data['title'] = "bansos";
            $data['menu'] = $menu->getAll();
            $data['bansos'] = $bansos->getById($id);
            $this->load->view('_partials/header', $data);
            $this->load->view('_partials/sidebar', $data);
            $this->load->view('_partials/top-menu');
            $this->load->view('admin/bansos/edit');
            $this->load->view('_partials/footer');
        } else {
            $bansos->update();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">bansos berhasil diupdate!</div>');
            redirect('admin/bansos');
        }
    }

    public function hapus($id = null)
    {
        $bansos = $this->bansos_m;
        if (!isset($id))
            show_404();
        $delete = $bansos->delete($id);

        if ($delete) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">bansos berhasil dihapus!</div>');
            redirect('admin/bansos');
        }
    }

    public function print()
    { 
        $data['bansos'] = $this->bansos_m->tampil_data("bansos")->result();
        $this->load->view('admin/bansos/print', $data);
    }

}
