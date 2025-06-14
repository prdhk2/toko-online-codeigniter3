<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Address extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('Promo_model');
        $this->load->model('Address_model');
        $this->load->model('Region_model');
        $this->load->library('form_validation');
    }

    public function add() {
        $data['promos']  = $this->Promo_model->getAll();

        // Cek login
        if (!$this->session->userdata('is_login')) {
            redirect('login');
        }

        // Load data wilayah dari database lokal
        $data['provinces'] = $this->Region_model->get_provinces();

        // Set data untuk layout
        $data['title'] = 'Tambah Alamat Baru';
        $data['page'] = 'pages/frontend/addressAdd/index';
        
        $this->load->view('layouts/app', $data);
    }

    public function store() {
        // Cek login
        if (!$this->session->userdata('is_login')) {
            redirect('login');
        }

        // Validasi form
        $this->form_validation->set_rules('recipient_name', 'Nama Penerima', 'required|min_length[3]');
        $this->form_validation->set_rules('phone', 'No. Telepon', 'required|numeric|min_length[10]');
        $this->form_validation->set_rules('address_line1', 'Alamat Lengkap', 'required|min_length[10]');
        $this->form_validation->set_rules('province_id', 'Provinsi', 'required|numeric');
        $this->form_validation->set_rules('city_id', 'Kota/Kabupaten', 'required|numeric');
        $this->form_validation->set_rules('district_id', 'Kecamatan', 'required|numeric');
        $this->form_validation->set_rules('postal_code', 'Kode Pos', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->add();
        } else {
            // Data alamat
            $address_data = [
                'user_id' => $this->session->userdata('id'),
                'recipient_name' => $this->input->post('recipient_name'),
                'phone' => $this->input->post('phone'),
                'address_line1' => $this->input->post('address_line1'),
                'address_line2' => $this->input->post('address_line2'),
                'province_id' => $this->input->post('province_id'),
                'city_id' => $this->input->post('city_id'),
                'district_id' => $this->input->post('district_id'),
                'postal_code' => $this->input->post('postal_code'),
                'is_primary' => $this->input->post('is_primary') ? 1 : 0
            ];

            // Simpan ke database
            if ($this->Address_model->insert($address_data)) {
                $this->session->set_flashdata('success', 'Alamat berhasil ditambahkan');
                redirect($this->input->post('from_checkout') ? 'checkout' : 'profile/addresses');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan alamat');
                $this->add();
            }
        }
    }

    // AJAX - Get cities by province
    public function get_cities() {
        if (!$this->input->is_ajax_request()) {
            show_404();
        }

        $province_id = $this->input->post('province_id');
        $cities = $this->Region_model->get_cities($province_id);
        
        header('Content-Type: application/json');
        echo json_encode($cities);
    }

    // AJAX - Get districts by city
    public function get_districts() {
        if (!$this->input->is_ajax_request()) {
            show_404();
        }

        $city_id = $this->input->post('city_id');
        $districts = $this->Region_model->get_districts($city_id);
        
        header('Content-Type: application/json');
        echo json_encode($districts);
    }
}