<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pemerintah_desa_m extends CI_Model
{
    private $_table = "pemerintah_desa";

    /*
	 * Start backend 
	 */
    public function rules()
    {
        // $this->form_validation->set_rules(
        //     'nik',
        //     'Nomor induk kependudukan',
        //     'trim|required|is_unique[pemerintah_desa.nik]',
        //     ['is_unique' => 'NIK ini sudah terdaftar!']
        // );
        // $this->form_validation->set_rules(
        //     'nik',
        //     'NIK',
        //     'trim|required'
        // );

        // $this->form_validation->set_rules(
        //     'nama',
        //     'Nama',
        //     'trim|required'
        // );

        // $this->form_validation->set_rules(
        //     'gender',
        //     'Jenis kelamin',
        //     'trim|required'
        // );

        // $this->form_validation->set_rules(
        //     'usia',
        //     'Tahun lahir',
        //     'trim|required'
        // );

        // $this->form_validation->set_rules(
        //     'pendidikan',
        //     'Pendidikan',
        //     'trim|required'
        // );

        // $this->form_validation->set_rules(
        //     'pekerjaan',
        //     'Pekerjaan',
        //     'trim|required'
        // );

        $this->form_validation->set_rules(
            'jabatan',
            'jabatan',
            'trim|required'
        );
    }

    public function editRules()
    {
        return [
            // [
            //     'field' => 'nik',
            //     'label' => 'NIK',
            //     'rules' => 'trim|required'
            // ],

            // [
            //     'field' => 'nama',
            //     'label' => 'Nama',
            //     'rules' => 'trim|required'
            // ],

            // [
            //     'field' => 'gender',
            //     'label' => 'Jenis kelamin',
            //     'rules' => 'trim|required'
            // ],

            // [
            //     'field' => 'usia',
            //     'label' => 'Tahun lahir',
            //     'rules' => 'trim|required'
            // ],

            [
                'field' => 'nip',
                'label' => 'nip',
                'rules' => 'trim|required'
            ],

            [
                'field' => 'no_sk_angkat',
                'label' => 'no_sk_angkat',
                'rules' => 'trim|required'
            ],

            [
                'field' => 'jabatan',
                'label' => 'jabatan',
                'rules' => 'trim|required'
            ]
        ];
    }

    // public function getById($id)
    // {
    //     return $this->db->get_where($this->_table, ["id" => $id])->row_array();
    // }


    public function getById($id_pemdes)
    {
        return $this->db->get_where($this->_table, ["id_pemdes" => $id_pemdes])->row_array();
    }

    // public function save()
    // {
    //     $nik = htmlspecialchars($this->input->post('nik', true));
    //     $nama = htmlspecialchars($this->input->post('nama', true));
    //     $gender = htmlspecialchars($this->input->post('gender', true));
    //     $usia = date('Y') - htmlspecialchars($this->input->post('usia', true));
    //     $dusun = htmlspecialchars($this->input->post('dusun', true));
    //     $rt = htmlspecialchars($this->input->post('rt', true));
    //     $pendidikan = htmlspecialchars($this->input->post('pendidikan', true));
    //     $pekerjaan = htmlspecialchars($this->input->post('pekerjaan', true));
    //     $jabatan = htmlspecialchars($this->input->post('jabatan', true));
    //     $pemerintah_desa = [
    //         'nik'        => $nik,
    //         'nama'       => $nama,
    //         'gender'     => $gender,
    //         'usia'       => $usia,
    //         'dusun'      => $dusun,
    //         'rt'         => $rt,
    //         'pendidikan' => $pendidikan,
    //         'pekerjaan'  => $pekerjaan,
    //         'jabatan'    => $jabatan
    //     ];
    //     $this->db->insert($this->_table, $pemerintah_desa);
    // }


    public function save()
    {
        $id = htmlspecialchars($this->input->post('id', true));
        $nip = htmlspecialchars($this->input->post('nip', true));
        $no_sk_angkat = htmlspecialchars($this->input->post('no_sk_angkat', true));
        $id_jabatan = htmlspecialchars($this->input->post('jabatan', true));
        // $gender = htmlspecialchars($this->input->post('gender', true));
        // $usia = date('Y') - htmlspecialchars($this->input->post('usia', true));
        // $dusun = htmlspecialchars($this->input->post('dusun', true));
        // $rt = htmlspecialchars($this->input->post('rt', true));
        // $pendidikan = htmlspecialchars($this->input->post('pendidikan', true));
        // $pekerjaan = htmlspecialchars($this->input->post('pekerjaan', true));
        $pemerintah_desa = [
            'id'        => $id,
            'nip'        => $nip,
            'no_sk_angkat'  => $no_sk_angkat,
            'id_jabatan'       => $id_jabatan
            // 'gender'     => $gender,
            // 'usia'       => $usia,
            // 'dusun'      => $dusun,
            // 'rt'         => $rt,
            // 'pendidikan' => $pendidikan,
            // 'pekerjaan'  => $pekerjaan
        ];
        $this->db->insert($this->_table, $pemerintah_desa);
    }






    // public function update()
    // {
    //     $id = htmlspecialchars($this->input->post('id', true));
    //     $nik = htmlspecialchars($this->input->post('nik', true));
    //     $nama = htmlspecialchars($this->input->post('nama', true));
    //     $gender = htmlspecialchars($this->input->post('gender', true));
    //     $usia = htmlspecialchars($this->input->post('usia', true));
    //     $dusun = htmlspecialchars($this->input->post('dusun', true));
    //     $rt = htmlspecialchars($this->input->post('rt', true));
    //     $pendidikan = htmlspecialchars($this->input->post('pendidikan', true));
    //     $pekerjaan = htmlspecialchars($this->input->post('pekerjaan', true));
    //     $jabatan = htmlspecialchars($this->input->post('jabatan', true));
    //     $pemerintah_desa = [
    //         // 'nik'        => $id,
    //         'nik'        => $nik,
    //         'nama'       => $nama,
    //         'gender'     => $gender,
    //         'usia'       => $usia,
    //         'dusun'      => $dusun,
    //         'rt'         => $rt,
    //         'pendidikan' => $pendidikan,
    //         'pekerjaan'  => $pekerjaan,
    //         'jabatan'  => $jabatan
    //     ];
    //     $this->db->update($this->_table, $pemerintah_desa, array('id' => $id));
    // }


    public function update()
    {
        $id_pemdes = htmlspecialchars($this->input->post('id_pemdes', true));
        $nip = htmlspecialchars($this->input->post('nip', true));
        $no_sk_angkat = htmlspecialchars($this->input->post('no_sk_angkat', true));
        $id_jabatan = htmlspecialchars($this->input->post('jabatan', true));
        
        $pemerintah_desa = [
            // 'nik'        => $id,
            'nip'                   => $nip,
            'no_sk_angkat'          => $no_sk_angkat,
            'id_jabatan'       => $id_jabatan
        ];
        $this->db->update($this->_table, $pemerintah_desa, array('id_pemdes' => $id_pemdes));
    }


    public function delete($id_pemdes)
    {
        return $this->db->delete($this->_table, array("id_pemdes" => $id_pemdes));
    }
    /*
	 * End backend 
	 */

    public function getAll()
    {
        // $this->db->order_by('nik', 'desc');
        return $this->db->get($this->_table)->result();
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

    public function tampil_data()
    {
        return $this->db->get('pemerintah_desa');
    }

    public function tampil_jabatan()
	{
		$query = $this->db->get('jabatan');
		return $query;
    }


    public function joinpemdes1(){
        $this->db->select('*');
        $this->db->from('pemerintah_desa');
        $this->db->join('penduduk','pemerintah_desa.id = penduduk.id','LEFT');		
        $this->db->join('jabatan','pemerintah_desa.id_jabatan = jabatan.id_jabatan','LEFT');
        $query = $this->db->get();
        return $query->result();
     }


    public function print()
    {
        $data['pemerintah_desa'] = $this->tampil_data("pemerintah_desa")->result;
        $this->load->view('admin/pemerintah_desa/print', $data);
    }

}
