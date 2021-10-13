<?php
defined('BASEPATH') or exit('No direct script access allowed');

class permohonan_surat extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('kategori_m', 'kategori', true);
        $this->load->model('penduduk_m', 'penduduk', true);
    }
    public function index()
    {
        // $data['kategori'] = $this->kategori->getAll();
        $data['title'] = "permohonan surat";
        $this->load->view('themes/header', $data);
        $this->load->view('themes/top-menu', $data);
        $this->load->view('themes/breadcrumb');
        $this->load->view('permohonan_surat/index');
        $this->load->view('themes/footer');
        $this->load->view('themes/js_permohonan_surat');
    }

    public function ctrl_insert()
    {
        $penduduk = $this->penduduk->checkNIK($this->input->post('nik'));

        if (count($penduduk)) {
            $warga = $penduduk[0];
            $param = array(
                'aksi' => "insert",
                'id' => null,
                'name' => $warga->nama,
                'ttl' => $warga->ttl,
                'kewarganegaraan' => 'Indonesia',
                'agama' => $warga->agama,
                'pekerjaan' => $warga->jenis_pekerjaan,
                'alamat' => $warga->alamat,
                'nik' => $warga->nik,
                'keperluan' => $this->input->post('keperluan'),
                'keterangan' => $this->input->post('keterangan'),
                'nomer' => $this->input->post('nomer'),
                'bulan' => $this->input->post('bulan'),
                'tahun' => $this->input->post('tahun'),
                'file_upload' => null
            );

            $result = $this->kategori->exec_insert($param)[0];

            $response = json_encode($result);
        } else {
            $response = json_encode(['msgStatus' => 'error']);
        }

        echo $response;
    }

    public function ctrl_create_no()
    {
        $param = array(
            'aksi' => "create_no",
            'id' => null,
            'name' => NULL,
            'ttl' => NULL,
            'kewarganegaraan' => NULL,
            'agama' => NULL,
            'pekerjaan' => NULL,
            'alamat' => NULL,
            'nik' => NULL,
            'keperluan' => NULL,
            'keterangan' => NULL,
            'nomer' => $this->input->post('nomer'),
            'bulan' => $this->input->post('bulan'),
            'tahun' => $this->input->post('tahun'),
            'file_upload' => NULL
        );
        $result = $this->kategori->exec_create_no($param);

        echo json_encode($result);
    }

    public function ctrl_AllPemohonSurat()
    {
        $param = array(
            'aksi' => "AllPemohonSurat",
            'id' => null,
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
        $result = $this->kategori->exec_AllPemohonSurat($param);

        echo json_encode($result);
    }
}
