<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promo extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('promo_model');
        $this->load->model('Category_model', 'category');
        $this->load->helper('text');

        $role = $this->session->userdata('role');

        if ($role != 'admin') {
            redirect(base_url('/'));
            return;
        }
    }

    public function index() {
        // Load text helper untuk character_limiter()
        $this->load->helper('text');
        
        $data['promos'] = $this->promo_model->getAll();
        $data['title'] = 'Promo List';
        $data['breadcum'] = 'Promo Management';

        // Pastikan load view dengan layout
        $this->load->view('layouts/admin/_header', $data);
        $this->load->view('layouts/admin/_sidebar');
        $this->load->view('pages/admin/promo/index', $data);
        $this->load->view('layouts/admin/_footer');
    }

    // Add new promo
    public function add() {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('discount', 'Discount', 'required|numeric');
        $this->form_validation->set_rules('start_date', 'Start Date', 'required');
        $this->form_validation->set_rules('end_date', 'End Date', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Add New Promo';
            $data['breadcum'] = 'Add Promo';

            $this->load->view('layouts/admin/_header');
            $this->load->view('layouts/admin/_sidebar');
            $this->load->view('pages/admin/promo/addPromo', $data);
            $this->load->view('layouts/admin/_footer');
        } else {
            $config['upload_path'] = './images/promo/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = 2048;
            
            $this->load->library('upload', $config);
            
            if ($this->upload->do_upload('image')) {
                $image_data = $this->upload->data();
                $image_name = $image_data['file_name'];
            } else {
                $image_name = 'default.jpg';
            }

            $promo_data = array(
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'image' => $image_name,
                'discount' => $this->input->post('discount'),
                'start_date' => $this->input->post('start_date'),
                'end_date' => $this->input->post('end_date'),
                'is_active' => $this->input->post('is_active') ? 1 : 0
            );

            $this->promo_model->insert_promo($promo_data);
            $this->session->set_flashdata('success', 'Promo added successfully');
            redirect('admin/promo');
        }
    }

    // Edit promo
    public function edit($id) {
        $this->load->library('form_validation');
        
        $data['promo'] = $this->promo_model->get_promo_by_id($id);
        
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('discount', 'Discount', 'required|numeric');
        $this->form_validation->set_rules('start_date', 'Start Date', 'required');
        $this->form_validation->set_rules('end_date', 'End Date', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Edit Promo';
            $data['breadcum'] = 'Edit Promo';

            $this->load->view('layouts/admin/_header');
            $this->load->view('layouts/admin/_sidebar');
            $this->load->view('pages/admin/promo/editPromo', $data);
            $this->load->view('layouts/admin/_footer');
        } else {
            $config['upload_path'] = './images/promo/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = 2048;
            
            $this->load->library('upload', $config);
            
            if ($this->upload->do_upload('image')) {
                // Delete old image if not default
                if ($data['promo']->image != 'default.jpg') {
                    unlink('./images/promo/' . $data['promo']->image);
                }
                
                $image_data = $this->upload->data();
                $image_name = $image_data['file_name'];
            } else {
                $image_name = $data['promo']->image;
            }

            $promo_data = array(
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'image' => $image_name,
                'discount' => $this->input->post('discount'),
                'start_date' => $this->input->post('start_date'),
                'end_date' => $this->input->post('end_date'),
                'is_active' => $this->input->post('is_active') ? 1 : 0
            );

            $this->promo_model->update_promo($id, $promo_data);
            $this->session->set_flashdata('success', 'Promo updated successfully');
            redirect('admin/promo');
        }
    }

    // Delete promo
    public function delete($id) {
        $promo = $this->promo_model->get_promo_by_id($id);
        
        if ($promo->image != 'default.jpg') {
            unlink('./images/promo/' . $promo->image);
        }
        
        $this->promo_model->delete_promo($id);
        $this->session->set_flashdata('success', 'Promo deleted successfully');
        redirect('admin/promo');
    }
}