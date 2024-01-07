<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->helper('url');
        $this->load->library('session'); // Memuat library session
    }

    public function index() {
        if ($this->session->userdata('logged_in')) {
            $data['namaAdmin'] = $this->session->userdata('nama_admin'); // Ambil nama admin dari session
            $this->load->view('dashboard', $data); // Tampilkan dashboard dengan nama admin
        } else {
            $this->load->view('login');
        }
    }

    public function process_login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
    
        $result = $this->admin_model->login($username, $password);
    
        if ($result) {
            $adminData = $this->admin_model->getAdminByUsername($username);
            $this->session->set_userdata('logged_in', true);
            $this->session->set_userdata('nama_admin', $adminData['nama_admin']); // Simpan nama admin dalam session
            redirect('dashboard');
        } else {
            $this->session->set_flashdata('error', 'Invalid username or password'); // Set pesan kesalahan
            $this->session->set_flashdata('username', $username); // Simpan username untuk pertahankan nilai input
            redirect('login');
        }
    }
    
    

    public function logout() {
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('nama_admin'); // Hapus nama admin dari session saat logout
        redirect('login');
    }

    public function check_login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
    
        // Lakukan validasi login dengan model atau cara lain
        $result = $this->admin_model->validate_login($username, $password);
    
        if ($result) {
            echo 'valid';
        } else {
            echo 'invalid';
        }
    }
    
}

?>
