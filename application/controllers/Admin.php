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
        $data['orders'] = $this->orders->getNewOrders();
        $data['title'] = 'Admin Dashboard';
        $data['breadcum'] = 'Dashboard';

        // Tambahan data statistik
        $this->load->model('Product_model', 'product');
        $this->load->model('Report_model', 'report'); // pastikan model ini ada

        $data['total_products']   = $this->product->count_all();            // jumlah total produk
        $data['total_sales']      = $this->report->get_today_sales();       // penjualan hari ini
        $data['monthly_revenue']  = $this->report->get_monthly_revenue();   // total revenue bulan ini

        $this->load->view('layouts/admin/_header');
        $this->load->view('layouts/admin/_sidebar');
        $this->load->view('pages/admin/dashboard', $data);
        $this->load->view('layouts/admin/_footer');
    }

}

/* End of file Admin.php */
