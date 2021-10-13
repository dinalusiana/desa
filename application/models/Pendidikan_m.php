<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendidikan_m extends CI_Model
{
    private $_table = "pendidikan";

    /*
	 * Start backend 
	 */
    public function rules()
    {

        $this->form_validation->set_rules(
            'tingkat_pendidikan',
            'tingkat_pendidikan',
            'trim|required'
        );
    }

    public function editRules()
    {
        return [

            [
                'field' => 'tingkat_pendidikan',
                'label' => 'tingkat_pendidikan',
                'rules' => 'trim|required'
            ],
        ];
    }

    public function getById($id)
    {
        $this->db->where('deleted_at', null);
        return $this->db->get_where($this->_table, ["id_pendidikan" => $id])->row_array();
    }

    public function save()
    {
        // $id_pendidikan = htmlspecialchars($this->input->post('id_pendidikan', true));
        $tingkat_pendidikan = htmlspecialchars($this->input->post('tingkat_pendidikan', true));
        // $jumlah = htmlspecialchars($this->input->post('jumlah', true));
        $pendidikan = [
            // 'id_pendidikan'        => $id_pendidikan,
            'tingkat_pendidikan'       => $tingkat_pendidikan,
            // 'jumlah'     => $jumlah,
        ];
        $this->db->insert($this->_table, $pendidikan);
    }

    public function update()
    {
        $id = htmlspecialchars($this->input->post('id_pendidikan', true));
        $tingkat_pendidikan = htmlspecialchars($this->input->post('tingkat_pendidikan', true));
        // $jumlah = htmlspecialchars($this->input->post('jumlah', true));
        $pendidikan = [
            // 'id_pendidikan'        => $id,
            'tingkat_pendidikan'       => $tingkat_pendidikan,
            // 'jumlah'     => $jumlah,
        ];
        $this->db->update($this->_table, $pendidikan, array('id_pendidikan' => $id));
    }

    public function delete($id)
    {
        $this->db->set('deleted_at', date('Y-m-d H:i:s'));
        $this->db->where('id_pendidikan', $id);

        return $this->db->update($this->_table);
    }
    /*
	 * End backend 
	 */

    public function getAll()
    {
        $this->db->where('deleted_at', null);
        // $this->db->order_by('id_pendidikan', 'desc');
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
        return $this->db->get('pendidikan');
    }


    public function print()
    {
        $data['pendidikan'] = $this->tampil_data("pendidikan")->result;
        $this->load->view('admin/pendidikan/print', $data);
    }

}

