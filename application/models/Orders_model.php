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
}

/* End of file Order_model.php */
