<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends MY_Controller
{
    public function __construct() {
        parent::__construct();
        
        $is_login = $this->session->userdata('is_login');

        if ($is_login) {
            $role = $this->session->userdata('role');
            if ($role == 'admin') {
                redirect(base_url('admin/dashboard'));
            } else {
                redirect(base_url());
            }
            return;
        }

        $this->load->model('Promo_model');
    }
    
    public function index() {

        $data['promos'] =   $this->Promo_model->getAll();
        if (!$_POST) {
            $input = (object) $this->login->getDefaultValues();
        } else {
            $input = (object) $this->input->post(null, true);
        }

        if (!$this->login->validate()) {    // Jika validasi gagal
            $data['title'] = 'Login';
            $data['input'] = $input;
            $data['page'] = 'pages/frontend/auth/login';

            $this->view($data);

            return;
        }

        if ($this->login->run($input)) {
            $role = $this->session->userdata('role');
            if ($role == 'admin') {
                redirect(base_url('admin/dashboard'));
            } else {
                redirect(base_url());
            }
        } else {
            $this->session->set_flashdata('error', 'E-mail/Password salah atau akun anda sedang tidak aktif');
            redirect(base_url('login'));
        }
    }
}

/* End of file Login.php */
