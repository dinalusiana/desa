<?php
defined('BASEPATH') or exit('No direct script access allowed');

class jabatan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('jabatan_m');
        $this->load->model('menu_m');
        is_logged_in();
    }

    public function index()
    {

        //coba
        // $jabatan = $this->ctrl_Chartjabatan();
        // $data['jabatan'] = [];
		// $data['jabatan_jumlah'] = [];
        // for ($x = 0; $x <= 6; $x++) {
		// 	// echo json_encode($data['jabatan'][$x]['tingkat_jabatan']);
		// 	array_push($data['jabatan'], $jabatan[$x]['kategori_jabatan']);
		// 	array_push($data['jabatan_jumlah'], $jabatan[$x]['jumlah']);
		// }

        $menu = $this->menu_m;
        $jabatan = $this->jabatan_m;
        $data['menu'] = $menu->getAll();
        $data['jabatan'] = $jabatan->getAll();
        $data['title'] = "jabatan";

        $this->load->view('_partials/header', $data);
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('_partials/top-menu');
        $this->load->view('admin/jabatan/index');
        $this->load->view('_partials/footer');

    }
    
    // public function ctrl_Chartjabatan()
	// {
	// 	$result = $this->jabatan_m->exec_Chartjabatan();

	// 	return $result;
	// }

    public function tambah()
    {
        $menu = $this->menu_m;
        $jabatan = $this->jabatan_m;
        $rules = $jabatan->rules();
        $validation = $this->form_validation->set_rules($rules);

        if ($validation->run() == false) {
            $data['title'] = "jabatan";
            $data['menu'] = $menu->getAll();
            $data['jabatan'] = $jabatan->getAll();
            $this->load->view('_partials/header', $data);
            $this->load->view('_partials/sidebar', $data);
            $this->load->view('_partials/top-menu');
            $this->load->view('admin/jabatan/add');
            $this->load->view('_partials/footer');
        } else {
            $jabatan->save();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">jabatan berhasil ditambahkan!</div>');
            redirect('admin/jabatan');
        }
    }

    public function edit($id = null)
    {
        $menu = $this->menu_m;
        $jabatan = $this->jabatan_m;
        $rules = $jabatan->editRules();
        $validation = $this->form_validation->set_rules($rules);

        if ($validation->run() == false) {
            $data['title'] = "jabatan";
            $data['menu'] = $menu->getAll();
            $data['jabatan'] = $jabatan->getById($id);
            $this->load->view('_partials/header', $data);
            $this->load->view('_partials/sidebar', $data);
            $this->load->view('_partials/top-menu');
            $this->load->view('admin/jabatan/edit');
            $this->load->view('_partials/footer');
        } else {
            $jabatan->update();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">jabatan berhasil diupdate!</div>');
            redirect('admin/jabatan');
        }
    }

    public function hapus($id = null)
    {
        $jabatan = $this->jabatan_m;
        if (!isset($id))
            show_404();
        $delete = $jabatan->delete($id);

        if ($delete) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">jabatan berhasil dihapus!</div>');
            redirect('admin/jabatan');
        }
    }

    public function print()
    { 
        $data['jabatan'] = $this->jabatan_m->tampil_data("jabatan")->result();
        $this->load->view('admin/jabatan/print', $data);
    }

}
