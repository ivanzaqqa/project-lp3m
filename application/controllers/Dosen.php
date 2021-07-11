<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen extends CI_Controller
{
	public function index()
	{
		$data['users'] = $this->db->get_where('users', ['username' =>
		$this->session->userdata('username')])->row_array();
		$this->load->view('templates/auth_header');
		$this->load->view('dosen/home', $data);
		$this->load->view('templates/auth_footer');
	}

	public function penelitian()
	{
		$data['users'] = $this->db->get_where('users', ['username' =>
		$this->session->userdata('username')])->row_array();
		$this->load->view('templates/auth_header');
		$this->load->view('dosen/menu');
		$this->load->view('templates/topbar', $data);
		$this->load->view('dosen/penelitian/daftar_usulan_penelitian');
		$this->load->view('templates/auth_footer');
	}

	public function arsip_penelitian()
	{
		$data['users'] = $this->db->get_where('users', ['username' =>
		$this->session->userdata('username')])->row_array();
		$this->load->view('templates/auth_header');
		$this->load->view('dosen/menu');
		$this->load->view('templates/topbar', $data);
		$this->load->view('dosen/penelitian/arsip');
		$this->load->view('templates/auth_footer');
	}

	public function daftarusulanpenelitian()
	{
		$data['users'] = $this->db->get_where('users', ['username' =>
		$this->session->userdata('username')])->row_array();
		$this->load->view('templates/auth_header');
		$this->load->view('dosen/menu');
		$this->load->view('templates/topbar', $data);
		$this->load->view('dosen/penelitian/daftar_usulan_penelitian');
		$this->load->view('templates/auth_footer');
	}

	public function pengabdian_masyarakat()
	{
		$data['users'] = $this->db->get_where('users', ['username' =>
		$this->session->userdata('username')])->row_array();
		$this->load->view('templates/auth_header');
		$this->load->view('dosen/menu');
		$this->load->view('templates/topbar', $data);
		$this->load->view('dosen/pengabdian_masyarakat/daftar_usulan_pengabdian');
		$this->load->view('templates/auth_footer');
	}

	public function daftarusulanpengabdian()
	{
		$data['users'] = $this->db->get_where('users', ['username' =>
		$this->session->userdata('username')])->row_array();
		$this->load->view('templates/auth_header');
		$this->load->view('dosen/menu');
		$this->load->view('templates/topbar', $data);
		$this->load->view('dosen/pengabdian_masyarakat/daftar_usulan_pengabdian');
		$this->load->view('templates/auth_footer');
	}
	public function arsip_pengabdian()
	{
		$data['users'] = $this->db->get_where('users', ['username' =>
		$this->session->userdata('username')])->row_array();
		$this->load->view('templates/auth_header');
		$this->load->view('dosen/menu');
		$this->load->view('templates/topbar', $data);
		$this->load->view('dosen/pengabdian_masyarakat/arsip');
		$this->load->view('templates/auth_footer');
	}

	public function editprofile()
	{
		$data['users'] = $this->db->get_where('users', ['username' =>
		$this->session->userdata('username')])->row_array();
		$this->load->view('templates/auth_header');
		$this->load->view('dosen/menu');
		$this->load->view('templates/topbar', $data);
		$this->load->view('dosen/editprofile');
		$this->load->view('templates/auth_footer');
	}
}
