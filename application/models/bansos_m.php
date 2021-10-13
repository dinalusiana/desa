<?php
defined('BASEPATH') or exit('No direct script access allowed');

class bansos_m extends CI_Model
{
    private $_table = "bansos";

    /*
	 * Start backend 
	 */
    public function rules()
    {
        // $this->form_validation->set_rules(
        //     'id_bansos',
        //     'id_bansos',
        //     'trim|required|is_unique[bansos.id_bansos]',
        //     ['is_unique' => 'id_bansos ini sudah terdaftar!']
        // );

        $this->form_validation->set_rules(
            'jenis_bantuan',
            'jenis_bantuan',
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
                'field' => 'jenis_bantuan',
                'label' => 'jenis_bantuan',
                'rules' => 'trim|required'
            ],

            // [
            //     'field' => 'jumlah',
            //     'label' => 'jumlah',
            //     'rules' => 'trim|required'
            // ],
        ];
    }

    public function getById($id_bansos)
    {
        $this->db->where('deleted_at', null);
        return $this->db->get_where($this->_table, ["id_bansos" => $id_bansos])->row_array();
    }

    public function save()
    {
        // $id_bansos = htmlspecialchars($this->input->post('id_bansos', true));
        $jenis_bantuan = htmlspecialchars($this->input->post('jenis_bantuan', true));
        // $jumlah = htmlspecialchars($this->input->post('jumlah', true));
        $bansos = [
            // 'id_bansos'        => $id_bansos,
            'jenis_bantuan'       => $jenis_bantuan,
            // 'jumlah'     => $jumlah,
        ];
        $this->db->insert($this->_table, $bansos);
    }

    public function update()
    {
        $id_bansos = htmlspecialchars($this->input->post('id_bansos', true));
        $jenis_bantuan = htmlspecialchars($this->input->post('jenis_bantuan', true));
        // $jumlah = htmlspecialchars($this->input->post('jumlah', true));
        $bansos = [
            // 'id_bansos'        => $id,
            'jenis_bantuan'       => $jenis_bantuan,
            // 'jumlah'     => $jumlah,
        ];
        $this->db->update($this->_table, $bansos, array('id_bansos' => $id_bansos));
    }

    public function delete($id_bansos)
    {
        $this->db->set('deleted_at', date('Y-m-d H:i:s'));
        $this->db->where('id_bansos', $id_bansos);

        return $this->db->update($this->_table);
    }
    /*
	 * End backend 
	 */

    public function getAll()
    {
        $this->db->where('deleted_at', null);
        // $this->db->order_by('id_bansos', 'desc');
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
        return $this->db->get('bansos');
    }

    public function tampil_bansos()
	{
        $this->db->where('deleted_at', null);
		$query = $this->db->get('bansos');
		return $query;
    }


    public function print()
    {
        $data['bansos'] = $this->tampil_data("bansos")->result;
        $this->load->view('admin/bansos/print', $data);
    }

    // public function bansos_jumlah()
    // {
    //     $this->db->group_by('id_bansos');
    //     $this->db->select('id_bansos');
    //     $this->db->select("count(*) as total");
    //     return $this->db->from('penduduk')
    //       ->get()
    //       ->result();
    // }
    
    // public function exec_Chartbansos()
    // {
    //     $query = "call sp_dashboard_chartbansos()";
    //     $data = $this->db->query($query, '');
    //     mysqli_next_result($this->db->conn_id);
    //     $result = $data->result_array();
    //     return $result;
    // }

}

