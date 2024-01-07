<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesawat_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_all_pesawat() {
        $query = $this->db->get('pesawat');
        return $query->result_array();
    }

    public function insert_pesawat($data) {
       
        return $this->db->insert('pesawat', $data);
    }

    public function get_pesawat_by_id($id_pesawat) {
        $query = $this->db->get_where('pesawat', array('id_pesawat' => $id_pesawat));
        return $query->row_array();
    }


    public function update_pesawat($data, $id_pesawat) {
        $this->db->where('id_pesawat', $id_pesawat);
        return $this->db->update('pesawat', $data);
    }

    public function delete_pesawat($id_pesawat) {
       
        $this->db->where('id_pesawat', $id_pesawat);
        $this->db->delete('pesawat'); 

        return $this->db->affected_rows() > 0;
    }

    public function update_jadwal($data) {
        $this->db->where('id_jadwal', $data['id_jadwal']);
        return $this->db->update('jadwal_penerbangan', $data);
    }

    public function get_nama_pesawat_by_id($id_pesawat) {
        $this->db->select('jenis_pesawat');
        $this->db->where('id_pesawat', $id_pesawat);
        $query = $this->db->get('pesawat');
        $result = $query->row_array();
        return $result['jenis_pesawat'];
    }
  
}
