<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Report_model');
        $this->load->helper('date');

        $role = $this->session->userdata('role');

        if ($role != 'admin') {
            redirect(base_url('/'));
            return;
        }
    }

    public function index() {

        $data['title'] = 'Sales Report';
        
        $data['today_sales'] = $this->Report_model->get_today_sales();
        $data['monthly_revenue'] = $this->Report_model->get_monthly_revenue();
        $data['total_transactions'] = $this->Report_model->get_total_transactions();
        
        $data['today_growth'] = $this->Report_model->calculate_today_growth();
        $data['monthly_growth'] = $this->Report_model->calculate_monthly_growth();
        $data['transaction_growth'] = $this->Report_model->calculate_transaction_growth();
        
        $data['chart_labels'] = $this->Report_model->get_chart_labels();
        $data['chart_data'] = $this->Report_model->get_chart_data();
        
        $data['top_products'] = $this->Report_model->get_top_products(5);
        
        $data['latest_orders'] = $this->Report_model->get_latest_orders(10);

        $this->load->view('layouts/admin/_header');
        $this->load->view('layouts/admin/_sidebar');
        $this->load->view('pages/admin/report/index', $data);
        $this->load->view('layouts/admin/_footer');
    }

    // Add more methods for export, filtering etc. as needed
}