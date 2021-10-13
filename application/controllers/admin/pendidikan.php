<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pendidikan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pendidikan_m');
        $this->load->model('menu_m');
        is_logged_in();
    }

    public function index()
    {

        //coba
        // $pendidikan = $this->ctrl_ChartPendidikan();
        // $data['pendidikan'] = [];
		// $data['pendidikan_jumlah'] = [];
        // for ($x = 0; $x <= 6; $x++) {
		// 	// echo json_encode($data['pendidikan'][$x]['tingkat_pendidikan']);
		// 	array_push($data['pendidikan'], $pendidikan[$x]['kategori_pendidikan']);
		// 	array_push($data['pendidikan_jumlah'], $pendidikan[$x]['jumlah']);
		// }

        $menu = $this->menu_m;
        $pendidikan = $this->pendidikan_m;
        $data['menu'] = $menu->getAll();
        $data['pendidikan'] = $pendidikan->getAll();
        $data['title'] = "pendidikan";

        $this->load->view('_partials/header', $data);
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('_partials/top-menu');
        $this->load->view('admin/pendidikan/index');
        $this->load->view('_partials/footer');

    }
    
    // public function ctrl_ChartPendidikan()
	// {
	// 	$result = $this->pendidikan_m->exec_ChartPendidikan();

	// 	return $result;
	// }

    public function tambah()
    {
        $menu = $this->menu_m;
        $pendidikan = $this->pendidikan_m;
        $rules = $pendidikan->rules();
        $validation = $this->form_validation->set_rules($rules);

        if ($validation->run() == false) {
            $data['title'] = "pendidikan";
            $data['menu'] = $menu->getAll();
            $data['pendidikan'] = $pendidikan->getAll();
            $this->load->view('_partials/header', $data);
            $this->load->view('_partials/sidebar', $data);
            $this->load->view('_partials/top-menu');
            $this->load->view('admin/pendidikan/add');
            $this->load->view('_partials/footer');
        } else {
            $pendidikan->save();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">pendidikan berhasil ditambahkan!</div>');
            redirect('admin/pendidikan');
        }
    }

    public function edit($id = null)
    {
        $menu = $this->menu_m;
        $pendidikan = $this->pendidikan_m;
        $rules = $pendidikan->editRules();
        $validation = $this->form_validation->set_rules($rules);

        if ($validation->run() == false) {
            $data['title'] = "pendidikan";
            $data['menu'] = $menu->getAll();
            $data['pendidikan'] = $pendidikan->getById($id);
            $this->load->view('_partials/header', $data);
            $this->load->view('_partials/sidebar', $data);
            $this->load->view('_partials/top-menu');
            $this->load->view('admin/pendidikan/edit');
            $this->load->view('_partials/footer');
        } else {
            $pendidikan->update();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">pendidikan berhasil diupdate!</div>');
            redirect('admin/pendidikan');
        }
    }

    public function hapus($id = null)
    {
        $pendidikan = $this->pendidikan_m;
        if (!isset($id))
            show_404();
        $delete = $pendidikan->delete($id);

        if ($delete) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">pendidikan berhasil dihapus!</div>');
            redirect('admin/pendidikan');
        }
    }

    public function print()
    { 
        $data['pendidikan'] = $this->pendidikan_m->tampil_data("pendidikan")->result();
        $this->load->view('admin/pendidikan/print', $data);
    }

}
