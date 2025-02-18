<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session'); // Load the session library
        $this->check_login(); // Check if the user is logged in
    }

    public function index() {
        $this->load->view('dashboard');
    }

    private function check_login() {
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('error', 'You must be logged in to access the dashboard.');
            redirect('auth/login');
        }
    }
}
