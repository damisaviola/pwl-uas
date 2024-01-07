<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        // Load database
        $this->load->database();
    }

    // Fungsi untuk melakukan login admin
    public function login($username, $password) {
        $this->db->where('nama_admin', $username); // Sesuaikan dengan kolom yang benar, dalam hal ini 'nama_admin'
        $this->db->where('password', $password);

        // Ambil data dari tabel admin
        $query = $this->db->get('admin');

        if ($query->num_rows() == 1) {
            // Jika data ditemukan, return true
            return true;
        } else {
            // Jika data tidak ditemukan, return false
            return false;
        }
    }

    public function getAdminByUsername($username) {
        // Ubah kondisi 'username' menjadi 'nama_admin'
        $this->db->where('nama_admin', $username);
        $query = $this->db->get('admin');

        // Memeriksa apakah ada hasil dari query
        if ($query->num_rows() > 0) {
            return $query->row_array(); // Mengembalikan data admin sebagai array
        } else {
            return false; // Jika tidak ada admin dengan username tersebut
        }
    }
}
?>
