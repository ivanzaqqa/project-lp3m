<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Operator extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('user_m');
		$this->load->model('pengabmas_m');
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
		$data['row'] = $this->pengabmas_m->get_pengabmas();
		$this->load->view('templates/auth_header');
		$this->load->view('operator/menu');
		$this->load->view('templates/topbar');
		$this->load->view('operator/pengabdian_masyarakat/pengabdian_masyarakat', $data);
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

	public function detaildosen($user_id)
	{
		$detail['row'] = $this->user_m->get($user_id);

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
	public function editdos($user_id)
	{
		$query = $this->user_m->get($user_id);
		if ($query->num_rows() > 0) {
			$user = $query->row();
			$query_role = $this->user_m->get_role();
			$role[null] = '- Pilih -';
			foreach ($query_role->result() as $roleid) {
				$role[$roleid->id_role] = $roleid->role;
			}
			$data = array(
				'page' => 'submit_edit',
				'row' => $user,
				'role' => $query_role,
				'user_role' => $role, 'selectedrole' => $user->id_role,
			);
			$this->load->view('templates/auth_header');
			$this->load->view('operator/menu');
			$this->load->view('templates/topbar');
			$this->load->view('operator/keloladata/editdosen', $data);
			$this->load->view('templates/auth_footer');
		} else {
			echo "<script>alert(Data tidak ditemukan!);";
			echo "window.location='" . site_url('operator/editdos') . "';</script>";
		}
	}
	public function proses()
	{
		$config['upload_path']          = './assest/users/';
		$config['allowed_types']        = 'jpg|png|jpeg';
		$this->load->library('upload', $config);

		$post = $this->input->post(null, TRUE);
		if (isset($_POST['submit_edit'])) {
			$this->user_m->edit_dosen($post);
			if (@$_FILES['image']['name'] != null) {
				if ($this->upload->do_upload('image')) {
					$user_image = $this->user_m->get($post['id'])->row();
					if ($user_image->image !=  null) {
						$target_file = './assest/users/' . $user_image->image;
						unlink($target_file);
					}
					$post['image'] = $this->upload->data('file_name');
					$this->user_m->edit_dosen($post);
					if ($this->db->affected_rows() > 0) {
						$this->session->set_flashdata('msg', 'Data Berhasil disimpan');
					}
					redirect('operator/datadosen');
				} else {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('msg', $error);
					redirect('operator/editdos');
				}
			} else {
				$post['image'] = null;
				$this->user_m->edit_dosen($post);
				if ($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('msg', 'Data Berhasil disimpan');
				}
				redirect('operator/datadosen');
			}
		}
	}
	//edit dosen belum selesai


	public function deldos($user_id)
	{
		$users = $this->user_m->get($user_id)->row();
		if ($users->image != null) {
			$target_file = './assets/users/' . $users->image;
			unlink($target_file);
		}
		$this->user_m->deldos($user_id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('successdel', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Data Dosen Berhasil Dihapus.</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>');
		}
		redirect('operator/datadosen');
	}
	// End Kelola Data
}
