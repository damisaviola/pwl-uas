<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_ctrl extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Jadwal_model'); 
        $this->load->model('Maskapai_model');
        $this->load->model('Pesawat_model');

    }

    public function daftar_jadwal() {

        $data['namaAdmin'] = $this->session->userdata('nama_admin');
        $data['jadwal_penerbangan'] = $this->Jadwal_model->get_all_jadwal(); 
        $data['rute_penerbangan'] = $this->Jadwal_model->get_all_rute();
        $data['maskapai'] = $this->Jadwal_model->get_all_maskapai();
        $data['pesawat'] = $this->Jadwal_model->get_all_pesawat();
        
        $this->load->view('jadwal', $data);
    }

    public function tambah() {
        // Tangkap data dari form
        $data = array(
            'id_jadwal' => $this->input->post('id_jadwal'),
            'id_rute' => $this->input->post('id_rute'),
            'id_maskapai' => $this->input->post('id_maskapai'),
            'id_pesawat' => $this->input->post('id_pesawat'),
            'tanggal' => $this->input->post('tanggal'), // Tambahkan tanggal dari form
        'harga' => $this->input->post('harga') //
            // sesuaikan dengan nama field yang ada di form
        );

        $result = $this->Jadwal_model->insert_jadwal($data);

        if ($result) {
            // Data berhasil ditambahkan
            redirect('Jadwal_ctrl/daftar_jadwal'); // Redirect ke halaman daftar jadwal setelah input berhasil
        } else {
            // Gagal menambahkan data
            echo "Gagal menambahkan data jadwal.";
        }
    }

    public function input_jadwal()
    {
        $data['rute'] = $this->Jadwal_model->get_all_rute();
        $data['maskapai'] = $this->Jadwal_model->get_all_maskapai();
        $data['pesawat'] = $this->Jadwal_model->get_all_pesawat();
        $this->load->view('input_jadwal', $data);
    }

    // Contoh pengambilan data dari database pada controller sebelum menampilkan view edit_jadwal
public function edit($id_jadwal)
{
    $data['jadwal_penerbangan'] = $this->Jadwal_model->get_jadwal_by_id($id_jadwal);
    $data['rute'] = $this->Jadwal_model->get_all_rute();
    $data['maskapai'] = $this->Jadwal_model->get_all_maskapai();
    $data['pesawat'] = $this->Jadwal_model->get_all_pesawat();
    $data['tanggal'] = $data['jadwal_penerbangan']['tanggal'];
    $data['harga'] = $data['jadwal_penerbangan']['harga'];



    // Kemudian lempar data ini ke view untuk ditampilkan pada form
    $this->load->view('edit_jadwal', $data);
}

    

public function update() {
    // Tangkap data dari form
    $id_jadwal = $this->input->post('id_jadwal'); // Ambil ID jadwal dari form

    $data = array(
        'id_jadwal' => $this->input->post('id_jadwal'),
        'id_rute' => $this->input->post('id_rute'),
        'id_maskapai' => $this->input->post('id_maskapai'),
        'id_pesawat' => $this->input->post('id_pesawat'),
        'tanggal' => $this->input->post('tanggal'),
        'harga' => $this->input->post('harga')
    );

    // Panggil fungsi untuk melakukan update data jadwal dari model
    $result = $this->Jadwal_model->updateData($id_jadwal, $data);

    if ($result) {
        redirect('jadwal_ctrl/daftar_jadwal');
    } else {
        echo "Gagal memperbarui data jadwal.";
    }
}
    
    
    
    
    

    public function delete($id_jadwal) {
        $result = $this->Jadwal_model->delete_jadwal($id_jadwal);

        if ($result) {
            redirect('jadwal_ctrl/daftar_jadwal');
        } else {
            echo "Gagal menghapus data jadwal.";
        }
    }
    
}
?>
