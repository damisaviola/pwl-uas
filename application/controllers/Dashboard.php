<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load model yang diperlukan di sini
        $this->load->model('Dashboard_model');
    }

    public function index() {
        $data['jumlah_pelanggan'] = $this->Dashboard_model->get_jumlah_pelanggan();
        $data['jumlah_penerbangan'] = $this->Dashboard_model->get_rute_penerbangan();
        $data['jumlah_maskapai'] = $this->Dashboard_model->get_jumlah_maskapai();
        $data['jumlah_jadwal'] = $this->Dashboard_model->get_jadwal_penerbangan();
        $data['jumlah_pemesanan'] = $this->Dashboard_model->get_jumlah_pemesanan();
        $data['jumlah_pesawat'] = $this->Dashboard_model->get_jumlah_pesawat();
        $data['namaAdmin'] = $this->session->userdata('nama_admin');

        // Load view dashboard_admin.php
        $this->load->view('dashboard_view', $data);
    }
}
