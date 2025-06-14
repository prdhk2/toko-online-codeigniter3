<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends MY_Model 
{
    public $table = 'orders';
    
    public function create_detail($data) {
        return $this->db->insert('order_detail', $data);
    }
    
    public function get_by_invoice($invoice) {
        return $this->db->where('invoice', $invoice)->get($this->table)->row();
    }
    
    public function update_status($invoice, $status) {
        return $this->db->where('invoice', $invoice)
                       ->update($this->table, ['status' => $status]);
    }
}