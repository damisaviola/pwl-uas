<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_maskapai() {
        $query = $this->db->get('maskapai');
        return $query->result_array();
    }

    public function get_all_pemesanan() {
        $query = $this->db->get('pemesanan');
        return $query->result_array();
    }

    public function get_all_jadwal() {
        $query = $this->db->get('jadwal_penerbangan');
        return $query->result_array();
    }

    public function insert_pemesanan($data)
    {
        $this->db->insert('pemesanan', $data);
        return $this->db->affected_rows() > 0;
    }

    public function get_pemesanan_by_id($id_pemesanan) {
        $this->db->where('id_pemesanan', $id_pemesanan);
        $query = $this->db->get('pemesanan');
        return $query->row_array();
    }

    public function update_pemesanan($id_pemesanan, $data) {
        $this->db->where('id_pemesanan', $id_pemesanan);
        return $this->db->update('pemesanan', $data);
    }

    public function delete_pemesanan($id_pemesanan) {
        $this->db->where('id_pemesanan', $id_pemesanan);
        return $this->db->delete('pemesanan');
    }
    
    
}

