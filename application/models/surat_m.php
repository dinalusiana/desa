<?php
defined('BASEPATH') or exit('No direct script access allowed');

class surat_m extends CI_Model
{
    private $_table = "surat";
    private $_table_permohonan_surat = "permohonan_surat";
    /*
	 * Start backend 
	 */
    public function rules()//Method ini akan mengembalikan sebuah array yang berisi rules.
    {                      //Rules ini nanti kita butuhkan untuk validasi input.
                           //Pada Rules di atas, kita memberikan aturan untuk wajib mengisi (required)

        $this->form_validation->set_rules(
            'id_surat_permohonan',
            'id_surat_permohonan',
            'trim|required'
        );
        $this->form_validation->set_rules(
            'nomor',
            'Kode',
            'trim|required'
            // 'trim|required|is_unique[surat.nomor]',
            // ['is_unique' => 'nomor ini sudah terdaftar!']
        );
        $this->form_validation->set_rules(
            'nama_kades',
            'nama_kades',
            'trim|required'
        );

        $this->form_validation->set_rules(
            'jabatan_kades',
            'jabatan_kades',
            'trim|required'
        );

        $this->form_validation->set_rules(
            'alamat_kades',
            'alamat_kades',
            'trim|required'
        );

        $this->form_validation->set_rules(
            'nama_pemohon',
            'nama_pemohon',
            'trim|required'
        );

        $this->form_validation->set_rules(
            'ttl_pemohon',
            'ttl_pemohon',
            'trim|required'
        );

        $this->form_validation->set_rules(
            'kewarganegaraan_pemohon',
            'kewarganegaraan_pemohon',
            'trim|required'
        );

        $this->form_validation->set_rules(
            'agama_pemohon',
            'agama_pemohon',
            'trim|required'
        );

        $this->form_validation->set_rules(
            'pekerjaan_pemohon',
            'pekerjaan_pemohon',
            'trim|required'
        );

        $this->form_validation->set_rules(
            'alamat_pemohon',
            'alamat_pemohon',
            'trim|required'
        );

        $this->form_validation->set_rules(
            'nik_pemohon',
            'nik_pemohon',
            'trim|required'
        );

        $this->form_validation->set_rules(
            'keperluan',
            'keperluan',
            'trim|required'
        );

        $this->form_validation->set_rules(
            'berlaku',
            'berlaku',
            'trim|required'
        );

        $this->form_validation->set_rules(
            'keterangan',
            'keterangan',
            'trim|required'
        );
    }

    public function editRules()//method editrules
    {
        return [
            [
                'field' => 'id_surat_permohonan',
                'label' => 'id_surat_permohonan',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'nomor',
                'label' => 'kode',
                'rules' => 'trim|required'
            ],

            [
                'field' => 'nama_kades',
                'label' => 'nama_kades',
                'rules' => 'trim|required'
            ],

            [
                'field' => 'jabatan_kades',
                'label' => 'jabatan_kades',
                'rules' => 'trim|required'
            ],

            [
                'field' => 'alamat_kades',
                'label' => 'alamat_kades',
                'rules' => 'trim|required'
            ],

            [
                'field' => 'nama_pemohon',
                'label' => 'nama_pemohon',
                'rules' => 'trim|required'
            ],

            [
                'field' => 'ttl_pemohon',
                'label' => 'ttl_pemohon',
                'rules' => 'trim|required'
            ],

            [
                'field' => 'kewarganegaraan_pemohon',
                'label' => 'kewarganegaraan_pemohon',
                'rules' => 'trim|required'
            ],

            [
                'field' => 'agama_pemohon',
                'label' => 'agama_pemohon',
                'rules' => 'trim|required'
            ],

            [
                'field' => 'pekerjaan_pemohon',
                'label' => 'pekerjaan_pemohon',
                'rules' => 'trim|required'
            ],

            [
                'field' => 'alamat_pemohon',
                'label' => 'alamat_pemohon',
                'rules' => 'trim|required'
            ],

            [
                'field' => 'nik_pemohon',
                'label' => 'nik_pemohon',
                'rules' => 'trim|required'
            ],

            [
                'field' => 'keperluan',
                'label' => 'keperluan',
                'rules' => 'trim|required'
            ],

            [
                'field' => 'berlaku',
                'label' => 'berlaku',
                'rules' => 'trim|required'
            ],

            [
                'field' => 'keterangan',
                'label' => 'keterangan',
                'rules' => 'trim|required'
            ]
        ];
    }

    public function getById($id)//memanggil data dr database
    {
        $sql = "select a.*,b.nomer,b.bulan,b.tahun,b.file_upload from surat a left join permohonan_surat b on a.id_permohonan_surat=b.id_surat_permohonan where a.id_permohonan_surat=? order by a.nomor";
        $query = $this->db->query($sql, array($id));
        return $query->row_array();


        // return $this->db->get_where($this->_table, ["id_permohonan_surat" => $id])->row_array();
    }

