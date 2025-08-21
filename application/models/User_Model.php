<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_users() {
        return $this->db->get('users')->result_array();
    }

    public function get_user($id) {
        return $this->db->get_where('users', ['id' => $id])->row_array();
    }

    public function insert_user($data) {
        $data['created_at'] = date('Y-m-d H:i:s');
        return $this->db->insert('users', $data);
    }

    public function update_user($id, $data) {
        $data['updated_at'] = date('Y-m-d H:i:s');
        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }

    public function delete_user($id) {
        return $this->db->delete('users', ['id' => $id]);
    }

    public function check_email_exists($email, $id = null) {
        $this->db->where('email', $email);
        if ($id) {
            $this->db->where('id !=', $id);
        }
        return $this->db->get('users')->num_rows() > 0;
    }
}