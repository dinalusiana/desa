<?php
defined('BASEPATH') or exit('No direct script access allowed');

class jabatan_m extends CI_Model
{
    private $_table = "jabatan";

    /*
	 * Start backend 
	 */
    public function rules()
    {
        // $this->form_validation->set_rules(
        //     'id_jabatan',
        //     'id_jabatan',
        //     'trim|required|is_unique[jabatan.id_jabatan]',
        //     ['is_unique' => 'id_jabatan ini sudah terdaftar!']
        // );

        $this->form_validation->set_rules(
            'jabatan',
            'jabatan',
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
                'field' => 'jabatan',
                'label' => 'jabatan',
                'rules' => 'trim|required'
            ],

            // [
            //     'field' => 'jumlah',
            //     'label' => 'jumlah',
            //     'rules' => 'trim|required'
            // ],
        ];
    }

    public function getById($id_jabatan)
    {
        $this->db->where('deleted_at', null);
        return $this->db->get_where($this->_table, ["id_jabatan" => $id_jabatan])->row_array();
    }

    public function save()
    {
        // $id_jabatan = htmlspecialchars($this->input->post('id_jabatan', true));
        $jabatan = htmlspecialchars($this->input->post('jabatan', true));
        // $jumlah = htmlspecialchars($this->input->post('jumlah', true));
        $jabatan = [
            // 'id_jabatan'        => $id_jabatan,
            'jabatan'       => $jabatan,
            // 'jumlah'     => $jumlah,
        ];
        $this->db->insert($this->_table, $jabatan);
    }

    public function update()
    {
        $id_jabatan = htmlspecialchars($this->input->post('id_jabatan', true));
        $jabatan = htmlspecialchars($this->input->post('jabatan', true));
        // $jumlah = htmlspecialchars($this->input->post('jumlah', true));
        $jabatan = [
            // 'id_jabatan'        => $id,
            'jabatan'       => $jabatan,
            // 'jumlah'     => $jumlah,
        ];
        $this->db->update($this->_table, $jabatan, array('id_jabatan' => $id_jabatan));
    }

    public function delete($id_jabatan)
    {
        $this->db->set('deleted_at', date('Y-m-d H:i:s'));
        $this->db->where('id_jabatan', $id_jabatan);

        return $this->db->update($this->_table);
    }
    /*
	 * End backend 
	 */

    public function getAll()
    {
        $this->db->where('deleted_at', null);
        // $this->db->order_by('id_jabatan', 'desc');
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
        return $this->db->get('jabatan');
    }

    public function tampil_jabatan()
	{
        $this->db->where('deleted_at', null);
		$query = $this->db->get('jabatan');
		return $query;
    }


    public function print()
    {
        $data['jabatan'] = $this->tampil_data("jabatan")->result;
        $this->load->view('admin/jabatan/print', $data);
    }

    // public function jabatan_jumlah()
    // {
    //     $this->db->group_by('id_jabatan');
    //     $this->db->select('id_jabatan');
    //     $this->db->select("count(*) as total");
    //     return $this->db->from('penduduk')
    //       ->get()
    //       ->result();
    // }
    
    // public function exec_Chartjabatan()
    // {
    //     $query = "call sp_dashboard_chartjabatan()";
    //     $data = $this->db->query($query, '');
    //     mysqli_next_result($this->db->conn_id);
    //     $result = $data->result_array();
    //     return $result;
    // }

}

