<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Operator extends CI_Controller
{
	public function index()
	{
		$data['dosen'] = $this->db->get_where('dosen', ['username' =>
		$this->session->userdata('username')])->row_array();
		$this->load->view('templates/auth_header');
		$this->load->view('operator/home', $data);
		$this->load->view('templates/auth_footer');
	}
}
