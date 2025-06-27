<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Promo_model extends CI_Model
{
    public function getAll()
    {
        return $this->db->get('promo')->result();
    }

    public function getById($id)
    {
        return $this->db->get_where('promo', ['id' => $id])->row();
    }

    public function insert($data)
    {
        return $this->db->insert('promo', $data);
    }

    public function update($id, $data)
    {
        return $this->db->where('id', $id)->update('promo', $data);
    }

    public function delete($id)
    {
        return $this->db->delete('promo', ['id' => $id]);
    }

    public function get_promo_by_id($id) {
        return $this->db->get_where('promo', array('id' => $id))->row();
    }

    public function insert_promo($data) {
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        return $this->db->insert('promo', $data);
    }

    public function update_promo($id, $data) {
        $data['updated_at'] = date('Y-m-d H:i:s');
        $this->db->where('id', $id);
        return $this->db->update('promo', $data);
    }

    public function delete_promo($id) {
        return $this->db->delete('promo', array('id' => $id));
    }
}
?>
