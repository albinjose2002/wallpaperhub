<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
    public function index() {
        $this->load->view('contact');
    }

    public function save(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('message', 'Message', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('contact');
        } else {
            $this->load->model('Contact_Model');
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'message' => $this->input->post('message')
            );

            if ($this->Contact_Model->insert_contact($data)) {
                $this->session->set_flashdata('success', 'Your message has been sent successfully!');
            } else {
                $this->session->set_flashdata('error', 'There was an error sending your message. Please try again.');
            }
            // redirect('contact');
        }
            
    }
}
