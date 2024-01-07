<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Maskapai_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert_maskapai($data)
    {
        $this->db->insert('Maskapai', $data);
    }


    public function get_maskapai($id)
    {
        $query = $this->db->get_where('maskapai', array('id_maskapai' => $id));
        return $query->row_array();
    }


    public function update_maskapai($id_maskapai, $data)
    {
        $this->db->where('id_maskapai', $id_maskapai);
        $result = $this->db->update('maskapai', $data);

        return $result; 
    }


    public function delete_maskapai($id)
    {
        $this->db->where('id_maskapai', $id);
        $this->db->delete('maskapai');
    }

    public function tambah_pesawat($data) {
        return $this->db->insert('pesawat', $data); // Ganti 'nama_tabel_database' dengan nama tabel yang sesuai
    }


    public function get_nama_maskapai_by_id($id_maskapai) {
        // Logika untuk mengambil nama maskapai berdasarkan ID
        // Gantilah ini dengan logika yang sesuai dengan struktur database
        // Contoh sederhana:
        $this->db->select('nama_maskapai');
        $this->db->where('id_maskapai', $id_maskapai);
        $query = $this->db->get('maskapai');
        $result = $query->row_array();
        return $result['nama_maskapai'];
    }

    public function get_jadwal_penerbangan() {
    
        $query = $this->db->get('jadwal_penerbangan');
        return $query->result_array();
    }

    public function get_all_maskapai() {
        $query = $this->db->get('maskapai');
        return $query->result_array();
    }
}
