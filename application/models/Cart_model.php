<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart_model extends MY_Model 
{
    public $table = 'cart';

    // Method untuk mendapatkan cart user dengan join product
    public function get_user_cart($id_user) {
        return $this->select([
                'cart.id', 
                'cart.qty', 
                'cart.subtotal',
                'product.title', 
                'product.image', 
                'product.price',
                'product.id as id_product'
            ])
            ->join('product')
            ->where('cart.id_user', $id_user)
            ->get();
    }

    // Method untuk menghitung total cart
    public function get_cart_total($id_user) {
        $result = $this->db->select_sum('subtotal')
                          ->where('id_user', $id_user)
                          ->get($this->table)
                          ->row();
        return $result->subtotal ? $result->subtotal : 0;
    }

    // Method untuk membersihkan cart setelah checkout
    public function clear_cart($id_user) {
        return $this->db->where('id_user', $id_user)
                       ->delete($this->table);
    }

    // Method untuk mendapatkan detail produk dalam cart
    public function get_cart_items_for_checkout($id_user) {
        return $this->db->select('cart.*, product.title, product.price')
                       ->from($this->table)
                       ->join('product', 'product.id = cart.id_product')
                       ->where('cart.id_user', $id_user)
                       ->get()
                       ->result();
    }
}