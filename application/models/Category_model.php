<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Category_model extends MY_Model
{
    // Tidak perlu definisi (override) nama table secara manual karena nama model = nama table
    public function get_all_categories()
    {
        return $this->db->get('category')->result();
    }

    public function getDefaultValues()
    {
        return [
            'id'    => '',
            'slug'  => '',
            'title' => ''
        ];
    }

    public function getValidationRules()
    {
        $validationRules = [
            [
                'field' => 'slug',
                'label' => 'Slug',
                'rules' => 'trim|required|callback_unique_slug'
            ],
            [
                'field' => 'title',
                'label' => 'Kategori',
                'rules' => 'trim|required'
            ]
        ];
        
        return $validationRules;
    }

    public function delete($id) {
        $this->db->delete('category', ['id' => $id]);
    }

    public function insert($data) {
        return $this->db->insert('category', $data);
    }

    public function getById($id) {
        return $this->db->get_where('category', ['id' => $id])->row();
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('category', $data);
    }
}

/* End of file Category_model.php */
