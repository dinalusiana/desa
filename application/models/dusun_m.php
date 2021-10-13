<?php
defined('BASEPATH') or exit('No direct script access allowed');

class dusun_m extends CI_Model
{
    private $_table = "dusun";

    /*
	 * Start backend 
	 */
    public function rules()
    {
        // $this->form_validation->set_rules(
        //     'id_dusun',
        //     'id_dusun',
        //     'trim|required|is_unique[dusun.id_dusun]',
        //     ['is_unique' => 'id_dusun ini sudah terdaftar!']
        // );

        $this->form_validation->set_rules(
            'dusun',
            'dusun',
            'trim|required'
        );

        // $this->form_validation->set_rules(
        //     'jumlah',
        //     'jumlah',
        //     'trim|required'
        // );
    }

    public function editRules()
    {
        return [

            [
                'field' => 'dusun',
                'label' => 'dusun',
                'rules' => 'trim|required'
            ],

            // [
            //     'field' => 'jumlah',
            //     'label' => 'jumlah',
            //     'rules' => 'trim|required'
            // ],
        ];
    }

    public function getById($id_dusun)
    {
        $this->db->where('deleted_at', null);
        return $this->db->get_where($this->_table, ["id_dusun" => $id_dusun])->row_array();
    }

    public function save()
    {
        // $id_dusun = htmlspecialchars($this->input->post('id_dusun', true));
        $dusun = htmlspecialchars($this->input->post('dusun', true));
        // $jumlah = htmlspecialchars($this->input->post('jumlah', true));
        $dusun = [
            // 'id_dusun'        => $id_dusun,
            'dusun'       => $dusun,
            // 'jumlah'     => $jumlah,
        ];
        $this->db->insert($this->_table, $dusun);
    }

    public function update()
    {
        $id_dusun = htmlspecialchars($this->input->post('id_dusun', true));
        $dusun = htmlspecialchars($this->input->post('dusun', true));
        // $jumlah = htmlspecialchars($this->input->post('jumlah', true));
        $dusun = [
            // 'id_dusun'        => $id,
            'dusun'       => $dusun,
            // 'jumlah'     => $jumlah,
        ];
        $this->db->update($this->_table, $dusun, array('id_dusun' => $id_dusun));
    }

    public function delete($id_dusun)
    {
        $this->db->set('deleted_at', date('Y-m-d H:i:s'));
        $this->db->where('id_dusun', $id_dusun);

        return $this->db->update($this->_table);
    }
    /*
	 * End backend 
	 */

    public function getAll()
    {
        $this->db->where('deleted_at', null);
        // $this->db->order_by('id_dusun', 'desc');
        return $this->db->get($this->_table)->result_array();
        // $query = $this->db->get($this->_table);
        // return $query->result_array();
    }

    public function countAll()
    {
        $this->db->where('deleted_at', null);
        return $this->db->get($this->_table)->num_rows();
    }

    public function tampil_data()
    {
        $this->db->where('deleted_at', null);
        return $this->db->get('dusun');
    }

    public function tampil_dusun()
	{
        $this->db->where('deleted_at', null);
		$query = $this->db->get('dusun');
		return $query;
    }


    public function print()
    {
        $data['dusun'] = $this->tampil_data("dusun")->result;
        $this->load->view('admin/dusun/print', $data);
    }

    // public function dusun_jumlah()
    // {
    //     $this->db->group_by('id_dusun');
    //     $this->db->select('id_dusun');
    //     $this->db->select("count(*) as total");
    //     return $this->db->from('penduduk')
    //       ->get()
    //       ->result();
    // }
    
    // public function exec_Chartdusun()
    // {
    //     $query = "call sp_dashboard_chartdusun()";
    //     $data = $this->db->query($query, '');
    //     mysqli_next_result($this->db->conn_id);
    //     $result = $data->result_array();
    //     return $result;
    // }

}

