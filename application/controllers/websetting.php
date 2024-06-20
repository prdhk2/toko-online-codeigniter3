<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Websetting extends MY_Controller 
{
    public function __construct() {
        parent::__construct();
        
        $this->load->model('Banner_model', 'banner');
        $role = $this->session->userdata('role');

        if ($role != 'admin') {
            redirect(base_url('/'));
            return;
        }
    }


    public function index() {
        $data['banner'] = $this->banner->getAll();
        $data['title'] = 'Banner Management';
        $data['breadcum'] = 'Banner List';

        $this->load->view('layouts/admin/_header');
        $this->load->view('layouts/admin/_sidebar');
        $this->load->view('pages/admin/websetting/index', $data);
        $this->load->view('layouts/admin/_footer');
    }

    public function add() {
        $data['title'] = 'Add Banner';
        $data['breadcum'] = 'Add Banner';

        $this->load->view('layouts/admin/_header');
        $this->load->view('layouts/admin/_sidebar');
        $this->load->view('pages/admin/websetting/addBanner', $data);
        $this->load->view('layouts/admin/_footer');
    }

    public function store() {
        $config['upload_path'] = './images/banner/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 2048; // 2MB
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('image')) {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('error', $error['error']);
            redirect('admin/banner/add');
        } else {
            $uploadData = $this->upload->data();
            $data = [
                'image' => $uploadData['file_name'],
                'is_active' => $this->input->post('is_active') === '' ? 'yes' : 'no'
            ];
            $this->banner->insert($data);
            $this->session->set_flashdata('success', 'Banner added successfully.');
            redirect('admin/banner');
        }
    }

    public function edit($id) {
        $data['banner'] = $this->banner->getById($id);
        $data['title'] = 'Edit Banner';
        $data['breadcum'] = 'Edit Banner';

        $this->load->view('layouts/admin/_header');
        $this->load->view('layouts/admin/_sidebar');
        $this->load->view('pages/admin/websetting/editBanner', $data);
        $this->load->view('layouts/admin/_footer');
    }

    public function update($id) {
        $data = [
            'is_active' => $this->input->post('is_active') ? 1 : 0
        ];

        if (!empty($_FILES['image']['name'])) {
            $config['upload_path'] = './images/banner/';
            $config['allowed_types'] = 'gif|jpg|png';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $uploadData = $this->upload->data();
                $data['image'] = $uploadData['file_name'];
            }
        }

        $this->banner->update($id, $data);
        $this->session->set_flashdata('success', 'Banner updated successfully.');
        redirect('admin/banner');
    }

    public function delete($id) {
        $this->banner->delete($id);
        $this->session->set_flashdata('success', 'Banner deleted successfully.');
        redirect('admin/banner');
    }
}