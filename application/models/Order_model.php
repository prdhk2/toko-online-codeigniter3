<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends MY_Model 
{
    public $table = 'orders';

    public function get_data($id) {
        return $this->db->where('id', $id)->get('orders')->row();
    }

    public function create_detail($data) {
        return $this->db->insert('order_detail', $data);
    }
    
    public function get_by_invoice($invoice) {
        return $this->db
            ->where('invoice', $invoice)
            ->get('orders')
            ->row();
    }
    public function get_by_id($id) {
        return $this->db->where('id', $id)->get('orders')->row();
    }
    
    public function update_status($invoice, $status) {
        return $this->db->where('invoice', $invoice)
                       ->update($this->table, ['status' => $status]);
    }
}