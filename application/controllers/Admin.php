<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function dashboard() {
        $this->load->view('admin/dashboard');
    }

    public function wallpapers() {
        $this->load->view('admin/wallpapers');
    }
}
