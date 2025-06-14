<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Perhatikan path yang benar ke folder midtrans-php
require_once(APPPATH.'third_party/midtrans-php/Midtrans.php');

class Midtrans {
    public function __construct() {
        \Midtrans\Config::$serverKey = 'SB-Mid-server-w_dVUW4MvzdFp-MHcwa_gN1b';
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;
    }

    public function get_snap_token($params) {
        try {
            return \Midtrans\Snap::getSnapToken($params);
        } catch (Exception $e) {
            log_message('error', 'Midtrans Error: '.$e->getMessage());
            return false;
        }
    }

    public function get_notification() {
        return new \Midtrans\Notification();
    }
    
    // Tambahkan method lain yang dibutuhkan
    public function status($order_id) {
        return \Midtrans\Transaction::status($order_id);
    }
    
    public function cancel($order_id) {
        return \Midtrans\Transaction::cancel($order_id);
    }
}