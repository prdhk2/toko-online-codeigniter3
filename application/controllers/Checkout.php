<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {
    // Di controller Checkout
    public function __construct() {
        parent::__construct();
        $this->load->library('midtrans');
        $this->load->model('Cart_model');
        $this->load->model('Promo_model');
        $this->load->model('Order_model');
        $this->load->model('Address_model');
    }

    public function index() {
        $this->load->model('Cart_model');
        $data['promos']  = $this->Promo_model->getAll();
        
        $user_id = $this->session->userdata('id');
        $data['cart_items'] = $this->Cart_model->get_user_cart($user_id);
        $data['total'] = $this->Cart_model->get_cart_total($user_id);
        $data['addresses'] = $this->Address_model->get_by_user($user_id);

        $data['title'] = 'Checkout - BakulSayur';
        $data['page'] = 'pages/frontend/checkout/checkout_view';
        
        if (empty($data['cart_items'])) {
            $this->session->set_flashdata('warning', 'Keranjang belanja kosong');
            redirect(base_url('cart'));
        }
        
        $data['input'] = $this->input->post() ? (object)$this->input->post() : (object)$this->get_default_values();
        $this->load->view('layouts/app', $data);
    }

    public function process() {
        if (!$this->input->post()) {
            redirect(base_url('checkout'));
        }
        
        $this->load->model(['Cart_model', 'Address_model']);
        $user_id = $this->session->userdata('id');
        
        // Validasi form
        if (!$this->validate_checkout()) {
            return $this->index();
        }
        
        // Ambil alamat lengkap dari database berdasarkan address_id
        $address = $this->Address_model->get_by_id($this->input->post('address_id'));
        if (!$address || $address->user_id != $user_id) {
            $this->session->set_flashdata('error', 'Alamat tidak valid');
            return $this->index();
        }
        
        // Format alamat lengkap
        $full_address = $address->address_line1;
        if (!empty($address->address_line2)) {
            $full_address .= ', ' . $address->address_line2;
        }
        $full_address .= ', ' . $address->city . ', ' . $address->postal_code;
        $full_address .= ', ' . $address->state . ', ' . $address->country;
        
        // Data order
        $order_data = [
            'id_user'   => $user_id,
            'date'      => date('Y-m-d H:i:s'),
            'invoice'   => 'INV-' . $user_id . '-' . time(),
            'total'     => $this->Cart_model->get_cart_total($user_id),
            'name'      => $this->input->post('name'),
            'address'   => $full_address, // Gunakan alamat lengkap
            'phone'     => $this->input->post('phone'),
            'status'    => 'pending'
        ];
        
        // Simpan order
        $this->load->model('Order_model');
        $order_id = $this->Order_model->create($order_data);
        
        if (!$order_id) {
            $this->session->set_flashdata('error', 'Gagal membuat order');
            return $this->index();
        }
        
        // Pindahkan cart ke order details
        $cart_items = $this->Cart_model->get_cart_items_for_checkout($user_id);
        foreach ($cart_items as $item) {
            $order_detail = [
                'id_orders' => $order_id,
                'id_product' => $item->id_product,
                'qty' => $item->qty,
                'subtotal' => $item->subtotal
            ];
            $this->Order_model->create_detail($order_detail);
        }
        
        // Siapkan data untuk Midtrans
        $transaction_details = [
            'order_id' => $order_data['invoice'],
            'gross_amount' => $order_data['total']
        ];
        
        $item_details = array_map(function($item) {
            return [
                'id' => $item->id_product,
                'price' => $item->price,
                'quantity' => $item->qty,
                'name' => $item->title
            ];
        }, $cart_items);
        
        $customer_details = [
            'first_name' => $order_data['name'],
            'phone' => $order_data['phone'],
            'shipping_address' => [
                'first_name' => $order_data['name'],
                'phone' => $order_data['phone'],
                'address' => $order_data['address']
            ]
        ];
        
        // Panggil Midtrans
        $this->load->library('midtrans');
        $snap_token = $this->midtrans->get_snap_token([
            'transaction_details' => $transaction_details,
            'item_details' => $item_details,
            'customer_details' => $customer_details
        ]);
        
        if (!$snap_token) {
            $this->session->set_flashdata('error', 'Gagal memproses pembayaran');
            return $this->index();
        }
        
        // Kosongkan cart
        $this->Cart_model->clear_cart($user_id);
        
        $this->load->view('pages/frontend/payment/index', [
            'snap_token' => $snap_token,
            'order_id' => $order_data['invoice']
        ]);
    }

    private function validate_checkout() {
        $this->load->library('form_validation');
        
        $rules = [
            [
                'field' => 'name',
                'label' => 'Nama',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'address_id',
                'label' => 'Alamat',
                'rules' => 'required|trim|numeric'
            ],
            [
                'field' => 'phone',
                'label' => 'Telepon',
                'rules' => 'required|trim|numeric'
            ]
        ];
        
        $this->form_validation->set_rules($rules);
        $this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
        
        return $this->form_validation->run();
    }

    private function get_default_values() {
        return [
            'name' => '',
            'address' => '',
            'phone' => ''
        ];
    }
}