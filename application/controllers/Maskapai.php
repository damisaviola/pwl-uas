<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Maskapai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Maskapai_model');
        $this->load->helper('form');
    }

    public function input()
    {
        $this->load->view('maskapai/input_maskapai');
    }

    public function input_penerbangan()
    {
        $this->load->view('input_rute_penerbangan');
    }

    public function insert()
    {
        $data = array(
            'id_maskapai' => $this->input->post('id_maskapai'),
            'nama_maskapai' => $this->input->post('nama_maskapai'),
            'jenis_pesawat' => $this->input->post('jenis_pesawat'),
            'kode_maskapai' => $this->input->post('kode_maskapai'),
        );

        $this->Maskapai_model->insert_maskapai($data);

        $this->upload_image($data['id_maskapai']);
    }

    private function upload_image($id_maskapai)
    {
      
        $config['upload_path']   = './uploads';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = 9999; 
        $config['max_width']     = 9999;
        $config['max_height']    = 9999;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar_maskapai')) {
            $error = $this->upload->display_errors();
            show_error($error);
        } else {
            $upload_data = $this->upload->data();
            $gambar_maskapai = $upload_data['file_name'];

            $data_update = array('gambar_maskapai' => $gambar_maskapai);
            $this->Maskapai_model->update_maskapai($id_maskapai, $data_update);

            redirect('pemesanan/daftar_maskapai');
        }
    }



    public function edit($id)
    {
        $data['maskapai'] = $this->Maskapai_model->get_maskapai($id);
        $this->load->view('maskapai/edit', $data);
    }


    public function update($id)
    {
        $data = array(
            'nama_maskapai' => $this->input->post('nama_maskapai'),
            'kode_maskapai' => $this->input->post('kode_maskapai'),
            'jenis_pesawat' => $this->input->post('jenis_pesawat')
        );

       
        if (!empty($_FILES['gambar_maskapai']['name'])) {
          
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 9999; 

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar_maskapai')) {
                $error = $this->upload->display_errors();
            } else {
                $upload_data = $this->upload->data();
                $gambar_maskapai = $upload_data['file_name'];

               
                $data['gambar_maskapai'] = $gambar_maskapai;
            }
        }

       
        $this->Maskapai_model->update_maskapai($id, $data);
        redirect('pemesanan/daftar_maskapai');
    }


    public function delete($id)
    {
        $this->Maskapai_model->delete_maskapai($id);
        redirect('pemesanan/daftar_maskapai');
    }

    
}
