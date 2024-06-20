<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Promo extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Promo_model');
        $this->load->model('Category_model', 'category');
        $this->load->helper('text');

        $role = $this->session->userdata('role');

        if ($role != 'admin') {
            redirect(base_url('/'));
            return;
        }

    }

    public function index() {
        $data['title'] = 'Promo List';
        $data['promos'] = $this->Promo_model->getAll();
        

        $this->load->view('layouts/admin/_header', $data);
        $this->load->view('layouts/admin/_sidebar', $data);
        $this->load->view('pages/admin/promo/index', $data);
        $this->load->view('layouts/admin/_footer', $data);
    }

    public function add() {

        $data['category']   = $this->category->get_all_categories();
        $data['title']      = 'Add Promo';

        $this->load->view('layouts/admin/_header', $data);
        $this->load->view('layouts/admin/_sidebar', $data);
        $this->load->view('pages/admin/promo/addPromo', $data);
        $this->load->view('layouts/admin/_footer', $data);
    }

    public function store() {
        $config['upload_path'] = './images/promo/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 2048; // 2MB
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            $uploadData = $this->upload->data();
            $data = [
                'title'         => $this->input->post('title'),
                'description'   => $this->input->post('description'),
                'image'         => $uploadData['file_name'],
                'discount'      => $this->input->post('discount'),
                'start_date'    => $this->input->post('start_date'),
                'end_date'      => $this->input->post('end_date'),
                'is_active'     => $this->input->post('is_active') === 'yes' ? 'yes' : 'no',
                'category_id'   => $this->input->post('category_id')
            ];

            $this->Promo_model->insert($data);
            $this->session->set_flashdata('success', 'Promo added successfully.');
            redirect('admin/promo');
        } else {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect('admin/promo/add');
        }
    }

    public function edit($id) {
        $data['title'] = 'Edit Promo';
        $data['promo'] = $this->Promo_model->getById($id);

        $this->load->view('layouts/admin/_header', $data);
        $this->load->view('layouts/admin/_sidebar', $data);
        $this->load->view('pages/frontend//admin/promo/editPromo', $data);
        $this->load->view('layouts/admin/_footer', $data);
    }

    public function update($id) {
        $config['upload_path'] = './images/promo/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 2048; // 2MB
        $this->load->library('upload', $config);

        $data = [
            'title'         => $this->input->post('title'),
            'description'   => $this->input->post('description'),
            'discount'      => $this->input->post('discount'),
            'start_date'    => $this->input->post('start_date'),
            'end_date'      => $this->input->post('end_date'),
            'is_active'     => $this->input->post('is_active') === 'yes' ? 'yes' : 'no',
            'category_id'   => $this->input->post('category_id')
        ];

        if ($_FILES['image']['name']) {
            if ($this->upload->do_upload('image')) {
                $uploadData = $this->upload->data();
                $data['image'] = $uploadData['file_name'];
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('admin/promo/edit/' . $id);
            }
        }

        $this->Promo_model->update($id, $data);
        $this->session->set_flashdata('success', 'Promo updated successfully.');
        redirect('admin/promo');
    }

    public function delete($id) {
        $this->Promo_model->delete($id);
        $this->session->set_flashdata('success', 'Promo deleted successfully.');
        redirect('admin/promo');
    }
}
