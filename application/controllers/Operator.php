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

	// Penelitian
	public function penelitian()
	{
		$this->load->view('templates/auth_header');
		$this->load->view('operator/menu');
		$this->load->view('templates/topbar');
		$this->load->view('operator/penelitian/daftarusulanpenelitian');
		$this->load->view('templates/auth_footer');
	}

	// End Penelitian


	// Pengabdian Masyarakat

	public function pengabdian_masyarakat()
	{
		$this->load->view('templates/auth_header');
		$this->load->view('operator/menu');
		$this->load->view('templates/topbar');
		$this->load->view('operator/pengabdian_masyarakat/pengabdian_masyarakat');
		$this->load->view('templates/auth_footer');
	}

	// End Pengabdian Masyarakat

	// Kelola Data
	public function keloladata()
	{
		$this->load->model('user_m');
		$data['row'] = $this->user_m->get();

		$this->load->view('templates/auth_header');
		$this->load->view('operator/menu');
		$this->load->view('templates/topbar');
		$this->load->view('operator/keloladata/datadosen', $data);
		$this->load->view('templates/auth_footer');
	}

	public function datadosen()
	{
		$this->load->model('user_m');
		$data['row'] = $this->user_m->get();

		$this->load->view('templates/auth_header');
		$this->load->view('operator/menu');
		$this->load->view('templates/topbar');
		$this->load->view('operator/keloladata/datadosen', $data);
		$this->load->view('templates/auth_footer');
	}

	public function detaildosen($id)
	{
		$this->load->model('user_m');
		$detail['row'] = $this->user_m->get($id);

		$this->load->view('templates/auth_header');
		$this->load->view('operator/menu');
		$this->load->view('templates/topbar');
		$this->load->view('operator/keloladata/detaildosen', $detail);
		$this->load->view('templates/auth_footer');
	}
	// End Kelola Data
}
