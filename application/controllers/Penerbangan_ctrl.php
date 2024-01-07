<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penerbangan_ctrl extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Penerbangan_model'); 
    }

 
    public function input_penerbangan() {
        $this->load->model('Maskapai_model');
        $data['daftar_maskapai'] = $this->Maskapai_model->get_all_maskapai();
        $this->load->view('input_rute_penerbangan', $data);
    }

    public function show_penerbangan() {
        $data['rute_penerbangan'] = $this->Penerbangan_model->get_all_rute_penerbangan();
        $data['namaAdmin'] = $this->session->userdata('nama_admin');
        $this->load->view('penerbangan', $data);
    }
    

    public function input() {
        $data = array(
            'id_rute' => $this->input->post('id_rute'),
            'maskapai' => $this->input->post('maskapai'),
            'bandara_asal' => $this->input->post('asal'),
            'bandara_tujuan' => $this->input->post('tujuan'),
            'waktu_keberangkatan' => $this->input->post('waktu_keberangkatan'),
            'waktu_kedatangan' => $this->input->post('waktu_kedatangan')
        );

    
        $result = $this->Penerbangan_model->tambah_rute_penerbangan(
            $data['id_rute'],
            $data['maskapai'],
            $data['bandara_asal'],
            $data['bandara_tujuan'],
            $data['waktu_keberangkatan'],
            $data['waktu_kedatangan']
        );

        if ($result) {
            redirect('penerbangan_ctrl/show_penerbangan');
        } else {
            echo "Gagal menyimpan data.";
        }
    }

    public function delete($id)
{
   
    $this->Penerbangan_model->delete_maskapai($id);
    redirect('penerbangan_ctrl/show_penerbangan');
}
  


public function edit($id_rute) {
    $data['penerbangan'] = $this->Penerbangan_model->get_penerbangan_by_id($id_rute);
    $this->load->view('edit_penerbangan', $data);
}

public function update($id_rute) {
    $data = array(
        'bandara_asal' => $this->input->post('bandara_asal'),
        'bandara_tujuan' => $this->input->post('bandara_tujuan'),
        'waktu_keberangkatan' => $this->input->post('waktu_keberangkatan'),
        'waktu_kedatangan' => $this->input->post('waktu_kedatangan'),
        'Maskapai' => $this->input->post('Maskapai')
    );

    $result = $this->Penerbangan_model->update_penerbangan($id_rute, $data);
    if ($result) {
        redirect('penerbangan_ctrl/show_penerbangan');
    } else {
        echo "Gagal memperbarui data penerbangan.";
    }
}
}
?>
