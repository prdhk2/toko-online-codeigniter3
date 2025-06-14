<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Region_model extends CI_Model {

    public function get_provinces() {
        return $this->db->order_by('name', 'ASC')
                       ->get('provinces')
                       ->result();
    }

    public function get_cities($province_id) {
        return $this->db->where('province_id', $province_id)
                       ->order_by('name', 'ASC')
                       ->get('cities')
                       ->result();
    }

    public function get_districts($city_id) {
        return $this->db->where('city_id', $city_id)
                       ->order_by('name', 'ASC')
                       ->get('districts')
                       ->result();
    }

    public function get_postal_code($district_id) {
        $district = $this->db->select('postal_code')
                            ->where('id', $district_id)
                            ->get('districts')
                            ->row();
        return $district ? $district->postal_code : '';
    }
}