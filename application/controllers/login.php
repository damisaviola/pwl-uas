<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('login');
    }

    public function process()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');


        if ($username === 'admin' && $password === 'password') {

            redirect('dashboard');
        } else {

            redirect('login');
        }
    }
}
