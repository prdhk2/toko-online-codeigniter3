<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MY_Controller 
{
    private $id;

    public function __construct() {
        parent::__construct();
        $this->load->model('Promo_model');
        $this->load->model('Address_model');

        
        $is_login = $this->session->userdata('is_login');
        $this->id = $this->session->userdata('id');

        if (!$is_login) {   // Jika ternyata belum ada session
            redirect(base_url());
            return;
        }
    }

    public function index() {
        $data['promos']     = $this->Promo_model->getAll();
        $data['addresses']  = $this->Address_model->get_by_user($this->id);

        $data['title']      = 'Profile';
        $data['content']    = $this->profile->where('id', $this->id)->first();
        
        $data['page']       = 'pages/frontend/profile/index';

        return $this->view($data);
    }

    public function update($id) {
        $data['promos']  = $this->Promo_model->getAll();

        $data['content'] = $this->profile->where('id', $id)->first();


        if (!$data['content']) {
            $this->session->set_flashdata('warning', 'Maaf data tidak ditemukan');
            redirect(base_url('profile'));
        }

        if (!$_POST) {
            $data['input'] = $data['content'];
        } else {
            $data['input'] = (object) $this->input->post(null, true);

            if ($data['input']->password !== '') {
                // Jika password tidak kosong, berati user mengubah password lalu encrypt
                $data['input']->password = hashEncrypt($data['input']->password);
            } else {
                // Jika tidak kosong berati user tidak mengubah password
                $data['input']->password = $data['content']->password;
            }
        }

        if (!empty($_FILES) && $_FILES['image']['name'] !== '') {   // Jika upload'an tidak kosong
            $imageName  = url_title($data['input']->name, '-', true) . '-' . date('YmdHis');  // Membuat slug
            $upload     = $this->profile->uploadImage('image', $imageName);    // Mulai upload
            if ($upload) {
                if ($data['content']->image !== '') {
                    // Jika data di database ini memiliki gambar, maka hapus dulu file gambarnya
                    $this->profile->deleteImage($data['content']->image);
                }
                // Jika upload berhasil, pasang nama file yang diupload ke dalam database
                $data['input']->image   = $upload['file_name'];
            } else {
                redirect(base_url("profile/update/$id"));
            }
        }

        if (!$this->profile->validate()) {
            $data['title']          = 'Ubah Data Profile';
            $data['form_action']    = base_url("profile/update/$id");
            $data['page']           = 'pages/frontend//profile/form';

            $this->view($data);
            return;
        }

        if ($this->profile->update($id, $data['input'])) {
            $this->session->set_flashdata('success', 'Data berhasil diubah');
        } else {
            $this->session->set_flashdata('error', 'Oops! Terjadi suatu kesalahan');
        }


        // $this->session->set_flashdata('image_error', $this->upload->display_errors());
        // redirect(base_url("profile/update/$id"));

        redirect(base_url('profile'));
    }

    public function unique_email() {
        $email  = $this->input->post('email');
        $id     = $this->input->post('id');
        $user   = $this->profile->where('email', $email)->first(); // Akan terisi jika terdapat email yang sama

        if ($user) {
            if ($id == $user->id) {  // Keperluan edit tidak perlu ganti email, jadi tidak masalah
                return true;
            }

            // Jika terdapat suatu nilai pada $user, berikan pesan error pertanda email sudah ada di db
            $this->load->library('form_validation');
            $this->form_validation->set_message('unique_email', '%s sudah digunakan');
            return false;
        }

        return true;
    }

    public function unique_no_telp($no_telp) {

        $user = $this->profile->where('no_telp', $no_telp)->first();
        $id   = $this->input->post('id'); // agar saat update data diri sendiri tidak error

        if ($user && $user->id != $id) {
            $this->form_validation->set_message('unique_no_telp', '%s sudah digunakan.');
            return FALSE;
        }

        return TRUE;
    }

}

/* End of file Profile.php */
