<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Banner_model extends CI_Model
{
    public function getAll() {
        return $this->db->get('banner')->result();
    }

    public function getBanners() {
        return $this->db->get_where('banner', ['is_active' => 'yes'])->result();
    }

    public function getById($id) {
        return $this->db->get_where('banner', ['id' => $id])->row();
    }

    public function insert($data) {
        $this->db->insert('banner', $data);
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('banner', $data);
    }

    public function delete($id) {
        $this->db->delete('banner', ['id' => $id]);
    }
}
