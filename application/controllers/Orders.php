<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Orders extends CI_Controller
{
    public function __construct() {
        parent::__construct();

        $this->load->model('Orders_model', 'orders');
        $this->load->library('pagination');

        $role = $this->session->userdata('role');

        if ($role != 'admin') {
            redirect(base_url('/'));
            return;
        }
    }

    public function markAsShipped($order_id) {
        // Cek apakah ordernya ada
        $order = $this->orders->getById($order_id);
        if (!$order) {
            show_404();
        }

        // Data untuk shipping_temp
        $data = [
            'order_id' => $order_id,
            'courier_name' => 'JNE', // bisa nanti pakai inputan atau default
            'shipping_code' => 'SHIP-' . strtoupper(uniqid()),
            'status' => 'processing'
        ];

        // Simpan ke shipping_temp
        $this->orders->createShipping($data);

        // Update status di orders (opsional, supaya reflect jadi "shipping")
        $this->orders->update($order_id, ['status' => 'shipping']);

        // Redirect kembali dengan pesan sukses
        $this->session->set_flashdata('success', 'Order marked as shipped.');
        redirect('neworders/shippingOrders');
    }

    public function newOrders($offset = 0) {
        $this->load->library('pagination');
        
        // Pagination config
        $config['base_url'] = site_url('neworders/newOrders');
        $config['total_rows'] = $this->orders->count_waiting_orders();
        $config['per_page'] = 20; // Show 20 orders per page
        $config['uri_segment'] = 3;
        
        // Pagination styling
        $config['full_tag_open'] = '<ul class="pagination justify-content-center mb-0">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo;';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo;';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['attributes'] = array('class' => 'page-link');
        
        $this->pagination->initialize($config);
        
        $data['title'] = 'New Orders';
        $data['breadcum'] = 'New Orders';
        $data['orders'] = $this->orders->get_paginated_waiting_orders($config['per_page'], $offset);
        $data['total_orders'] = $config['total_rows'];
        $data['pagination'] = $this->pagination->create_links();
        
        $this->load->view('layouts/admin/_header');
        $this->load->view('layouts/admin/_sidebar');
        $this->load->view('pages/admin/orders-management/new-order', $data);
        $this->load->view('layouts/admin/_footer');
    }

    public function paidOrders($offset = 0) {
        // Pagination config
        $config['base_url'] = site_url('neworders/paidOrders');
        $config['total_rows'] = $this->orders->count_paid_orders();
        $config['per_page'] = 20;
        $config['uri_segment'] = 3;
        
        // Pagination styling
        $config['full_tag_open'] = '<ul class="pagination justify-content-center mb-0">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo;';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo;';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['attributes'] = array('class' => 'page-link');
        
        $this->pagination->initialize($config);
        
        $data['title'] = 'Paid Orders';
        $data['breadcum'] = 'Paid Orders';
        $data['orders'] = $this->orders->get_paginated_paid_orders($config['per_page'], $offset);
        $data['total_orders'] = $config['total_rows'];
        $data['pagination'] = $this->pagination->create_links();
        
        $this->load->view('layouts/admin/_header');
        $this->load->view('layouts/admin/_sidebar');
        $this->load->view('pages/admin/orders-management/paid-order', $data);
        $this->load->view('layouts/admin/_footer');
    }

    // Shipping Orders with Pagination
    public function shippingOrders($offset = 0) {
        // Pagination config
        $config['base_url'] = site_url('neworders/shippingOrders');
        $config['total_rows'] = $this->orders->count_shipping_orders();
        $config['per_page'] = 20;
        $config['uri_segment'] = 3;
        
        // Same pagination styling as above
        $config['full_tag_open'] = '<ul class="pagination justify-content-center mb-0">';
        // ... [rest of pagination config from paidOrders]
        
        $this->pagination->initialize($config);
        
        $data['title'] = 'Shipping Orders';
        $data['breadcum'] = 'Shipping Orders';
        $data['orders'] = $this->orders->get_paginated_shipping_orders($config['per_page'], $offset);
        $data['total_orders'] = $config['total_rows'];
        $data['pagination'] = $this->pagination->create_links();
        
        $this->load->view('layouts/admin/_header');
        $this->load->view('layouts/admin/_sidebar');
        $this->load->view('pages/admin/orders-management/shipping-order', $data);
        $this->load->view('layouts/admin/_footer');
    }

    // Delivered Orders with Pagination
    public function deliveredOrders($offset = 0) {
        // Pagination config
        $config['base_url'] = site_url('neworders/deliveredOrders');
        $config['total_rows'] = $this->orders->count_delivered_orders();
        $config['per_page'] = 20;
        $config['uri_segment'] = 3;
        
        // Same pagination styling as above
        $config['full_tag_open'] = '<ul class="pagination justify-content-center mb-0">';
        // ... [rest of pagination config from paidOrders]
        
        $this->pagination->initialize($config);
        
        $data['title'] = 'Delivered Orders';
        $data['breadcum'] = 'Delivered Orders';
        $data['orders'] = $this->orders->get_paginated_delivered_orders($config['per_page'], $offset);
        $data['total_orders'] = $config['total_rows'];
        $data['pagination'] = $this->pagination->create_links();
        
        $this->load->view('layouts/admin/_header');
        $this->load->view('layouts/admin/_sidebar');
        $this->load->view('pages/admin/orders-management/delivered-order', $data);
        $this->load->view('layouts/admin/_footer');
    }


    public function detail($id) {
        $data['title'] = 'Detail Order';
        $data['breadcum'] = 'Orders';
        $data['order'] = $this->orders->getOrderById($id);
        
        if (!$data['order']) {
            $this->session->set_flashdata('error', 'Order not found.');
            redirect('neworders/newOrders');
        }
        
        $data['order_items'] = $this->orders->getOrderItemsByOrderId($id);
        
        // Remove order confirmation since using Midtrans
        // $data['order_confirm'] = $this->orders->getOrderConfirmByOrderId($id);

        $this->load->view('layouts/admin/_header');
        $this->load->view('layouts/admin/_sidebar');
        $this->load->view('pages/admin/orders-management/detail', $data);
        $this->load->view('layouts/admin/_footer');
    }

    public function confirm($id) {
        $order_confirm = $this->orders->getOrderConfirmByOrderId($id);
        if ($order_confirm) {
            // Update order status to 'shipped' or 'delivered'
            $this->db->set('status', 'paid');
            $this->db->where('id', $id);
            $this->db->update('orders');

            $this->session->set_flashdata('success', 'Order confirmed successfully.');
        } else {
            $this->session->set_flashdata('error', 'Order confirmation not found.');
        }
        redirect('neworders/newOrders');
    
    }

    public function print_invoice($id) {
        $data['order'] = $this->orders->getOrderById($id);
        $data['order_items'] = $this->orders->getOrderItemsByOrderId($id);
        
        if (!$data['order']) {
            show_404();
        }
        
        $this->load->view('pages/admin/orders-management/print_invoice', $data);
    }
}