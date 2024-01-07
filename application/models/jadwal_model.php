<?php
class Jadwal_model extends CI_Model {

    // Fungsi untuk mengambil semua data jadwal
    public function get_all_jadwal() {
        $query = $this->db->get('jadwal_penerbangan');
        return $query->result_array();
    }

    // Fungsi untuk mengambil semua data rute
    public function get_all_rute() {
        $query = $this->db->get('rute_penerbangan');
        return $query->result_array(); 
    }

    // Fungsi untuk mengambil semua data maskapai
    public function get_all_maskapai() {
        $query = $this->db->get('maskapai');
        return $query->result_array();
    }

    // Fungsi untuk mengambil semua data pesawat
    public function get_all_pesawat() {
        $query = $this->db->get('pesawat');
        return $query->result_array(); 
    }

    // Fungsi untuk menambahkan data jadwal
    public function insert_jadwal($data) {
        return $this->db->insert('jadwal_penerbangan', $data);
    }

    // Fungsi untuk mendapatkan data rute berdasarkan ID
    public function get_rute_by_id($id_rute) {
        $this->db->where('id_rute', $id_rute);
        $query = $this->db->get('rute_penerbangan');
        return $query->row_array();
    }

    // Fungsi untuk mendapatkan data maskapai berdasarkan ID
    public function get_maskapai_by_id($id_maskapai) {
        $this->db->where('id_maskapai', $id_maskapai);
        $query = $this->db->get('maskapai');
        return $query->row_array();
    }

    // Fungsi untuk mendapatkan data pesawat berdasarkan ID
    public function get_pesawat_by_id($id_pesawat) {
        $this->db->where('id_pesawat', $id_pesawat);
        $query = $this->db->get('pesawat');
        return $query->row_array();
    }

    // Fungsi untuk melakukan update data jadwal berdasarkan ID
    public function update_jadwal($id_jadwal, $data) {
        $this->db->where('id_jadwal', $id_jadwal);
        $this->db->update('jadwal_penerbangan', $data); 
        return $this->db->affected_rows() > 0; 
    }

    // Fungsi untuk mendapatkan data jadwal berdasarkan ID
    public function get_jadwal_by_id($id_jadwal) {
        $this->db->where('id_jadwal', $id_jadwal);
        $query = $this->db->get('jadwal_penerbangan');
        return $query->row_array();
    }

    // Fungsi untuk menghapus data jadwal berdasarkan ID
    public function delete_jadwal($id) {
        $this->db->trans_begin();
    
        $this->db->where('id_jadwal', $id);
        $this->db->delete('jadwal_penerbangan');
    
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    // Fungsi untuk melakukan update data jadwal berdasarkan ID
    public function updateData($id, $data) {
        $this->db->where('id_jadwal', $id);
        $this->db->update('jadwal_penerbangan', $data);
        
        return $this->db->affected_rows() > 0;
    }

    // Fungsi untuk mendapatkan tanggal berdasarkan ID jadwal
    public function get_tanggal_by_id($id) {
        $this->db->select('tanggal');
        $this->db->where('id_jadwal', $id);
        $query = $this->db->get('jadwal_penerbangan');
        
        if ($query->num_rows() > 0) {
            return $query->row()->tanggal;
        }
        
        return null;
    }
    
    // Fungsi untuk mendapatkan harga berdasarkan ID jadwal
    public function get_harga_by_id($id) {
        $this->db->select('harga');
        $this->db->where('id_jadwal', $id);
        $query = $this->db->get('jadwal_penerbangan');
        
        if ($query->num_rows() > 0) {
            return $query->row()->harga;
        }
        
        return null; 
    }
}
?>
