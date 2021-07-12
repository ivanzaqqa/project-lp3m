<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen extends CI_Controller
{
	public function index()
	{
		$this->load->view('templates/auth_header');
		$this->load->view('dosen/home');
		$this->load->view('templates/auth_footer');
	}

	public function penelitian()
	{
		$this->load->view('templates/auth_header');
		$this->load->view('dosen/menu');
		$this->load->view('templates/topbar');
		$this->load->view('dosen/penelitian/daftar_usulan_penelitian');
		$this->load->view('templates/auth_footer');
	}

	public function arsip_penelitian()
	{
		$this->load->view('templates/auth_header');
		$this->load->view('dosen/menu');
		$this->load->view('templates/topbar');
		$this->load->view('dosen/penelitian/arsip');
		$this->load->view('templates/auth_footer');
	}

	public function daftarusulanpenelitian()
	{
		$this->load->view('templates/auth_header');
		$this->load->view('dosen/menu');
		$this->load->view('templates/topbar');
		$this->load->view('dosen/penelitian/daftar_usulan_penelitian');
		$this->load->view('templates/auth_footer');
	}

	public function pengabdian_masyarakat()
	{

		$this->load->view('templates/auth_header');
		$this->load->view('dosen/menu');
		$this->load->view('templates/topbar');
		$this->load->view('dosen/pengabdian_masyarakat/daftar_usulan_pengabdian');
		$this->load->view('templates/auth_footer');
	}

	public function daftarusulanpengabdian()
	{

		$this->load->view('templates/auth_header');
		$this->load->view('dosen/menu');
		$this->load->view('templates/topbar');
		$this->load->view('dosen/pengabdian_masyarakat/daftar_usulan_pengabdian');
		$this->load->view('templates/auth_footer');
	}
	public function arsip_pengabdian()
	{

		$this->load->view('templates/auth_header');
		$this->load->view('dosen/menu');
		$this->load->view('templates/topbar');
		$this->load->view('dosen/pengabdian_masyarakat/arsip');
		$this->load->view('templates/auth_footer');
	}

	public function editprofile()
	{

		$this->load->view('templates/auth_header');
		$this->load->view('dosen/menu');
		$this->load->view('templates/topbar');
		$this->load->view('dosen/editprofile');
		$this->load->view('templates/auth_footer');
	}
}
