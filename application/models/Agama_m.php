<?php
defined('BASEPATH') or exit('No direct script access allowed');//untuk validasi

class Agama_m extends CI_Model
{
    private $_table = "agama"; //nama tabel 

    /*
	 * Start backend 
	 */
    public function rules() //Method ini akan mengembalikan sebuah array yang berisi rules.
    {                       //Rules ini nanti kita butuhkan untuk validasi input.
                            //Pada Rules di atas, kita memberikan aturan untuk wajib mengisi (required)

        
        $this->form_validation->set_rules(
            'agama',
            'agama',
            'trim|required'
        );
    }

    public function editRules()//method editrules
    {
        return [
            [
                'field' => 'agama',
                'label' => 'agama',
                'rules' => 'trim|required'
            ],
        ];
    }

    public function getById($id)//memanggil data dr database
    {
        $this->db->where('deleted_at', null);
        return $this->db->get_where($this->_table, ["id_agama" => $id])->row_array();
    }                                        //nama tabel      //where     //fungsi untuk mengambil satu data dr hasil query

    public function save()//method untuk menyimpan data ke tabel agama
    {
        // $id_agama = htmlspecialchars($this->input->post('id_agama', true));
        $agama = htmlspecialchars($this->input->post('agama', true));//isi field agama dan ambil data agama dr form
        // $jumlah = htmlspecialchars($this->input->post('jumlah', true));
        $agama = [
            // 'id_agama'        => $id_agama,
            'agama'       => $agama,
            // 'jumlah'     => $jumlah,
        ];
        $this->db->insert($this->_table, $agama);//perintah insert akan disimpan pd tabel agama
    }

    public function update()//method untuk update agama
    {
        $id = htmlspecialchars($this->input->post('id_agama', true));//isi field agama dan ambil data agama dr form
        $agama = htmlspecialchars($this->input->post('agama', true));
        // $jumlah = htmlspecialchars($this->input->post('jumlah', true));
        $agama = [
            // 'id_agama'        => $id,
            'agama'       => $agama,
            // 'jumlah'     => $jumlah,
        ];
        $this->db->update($this->_table, $agama, array('id_agama' => $id));//perintah update akan disimpan pd tabel agama
    }

    public function delete($id)
    {
        $this->db->set('deleted_at', date('Y-m-d H:i:s'));
        $this->db->where('id_agama', $id);

        return $this->db->update($this->_table);
    }
    /*
	 * End backend 
	 */

    public function getAll()//untuk mengambil data dari database.
    {
        $this->db->where('deleted_at', null);
        // $this->db->order_by('id_agama', 'desc');
        return $this->db->get($this->_table)->result_array(); // memanggil semua data dr hasil query 
        // $query = $this->db->get($this->_table);
        // return $query->result_array();
    }

    public function countAll()//menghitung sel yang berisi setiap tipe informasi,
    {
        $this->db->where('deleted_at', null);
        return $this->db->get($this->_table)->num_rows(); // untuk mengetahui seberapa banyak baris data dari query yang kita lakukan ke database.
    }

    public function tampil_data()//nampilkan data dari tabel agama
    {
        $this->db->where('deleted_at', null);
        return $this->db->get('agama');
    }


    public function print()//mencetak data dari tabel agama
    {
        $data['agama'] = $this->tampil_data("agama")->result;
        $this->load->view('admin/agama/print', $data);
    }

}
