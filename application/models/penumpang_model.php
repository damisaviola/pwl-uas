<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penumpang_model extends CI_Model {
    public function get_all_penumpang() {
        $query = $this->db->get('penumpang');
        return $query->result_array();
    }

    public function get_penumpang($id) {
        $this->db->where('id_penumpang', $id);
        $query = $this->db->get('penumpang');
        return $query->row_array();
    }

    public function tambah_penumpang($id_penumpang, $nama, $alamat, $nomor_telepon) {
        $data = array(
            'id_penumpang' => $id_penumpang,
            'nama_penumpang' => $nama,
            'alamat' => $alamat,
            'nomor_telepon' => $nomor_telepon
        );

        return $this->db->insert('penumpang', $data);
    }

    public function update_penumpang($id_penumpang, $data) {
        $this->db->where('id_penumpang', $id_penumpang);
        return $this->db->update('penumpang', $data);
    }

    public function delete_penumpang($id) {
        $this->db->where('id_penumpang', $id);
        $this->db->delete('penumpang');
    }


    public function get_nama_penumpang_by_id($id_penumpang) {
        // Lakukan query ke database untuk mendapatkan nama penumpang
        $this->db->select('nama_penumpang');
        $this->db->where('id_penumpang', $id_penumpang);
        $query = $this->db->get('penumpang'); // Ganti dengan nama tabel penumpang Anda

        if ($query->num_rows() > 0) {
            return $query->row()->nama_penumpang;
        } else {
            return "Nama tidak ditemukan"; // Atau nilai default jika tidak ada
        }
    }
}

?>
