<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_Model');
        $this->load->library('session');
    }

    // Show Registration Page
    public function register() {
        $this->load->view('auth/register');
    }

    // Register User
    public function register_user() {
        $this->load->library('form_validation');

        // Validation Rules
        $this->form_validation->set_rules('full_name', 'Full Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            // Validation Failed
            $this->session->set_flashdata('error', validation_errors());
            redirect('auth/register');
        } else {
            // Collect Data
            $data = array(
                'full_name' => $this->input->post('full_name'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                'created_at' => date('Y-m-d H:i:s')
            );

            // Insert Data into DB
            if ($this->User_Model->insert_user($data)) {
                $this->session->set_flashdata('success', 'Registration successful! You can now login.');
                redirect('auth/login');
            } else {
                $this->session->set_flashdata('error', 'Something went wrong, please try again.');
                redirect('auth/register');
            }
        }
    }

    // Show Login Page
    public function login() {
        $this->load->view('auth/login');
    }

    // Handle User Login
    public function login_user() {
        $this->load->library('form_validation');

        // Validation Rules
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Validation Failed
            $this->session->set_flashdata('error', validation_errors());
            redirect('auth/login');
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            // Fetch User from DB
            $user = $this->User_Model->get_user_by_email($email);

            if ($user && password_verify($password, $user->password)) {
                // Set Session Data
                $session_data = array(
                    'user_id' => $user->id,
                    'full_name' => $user->full_name,
                    'email' => $user->email,
                    'logged_in' => TRUE
                );

                $this->session->set_userdata($session_data);
                redirect('dashboard'); // Redirect to dashboard
            } else {
                $this->session->set_flashdata('error', 'Invalid Email or Password');
                redirect('auth/login');
            }
        }
    }

    // Logout User
    public function logout() {
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('full_name');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('logged_in');
        $this->session->set_flashdata('success', 'You have been logged out successfully.');
        redirect('auth/login');
    }
}