    public function save()//method untuk menyimpan data ke tabel
    {

        $nomor = htmlspecialchars($this->input->post('nomor', true));//isi field agama dan ambil data agama dr form
        $nama_kades = htmlspecialchars($this->input->post('nama_kades', true));
        $jabatan_kades = htmlspecialchars($this->input->post('jabatan_kades', true));
        $alamat_kades = htmlspecialchars($this->input->post('alamat_kades', true));
        $nama_pemohon = htmlspecialchars($this->input->post('nama_pemohon', true));
        $ttl_pemohon = htmlspecialchars($this->input->post('ttl_pemohon', true));
        $kewarganegaraan_pemohon = htmlspecialchars($this->input->post('kewarganegaraan_pemohon', true));
        $agama_pemohon = htmlspecialchars($this->input->post('agama_pemohon', true));
        $pekerjaan_pemohon = htmlspecialchars($this->input->post('pekerjaan_pemohon', true));
        $alamat_pemohon = htmlspecialchars($this->input->post('alamat_pemohon', true));
        $nik_pemohon = htmlspecialchars($this->input->post('nik_pemohon', true));
        $keperluan = htmlspecialchars($this->input->post('keperluan', true));
        $berlaku = htmlspecialchars($this->input->post('berlaku', true));
        $keterangan = htmlspecialchars($this->input->post('keterangan', true));
        $id_surat_permohonan = htmlspecialchars($this->input->post('id_surat_permohonan', true));
        $surat = [

            'nomor'        => $nomor,
            'nama_kades'       => $nama_kades,
            'jabatan_kades'     => $jabatan_kades,
            'alamat_kades'       => $alamat_kades,
            'nama_pemohon'      => $nama_pemohon,
            'ttl_pemohon'         => $ttl_pemohon,
            'kewarganegaraan_pemohon' => $kewarganegaraan_pemohon,
            'agama_pemohon'        => $agama_pemohon,
            'pekerjaan_pemohon'        => $pekerjaan_pemohon,
            'alamat_pemohon'        => $alamat_pemohon,
            'nik_pemohon'        => $nik_pemohon,
            'keperluan'        => $keperluan,
            'berlaku'        => $berlaku,
            'keterangan'  => $keterangan,
            'id_permohonan_surat'        => $id_surat_permohonan,
        ];
        $this->db->insert($this->_table, $surat);//disimpan pd tabel surat
    }

    public function update()
    {
        $nomor = htmlspecialchars($this->input->post('nomor', true));//isi field agama dan ambil data agama dr form
        $nama_kades = htmlspecialchars($this->input->post('nama_kades', true));
        $jabatan_kades = htmlspecialchars($this->input->post('jabatan_kades', true));
        $alamat_kades = htmlspecialchars($this->input->post('alamat_kades', true));
        $nama_pemohon = htmlspecialchars($this->input->post('nama_pemohon', true));
        $ttl_pemohon = htmlspecialchars($this->input->post('ttl_pemohon', true));
        $kewarganegaraan_pemohon = htmlspecialchars($this->input->post('kewarganegaraan_pemohon', true));
        $agama_pemohon = htmlspecialchars($this->input->post('agama_pemohon', true));
        $pekerjaan_pemohon = htmlspecialchars($this->input->post('pekerjaan_pemohon', true));
        $alamat_pemohon = htmlspecialchars($this->input->post('alamat_pemohon', true));
        $nik_pemohon = htmlspecialchars($this->input->post('nik_pemohon', true));
        $keperluan = htmlspecialchars($this->input->post('keperluan', true));
        $berlaku = htmlspecialchars($this->input->post('berlaku', true));
        $keterangan = htmlspecialchars($this->input->post('keterangan', true));
        $id_surat_permohonan = htmlspecialchars($this->input->post('id_surat_permohonan', true));
        $surat = [
            'nomor'        => $nomor,
            'nama_kades'       => $nama_kades,
            'jabatan_kades'     => $jabatan_kades,
            'alamat_kades'       => $alamat_kades,
            'nama_pemohon'      => $nama_pemohon,
            'ttl_pemohon'         => $ttl_pemohon,
            'kewarganegaraan_pemohon' => $kewarganegaraan_pemohon,
            'agama_pemohon'      => $agama_pemohon,
            'pekerjaan_pemohon'      => $pekerjaan_pemohon,
            'alamat_pemohon'      => $alamat_pemohon,
            'nik_pemohon'      => $nik_pemohon,
            'keperluan'      => $keperluan,
            'berlaku'      => $berlaku,
            'keterangan'      => $keterangan,
            'id_permohonan_surat'        => $id_surat_permohonan,
        ];
        $this->db->update($this->_table, $surat, array('id_permohonan_surat' => $id_surat_permohonan));
    }

    public function delete($id)
    {
        $this->db->delete($this->_table_permohonan_surat, array("id_surat_permohonan" => $id));
        return $this->db->delete($this->_table, array("id_permohonan_surat" => $id));
    }
    /*
	 * End backend 
	 */

    public function getAll()//untuk mengambil data dari database.
    {
        $sql = "select a.*,b.nomer,b.bulan,b.tahun,b.file_upload from surat a left join permohonan_surat b on a.id_permohonan_surat=b.id_surat_permohonan order by a.nomor";
        $query = $this->db->query($sql);
        return $query->result_array();//memanggil semua data dr hasil query 
        // return $this->db->get($this->_table)->result_array();

        // $this->db->order_by('nik', 'desc');

        // $query = $this->db->get($this->_table);
        // return $query->result_array();
    }

    public function countAll()//menghitung sel yang berisi setiap tipe informasi,
    {
        return $this->db->get($this->_table)->num_rows();//untuk mengetahui seberapa banyak baris data dari query yang kita lakukan ke database.
    }
}
