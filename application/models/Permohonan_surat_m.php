<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Permohonan_surat_m extends CI_Model
{
    private $_table = "permohonan_surat";

    /*
	 * Start backend 
	 */
    public function rules()
    {
        $this->form_validation->set_rules(
            'nama',
            'Nama',
            'trim|required'
        );

        $this->form_validation->set_rules(
            'ttl',
            'ttl',
            'trim|required'
        );

        $this->form_validation->set_rules(
            'kewarganegaraan',
            'Kewarganegaraan',
            'trim|required'
        );

        $this->form_validation->set_rules(
            'agama',
            'Agama',
            'trim|required'
        );

        $this->form_validation->set_rules(
            'pekerjaan',
            'Pekerjaan',
            'trim|required'
        );

        $this->form_validation->set_rules(
            'alamat',
            'Alamat',
            'trim|required'
        );

        $this->form_validation->set_rules(
            'nik',
            'NIK',
            'trim|required'
        );

        $this->form_validation->set_rules(
            'keperluan',
            'Keperluan',
            'trim|required'
        );

        $this->form_validation->set_rules(
            'keterangan',
            'Keterangan',
            'trim|required'
        );

        $this->form_validation->set_rules(
            'nomer',
            'Nomer',
            'trim|required'
        );

        $this->form_validation->set_rules(
            'bulan',
            'Bulan',
            'trim|required'
        );

        $this->form_validation->set_rules(
            'tahun',
            'Tahun',
            'trim|required'
        );

        // $this->form_validation->set_rules(
        //     'file_upload',
        //     'File Upload',
        //     'trim|required'
        // );

        // $this->form_validation->set_rules(
        //     'proses',
        //     'proses',
        //     'trim|required'
        // );
    }

    public function editRules()
    {
        return [
            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'trim|required'
            ],

            [
                'field' => 'ttl',
                'label' => 'ttl',
                'rules' => 'trim|required'
            ],

            [
                'field' => 'kewarganegaraan',
                'label' => 'Kewarganegaraan',
                'rules' => 'trim|required'
            ],

            [
                'field' => 'agama',
                'label' => 'Agama',
                'rules' => 'trim|required'
            ],

            [
                'field' => 'pekerjaan',
                'label' => 'Pekerjaan',
                'rules' => 'trim|required'
            ],

            [
                'field' => 'alamat',
                'label' => 'Alamat',
                'rules' => 'trim|required'
            ],

            [
                'field' => 'nik',
                'label' => 'NIK',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'keperluan',
                'label' => 'Keperluan',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'keterangan',
                'label' => 'Keterangan',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'nomer',
                'label' => 'Nomer',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'bulan',
                'label' => 'Bulan',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'tahun',
                'label' => 'Tahun',
                'rules' => 'trim|required'
            ]
            // [
            //     'field' => 'file_upload',
            //     'label' => 'File Upload',
            //     'rules' => 'trim|required'
            // ]
            // [
            //     'field' => 'proses',
            //     'label' => 'proses',
            //     'rules' => 'trim|required'
            // ]
        ];
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_surat_permohonan" => $id])->row_array();
    }

    public function update()
    {
        $id = htmlspecialchars($this->input->post('id_surat_permohonan', true));
        $nama = htmlspecialchars($this->input->post('nama', true));
        $ttl = htmlspecialchars($this->input->post('ttl', true));
        $kewarganegaraan = htmlspecialchars($this->input->post('kewarganegaraan', true));
        $agama = htmlspecialchars($this->input->post('agama', true));
        $pekerjaan = htmlspecialchars($this->input->post('pekerjaan', true));
        $alamat = htmlspecialchars($this->input->post('alamat', true));
        $nik = htmlspecialchars($this->input->post('nik', true));
        $keperluan = htmlspecialchars($this->input->post('keperluan', true));
        $keterangan = htmlspecialchars($this->input->post('keterangan', true));
        $nomer = htmlspecialchars($this->input->post('nomer', true));
        $bulan = htmlspecialchars($this->input->post('bulan', true));
        $tahun = htmlspecialchars($this->input->post('tahun', true));
        // $file_upload = htmlspecialchars($this->input->post('file_upload', true));
        // $proses = htmlspecialchars($this->input->post('proses', true));
        $permohonan_surat = [
            // 'nik'        => $id,
            'nama'        => $nama,
            'ttl'       => $ttl,
            'kewarganegaraan'     => $kewarganegaraan,
            'agama'       => $agama,
            'pekerjaan'      => $pekerjaan,
            'alamat'         => $alamat,
            'nik' => $nik,
            'keperluan'  => $keperluan,
            'keterangan' => $keterangan,
            'nomer' => $nomer,
            'bulan' => $bulan,
            'tahun' => $tahun,
            // 'file_upload' => $file_upload,
            // 'proses' => $proses,
        ];
        $this->db->update($this->_table, $permohonan_surat, array('id_surat_permohonan' => $id));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_surat_permohonan" => $id));
    }
    /*
	 * End backend 
	 */

    public function getAll()
    {
        // $this->db->order_by('nik', 'desc');
        return $this->db->get($this->_table)->result_array();
        // $query = $this->db->get($this->_table);
        // return $query->result_array();
    }

    public function countAll()
    {
        return $this->db->get($this->_table)->num_rows();
    }

    public function getByGender()
    {
        $this->db->select('*');
        $this->db->where('gender');
        $this->db->from($this->_table);
        return $this->db->get()->result();
    }

    public function exec_ChartPenduduk()
    {
        $query = "call sp_dashboard_chartpenduduk()";
        $data = $this->db->query($query, '');
        mysqli_next_result($this->db->conn_id);
        $result = $data->result_array();
        return $result;
    }
}
