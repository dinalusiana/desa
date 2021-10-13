<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin_m extends CI_Model
{
    private $_table = "admin";

    /*
	 * Start backend 
	 */
    public function rules()
    {
        $this->form_validation->set_rules(
            'id',
            'id',
            'trim|required|is_unique[admin.id]',
            ['is_unique' => 'id ini sudah terdaftar!']
        );
        $this->form_validation->set_rules(
            'nama',
            'Nama',
            'trim|required'
        );

        $this->form_validation->set_rules(
            'email',
            'email',
            'trim|required'
        );

        $this->form_validation->set_rules(
            'password',
            'password',
            'trim|required'
        );
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
                'field' => 'email',
                'label' => 'email',
                'rules' => 'trim|required'
            ],

            [
                'field' => 'password',
                'label' => 'password',
                'rules' => 'trim|required'
            ],
        ];
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row_array();
    }

    public function save()
    {
        $id = htmlspecialchars($this->input->post('id', true));
        $nama = htmlspecialchars($this->input->post('nama', true));
        $email = htmlspecialchars($this->input->post('email', true));
        $password = date('Y') - htmlspecialchars($this->input->post('password', true));
        $admin = [
            'id'        => $id,
            'nama'       => $nama,
            'email'     => $email,
            'password'       => $password,
        ];
        $this->db->insert($this->_table, $admin);
    }

    public function update()
    {
        $id = htmlspecialchars($this->input->post('id', true));
        $nama = htmlspecialchars($this->input->post('nama', true));
        $email = htmlspecialchars($this->input->post('email', true));
        $password = htmlspecialchars($this->input->post('password', true));
        $admin = [
            // 'id'        => $id,
            'nama'       => $nama,
            'email'     => $email,
            'password'       => $password,
        ];
        $this->db->update($this->_table, $admin, array('id' => $id));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }
    /*
	 * End backend 
	 */

    public function getAll()
    {
        // $this->db->order_by('id', 'desc');
        return $this->db->get($this->_table)->result_array();
        // $query = $this->db->get($this->_table);
        // return $query->result_array();
    }

    public function countAll()
    {
        return $this->db->get($this->_table)->num_rows();
    }

    public function getByemail()
    {
        $this->db->select('*');
        $this->db->where('email');
        $this->db->from($this->_table);
        return $this->db->get()->result();
    }

    public function exec_Chartadmin()
    {
        $query = "call sp_dashboard_chartadmin()";
        $data = $this->db->query($query, '');
        mysqli_next_result($this->db->conn_id);
        $result = $data->result_array();
        return $result;
    }
}
