<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penduduk_m extends CI_Model
{
    private $_table = "penduduk";

    /*
	 * Start backend 
	 */

    public function rules()
    {
        
        $this->form_validation->set_rules(
            'nik',
            'NIK',
            'trim|required'
        );

        $this->form_validation->set_rules(
            'nama',
            'Nama',
            'trim|required'
        );

        $this->form_validation->set_rules(
            'gender',
            'Jenis kelamin',
            'trim|required'
        );

        $this->form_validation->set_rules(
            'usia',
            'Tahun lahir',
            'trim|required'
        );

        $this->form_validation->set_rules(
            'ttl',
            'ttl',
            'trim|required'
        );

        $this->form_validation->set_rules(
            'alamat',
            'alamat',
            'trim|required'
        );

        $this->form_validation->set_rules(
            'rt',
            'rt',
            'trim|required'
        );

        $this->form_validation->set_rules(
            'dusun',
            'dusun',
            'trim|required'
        );

        $this->form_validation->set_rules(
            'pendidikan',
            'Pendidikan',
            'trim|required'
        );

        $this->form_validation->set_rules(
            'pekerjaan',
            'Pekerjaan',
            'trim|required'
        );

        $this->form_validation->set_rules(
            'agama',
            'Agama',
            'trim|required'
        );
    }

    public function editRules()
    {
        return [
            [
                'field' => 'nik',
                'label' => 'NIK',
                'rules' => 'trim|required'
            ],

            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'trim|required'
            ],

            [
                'field' => 'gender',
                'label' => 'Jenis kelamin',
                'rules' => 'trim|required'
            ],

            [
                'field' => 'usia',
                'label' => 'Tahun lahir',
                'rules' => 'trim|required'
            ],

            [
                'field' => 'ttl',
                'label' => 'ttl',
                'rules' => 'trim|required'
            ],

            [
                'field' => 'alamat',
                'label' => 'alamat',
                'rules' => 'trim|required'
            ],

            [
                'field' => 'rt',
                'label' => 'rt',
                'rules' => 'trim|required'
            ],

            [
                'field' => 'dusun',
                'label' => 'dusun',
                'rules' => 'trim|required'
            ],

            [
                'field' => 'pendidikan',
                'label' => 'Pendidikan',
                'rules' => 'trim|required'
            ],

            [
                'field' => 'pekerjaan',
                'label' => 'Pekerjaan',
                'rules' => 'trim|required'
            ],

            [
                'field' => 'agama',
                'label' => 'Agama',
                'rules' => 'trim|required'
            ]
        ];
    }



    public function getById($id)
    {
        $this->db->where('deleted_at', null);

        return $this->db->get_where($this->_table, ["id" => $id])->row_array();
    }

    public function getById1($id)
    {
        $this->db->where('deleted_at', null);

        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }
    


    public function save()
    {
        $nik = htmlspecialchars($this->input->post('nik', true));
        $nama = htmlspecialchars($this->input->post('nama', true));
        $gender = htmlspecialchars($this->input->post('gender', true));
        $usia = date('Y') - htmlspecialchars($this->input->post('usia', true));
        $ttl = htmlspecialchars($this->input->post('ttl', true));
        $alamat = htmlspecialchars($this->input->post('alamat', true));
        $id_rt = htmlspecialchars($this->input->post('rt', true));
        $id_dusun = htmlspecialchars($this->input->post('dusun', true));
        $id_pendidikan = htmlspecialchars($this->input->post('pendidikan', true));
        $id_pekerjaan = htmlspecialchars($this->input->post('pekerjaan', true));
        $id_agama = htmlspecialchars($this->input->post('agama', true));
        $penduduk = [
            'nik'        => $nik,
            'nama'       => $nama,
            'gender'     => $gender,
            'usia'       => $usia,
            'ttl'        => $ttl,
            'alamat'       => $alamat,
            'id_rt'         => $id_rt,
            'id_dusun'      => $id_dusun,
            'id_pendidikan' => $id_pendidikan,
            'id_pekerjaan'  => $id_pekerjaan,
            'id_agama'      => $id_agama
        ];
        $this->db->insert($this->_table, $penduduk);
    }


    public function update()
    {
        $post = $this->input->post();
        $this->id = $post["id"];
        $this->nik = $post["nik"];
        $this->nama = $post["nama"];
        $this->gender = $post["gender"];
        $this->usia = $post["usia"];
        $this->ttl = $post["ttl"];
        $this->alamat = $post["alamat"];
        $this->id_rt = $post["rt"];
        $this->id_dusun = $post["dusun"];
        $this->id_pendidikan = $post["pendidikan"];
        $this->id_pekerjaan = $post["pekerjaan"];
        $this->id_agama = $post["agama"];
        return $this->db->update($this->_table, $this, array("id" => $post["id"]));
    }

    public function delete($id)
    {
        $this->db->set('deleted_at', date('Y-m-d H:i:s'));
        $this->db->where('id', $id);

        return $this->db->update($this->_table);
    }
    /*
	 * End backend 
	 */

    public function getAll()
    {
        $this->db->where('deleted_at', null);
        // $this->db->order_by('nik', 'desc');
        return $this->db->get($this->_table)->result();
        // $query = $this->db->get($this->_table);
        // return $query->result_array();
    }

    public function countAll()
    {
        $this->db->where('deleted_at', null);
        return $this->db->get($this->_table)->num_rows();
    }

    public function getByGender()
    {
        $this->db->where('deleted_at', null);
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

    public function tampil_data()
    {
        $this->db->where('deleted_at', null);
        return $this->db->get('penduduk');
    }

    public function tampil_pendidikan()
	{
        $this->db->where('deleted_at', null);
		$query = $this->db->get('pendidikan');
		return $query;
    }

    public function tampil_pekerjaan()
	{
        $this->db->where('deleted_at', null);
		$query = $this->db->get('pekerjaan');
		return $query;
    }

    public function tampil_agama()
	{
        $this->db->where('deleted_at', null);
		$query = $this->db->get('agama');
		return $query;
    }

    public function tampil_rt()
	{
        $this->db->where('deleted_at', null);
		$query = $this->db->get('rt');
		return $query;
    }
    public function tampil_dusun()
	{
        $this->db->where('deleted_at', null);
		$query = $this->db->get('dusun');
		return $query;
    }


     public function join4table(){
        $this->db->select('*');
        $this->db->from('penduduk');
        $this->db->join('pekerjaan','penduduk.id_pekerjaan = pekerjaan.id_pekerjaan','LEFT');		
        $this->db->join('pendidikan','penduduk.id_pendidikan = pendidikan.id_pendidikan','LEFT');
        $this->db->join('agama','penduduk.id_agama = agama.id_agama','LEFT');
        $this->db->join('rt','penduduk.id_rt = rt.id_rt','LEFT');
        $this->db->join('dusun','penduduk.id_dusun = dusun.id_dusun','LEFT');
        $this->db->where('penduduk.deleted_at', null);
        $query = $this->db->get();
        return $query->result();
     }

    public function print()
    {
        $data['join'] = $this->tampil_data("join4table")->result;
        // $data['join'] = $this->penduduk_m->join4table();
        $this->load->view('admin/penduduk/print', $data);
    }

    public function pendidikan_jumlah()
    {
        $this->db->from('pendidikan as pd');
        $this->db->join('penduduk as p', 'p.id_pendidikan = pd.id_pendidikan', 'left');
        $this->db->select(['pd.id_pendidikan', 'pd.tingkat_pendidikan', 'count(p.id_pekerjaan) as total']);
        $this->db->where('p.deleted_at', null);
        $this->db->where('pd.deleted_at', null);
        $this->db->group_by('pd.id_pendidikan');

        return $this->db->get()->result();
    }


    public function pekerjaan_jumlah()
    {
        $this->db->from('pekerjaan as pj');
        $this->db->join('penduduk as p', 'p.id_pekerjaan = pj.id_pekerjaan', 'left');
        $this->db->select(['pj.id_pekerjaan', 'pj.jenis_pekerjaan', 'count(p.id_pekerjaan) as total']);
        $this->db->where('p.deleted_at', null);
        $this->db->where('pj.deleted_at', null);
        $this->db->group_by('pj.id_pekerjaan');

        return $this->db->get()->result();
    }

    public function agama_jumlah()
    {
        $this->db->from('agama as a');
        $this->db->join('penduduk as p', 'p.id_agama = a.id_agama', 'left');
        $this->db->select(['a.id_agama', 'a.agama', 'count(p.id_agama) as total']);
        $this->db->where('p.deleted_at', null);
        $this->db->where('a.deleted_at', null);
        $this->db->group_by('a.id_agama');

        return $this->db->get()->result();
    }

    public function checkNIK($nik)
    {
        $this->db->from('penduduk as p');
        $this->db->join('agama as a', 'a.id_agama = p.id_agama');
        $this->db->join('pekerjaan as pj', 'pj.id_pekerjaan = p.id_pekerjaan');
        $this->db->select([
            'p.*', 'a.agama', 'pj.jenis_pekerjaan'
        ]);
        $this->db->where('p.nik', $nik);
        $this->db->where('p.deleted_at', null);

        return $this->db->get()->result();
    }

}
