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
		$data['users'] = $this->db->get_where('users', ['username' =>
		$this->session->userdata('username')])->row_array();
		$this->load->view('templates/auth_header');
		$this->load->view('operator/menu');
		$this->load->view('templates/topbar', $data);
		$this->load->view('operator/keloladata/datadosen');
		$this->load->view('templates/auth_footer');
	}

	public function datadosen()
	{
		$data['users'] = $this->db->get_where('users', ['username' =>
		$this->session->userdata('username')])->row_array();
		$this->load->view('templates/auth_header');
		$this->load->view('operator/menu');
		$this->load->view('templates/topbar', $data);
		$this->load->view('operator/keloladata/datadosen');
		$this->load->view('templates/auth_footer');
	}

	public function detaildosen()
	{
		$data['users'] = $this->db->get_where('users', ['username' =>
		$this->session->userdata('username')])->row_array();
		$this->load->view('templates/auth_header');
		$this->load->view('operator/menu');
		$this->load->view('templates/topbar', $data);
		$this->load->view('operator/keloladata/detaildosen');
		$this->load->view('templates/auth_footer');
	}

	public function penelitian()
	{
		$data['users'] = $this->db->get_where('users', ['username' =>
		$this->session->userdata('username')])->row_array();
		$this->load->view('templates/auth_header');
		$this->load->view('operator/menu');
		$this->load->view('templates/topbar', $data);
		$this->load->view('operator/penelitian/daftarusulanpenelitian');
		$this->load->view('templates/auth_footer');
	}

	public function pengabdian_masyarakat()
	{
		$data['users'] = $this->db->get_where('users', ['username' =>
		$this->session->userdata('username')])->row_array();
		$this->load->view('templates/auth_header');
		$this->load->view('operator/menu');
		$this->load->view('templates/topbar', $data);
		$this->load->view('operator/pengabdian_masyarakat/pengabdian_masyarakat');
		$this->load->view('templates/auth_footer');
	}
}
