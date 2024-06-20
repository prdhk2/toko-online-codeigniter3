<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Orders extends CI_Controller
{
    public function __construct() {
        parent::__construct();

        $this->load->model('Orders_model', 'orders');

        $role = $this->session->userdata('role');

        if ($role != 'admin') {
            redirect(base_url('/'));
            return;
        }
    }

    public function newOrders() {
        
        $data['orders']     = $this->orders->getNewOrders();
        $data['title'] = 'New Order';
        $data['breadcum'] = 'Orders';

        $this->load->view('layouts/admin/_header');
        $this->load->view('layouts/admin/_sidebar');
        $this->load->view('pages/admin/orders-management/new-order', $data);
        $this->load->view('layouts/admin/_footer');
    }

    public function paidOrders() {
        
        $data['orders']     = $this->orders->getPaidOrders();
        $data['title'] = 'New Order';
        $data['breadcum'] = 'Orders';

        $this->load->view('layouts/admin/_header');
        $this->load->view('layouts/admin/_sidebar');
        $this->load->view('pages/admin/orders-management/paid-order', $data);
        $this->load->view('layouts/admin/_footer');
    }

    public function shippingOrders() {
        
        $data['orders']     = $this->orders->getShippingOrders();
        $data['title'] = 'New Order';
        $data['breadcum'] = 'Orders';

        $this->load->view('layouts/admin/_header');
        $this->load->view('layouts/admin/_sidebar');
        $this->load->view('pages/admin/orders-management/shipping-order', $data);
        $this->load->view('layouts/admin/_footer');
    }

    public function deliveredOrders() {
        
        $data['orders']     = $this->orders->getDeliveredOrders();
        $data['title'] = 'New Order';
        $data['breadcum'] = 'Orders';

        $this->load->view('layouts/admin/_header');
        $this->load->view('layouts/admin/_sidebar');
        $this->load->view('pages/admin/orders-management/delivered-order', $data);
        $this->load->view('layouts/admin/_footer');
    }
}