<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    // Get today's total sales
    public function get_today_sales() {
        $today = date('Y-m-d');
        $this->db->select_sum('total');
        $this->db->where('DATE(date)', $today);
        $this->db->where('status', 'paid');
        $query = $this->db->get('orders');
        return $query->row()->total ?: 0;
    }

    // Get monthly revenue
    public function get_monthly_revenue() {
        $first_day = date('Y-m-01');
        $last_day = date('Y-m-t');
        $this->db->select_sum('total');
        $this->db->where('DATE(date) >=', $first_day);
        $this->db->where('DATE(date) <=', $last_day);
        $this->db->where('status', 'paid');
        $query = $this->db->get('orders');
        return $query->row()->total ?: 0;
    }

    // Get total transactions count
    public function get_total_transactions() {
        $this->db->where('status !=', 'waiting');
        return $this->db->count_all_results('orders');
    }

    // Calculate today's growth compared to yesterday
    public function calculate_today_growth() {
        $today = date('Y-m-d');
        $yesterday = date('Y-m-d', strtotime('-1 day'));
        
        // Today's sales
        $today_sales = $this->get_sales_by_date($today);
        
        // Yesterday's sales
        $yesterday_sales = $this->get_sales_by_date($yesterday);
        
        if ($yesterday_sales == 0) {
            return $today_sales > 0 ? 100 : 0;
        }
        
        return round((($today_sales - $yesterday_sales) / $yesterday_sales) * 100, 2);
    }

    // Calculate monthly growth compared to last month
    public function calculate_monthly_growth() {
        $current_month = date('m');
        $current_year = date('Y');
        $last_month = $current_month == 1 ? 12 : $current_month - 1;
        $last_year = $current_month == 1 ? $current_year - 1 : $current_year;
        
        // Current month sales
        $current_sales = $this->get_sales_by_month($current_month, $current_year);
        
        // Last month sales
        $last_sales = $this->get_sales_by_month($last_month, $last_year);
        
        if ($last_sales == 0) {
            return $current_sales > 0 ? 100 : 0;
        }
        
        return round((($current_sales - $last_sales) / $last_sales) * 100, 2);
    }

    // Calculate transaction growth
    public function calculate_transaction_growth() {
        $current_month = date('m');
        $current_year = date('Y');
        $last_month = $current_month == 1 ? 12 : $current_month - 1;
        $last_year = $current_month == 1 ? $current_year - 1 : $current_year;
        
        // Current month transactions
        $current_transactions = $this->get_transactions_by_month($current_month, $current_year);
        
        // Last month transactions
        $last_transactions = $this->get_transactions_by_month($last_month, $last_year);
        
        if ($last_transactions == 0) {
            return $current_transactions > 0 ? 100 : 0;
        }
        
        return round((($current_transactions - $last_transactions) / $last_transactions) * 100, 2);
    }

    // Get sales by specific date
    private function get_sales_by_date($date) {
        $this->db->select_sum('total');
        $this->db->where('DATE(date)', $date);
        $this->db->where('status !=', 'waiting');
        $query = $this->db->get('orders');
        return $query->row()->total ?: 0;
    }

    // Get sales by month and year
    private function get_sales_by_month($month, $year) {
        $this->db->select_sum('total');
        $this->db->where('MONTH(date)', $month);
        $this->db->where('YEAR(date)', $year);
        $this->db->where('status !=', 'waiting');
        $query = $this->db->get('orders');
        return $query->row()->total ?: 0;
    }

    // Get transactions count by month and year
    private function get_transactions_by_month($month, $year) {
        $this->db->where('MONTH(date)', $month);
        $this->db->where('YEAR(date)', $year);
        $this->db->where('status !=', 'waiting');
        return $this->db->count_all_results('orders');
    }

    // Get chart labels (last 7 days)
    public function get_chart_labels() {
        $labels = [];
        for ($i = 6; $i >= 0; $i--) {
            $labels[] = date('D, M j', strtotime("-$i days"));
        }
        return $labels;
    }

    // Get chart data (sales for last 7 days)
    public function get_chart_data() {
        $data = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = date('Y-m-d', strtotime("-$i days"));
            $data[] = $this->get_sales_by_date($date);
        }
        return $data;
    }

    // Get top selling product
    public function get_top_products($limit = 5) {
        $this->db->select('product.id, product.title, product.image, SUM(order_detail.qty) as sold, SUM(order_detail.qty * order_detail.subtotal) as revenue');
        $this->db->from('order_detail');
        $this->db->join('product', 'product.id = order_detail.id_product');
        $this->db->join('orders', 'orders.id = order_detail.id_orders');
        $this->db->where('orders.status !=', 'waiting');
        $this->db->group_by('product.id');
        $this->db->order_by('sold', 'DESC');
        $this->db->limit($limit);
        return $this->db->get()->result();
    }

    // Get latest order
    public function get_latest_orders($limit = 10) {
        $this->db->select('orders.*, user.name');
        $this->db->from('orders');
        $this->db->join('user', 'user.id = orders.id_user');
        $this->db->order_by('date', 'DESC');
        $this->db->limit($limit);
        return $this->db->get()->result();
    }

    public function get_orders_by_range($range) {
        $this->db->where('status', 'paid');

        switch ($range) {
            case 'today':
                $this->db->where('DATE(date)', date('Y-m-d'));
                break;
            case 'week':
                $this->db->where('YEARWEEK(date, 1)', date('oW'));
                break;
            case 'month':
                $this->db->where('MONTH(date)', date('m'));
                $this->db->where('YEAR(date)', date('Y'));
                break;
            case 'year':
                $this->db->where('YEAR(date)', date('Y'));
                break;
            default:
                break;
        }

        return $this->db->get('orders')->result();
    }

}