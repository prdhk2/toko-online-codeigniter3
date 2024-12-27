<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends MY_Controller
{
    private $id;

    public function __construct() {
        parent::__construct();
        
        $is_login = $this->session->userdata('is_login');
        $this->id = $this->session->userdata('id');

        if (!$is_login || $is_login = $this->session->userdata('role') != 'member') {   // Jika ternyata belum ada session
            redirect(base_url());
            return;
        }

        $this->load->model('Promo_model');

    }

    public function index($input = null) {
        // Mengambil list cart yang akan dicheckout
        $this->checkout->table  = 'cart';
        $data['promos']  = $this->Promo_model->getAll();

        $data['cart'] = $this->checkout->select([
                'cart.id', 'cart.qty', 'cart.subtotal',
                'product.title', 'product.image', 'product.price'
            ])
            ->join('product')
            ->where('cart.id_user', $this->id)
            ->get();

        if (!$data['cart']) {
            $this->session->set_flashdata('warning', 'Tidak ada produk di dalam keranjang');
            redirect(base_url('home'));
        }

        // Jika input kosong (user belum input), maka isi form dari awal (form kosong)
        $data['input']  = $input ? $input : (object) $this->checkout->getDefaultValues();
        $data['title']  = 'Checkout';
        $data['page']   = 'pages/frontend/checkout/index';

        $this->view($data);
    }

    /**
     * Fungsi ini memasukan suatu pesanan ke tabel 'orders' 
     * dan memindahkan list cart user ke 'order_detail'
     */
    public function create() {
        if (!$_POST) {
            redirect(base_url('checkout'));
        } else {
            $input = (object) $this->input->post(null, true);
        }
    
        if (!$this->checkout->validate()) {
            return $this->index($input);
        }
    
        $total = $this->db->select_sum('subtotal')
            ->where('id_user', $this->id)
            ->get('cart')
            ->row()
            ->subtotal;
    
        $data = [
            'id_user'   => $this->id,
            'date'      => date('Y-m-d'),
            'invoice'   => $this->id . date('YmdHis'),
            'total'     => $total,
            'name'      => $input->name,
            'address'   => $input->address,
            'phone'     => $input->phone,
            'status'    => 'waiting'
        ];
    
        if ($id_orders = $this->checkout->create($data)) {
            $cart = $this->db->where('id_user', $this->id)
                ->get('cart')
                ->result_array();
    
            foreach ($cart as $row) {
                $row['id_orders'] = $id_orders;
                unset($row['id'], $row['id_user']);
                $this->db->insert('order_detail', $row);
            }
    
            $this->db->delete('cart', ['id_user' => $this->id]);
    
            $transaction = [
                'transaction_details' => [
                    'order_id' => $id_orders,
                    'gross_amount' => $total
                ],
                'customer_details' => [
                    'first_name' => $input->name,
                    'last_name' => '',
                    'email' => $input->email,
                    'phone' => $input->phone
                ],
                'item_details' => []
            ];
    
            foreach ($cart as $row) {
                $transaction['item_details'][] = [
                    'id' => $row['id'],
                    'price' => $row['price'],
                    'quantity' => $row['quantity'],
                    'name' => $row['name']
                ];
            }
    
            $response = $this->midtrans->createTransaction($transaction);
    
            if ($response['status_code'] == 201) {
                redirect($response['redirect_url']);
            } else {
                $this->session->set_flashdata('error', 'Oops! Terjadi kesalahan');
                return $this->index($input);
            }
        } else {
            $this->session->set_flashdata('error', 'Oops! Terjadi kesalahan');
            return $this->index($input);
        }
    }
}

/* End of file Checkout.php */
