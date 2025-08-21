<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dynamic extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(Dy'dynamic_model');
        $this->load->helper('url');
        $this->load->library('form_validation');
    }

    // Display the form
    public function index() {
        $this->load->view('dynamic_view');
    }

    // Handle form submission
    public function submit() {
        // Set validation rules
        $this->form_validation->set_rules('name[]', 'Name', 'required');
        $this->form_validation->set_rules('email[]', 'Email', 'required|valid_email');
        
        if ($this->form_validation->run() == FALSE) {
            // Validation failed, reload the form
            $this->load->view('dynamic_form');
        } else {
            // Validation passed, process data
            $names = $this->input->post('name');
            $emails = $this->input->post('email');
            
            $data = array();
            for ($i = 0; $i < count($names); $i++) {
                $data[] = array(
                    'name' => $names[$i],
                    'email' => $emails[$i],
                    'created_at' => date('Y-m-d H:i:s')
                );
            }
            
            // Insert data into database
            $inserted = $this->form_model->insert_batch($data);
            
            if ($inserted) {
                $this->session->set_flashdata('success', 'Data saved successfully!');
            } else {
                $this->session->set_flashdata('error', 'Failed to save data.');
            }
            
            redirect('form');
        }
    }
}