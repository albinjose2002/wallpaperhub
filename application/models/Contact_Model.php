<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function insert_contact($data) {
        return $this->db->insert('contacts', $data);
    }

    public function get_all_contacts() {
        return $this->db->order_by('created_at', 'DESC')->get('contacts')->result_array();
    }

   
    
    
}