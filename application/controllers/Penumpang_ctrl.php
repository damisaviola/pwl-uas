<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penumpang_ctrl extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Penumpang_model');
    }

    public function index()
    {
        $data['penumpang'] = $this->Penumpang_model->get_all_penumpang();
        $data['namaAdmin'] = $this->session->userdata('nama_admin');    
        $this->load->view('daftar_penumpang', $data);
    }


    public function input_penumpang()
    {
        $this->load->view('input_penumpang');
    }


    public function tambah()
    {
        $id_penumpang = $this->input->post('id_penumpang');
        $nama = $this->input->post('nama_penumpang');
        $alamat = $this->input->post('alamat');
        $nomor_telepon = $this->input->post('nomor_telepon');


        if ($this->Penumpang_model->tambah_penumpang($id_penumpang, $nama, $alamat, $nomor_telepon)) {
         redirect('penumpang_ctrl/');
        } else {
            echo "Gagal menambahkan penumpang.";
        }
    }
    
    public function edit($id)
    {
        $data['penumpang'] = $this->Penumpang_model->get_penumpang($id); // Pastikan fungsi ini ada di dalam model
        $this->load->view('edit_penumpang', $data);
    }

    public function update($id)
    {
        $data = array(
            'nama_penumpang' => $this->input->post('nama_penumpang'),
            'alamat' => $this->input->post('alamat'),
            'nomor_telepon' => $this->input->post('nomor_telepon')
        );

       
        $this->Penumpang_model->update_penumpang($id, $data);
        redirect('Penumpang_ctrl/');
    }
    public function delete($id)
    {
        
        $this->Penumpang_model->delete_penumpang($id);
        redirect('penumpang_ctrl/');
    }
    
}
