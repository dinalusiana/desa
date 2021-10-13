<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pekerjaan_m extends CI_Model
{
    private $_table = "pekerjaan";

    /*
	 * Start backend 
	 */
    public function rules()
    {
        
        $this->form_validation->set_rules(
            'jenis_pekerjaan',
            'jenis_pekerjaan',
            'trim|required'
        );
    }

    public function editRules()
    {
        return [
            [
                'field' => 'jenis_pekerjaan',
                'label' => 'jenis_pekerjaan',
                'rules' => 'trim|required'
            ],

        ];
    }

    public function getById($id)
    {
        $this->db->where('deleted_at', null);
        return $this->db->get_where($this->_table, ["id_pekerjaan" => $id])->row_array();
    }

    public function save()
    {
        // $id_pekerjaan = htmlspecialchars($this->input->post('id_pekerjaan', true));
        $jenis_pekerjaan = htmlspecialchars($this->input->post('jenis_pekerjaan', true));
        // $jumlah = htmlspecialchars($this->input->post('jumlah', true));
        $pekerjaan = [
            // 'id_pekerjaan'        => $id_pekerjaan,
            'jenis_pekerjaan'       => $jenis_pekerjaan,
            // 'jumlah'     => $jumlah,
        ];
        $this->db->insert($this->_table, $pekerjaan);
    }

    public function update()
    {
        $id = htmlspecialchars($this->input->post('id_pekerjaan', true));
        $jenis_pekerjaan = htmlspecialchars($this->input->post('jenis_pekerjaan', true));
        // $jumlah = htmlspecialchars($this->input->post('jumlah', true));
        $pekerjaan = [
            // 'id_pekerjaan'        => $id,
            'jenis_pekerjaan'       => $jenis_pekerjaan,
            // 'jumlah'     => $jumlah,
        ];
        $this->db->update($this->_table, $pekerjaan, array('id_pekerjaan' => $id));
    }

    public function delete($id)
    {
        $this->db->set('deleted_at', date('Y-m-d H:i:s'));
        $this->db->where('id_pekerjaan', $id);

        return $this->db->update($this->_table);
    }
    /*
	 * End backend 
	 */

    public function getAll()
    {
        $this->db->where('deleted_at', null);
        // $this->db->order_by('id_pekerjaan', 'desc');
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
        return $this->db->get('pekerjaan');
    }


    public function print()
    {
        $data['pekerjaan'] = $this->tampil_data("pekerjaan")->result;
        $this->load->view('admin/pekerjaan/print', $data);
    }

}
