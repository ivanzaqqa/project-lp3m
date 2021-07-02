<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Operator extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['dosen'] = $this->db->get_where('dosen', ['username' => $this->session->userdata('username')])->row_array();
		echo 'Selamat Datang ' . $data['dosen']['name'];
		// $this->load->view('dashboard_template');
	}
}
