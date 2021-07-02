<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('auth_model');
    }

    public function login() {
        //code...
    }

    public function register() {
        //code...
    }
    
    public function proses_login() {
        //code...
    }
    
    public function proses_register() {
        //code...
    }

    public function logout() {
        //code...
    }
}