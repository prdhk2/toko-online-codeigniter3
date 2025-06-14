<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH.'libraries/Midtrans.php'); // Pastikan path ini benar

class snap extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
        // Set headers untuk CORS
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Authorization");
        
        // Load library dan helper
        $this->load->library('cart');
        $this->load->helper('url');
        
        // Konfigurasi Midtrans
        \Midtrans\Config::$serverKey = 'SB-Mid-server-w_dVUW4MvzdFp-MHcwa_gN1b';
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;
    }

    public function token() 
    {
        try {
            // Validasi input
            if (!$this->input->post()) {
                throw new Exception("Data form tidak diterima");
            }

            // Validasi cart
            $cart_contents = $this->cart->contents();
            if (empty($cart_contents)) {
                throw new Exception("Keranjang belanja kosong");
            }

            // Hitung total
            $total = array_sum(array_column($cart_contents, 'subtotal'));

            // Siapkan data transaksi
            $transaction_details = [
                'order_id' => 'ORD-'.time().'-'.mt_rand(1000, 9999),
                'gross_amount' => $total
            ];

            // Siapkan item details
            $item_details = array_map(function($item) {
                return [
                    'id' => $item['id'],
                    'price' => $item['price'],
                    'quantity' => $item['qty'],
                    'name' => $item['name']
                ];
            }, $cart_contents);

            // Data customer
            $customer_details = [
                'first_name' => $this->input->post('name'),
                'phone' => $this->input->post('phone'),
                'address' => $this->input->post('address')
            ];

            // Data Snap
            $params = [
                'transaction_details' => $transaction_details,
                'item_details' => $item_details,
                'customer_details' => $customer_details
            ];

            // Dapatkan Snap Token
            $snapToken = \Midtrans\Snap::getSnapToken($params);

            // Response JSON
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['token' => $snapToken]));

        } catch (Exception $e) {
            $this->output
                ->set_status_header(500)
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    'status' => 'error',
                    'message' => $e->getMessage()
                ]));
        }
    }

    public function finish()
    {
        $result = json_decode($this->input->post('result_data'));
        echo 'RESULT <br><pre>';
        var_dump($result);
        echo '</pre>';
    }
}