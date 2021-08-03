<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index() {
        check_already_login_dosen();
        check_already_login_operator();
        $this->load->view('templates/auth_header');
        $this->load->view('auth/login');
        $this->load->view('templates/auth_footer');
    }

    public function process() {
        $post = $this->input->post(null, TRUE);

        if (isset($post['login'])) {
            $this->load->model('user_m');
            $query = $this->user_m->login($post);
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $params = array(
                    'id' => $row->id,
                    'id_role' => $row->id_role
                );
                $this->session->set_userdata($params);
                if ($row->id_role == 1) {
                    redirect('dosen');
                } elseif ($row->id_role == 2) {
                    redirect('operator');
                }
            } else {
                echo "<script>alert('gagal login'); window.location='".site_url('auth')."';</script>";
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('id_role');

        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda berhasil logout!</div>');
        redirect('auth');
    }

}
