<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Orders_model extends MY_Model 
{
    public function getNewOrders() {
        $this->db->where('status', 'waiting');
        $query = $this->db->get('orders');
        return $query->result();
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
        $this->db->select('order_detail.*, product.title AS product_title, product.price');
        $this->db->from('order_detail');
        $this->db->join('product', 'order_detail.id_product = product.id');
        $this->db->where('order_detail.id_orders', $id);
        return $this->db->get()->result();
    }

    public function getOrderConfirmByOrderId($id) {
        return $this->db->get_where('orders_confirm', ['id' => $id])->row();
    }
}

/* End of file Order_model.php */
