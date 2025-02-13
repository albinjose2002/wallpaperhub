<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wallpapers extends CI_Controller {
    public function index() {
        $this->load->view('wallpapers'); // Load wallpapers view
    }
}
