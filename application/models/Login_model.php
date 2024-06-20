<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{
    public function getDefaultValues() {
        return [
            'email'    => '',
            'password' => '',
        ];
    }

    public function validate() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        return $this->form_validation->run();
    }

    public function run($input) {
        $user = $this->db->where('email', $input->email)
            ->where('is_active', 1)
            ->get('user')
            ->row();

        if ($user) {
            if (password_verify($input->password, $user->password)) {
                $sess_data = [
                    'id'       => $user->id,
                    'email'    => $user->email,
                    'name'     => $user->name,
                    'image'    => $user->image,
                    'role'     => $user->role,
                    'is_login' => true,
                ];

                $this->session->set_userdata($sess_data);
                return true;
            }
        }

        return false;
    }

}
