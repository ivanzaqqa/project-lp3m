<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Operator extends CI_Controller
{
	public function index()
	{
		$this->load->view('templates/auth_header');
		$this->load->view('operator/home');
		$this->load->view('templates/auth_footer');
	}

	public function keloladata()
	{
		$this->load->view('templates/auth_header');
		$this->load->view('operator/menu');
		$this->load->view('templates/topbar');
		$this->load->view('operator/keloladata/datadosen');
		$this->load->view('templates/auth_footer');
	}

	public function datadosen()
	{
		$this->load->view('templates/auth_header');
		$this->load->view('operator/menu');
		$this->load->view('templates/topbar');
		$this->load->view('operator/keloladata/datadosen');
		$this->load->view('templates/auth_footer');
	}

	public function detaildosen()
	{
		$this->load->view('templates/auth_header');
		$this->load->view('operator/menu');
		$this->load->view('templates/topbar');
		$this->load->view('operator/keloladata/detaildosen');
		$this->load->view('templates/auth_footer');
	}

	public function penelitian()
	{
		$this->load->view('templates/auth_header');
		$this->load->view('operator/menu');
		$this->load->view('templates/topbar');
		$this->load->view('operator/penelitian/daftarusulanpenelitian');
		$this->load->view('templates/auth_footer');
	}

	public function pengabdian_masyarakat()
	{
		$this->load->view('templates/auth_header');
		$this->load->view('operator/menu');
		$this->load->view('templates/topbar');
		$this->load->view('operator/pengabdian_masyarakat/pengabdian_masyarakat');
		$this->load->view('templates/auth_footer');
	}
}
