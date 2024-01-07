<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Pemesanan_model'); 
        $this->load->model('Pesawat_model');
        $this->load->model('jadwal_model');
        $this->load->model('Penumpang_model');
        $this->load->model('admin_model');
        $this->load->helper('url');
        $this->load->library('session');
        
    }

    
    public function index() {
        $data['pemesanan'] = $this->Pemesanan_model->get_all_pemesanan();
        $data['namaAdmin'] = $this->session->userdata('nama_admin');
        $this->load->view('booking', $data); 
    }

    public function daftar_maskapai() {
        $data['maskapai'] = $this->Pemesanan_model->get_maskapai(); 
        $data['namaAdmin'] = $this->session->userdata('nama_admin');
    
        $this->load->view('maskapai/maskapai', $data); 
    }


    public function input_pemesanan()
    {

        $data['pemesanan'] = $this->Pemesanan_model->get_all_pemesanan(); 
        $data['namaAdmin'] = $this->session->userdata('nama_admin');
        $this->load->view('booking', $data);
    }


    public function insert_pemesanan()
    {
        $data = array(
            'id_pemesanan' => $this->input->post('id_pemesanan'),
            'id_jadwal' => $this->input->post('id_jadwal'),
            'id_penumpang' => $this->input->post('id_penumpang'),
            'jumlah_tiket' => $this->input->post('jumlah_tiket'),
            'total_biaya' => $this->input->post('total_biaya')
          
        );

       
        $result = $this->Pemesanan_model->insert_pemesanan($data);

        if ($result) {
            redirect('pemesanan/');
        } else {
            echo "Gagal menyimpan data.";
        }
    }

    public function input()
    
{
    $data['jadwal_penerbangan'] = $this->jadwal_model->get_all_jadwal();
    $data['penumpang'] = $this->Penumpang_model->get_all_penumpang();
    $this->load->view('input_pemesanan', $data);
}

public function edit($id_pemesanan) {

    $data['jadwal_penerbangan'] = $this->jadwal_model->get_all_jadwal();
    $data['penumpang'] = $this->Penumpang_model->get_all_penumpang();
    $data['pemesanan'] = $this->Pemesanan_model->get_pemesanan_by_id($id_pemesanan);
    $this->load->view('edit_booking', $data);
}

public function update($id_pemesanan) {
    $data = array(
        'id_jadwal' => $this->input->post('id_jadwal'),
        'id_penumpang' => $this->input->post('id_penumpang'),
        'jumlah_tiket' => $this->input->post('jumlah_tiket'),
        'total_biaya' => $this->input->post('total_biaya')
    );

    $result = $this->Pemesanan_model->update_pemesanan($id_pemesanan, $data);

    if ($result) {
         redirect('pemesanan/');
    } else {
        echo "Gagal mengupdate data.";
    }
}

public function delete($id_pemesanan) {
    $result = $this->Pemesanan_model->delete_pemesanan($id_pemesanan);
    if ($result) {
        redirect('pemesanan/');
    } else {
        echo "Gagal menghapus data.";
    }
}


}
?>
