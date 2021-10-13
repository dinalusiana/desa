<?php
defined('BASEPATH') or exit('No direct script access allowed');

class bantuan_sosial_m extends CI_Model
{
    private $_table = "bantuan_sosial";

    /*
	 * Start backend 
	 */
    public function rules()
    {
        // $this->form_validation->set_rules(
        //     'nik',
        //     'Nomor induk kependudukan',
        //     'trim|required|is_unique[bantuan_sosial.nik]',
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
        // $this->form_validation->set_rules(
        //     'agama',
        //     'Agama',
        //     'trim|required'
        // );
        $this->form_validation->set_rules(
            'jenis_bantuan',
            'jenis_bantuan',
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

            // [
            //     'field' => 'pendidikan',
            //     'label' => 'Pendidikan',
            //     'rules' => 'trim|required'
            // ],

            // [
            //     'field' => 'pekerjaan',
            //     'label' => 'Pekerjaan',
            //     'rules' => 'trim|required'
            // ],

            // [
            //     'field' => 'agama',
            //     'label' => 'Agama',
            //     'rules' => 'trim|required'
            // ],

            [
                'field' => 'jenis_bantuan',
                'label' => 'jenis_bantuan',
                'rules' => 'trim|required'
            ]
        ];
    }

    public function getById($id_bantuan)
    {
        return $this->db->get_where($this->_table, ["id_bantuan" => $id_bantuan])->row_array();
    }

    public function save()
    {
        $id = htmlspecialchars($this->input->post('id', true));
        $id_bansos = htmlspecialchars($this->input->post('jenis_bantuan', true));
        // $gender = htmlspecialchars($this->input->post('gender', true));
        // $usia = date('Y') - htmlspecialchars($this->input->post('usia', true));
        // $dusun = htmlspecialchars($this->input->post('dusun', true));
        // $rt = htmlspecialchars($this->input->post('rt', true));
        // $pendidikan = htmlspecialchars($this->input->post('pendidikan', true));
        // $pekerjaan = htmlspecialchars($this->input->post('pekerjaan', true));
        $bantuan_sosial = [
            'id'        => $id,
            'id_bansos'       => $id_bansos
            // 'gender'     => $gender,
            // 'usia'       => $usia,
            // 'dusun'      => $dusun,
            // 'rt'         => $rt,
            // 'pendidikan' => $pendidikan,
            // 'pekerjaan'  => $pekerjaan
        ];
        $this->db->insert($this->_table, $bantuan_sosial);
    }



    public function update()
    {
        $post = $this->input->post();
        $this->id_bantuan = $post["id_bantuan"];
        $this->id_bansos = $post["jenis_bantuan"];
        return $this->db->update($this->_table, $this, array("id_bantuan" => $post["id_bantuan"]));
    }


    

    // public function update()
    // {
    //     $id_bantuan = htmlspecialchars($this->input->post('id_bantuan', true));
    //     $jenis_bantuan = htmlspecialchars($this->input->post('jenis_bantuan', true));
        
    //     $bantuan_sosial = [
    //         // 'nik'        => $id,
    //         'jenis_bantuan'        => $jenis_bantuan
    //     ];
    //     $this->db->update($this->_table, $bantuan_sosial, array('id_bantuan' => $id_bantuan));
    // }




    
    public function delete($id_bantuan)
    {
        return $this->db->delete($this->_table, array("id_bantuan" => $id_bantuan));
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
        return $this->db->get('bantuan_sosial');
    }


    public function tampil_bansos()
	{
		$query = $this->db->get('bansos');
		return $query;
    }




    public function joinbantuan1(){
        $this->db->select('*');
        $this->db->from('bantuan_sosial');
        $this->db->join('penduduk','bantuan_sosial.id = penduduk.id','LEFT');		
        $this->db->join('bansos','bantuan_sosial.id_bansos = bansos.id_bansos','LEFT');
        
        $query = $this->db->get();
        return $query->result();
     }


    public function print()
    {
        $data['joinbantuan'] = $this->tampil_data("joinbantuan1")->result;
        $this->load->view('admin/bantuan_sosial/print', $data);
    }
}
