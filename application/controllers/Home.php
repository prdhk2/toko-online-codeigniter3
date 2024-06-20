<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Banner_model');
        $this->load->model('Product_model', 'home');
        $this->load->model('Promo_model');
    }

    public function index($page = null) {
        $data['title'] = 'Homepage';
        $data['banners'] = $this->Banner_model->getBanners();
        
        $data['content'] = $this->home->select(
                [
                    'product.id', 'product.title AS product_title', 'product.description', 'product.image', 'product.price', 'product.is_available',
                    'category.title AS category_title', 'category.slug AS category_slug'
                ]
            )
            ->join('category')
            ->where('product.is_available', 1)
            ->paginate($page)
            ->get();
        $data['total_rows'] = $this->home->where('product.is_available', 1)->count();
        $data['pagination'] = $this->home->makePagination(base_url('home'), 2, $data['total_rows']);
        $data['page'] = 'pages/frontend/home/index';

        $this->view($data);
    }

    public function All_products() {
        $data['content'] = $this->home->select(
            [
                'product.id', 'product.title AS product_title', 'product.description', 'product.image', 'product.price', 'product.is_available',
                'category.title AS category_title', 'category.slug AS category_slug'
            ]
        )
        ->join('category')
        ->where('product.is_available', 1)
        ->get();
        
        $data['page']       = 'pages/frontend/product/index';

        return $this->view($data);

    }

    public function promoIndex() {
        $data['promos'] = $this->Promo_model->getAll();
        $data['page'] = 'pages/frontend//promo/index';

        $this->view($data);
    }
}


/* End of file Home.php */
