<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wallpaper_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function insert_wallpaper($data) {
        return $this->db->insert('wallpapers', $data);
    }

    public function get_all_wallpapers() {
        return $this->db->order_by('uploaded_at', 'DESC')->get('wallpapers')->result_array();
    }

    public function delete_image($id) {
        // Delete the image record from the database
        $this->db->where('id', $id);
        return $this->db->delete('wallpapers');
    }
    
    
}
