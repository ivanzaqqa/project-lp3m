<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Operator extends CI_Controller
{
	public function index()
	{
		$data['users'] = $this->db->get_where('users', ['username' =>
		$this->session->userdata('username')])->row_array();
		$this->load->view('templates/auth_header');
		$this->load->view('operator/home', $data);
		$this->load->view('templates/auth_footer');
	}

	public function keloladata()
	{
		$this->load->view('templates/auth_header');
		$this->load->view('operator/keloladata/menu');
		$this->load->view('templates/topbar');
		$this->load->view('templates/content');
		$this->load->view('templates/auth_footer');
	}

	public function datadosen()
	{
		$this->load->view('templates/auth_header');
		$this->load->view('operator/keloladata/menu');
		$this->load->view('templates/topbar');
		$this->load->view('operator/keloladata/datadosen');
		$this->load->view('templates/auth_footer');
	}

	public function detaildosen()
	{
		$this->load->view('templates/auth_header');
		$this->load->view('operator/keloladata/menu');
		$this->load->view('templates/topbar');
		$this->load->view('operator/keloladata/detaildosen');
		$this->load->view('templates/auth_footer');
	}
}
