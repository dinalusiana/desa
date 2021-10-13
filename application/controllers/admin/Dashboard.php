<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('menu_m', 'menu', true);
		$this->load->model('Pendidikan_m');
		$this->load->model('Pekerjaan_m');
		$this->load->model('agama_m');
		$this->load->model('penduduk_m');
		is_logged_in();
	}

	public function index()
	{
		// $pendidikan = $this->Pendidikan_m;
		// $tingkat_pendidikan = $pendidikan->getAll();
		// $pekerjaan_m = $this->pekerjaan_m;
		// $pekerjaan = $pekerjaan_m->getAll();
		// $agama_m = $this->agama_m;
		// $agama = $agama_m->getAll();

		$penduduk = $this->ctrl_ChartPenduduk();

		// $pendidikan = $this->ctrl_ChartPendidikan();

		// $pekerjaan = $this->ctrl_ChartPekerjaan();

		// $agama = $this->ctrl_ChartAgama();


		// $data['tingkat_pendidikan'] = [];
		// $data['tingkat_pendidikan_jumlah'] = [];
		// $data['pekerjaan'] = [];
		// $data['pekerjaan_jumlah'] = [];
		// $data['agama'] = [];
		// $data['agama_jumlah'] = [];

		$data['pendudukwanita'] = [];
		$data['pendudukwanita_jumlah'] = [];
		$data['pendudukpria'] = [];
		$data['pendudukpria_jumlah'] = [];

		// $data['pendidikan'] = [];
		// $data['pendidikan_jumlah'] = [];

		// $data['pekerjaan'] = [];
		// $data['pekerjaan_jumlah'] = [];

		// $data['agama'] = [];
		// $data['agama_jumlah'] = [];


		// for ($x = 0; $x <= count($tingkat_pendidikan) - 1; $x++) {
		// 	// echo json_encode($data['pendidikan'][$x]['tingkat_pendidikan']);
		// 	array_push($data['tingkat_pendidikan'], $tingkat_pendidikan[$x]['tingkat_pendidikan']);
		// 	array_push($data['tingkat_pendidikan_jumlah'], $tingkat_pendidikan[$x]['jumlah']);
		// }

		// for ($x = 0; $x <= count($pekerjaan) - 1; $x++) {
		// 	// echo json_encode($data['pendidikan'][$x]['tingkat_pendidikan']);
		// 	array_push($data['pekerjaan'], $pekerjaan[$x]['jenis_pekerjaan']);
		// 	array_push($data['pekerjaan_jumlah'], $pekerjaan[$x]['jumlah']);
		// }

		// for ($x = 0; $x <= count($agama) - 1; $x++) {
		// 	// echo json_encode($data['pendidikan'][$x]['tingkat_pendidikan']);
		// 	array_push($data['agama'], $agama[$x]['agama']);
		// 	array_push($data['agama_jumlah'], $agama[$x]['jumlah']);
		// }

		
		
		



		
		for ($x = 0; $x <= 3; $x++) {
			// echo json_encode($data['pendidikan'][$x]['tingkat_pendidikan']);
			array_push($data['pendudukwanita'], $penduduk[$x]['kategori_usia']);
			array_push($data['pendudukwanita_jumlah'], $penduduk[$x]['jumlah']);
		}

		for ($x = 4; $x <= 7; $x++) {
			// echo json_encode($data['pendidikan'][$x]['tingkat_pendidikan']);
			array_push($data['pendudukpria'], $penduduk[$x]['kategori_usia']);
			array_push($data['pendudukpria_jumlah'], $penduduk[$x]['jumlah']);
		}








		// for ($x = 0; $x <= count($pendidikan) - 1; $x++) {
		// // for ($x = 0; $x <= 6; $x++) {
		// 	// echo json_encode($data['pendidikan'][$x]['tingkat_pendidikan']);
		// 	array_push($data['pendidikan'], $pendidikan[$x]['kategori_pendidikan']);
		// 	array_push($data['pendidikan_jumlah'], $pendidikan[$x]['jumlah']);
		// }

		// for ($x = 0; $x <= count($pekerjaan) - 1; $x++) {
		// // for ($x = 0; $x <= 6; $x++) {
		// 	// echo json_encode($data['pendidikan'][$x]['tingkat_pendidikan']);
		// 	array_push($data['pekerjaan'], $pekerjaan[$x]['kategori_pekerjaan']);
		// 	array_push($data['pekerjaan_jumlah'], $pekerjaan[$x]['jumlah']);
		// }


		// for ($x = 0; $x <= count($agama) - 1; $x++) {
		// // for ($x = 0; $x <= 5; $x++) {
		// 	// echo json_encode($data['pendidikan'][$x]['tingkat_pendidikan']);
		// 	array_push($data['agama'], $agama[$x]['kategori_agama']);
		// 	array_push($data['agama_jumlah'], $agama[$x]['jumlah']);
		// }

		// echo count($data['pendidikan']);
		$data['title'] = "Dashboard";
		$data['menu'] = $this->menu->getAll();
		
		$data["pendidikan"] = $this->penduduk_m->tampil_pendidikan();
		$data["pekerjaan"] = $this->penduduk_m->tampil_pekerjaan();
		$data["agama"] = $this->penduduk_m->tampil_agama();
		
		$data['hasil'] = $this->penduduk_m->pendidikan_jumlah();
		$data['hasil1'] = $this->penduduk_m->pekerjaan_jumlah();
		$data['hasil2'] = $this->penduduk_m->agama_jumlah();

		$this->load->view('_partials/header', $data);
		$this->load->view('_partials/sidebar', $data);
		$this->load->view('_partials/top-menu');
		$this->load->view('admin/dashboard/index', $data);
		$this->load->view('_partials/footer_chart', $data);
	}

	public function ctrl_ChartPenduduk()
	{
		$result = $this->penduduk_m->exec_ChartPenduduk();

		return $result;
	}

	// public function ctrl_ChartPendidikan()
	// {
	// 	$result = $this->Pendidikan_m->exec_ChartPendidikan();

	// 	return $result;
	// }

	// public function ctrl_ChartPekerjaan()
	// {
	// 	$result = $this->Pekerjaan_m->exec_ChartPekerjaan();

	// 	return $result;
	// }

	// public function ctrl_ChartAgama()
	// {
	// 	$result = $this->agama_m->exec_ChartAgama();

	// 	return $result;
	// }
}
