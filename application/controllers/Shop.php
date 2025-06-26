<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends MY_Controller 
{
    /**
     * Sorting harga
     */

    public function __construct() {
        parent::__construct();
        
        $this->load->model('Promo_model');
    }

    public function sortby($sort, $page = null) {
        $data['promos']  = $this->Promo_model->getAll();

        $data['title'] = 'Belanja';
        $data['content']    = $this->shop->select(
                [
                    'product.id', 'product.title AS product_title', 'product.description', 'product.image', 'product.price', 'product.is_available',
                    'category.title AS category_title', 'category.slug AS category_slug'
                ]
            )
            ->join('category')                  // Query untuk mencari suatu data produk beserta kategorinya
            ->where('product.is_available', 1)  // Pilih yang stok tersedia
            ->orderBy('product.price', $sort)   // Sortir berdasarkan harga
            ->paginate($page)
            ->get();
        $data['total_rows'] = $this->shop->where('product.is_available', 1)->count();
        $data['pagination'] = $this->shop->makePagination(
            base_url("shop/sortby/$sort"), 4, $data['total_rows']
        );
        $data['page'] = 'pages/frontend/home/index';     // Mengarahkan halaman

        $this->view($data);
    }

    /**
     * Klasifikasi kategori
     * Param 1: slug kategory
     * Param 2: nilai pagination
     */
    public function category($category, $page = null) {
        $data['promos']  = $this->Promo_model->getAll();

        $data['title'] = 'Belanja';
        $data['content']    = $this->shop->select(
                [
                    'product.id', 'product.title AS product_title', 'product.description', 'product.image', 'product.price', 'product.is_available',
                    'category.title AS category_title', 'category.slug AS category_slug'
                ]
            )
            ->join('category')                  // Query untuk mencari suatu data produk beserta kategorinya
            ->where('product.is_available', 1)  // Pilih yang stok tersedia
            ->where('category.slug', $category)
            ->paginate($page)
            ->get();
        $data['total_rows'] = $this->shop->where('product.is_available', 1)
            ->where('category.slug', $category)
            ->join('category')
            ->count();
        $data['pagination'] = $this->shop->makePagination(
            base_url("shop/category/$category"), 4, $data['total_rows']
        );
        $data['category'] = ucwords(str_replace('-', ' ', $category));  // Buat title category dari slug
        $data['page'] = 'pages/frontend//home/index';     // Mengarahkan halaman

        $this->view($data);
    }

    public function search($page = null) {
        $data['promos'] = $this->Promo_model->getAll();
        
        // Get distinct categories for sidebar
        $data['categories'] = $this->db->distinct()
                                    ->select('title, slug')
                                    ->order_by('title', 'ASC')
                                    ->get('category')
                                    ->result();

        if (isset($_POST['keyword'])) {
            $this->session->set_userdata('keyword', $this->input->post('keyword'));
        } elseif (!$this->session->userdata('keyword')) {
            redirect(base_url('home'));
        }

        $keyword = $this->session->userdata('keyword');

        // Initialize query
        $this->shop->select([
                'product.id', 
                'product.title AS product_title', 
                'product.description', 
                'product.image', 
                'product.price', 
                'product.is_available',
                'product.slug AS product_slug',
                'category.title AS category_title', 
                'category.slug AS category_slug'
            ])
            ->join('category', 'category.id = product.id_category')
            ->where('product.is_available', 1);

        // Add search conditions using DB group_start
        $this->db->group_start()
            ->like('product.title', $keyword)
            ->or_like('product.description', $keyword)
            ->group_end();

        $data['title'] = 'Pencarian: ' . $keyword;
        $data['content'] = $this->shop->paginate($page)->get();
            
        // Count total rows
        $this->db->group_start()
            ->like('product.title', $keyword)
            ->or_like('product.description', $keyword)
            ->group_end();
            
        $data['total_rows'] = $this->shop->where('product.is_available', 1)->count();
        $data['pagination'] = $this->shop->makePagination(
            base_url('shop/search'), 
            3, 
            $data['total_rows']
        );
        $data['page'] = 'pages/frontend/home/index';

        $this->view($data);
    }
}

/* End of file Shop.php */
