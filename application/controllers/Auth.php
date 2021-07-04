<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/auth_header');
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            //validation success
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $dosen = $this->db->get_where('dosen', ['username' => $username])->row_array();

        //jika usernya ada
        if ($dosen) {
            //jika usernya aktif

            //cek password
            if (password_verify($password, $dosen['password'])) {
                $data = [
                    'username' => $dosen['username'],
                    'id_role' => $dosen['id_role']
                ];
                $this->session->set_userdata($data);
                //check id role
                if ($dosen['id_role'] == 1) {
                    redirect('dosen');
                } elseif ($dosen['id_role'] == 2) {
                    redirect('operator');
                } else {
                    echo 'Anda Bukan Dosen atau Operator!';
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Operator dengan username tersebut tidak ada!</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('id_role');

        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda berhasil logout!</div>');
        redirect('auth');
    }
}
