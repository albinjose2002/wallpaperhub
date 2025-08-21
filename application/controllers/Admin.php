<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_Model');
        $this->load->library('session');
        $this->load->helper(['form', 'url']);
    }

    public function dashboard() {
        $this->load->view('admin/dashboard');
    }

    public function admin_wallpapers() {
        $this->load->view('admin/admin_wallpapers');
    }

    public function admin_login() {
        $this->load->view('admin/admin_login');
    }

    public function upload_image() {
        $config['upload_path'] = './assets/uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 210048; // 2MB
        $config['encrypt_name'] = TRUE; // Generates a random file name

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('image')) {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect('admin/admin_wallpapers');
        } else {
            $uploadData = $this->upload->data();
            $imageName = $uploadData['file_name'];
            $title = $this->input->post('title') ?: 'Untitled';
            $category = $this->input->post('category') ?: 'Uncategorized';

            // Save to database
            $data = [
                'title' => $title,
                'image' => $imageName,
                'category' => $category
            ];
            $this->Admin_Model->insert_wallpaper($data);

            $this->session->set_flashdata('success', '');
            redirect('admin/admin_wallpapers');
        }
    }

    public function delete_image($id) {
        $this->load->model('Wallpaper_model');
        $result = $this->Admin_model->delete_image($id);
        
        if ($result) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to delete image.']);
        }
    }
}
