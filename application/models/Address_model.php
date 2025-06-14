<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Address_model extends CI_Model {
    // Method untuk mendapatkan alamat berdasarkan user ID
    public function get_by_user($user_id) {
        return $this->db->where('user_id', $user_id)
                       ->order_by('is_primary', 'DESC') // Urutkan alamat utama pertama
                       ->get('user_addresses')
                       ->result();
    }

    // Method untuk mendapatkan alamat berdasarkan ID
    public function get_by_id($id) {
        return $this->db->where('id', $id)
                       ->get('user_addresses')
                       ->row();
    }

    // Method lainnya yang mungkin diperlukan
    public function get_primary_address($user_id) {
        return $this->db->where('user_id', $user_id)
                       ->where('is_primary', 1)
                       ->get('user_addresses')
                       ->row();
    }
}       