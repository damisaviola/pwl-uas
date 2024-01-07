<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

    public function get_jumlah_pelanggan() {
        $query = $this->db->get('penumpang');
        $jumlah_pelanggan = $query->num_rows();
        return $jumlah_pelanggan;
    }

    public function get_rute_penerbangan() {
        $query = $this->db->get('rute_penerbangan');
        $jumlah_penerbangan = $query->num_rows();
        return $jumlah_penerbangan;
    }

    public function get_jumlah_maskapai() {
        $query = $this->db->get('maskapai');
        $jumlah_maskapai = $query->num_rows();
        return $jumlah_maskapai;
    }

    public function get_jumlah_pemesanan() {
        $query = $this->db->get('pemesanan');
        $jumlah_pemesanan = $query->num_rows();
        return $jumlah_pemesanan;
    }

    public function get_jadwal_penerbangan() {
        $query = $this->db->get('jadwal_penerbangan');
        $jadwal_penerbangan = $query->num_rows();
        return $jadwal_penerbangan;
    }

    public function get_jumlah_pesawat() {
        $query = $this->db->get('pesawat');
        $jumlah_pesawat = $query->num_rows();
        return $jumlah_pesawat;
    }

    
}
