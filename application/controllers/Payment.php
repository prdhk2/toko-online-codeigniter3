<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('midtrans');
        $this->load->model('Order_model');
    }

    public function notification() {
        // Handle notification dari Midtrans
        $notif = $this->midtrans->get_notification();
        
        $transaction = $notif->transaction_status;
        $order_id = $notif->order_id;
        
        if ($transaction == 'capture') {
            // Pembayaran sukses
            $this->Order_model->update_status($order_id, 'paid');
        } elseif ($transaction == 'settlement') {
            // Pembayaran telah diselesaikan
            $this->Order_model->update_status($order_id, 'completed');
        } elseif ($transaction == 'pending') {
            // Pembayaran pending
            $this->Order_model->update_status($order_id, 'pending');
        } elseif ($transaction == 'deny' || $transaction == 'expire' || $transaction == 'cancel') {
            // Pembayaran gagal
            $this->Order_model->update_status($order_id, 'failed');
        }
        
        // Beri response 200 ke Midtrans
        echo "OK";
    }

    public function finish() {
        $invoice = $this->session->userdata('last_invoice');

        if (!$invoice) {
            echo 'Invoice tidak ditemukan di session.';
            return;
        }

        $order = $this->Order_model->get_by_invoice($invoice);

        if (!$order) {
            echo 'Order tidak ditemukan di database.';
            return;
        }

        $this->session->unset_userdata('last_invoice'); // optional: hapus agar gak numpuk

        $data['order'] = $order;
        $data['order_id'] = $order->id;

        $this->load->view('pages/frontend/payment/payment_finish', $data);
    }


    public function unfinish() {
        // Halaman ketika pembayaran pending
        $data['order_id'] = $this->input->get('order_id');
        $data['payment_method'] = $this->input->get('payment_method');
        $this->load->view('pages/frontend/payment/payment_unfinish', $data);
    }

    public function error() {
        // Halaman ketika pembayaran error/gagal
        $data['order_id'] = $this->input->get('order_id');
        $this->load->view('pages/frontend/payment/payment_error', $data);
    }
}