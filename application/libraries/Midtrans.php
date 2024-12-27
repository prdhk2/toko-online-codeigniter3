<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Midtrans {
    public function __construct() {
        require_once APPPATH . 'vendor/autoload.php';
        \Midtrans\Config::$serverKey = get_instance()->config->item('server_key');
        \Midtrans\Config::$clientKey = get_instance()->config->item('client_key');
        \Midtrans\Config::$isProduction = get_instance()->config->item('production');
    }

    public function createTransaction($transaction) {
        return \Midtrans\Snap::createTransaction($transaction);
    }
}