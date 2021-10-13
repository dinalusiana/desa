<?php
defined('BASEPATH') or exit('No direct script access allowed');

class rt_m extends CI_Model
{
    private $_table = "rt";

    /*
	 * Start backend 
	 */
    public function rules()
    {
        // $this->form_validation->set_rules(
        //     'id_rt',
        //     'id_rt',
        //     'trim|required|is_unique[rt.id_rt]',
        //     ['is_unique' => 'id_rt ini sudah terdaftar!']
        // );

        $this->form_validation->set_rules(
            'rt',
            'rt',
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
                'field' => 'rt',
                'label' => 'rt',
                'rules' => 'trim|required'
            ],

            // [
            //     'field' => 'jumlah',
            //     'label' => 'jumlah',
            //     'rules' => 'trim|required'
            // ],
        ];
    }

    public function getById($id_rt)
    {
        $this->db->where('deleted_at', null);
        return $this->db->get_where($this->_table, ["id_rt" => $id_rt])->row_array();
    }

    public function save()
    {
        // $id_rt = htmlspecialchars($this->input->post('id_rt', true));
        $rt = htmlspecialchars($this->input->post('rt', true));
        // $jumlah = htmlspecialchars($this->input->post('jumlah', true));
        $rt = [
            // 'id_rt'        => $id_rt,
            'rt'       => $rt,
            // 'jumlah'     => $jumlah,
        ];
        $this->db->insert($this->_table, $rt);
    }

    public function update()
    {
        $id_rt = htmlspecialchars($this->input->post('id_rt', true));
        $rt = htmlspecialchars($this->input->post('rt', true));
        // $jumlah = htmlspecialchars($this->input->post('jumlah', true));
        $rt = [
            // 'id_rt'        => $id,
            'rt'       => $rt,
            // 'jumlah'     => $jumlah,
        ];
        $this->db->update($this->_table, $rt, array('id_rt' => $id_rt));
    }

    public function delete($id_rt)
    {
        $this->db->set('deleted_at', date('Y-m-d H:i:s'));
        $this->db->where('id_rt', $id_rt);

        return $this->db->update($this->_table);
    }
    /*
	 * End backend 
	 */

    public function getAll()
    {
        $this->db->where('deleted_at', null);
        // $this->db->order_by('id_rt', 'desc');
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
        return $this->db->get('rt');
    }

    public function tampil_rt()
	{
        $this->db->where('deleted_at', null);
		$query = $this->db->get('rt');
		return $query;
    }


    public function print()
    {
        $data['rt'] = $this->tampil_data("rt")->result;
        $this->load->view('admin/rt/print', $data);
    }

    // public function rt_jumlah()
    // {
    //     $this->db->group_by('id_rt');
    //     $this->db->select('id_rt');
    //     $this->db->select("count(*) as total");
    //     return $this->db->from('penduduk')
    //       ->get()
    //       ->result();
    // }
    
    // public function exec_Chartrt()
    // {
    //     $query = "call sp_dashboard_chartrt()";
    //     $data = $this->db->query($query, '');
    //     mysqli_next_result($this->db->conn_id);
    //     $result = $data->result_array();
    //     return $result;
    // }

}

