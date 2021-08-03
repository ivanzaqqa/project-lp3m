<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    // public function __construct()
    // {
    //     parent::__construct();
    //     $this->load->library('form_validation');
    // }

    // public function index()
    // {
    //     $this->form_validation->set_rules('username', 'Username', 'trim|required');
    //     $this->form_validation->set_rules('password', 'Password', 'trim|required');
    //     if ($this->form_validation->run() == false) {
    //         $this->load->view('templates/auth_header');
    //         $this->load->view('auth/login');
    //         $this->load->view('templates/auth_footer');
    //     } else {
    //         //validation success
    //         $this->proccess();
    //     }
    // }

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

    // private function _login()
    // {
    //     $username = $this->input->post('username');
    //     $password = $this->input->post('password');

    //     $users = $this->db->get_where('users', ['username' => $username])->row_array();

    //     //jika usernya ada
    //     if ($users) {
    //         //jika usernya aktif

    //         //cek password
    //         if (hash_verified($password, $users['password'])) {
    //             $data = [
    //                 'username' => $users['username'],
    //                 'id_role' => $users['id_role']
    //             ];
    //             $this->session->set_userdata($data);
    //             //check id role
    //             if ($users['id_role'] == 1) {
    //                 redirect('dosen');
    //             } elseif ($users['id_role'] == 2) {
    //                 redirect('operator');
    //             } else {
    //                 echo 'Anda Bukan Dosen atau Operator!';
    //             }
    //         } else {
    //             $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');
    //             redirect('auth');
    //         }
    //     } else {
    //         $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Operator dengan username tersebut tidak ada!</div>');
    //         redirect('auth');
    //     }
    // }

    public function logout()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('id_role');

        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda berhasil logout!</div>');
        redirect('auth');
    }

}
