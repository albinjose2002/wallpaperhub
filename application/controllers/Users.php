<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->helper(['url', 'form']);
        $this->load->library(['form_validation', 'session']);
    }

    public function index() {
        $data['users'] = $this->user_model->get_all_users();
        $this->load->view('users/list', $data);
    }

    public function create() {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('users/create');
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email')
            ];

            if ($this->user_model->insert_user($data)) {
                $this->session->set_flashdata('success', 'User created successfully!');
            } else {
                $this->session->set_flashdata('error', 'Failed to create user.');
            }
            redirect('users');
        }
    }

    public function edit($id) {
        $data['user'] = $this->user_model->get_user($id);

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_check_email['.$id.']');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('users/edit', $data);
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email')
            ];

            if ($this->user_model->update_user($id, $data)) {
                $this->session->set_flashdata('success', 'User updated successfully!');
            } else {
                $this->session->set_flashdata('error', 'Failed to update user.');
            }
            redirect('users');
        }
    }

    public function delete($id) {
        if ($this->user_model->delete_user($id)) {
            $this->session->set_flashdata('success', 'User deleted successfully!');
        } else {
            $this->session->set_flashdata('error', 'Failed to delete user.');
        }
        redirect('users');
    }

    public function check_email($email, $id) {
        if ($this->user_model->check_email_exists($email, $id)) {
            $this->form_validation->set_message('check_email', 'This email is already registered.');
            return FALSE;
        } else {
            return TRUE;
        }
    }
}