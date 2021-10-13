<?php
defined('BASEPATH') or exit('No direct script access allowed');

class rt extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('rt_m');
        $this->load->model('menu_m');
        is_logged_in();
    }

    public function index()
    {

        //coba
        // $rt = $this->ctrl_Chartrt();
        // $data['rt'] = [];
		// $data['rt_jumlah'] = [];
        // for ($x = 0; $x <= 6; $x++) {
		// 	// echo json_encode($data['rt'][$x]['tingkat_rt']);
		// 	array_push($data['rt'], $rt[$x]['kategori_rt']);
		// 	array_push($data['rt_jumlah'], $rt[$x]['jumlah']);
		// }

        $menu = $this->menu_m;
        $rt = $this->rt_m;
        $data['menu'] = $menu->getAll();
        $data['rt'] = $rt->getAll();
        $data['title'] = "rt";

        $this->load->view('_partials/header', $data);
        $this->load->view('_partials/sidebar', $data);
        $this->load->view('_partials/top-menu');
        $this->load->view('admin/rt/index');
        $this->load->view('_partials/footer');

    }
    
    // public function ctrl_Chartrt()
	// {
	// 	$result = $this->rt_m->exec_Chartrt();

	// 	return $result;
	// }

    public function tambah()
    {
        $menu = $this->menu_m;
        $rt = $this->rt_m;
        $rules = $rt->rules();
        $validation = $this->form_validation->set_rules($rules);

        if ($validation->run() == false) {
            $data['title'] = "rt";
            $data['menu'] = $menu->getAll();
            $data['rt'] = $rt->getAll();
            $this->load->view('_partials/header', $data);
            $this->load->view('_partials/sidebar', $data);
            $this->load->view('_partials/top-menu');
            $this->load->view('admin/rt/add');
            $this->load->view('_partials/footer');
        } else {
            $rt->save();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">rt berhasil ditambahkan!</div>');
            redirect('admin/rt');
        }
    }

    public function edit($id = null)
    {
        $menu = $this->menu_m;
        $rt = $this->rt_m;
        $rules = $rt->editRules();
        $validation = $this->form_validation->set_rules($rules);

        if ($validation->run() == false) {
            $data['title'] = "rt";
            $data['menu'] = $menu->getAll();
            $data['rt'] = $rt->getById($id);
            $this->load->view('_partials/header', $data);
            $this->load->view('_partials/sidebar', $data);
            $this->load->view('_partials/top-menu');
            $this->load->view('admin/rt/edit');
            $this->load->view('_partials/footer');
        } else {
            $rt->update();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">rt berhasil diupdate!</div>');
            redirect('admin/rt');
        }
    }

    public function hapus($id = null)
    {
        $rt = $this->rt_m;
        if (!isset($id))
            show_404();
        $delete = $rt->delete($id);

        if ($delete) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">rt berhasil dihapus!</div>');
            redirect('admin/rt');
        }
    }

    public function print()
    { 
        $data['rt'] = $this->rt_m->tampil_data("rt")->result();
        $this->load->view('admin/rt/print', $data);
    }

}
