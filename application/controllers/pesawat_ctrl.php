<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesawat_ctrl extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Pesawat_model'); 
        
    }

    public function daftar_pesawat() {
        
        $data['namaAdmin'] = $this->session->userdata('nama_admin');
        $data['pesawat'] = $this->Pesawat_model->get_all_pesawat();
        $this->load->view('pesawat/pesawat', $data);
    }

    public function index() {
       


        $data['pesawat'] = $this->Pesawat_model->get_all_pesawat();
        $this->load->view('pesawat/pesawat', $data);
    }

    public function input_pesawat()
    {
        $this->load->view('pesawat/input_pesawat');
    }


    public function tambah() {
        $data = array(
            'id_pesawat' => $this->input->post('id_pesawat'),
            'jenis_pesawat' => $this->input->post('jenis_pesawat'),
            'kapasitas' => $this->input->post('kapasitas')
        );
        $result = $this->Pesawat_model->insert_pesawat($data);
        if ($result) {
            redirect('Pesawat_ctrl/daftar_pesawat');
        } else {
            echo '<script>alert("Gagal menambahkan data pesawat.");</script>';
            redirect('Pesawat_ctrl/daftar_pesawat');
        }
    }

    public function edit($id_pesawat) {
        $data['pesawat'] = $this->Pesawat_model->get_pesawat_by_id($id_pesawat);
        $this->load->view('Pesawat/edit_pesawat', $data);
    }

    public function update($id_pesawat) {
       
        $data = array(
            'jenis_pesawat' => $this->input->post('jenis_pesawat'),
            'kapasitas' => $this->input->post('kapasitas')
          
        );

    
        $result = $this->Pesawat_model->update_pesawat($data, $id_pesawat);   
        if ($result) {
            redirect('pesawat_ctrl/daftar_pesawat');
        } else {
            echo "Gagal memperbarui data pesawat.";
        }
    }

    public function delete($id_pesawat) {
        $result = $this->Pesawat_model->delete_pesawat($id_pesawat);
        if ($result) {
            redirect('Pesawat_ctrl/daftar_pesawat');
        } else {
            echo '<script>alert("Gagal menghapus data pesawat.");</script>';
            redirect('Pesawat_ctrl/daftar_pesawat');
        }
    }
  
    
}
