<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Halaman_m extends CI_Model
{

    private $_table   = 'halaman_web';
    private $_primary = 'id';

    /*
	 * Start backend 
	 */
    public function rules()
    {
        $this->form_validation->set_rules(
            'judul',
            'Judul Halaman',
            'trim|required',
            array('required' => 'Judul Halaman tidak boleh kosong!')
        );
        $this->form_validation->set_rules(
            'isi',
            'Isi Halaman',
            'trim|required',
            array('required' => 'Isi Halaman tidak boleh kosong!')
        );
    }

    public function getById($id)
    {
        $query = $this->db->get_where($this->_table, ['id' => $id]);
        return $query->row_array();
    }
    
     public function getBySlug($slug)
    {
        $query = $this->db->get_where($this->_table, ['slug' => $slug]);
        return $query->row_array();
    }

    public function save()
    {
        $judul = htmlspecialchars($this->input->post('judul', true));
        $isi = htmlspecialchars($this->input->post('isi', true));
        $level = htmlspecialchars($this->input->post('level', true));

        if(str_word_count($judul)==1) {
	        $slug = strtolower($judul);
	    } else {
    	    $title = trim(strtolower($judul));
    		$out = explode(" ",$title);
    		$slug = implode("-",$out);
	    }
        $menu = array(
            'slug' =>$slug,
            'judul_halaman' => $judul,
            'isi_halaman'   => $isi,
            'level'  => $level,
        );
        $this->db->insert($this->_table, $menu);
    }

    public function update()
    {
        $id = htmlspecialchars($this->input->post('id', true));
        $judul = htmlspecialchars($this->input->post('judul', true));
        $isi = $this->input->post('isi', true);
        $level = htmlspecialchars($this->input->post('level', true));

        if(str_word_count($judul)==1) {
	        $slug = strtolower($judul);
	    } else {
    	    $title = trim(strtolower($judul));
    		$out = explode(" ",$title);
    		$slug = implode("-",$out);
	    }
        
        $menu = array(
            'slug' =>$slug,
            'judul_halaman' => $judul,
            'isi_halaman'   => $isi,
            'level'  => $level,
        );
        $this->db->update($this->_table, $menu, array('id' => $id));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, ['id' => $id]);
    }

    /*
	 * End backend 
	 */

    public function getAll()
    {
        $query = $this->db->get($this->_table);
        return $query->result_array();
    }
}
