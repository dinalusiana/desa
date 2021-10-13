<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_m extends CI_Model
{

    public function exec_insert($param)
    {
        $query = "CALL sp_permohonan_surat (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $data = $this->db->query($query, $param);
        mysqli_next_result($this->db->conn_id);
        $result = $data->result_array();
        return $result;
    }

    public function exec_create_no($param)
    {
        $query = "CALL sp_permohonan_surat (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $data = $this->db->query($query, $param);
        mysqli_next_result($this->db->conn_id);
        $result = $data->result_array();
        return $result;
    }

    public function exec_AllPemohonSurat($param)
    {
        $query = "CALL sp_permohonan_surat (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $data = $this->db->query($query, $param);
        mysqli_next_result($this->db->conn_id);
        $result = $data->result_array();
        return $result;
    }

    public function exec_SelectPemohonSurat($param)
    {
        $query = "CALL sp_permohonan_surat (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $data = $this->db->query($query, $param);
        mysqli_next_result($this->db->conn_id);
        $result = $data->result_array();
        return $result;
    }
}
