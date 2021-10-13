<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil_m extends CI_Model
{
    private $_table = "profil";

    /*
	 * Start backend 
	 */
    public function rules()
    {
        $this->form_validation->set_rules(
            'judul',
            'Judul',
            'trim|required'
        );
        $this->form_validation->set_rules(
            'profil',
            'Profil',
            'trim|required'
        );
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row_array();
    }

    public function updateProfilDesa()
    {
        $id = htmlspecialchars($this->input->post('id', true));
        $judul = htmlspecialchars($this->input->post('judul', true));
        $profil = $this->input->post('profil', true);
        $data = [
            'id'           => $id,
            'judul'        => $judul,
            'profil'       => $profil,
            'date_created' => time()
        ];
        $this->db->update($this->_table, $data, array('id' => $id));
    }

    public function updateProfilPemdes()
    {
        $id = htmlspecialchars($this->input->post('id', true));
        $judul = htmlspecialchars($this->input->post('judul', true));
        $profil = $this->input->post('profil', true);
        $data = [
            'id'           => $id,
            'judul'        => $judul,
            'profil'       => $profil,
            'date_created' => time()
        ];
        $this->db->update($this->_table, $data, array('id' => $id));
    }

    public function updateProfilBpd()
    {
        $id = htmlspecialchars($this->input->post('id', true));
        $judul = htmlspecialchars($this->input->post('judul', true));
        $profil = $this->input->post('profil', true);
        $data = [
            'id'           => $id,
            'judul'        => $judul,
            'profil'       => $profil,
            'date_created' => time()
        ];
        $this->db->update($this->_table, $data, array('id' => $id));
    }

    public function updatesejarah()
    {
        $id = htmlspecialchars($this->input->post('id', true));
        $judul = htmlspecialchars($this->input->post('judul', true));
        $profil = $this->input->post('profil', true);
        $data = [
            'id'           => $id,
            'judul'        => $judul,
            'profil'       => $profil,
            'date_created' => time()
        ];
        $this->db->update($this->_table, $data, array('id' => $id));
    }

    public function updatevisimisi()
    {
        $id = htmlspecialchars($this->input->post('id', true));
        $judul = htmlspecialchars($this->input->post('judul', true));
        $profil = $this->input->post('profil', true);
        $data = [
            'id'           => $id,
            'judul'        => $judul,
            'profil'       => $profil,
            'date_created' => time()
        ];
        $this->db->update($this->_table, $data, array('id' => $id));
    }

    public function updatepotensi()
    {
        $id = htmlspecialchars($this->input->post('id', true));
        $judul = htmlspecialchars($this->input->post('judul', true));
        $profil = $this->input->post('profil', true);
        $data = [
            'id'           => $id,
            'judul'        => $judul,
            'profil'       => $profil,
            'date_created' => time()
        ];
        $this->db->update($this->_table, $data, array('id' => $id));
    }

    public function updatekarangtaruna()
    {
        $id = htmlspecialchars($this->input->post('id', true));
        $judul = htmlspecialchars($this->input->post('judul', true));
        $profil = $this->input->post('profil', true);
        $data = [
            'id'           => $id,
            'judul'        => $judul,
            'profil'       => $profil,
            'date_created' => time()
        ];
        $this->db->update($this->_table, $data, array('id' => $id));
    }

    public function updatepkk()
    {
        $id = htmlspecialchars($this->input->post('id', true));
        $judul = htmlspecialchars($this->input->post('judul', true));
        $profil = $this->input->post('profil', true);
        $data = [
            'id'           => $id,
            'judul'        => $judul,
            'profil'       => $profil,
            'date_created' => time()
        ];
        $this->db->update($this->_table, $data, array('id' => $id));
    }
    public function updatelpmd()
    {
        $id = htmlspecialchars($this->input->post('id', true));
        $judul = htmlspecialchars($this->input->post('judul', true));
        $profil = $this->input->post('profil', true);
        $data = [
            'id'           => $id,
            'judul'        => $judul,
            'profil'       => $profil,
            'date_created' => time()
        ];
        $this->db->update($this->_table, $data, array('id' => $id));
    }
    public function updatekpmd()
    {
        $id = htmlspecialchars($this->input->post('id', true));
        $judul = htmlspecialchars($this->input->post('judul', true));
        $profil = $this->input->post('profil', true);
        $data = [
            'id'           => $id,
            'judul'        => $judul,
            'profil'       => $profil,
            'date_created' => time()
        ];
        $this->db->update($this->_table, $data, array('id' => $id));
    }

    public function updatektp()
    {
        $id = htmlspecialchars($this->input->post('id', true));
        $judul = htmlspecialchars($this->input->post('judul', true));
        $profil = $this->input->post('profil', true);
        $data = [
            'id'           => $id,
            'judul'        => $judul,
            'profil'       => $profil,
            'date_created' => time()
        ];
        $this->db->update($this->_table, $data, array('id' => $id));
    }

    public function updateinfosurat()
    {
        $id = htmlspecialchars($this->input->post('id', true));
        $judul = htmlspecialchars($this->input->post('judul', true));
        $profil = $this->input->post('profil', true);
        $data = [
            'id'           => $id,
            'judul'        => $judul,
            'profil'       => $profil,
            'date_created' => time()
        ];
        $this->db->update($this->_table, $data, array('id' => $id));
    }




    /*
	 * End backend 
	 */

    public function getGambaranUmum()
    {
        return $this->db->get_where($this->_table, 'id = 1')->result_array();
    }

    public function getProfilPemdes()
    {
        return $this->db->get_where($this->_table, 'id = 2')->result_array();
    }

    public function getProfilBpd()
    {
        return $this->db->get_where($this->_table, 'id = 3')->result_array();
    }
    public function getsejarah()
    {
        return $this->db->get_where($this->_table, 'id = 4')->result_array();
    }
    public function getvisimisi()
    {
        return $this->db->get_where($this->_table, 'id = 5')->result_array();
    }
    public function getpotensi()
    {
        return $this->db->get_where($this->_table, 'id = 6')->result_array();
    }
    public function getkarangtaruna()
    {
        return $this->db->get_where($this->_table, 'id = 7')->result_array();
    }
    public function getpkk()
    {
        return $this->db->get_where($this->_table, 'id = 8')->result_array();
    }
    public function getlpmd()
    {
        return $this->db->get_where($this->_table, 'id = 9')->result_array();
    }
    public function getkpmd()
    {
        return $this->db->get_where($this->_table, 'id = 10')->result_array();
    }
    public function getktp()
    {
        return $this->db->get_where($this->_table, 'id = 11')->result_array();
    }
    public function getinfosurat()
    {
        return $this->db->get_where($this->_table, 'id = 12')->result_array();
    }


}
