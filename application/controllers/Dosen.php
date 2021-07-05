<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen extends CI_Controller
{
	public function index()
	{
		$data['dosen'] = $this->db->get_where('dosen', ['username' =>
		$this->session->userdata('username')])->row_array();
		$this->load->view('templates/auth_header');
		$this->load->view('dosen/home', $data);
		$this->load->view('templates/auth_footer');
	}

	public function dashboard()
	{
		$this->load->view('templates/auth_header');
		$this->load->view('dosen/menu_sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('templates/content');
		$this->load->view('templates/auth_footer');
	}

	public function arsip()
	{
		$this->load->view('templates/auth_header');
		$this->load->view('dosen/menu_sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('dosen/arsip');
		$this->load->view('templates/auth_footer');
	}

	public function daftarusulanpenelitian()
	{
		$this->load->view('templates/auth_header');
		$this->load->view('dosen/menu_sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('dosen/daftar_usulan_penelitian');
		$this->load->view('templates/auth_footer');
	}
}
