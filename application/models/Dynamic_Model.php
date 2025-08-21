<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dynamic extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('dynamic_model');
        $this->load->helper(['url', 'form']);
        $this->load->library(['form_validation', 'session']);
    }

    // Main view with all records
    public function index() {
        $data['records'] = $this->dynamic_model->get_all();
        $this->load->view('dynamic_view', $data);
    }

    // Process form submission
    public function save() {
        $this->form_validation->set_rules('name[]', 'Name', 'required');
        $this->form_validation->set_rules('email[]', 'Email', 'required|valid_email');
        
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            // Get posted data
            $ids = $this->input->post('id') ?? [];
            $names = $this->input->post('name');
            $emails = $this->input->post('email');
            
            // Prepare data for update/insert
            $to_update = [];
            $to_insert = [];
            
            for ($i = 0; $i < count($names); $i++) {
                $record = [
                    'name' => $names[$i],
                    'email' => $emails[$i],
                    'updated_at' => date('Y-m-d H:i:s')
                ];
                
                if (!empty($ids[$i])) {
                    $record['id'] = $ids[$i];
                    $to_update[] = $record;
                } else {
                    $record['created_at'] = date('Y-m-d H:i:s');
                    $to_insert[] = $record;
                }
            }
            
            // Process operations
            $success = true;
            
            // Update existing records
            if (!empty($to_update)) {
                $success = $success && $this->dynamic_model->batch_update($to_update);
            }
            
            // Insert new records
            if (!empty($to_insert)) {
                $success = $success && $this->dynamic_model->batch_insert($to_insert);
            }
            
            // Handle deleted records
            $existing_ids = $this->dynamic_model->get_existing_ids();
            $posted_ids = array_filter($ids);
            $to_delete = array_diff($existing_ids, $posted_ids);
            
            if (!empty($to_delete)) {
                $success = $success && $this->dynamic_model->batch_delete($to_delete);
            }
            
            // Set flash message
            if ($success) {
                $this->session->set_flashdata('success', 'Data saved successfully!');
            } else {
                $this->session->set_flashdata('error', 'There was an error saving data.');
            }
            
            redirect('dynamic');
        }
    }
}