<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penerbangan_model extends CI_Model {
    public function get_all_rute_penerbangan() {
        // Ambil data rute penerbangan dari database
        $query = $this->db->get('rute_penerbangan');
        return $query->result_array(); // Mengembalikan hasil dalam bentuk array
    }

    public function tambah_rute_penerbangan($id_rute, $maskapai, $bandara_asal, $bandara_tujuan, $waktu_keberangkatan, $waktu_kedatangan) {
        // Menyiapkan data yang akan dimasukkan ke dalam tabel rute penerbangan
        $data = array(
            'id_rute' => $id_rute,
            'maskapai' => $maskapai,
            'bandara_asal' => $bandara_asal,
            'bandara_tujuan' => $bandara_tujuan,
            'waktu_keberangkatan' => $waktu_keberangkatan,
            'waktu_kedatangan' => $waktu_kedatangan
            // Tambahkan field lain jika ada
        );

        // Simpan data rute penerbangan ke database
        return $this->db->insert('rute_penerbangan', $data);
    }

    public function input_penerbangan() {
        $data['daftar_maskapai'] = $this->Maskapai_model->get_all_maskapai(); // Ganti dengan pemanggilan yang benar dari model maskapai
        $this->load->view('input_rute_penerbangan', $data);
    }
    
    public function delete_maskapai($id){
    $this->db->where('id_rute', $id);
    $this->db->delete('rute_penerbangan');
    }

    public function get_penerbangan_by_id($id_rute) {
        $this->db->where('id_rute', $id_rute);
        $query = $this->db->get('rute_penerbangan'); // Ganti 'nama_tabel_penerbangan' dengan nama tabel yang sesuai
        return $query->row_array();
    }

    public function update_penerbangan($id_rute, $data) {
        $this->db->where('id_rute', $id_rute);
        return $this->db->update('rute_penerbangan', $data);
    }
}
?>
