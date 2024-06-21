<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Product extends MY_Controller
{
    public function __construct() {
        parent::__construct();

        $this->load->model('Category_model', 'category');
        $this->load->model('Product_model', 'product');
        $this->load->helper('text');

        $role = $this->session->userdata('role');

        if ($role != 'admin') {
            redirect(base_url('/'));
            return;
        }
    }

     public function index() {
        $data['content'] = $this->product->get_all_products();
        $data['breadcum'] = 'List of Products';
        
        $this->load->view('layouts/admin/_header');
        $this->load->view('layouts/admin/_sidebar');
        $this->load->view('pages/admin/table-product/index', $data);
        $this->load->view('layouts/admin/_footer');
    }

     public function add_product() {
        $data['category'] = $this->product->get_all_products();
        $data['breadcum'] = 'List of Products';
        
        $this->load->view('layouts/admin/_header');
        $this->load->view('layouts/admin/_sidebar');
        $this->load->view('pages/admin/product/index', $data);
        $this->load->view('layouts/admin/_footer');
    }

    public function store() {
        $config['upload_path'] = './images/product/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2048;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('image')) {
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('error', $error);
            redirect('pages/admin/product/add');
        } else {
            $uploadData = $this->upload->data();
            $data = [
                'title'         => $this->input->post('productName'),
                'slug'          => $this->input->post('slug'),
                'description'   => $this->input->post('description'),
                'price'         => $this->input->post('price'),
                'image'         => $uploadData['file_name'],
                'id_category'   => $this->input->post('idCategory')
            ];
            $this->product->insert($data);
            $this->session->set_flashdata('success', 'Product added successfully');
            redirect('product');
        }
    }

    public function detail($id) {
        $data['product'] = $this->product->get_product_by_id($id);
        $data['breadcum'] = 'Product Detail';

        $this->load->view('layouts/admin/_header', $data);
        $this->load->view('layouts/admin/_sidebar', $data);
        $this->load->view('pages/admin/product/detail', $data);
        $this->load->view('layouts/admin/_footer', $data);
    }

    public function edit($id) {
        $data['content'] = $this->product->get_product_by_id($id);
        $data['category'] = $this->category->get_all_categories();
        $data['breadcum'] = 'Edit Product';

        $this->load->view('layouts/admin/_header');
        $this->load->view('layouts/admin/_sidebar', $data);
        $this->load->view('pages/admin/product/edit', $data);
        $this->load->view('layouts/admin/_footer');
    }

    public function update($id) {
        $this->form_validation->set_rules('productName', 'Product Name', 'required');
        $this->form_validation->set_rules('slug', 'Slug', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');
        $this->form_validation->set_rules('idCategory', 'Category', 'required');

        if ($this->form_validation->run() == TRUE) {
            $data = [
                'title' => $this->input->post('productName'),
                'slug' => $this->input->post('slug'),
                'description' => $this->input->post('description'),
                'price' => $this->input->post('price'),
                'id_category' => $this->input->post('idCategory')
            ];

            // Handle file upload if there's a new image
            if (!empty($_FILES['image']['name'])) {
                $upload = $this->do_upload();
                if ($upload) {
                    $data['image'] = $upload['file_name'];
                } else {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('pages/admin/product/edit/' . $id);
                }
            }

            $this->product->update($id, $data);
            $this->session->set_flashdata('success', 'Product updated successfully.');
            redirect('product');
        } else {
            $this->edit($id);
        }
    }

    // Fungsi untuk menghapus produk
    public function delete($id) {
        $this->product->delete($id);
        $this->session->set_flashdata('success', 'Product deleted successfully.');
        redirect('product');
    }

    private function do_upload() {
        $config['upload_path'] = './images/product/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2048;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            return $this->upload->data();
        } else {
            return false;
        }
    }



}

/* End of file Product.php */
