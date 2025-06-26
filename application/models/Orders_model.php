<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Orders_model extends MY_Model 
{
    public function getNewOrders() {
        $this->db->where('status', 'waiting');
        $this->db->order_by('date', 'DESC');
        return $this->db->get('orders')->result();
    }

    public function getPaidOrders() {
        $this->db->where('status', 'paid');
        $query = $this->db->get('orders');
        return $query->result();
    }

    public function getShippingOrders() {
        $this->db->where('status', 'shipping');
        $query = $this->db->get('orders');
        return $query->result();
    }

    public function getDeliveredOrders() {
        $this->db->where('status', 'delivered');
        $query = $this->db->get('orders');
        return $query->result();
    }

    public function getOrderById($id) {
        return $this->db->get_where('orders', ['id' => $id])->row();
    }

    public function getOrderItemsByOrderId($id) {
        $this->db->select('order_detail.*, product.title AS product_title, product.price AS product_price');
        $this->db->from('order_detail');
        $this->db->join('product', 'order_detail.id_product = product.id', 'left');
        $this->db->where('order_detail.id_orders', $id);
        $query = $this->db->get();
        
        // echo $this->db->last_query(); die();
        
        return $query->result();
    }

    public function getOrderConfirmByOrderId($id) {
        return $this->db->get_where('orders_confirm', ['id' => $id])->row();
    }

    public function count_waiting_orders() {
        $this->db->where('status', 'waiting');
        return $this->db->count_all_results('orders');
    }

    public function get_paginated_waiting_orders($limit, $offset) {
        $this->db->where('status', 'waiting');
        $this->db->order_by('date', 'DESC');
        $this->db->limit($limit, $offset);
        return $this->db->get('orders')->result();
    }

    public function count_paid_orders() {
        $this->db->where('status', 'paid');
        return $this->db->count_all_results('orders');
    }

    public function get_paginated_paid_orders($limit, $offset) {
        $this->db->where('status', 'paid');
        $this->db->order_by('date', 'DESC');
        $this->db->limit($limit, $offset);
        return $this->db->get('orders')->result();
    }

    // For Shipping Orders
    public function count_shipping_orders() {
        $this->db->where('status', 'shipping');
        return $this->db->count_all_results('orders');
    }

    public function get_paginated_shipping_orders($limit, $offset) {
        $this->db->where('status', 'shipping');
        $this->db->order_by('date', 'DESC');
        $this->db->limit($limit, $offset);
        return $this->db->get('orders')->result();
    }

    // For Delivered Orders
    public function count_delivered_orders() {
        $this->db->where('status', 'delivered');
        return $this->db->count_all_results('orders');
    }

    public function get_paginated_delivered_orders($limit, $offset) {
        $this->db->where('status', 'delivered');
        $this->db->order_by('date', 'DESC');
        $this->db->limit($limit, $offset);
        return $this->db->get('orders')->result();
    }
}

/* End of file Order_model.php */
