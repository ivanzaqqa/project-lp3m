<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Operator extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('user_m');
	}
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
		$data['row'] = $this->user_m->get();

		$this->load->view('templates/auth_header');
		$this->load->view('operator/menu');
		$this->load->view('templates/topbar');
		$this->load->view('operator/keloladata/datadosen', $data);
		$this->load->view('templates/auth_footer');
	}

	public function datadosen()
	{
		$data['row'] = $this->user_m->get();

		$this->load->view('templates/auth_header');
		$this->load->view('operator/menu');
		$this->load->view('templates/topbar');
		$this->load->view('operator/keloladata/datadosen', $data);
		$this->load->view('templates/auth_footer');
	}

	public function detaildosen($id)
	{
		$detail['row'] = $this->user_m->get($id);

		$this->load->view('templates/auth_header');
		$this->load->view('operator/menu');
		$this->load->view('templates/topbar');
		$this->load->view('operator/keloladata/detaildosen', $detail);
		$this->load->view('templates/auth_footer');
	}

	public function tambah_dosen()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nidn', 'Nidn', 'required');
		$this->form_validation->set_rules('id_sinta', 'ID sinta', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'required|matches[password]');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('programstudi', 'Program Studi', 'required');
		$this->form_validation->set_rules('fakultas', 'Fakultas', 'required');
		$this->form_validation->set_rules('role', 'Role', 'required');

		$this->form_validation->set_message('matches', '%s Tidak sesuai dengan password, harap ulangi!');
		$this->form_validation->set_message('required', '%s Masih Kosong!!');
		$this->form_validation->set_error_delimiters('<span class="help-block text-danger">', '</span>');

		$data['row'] = $this->user_m->get_role();
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/auth_header');
			$this->load->view('operator/menu');
			$this->load->view('templates/topbar');
			$this->load->view('operator/keloladata/tambahdosen', $data);
			$this->load->view('templates/auth_footer');
		} else {
			$post = $this->input->post(null,  TRUE);
			$this->user_m->tambah_dosen($post);
			if ($this->db->affected_rows() > 0) {
				echo "<script>alert('Data Dosen Baru Berhasil Di Simpan');</script>";
			}
			echo "<script>window.location='" . base_url('operator/datadosen') . "';</script>";
		}
	}

	public function deldos($id)
	{
		// $data['row'] = $this->user_m->get($id);
		$this->user_m->deldos($id);
		redirect('operator/datadosen');
	}
	// End Kelola Data
}
