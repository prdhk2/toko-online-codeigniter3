<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends MY_Controller
{
    public function __construct() {
        parent::__construct();

        $this->load->model('Orders_model', 'orders');
        
        // Pastikan pengguna sudah login dan merupakan admin
        if (!$this->session->userdata('is_login') || $this->session->userdata('role') != 'admin') {
            redirect(base_url(''));
            return;
        }
    }

    public function index() {

        $data['orders']     = $this->orders->getNewOrders();
        $data['title'] = 'Admin Dashboard';
        $data['breadcum'] = 'Dashboard';

        $this->load->view('layouts/admin/_header');
        $this->load->view('layouts/admin/_sidebar');
        $this->load->view('pages/admin/dashboard', $data);
        $this->load->view('layouts/admin/_footer');
    }

    
}

/* End of file Admin.php */
