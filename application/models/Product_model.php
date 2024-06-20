<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Product_model extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }

    // Ambil semua produk dari database
    public function get_all_products() {
        return $this->db->get('product')->result();
    }

    public function get_product_by_id($id) {
        return $this->db->where('id', $id)->get('product')->row();
    }


    public function insert($data) {
        return $this->db->insert('product', $data);
    }

    public function getDefaultValues() {
        return [
            'id_category'   => '',
            'slug'          => '',
            'title'         => '',
            'description'   => '',
            'price'         => '',
            'is_available'  => 1,
            'image'         => ''
        ];
    }

    public function getValidationRules() {
        $validationRules = [
            [
                'field' => 'id_category',
                'label' => 'Kategory',
                'rules' => 'required'
            ],
            [
                'field' => 'slug',
                'label' => 'Slug',
                'rules' => 'trim|required|callback_unique_slug'
            ],
            [
                'field' => 'title',
                'label' => 'Nama Produk',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'description',
                'label' => 'Deskripsi',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'price',
                'label' => 'Harga',
                'rules' => 'trim|required|numeric'
            ],
            [
                'field' => 'is_available',
                'label' => 'Ketersediaan',
                'rules' => 'required'
            ],
        ];

        return $validationRules;
    }

    public function uploadImage($fieldName, $fileName) {
        $config = [
            'upload_path'       => './images/product',
            'file_name'         => $fileName,
            'allowed_types'     => 'jpg|gif|png|jpeg|JPG|PNG',
            'max_size'          => 2048,
            'max_width'         => 0,       
            'max_height'        => 0,
            'overwrite'         => true,    
            'file_ext_tolower'  => true,    
        ];

        $this->load->library('upload', $config);
        
        if ($this->upload->do_upload($fieldName)) {
            return $this->upload->data();
        } else {
            $this->session->set_flashdata('image_error', $this->upload->display_errors('', ''));
            return false;
        }
    }

    public function deleteImage($fileName) {
        if (file_exists("./images/product/$fileName")) {
            unlink("./images/product/$fileName");
        }
    }

    public function update($id, $data) {
        return $this->db->where('id', $id)->update('product', $data);
    }

    public function delete($id) {
        return $this->db->delete('product', ['id' => $id]);
    }

}

/* End of file Product_model.php */
