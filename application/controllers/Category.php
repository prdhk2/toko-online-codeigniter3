<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Category extends MY_Controller
{
    public function __construct() {
        parent::__construct();

        $this->load->model('Category_model', 'category');
        $role = $this->session->userdata('role');

        if ($role != 'admin') {
            redirect(base_url('/'));
            return;
        }
    }

    public function index() {

        $data['category'] = $this->category->get_all_categories();
        $data['title'] = 'Categories';
        $data['breadcum'] = 'List Category';
        
        $this->load->view('layouts/admin/_header');
        $this->load->view('layouts/admin/_sidebar');
        $this->load->view('pages/admin/table-category/index', $data);
        $this->load->view('layouts/admin/_footer');
    }

    public function add_category() {

        $data['category'] = $this->category->get_all_categories();
        $data['title'] = 'Categories';
        $data['breadcum'] = 'List Category';
        
        $this->load->view('layouts/admin/_header');
        $this->load->view('layouts/admin/_sidebar');
        $this->load->view('pages/admin/category/index', $data);
        $this->load->view('layouts/admin/_footer');
    }

    public function store() {
        $data = [
            'title' => $this->input->post('categoryName'),
            'slug' => $this->input->post('slug')
        ];
        $this->category->insert($data);
        $this->session->set_flashdata('success', 'Product added successfully');
        redirect('admin/category/index');
    }

    public function search($page = null) {
        if (isset($_POST['keyword'])) {
            $this->session->set_userdata('keyword', $this->input->post('keyword'));
        } else {
            redirect(base_url('category'));
        }

        $keyword = $this->session->userdata('keyword');

        $data['title']      = 'Admin: Category';
        $data['content']    = $this->category->like('title', $keyword)->paginate($page)->get();
        $data['total_rows'] = $this->category->like('title', $keyword)->count();
        $data['pagination'] = $this->category->makePagination(base_url('category/search'), 3, $data['total_rows']);
        $data['page']       = 'pages/category/index';

        $this->view($data);
    }

    public function reset() {
        $this->session->unset_userdata('keyword');  // Clear dulu keyword dari session   
        redirect(base_url('category'));
    }


    public function edit($id) {
        $data['content'] = $this->category->getById($id);
        $data['title'] = 'Edit Category';
        $data['breadcum'] = 'Edit Category';
        
        $this->load->view('layouts/admin/_header');
        $this->load->view('layouts/admin/_sidebar');
        $this->load->view('pages/admin/category/edit', $data);
        $this->load->view('layouts/admin/_footer');
    }

    public function update($id) {
        $data = [
            'title' => $this->input->post('categoryName'),
            'slug' => $this->input->post('slug')
        ];

        $this->category->update($id, $data);
        $this->session->set_flashdata('success', 'Category updated successfully.');
        redirect('admin/category/index');
    }


    public function delete($id) {
        $this->category->delete($id);
        $this->session->set_flashdata('success', 'Category deleted successfully.');
        redirect('admin/category/index');
    }
    
}

/* End of file Category.php */
