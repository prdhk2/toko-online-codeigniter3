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
}
?>
