<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_not_login();
		check_operator();
		$this->load->model('penelitian_m');
	}
	public function index()
	{
		$this->load->view('templates/auth_header');
		$this->load->view('dosen/home');
		$this->load->view('templates/auth_footer');
	}

	// DAFTAR USULAN PENELITIAN
	public function daftarusulanpenelitian()
	{
		$periode['row'] = $this->penelitian_m->get_periode();
		$this->load->view('templates/auth_header');
		$this->load->view('dosen/menu');
		$this->load->view('templates/topbar');
		$this->load->view('dosen/penelitian/daftar_usulan_penelitian', $periode);
		$this->load->view('templates/auth_footer');
	}

	public function proses_daftarusulanpenelitian()
	{
		if (isset($_POST['submit'])) {
			$this->load->library('form_validation');
			$this->form_validation->set_rules('periodepengajuan', 'Periode Pengajuan', 'required');
			$this->form_validation->set_rules('judul_penelitian', 'Judul Penelitian', 'required');
			$this->form_validation->set_rules('matkul_diampu', 'Matkul Yang Diampu', 'required');
			$this->form_validation->set_rules('kelompok_riset', 'Kelompok Riset', 'required');
			$this->form_validation->set_rules('mhs_terlibat', 'Mahasiswa Yang Dilibatkan', 'required');

			$this->form_validation->set_message('required', '%s Masih Kosong!!');
			$this->form_validation->set_error_delimiters('<span class="help-block text-danger">', '</span>');

			$config['upload_path']          = './upload/penelitian';
			$config['allowed_types']        = 'pdf';
			$config['max_size']            = 2048;
			$config['encrypt_name']         = TRUE;
			$this->load->library('upload', $config);

			if ($this->form_validation->run()) {
				$id = $this->input->post('id');
				$id_periode = $this->input->post('periodepengajuan');
				$judul_penelitian = $this->input->post('judul_penelitian', TRUE);
				$matkul_diampu = $this->input->post('matkul_diampu', TRUE);
				$kelompok_riset = $this->input->post('kelompok_riset', TRUE);
				$mhs_terlibat = $this->input->post('mhs_terlibat', TRUE);
				if (!empty($_FILES['file_proposal']['name'])) {
					$this->upload->do_upload('file_proposal');
					$file_proposal = $this->upload->data();
					$file_proposal = $file_proposal['file_name'];
				}
				if (!empty($_FILES['file_rps']['name'])) {
					$this->upload->do_upload('file_rps');
					$file_rps = $this->upload->data();
					$file_rps = $file_rps['file_name'];
				}
				if (!empty($_FILES['form_integrasi']['name'])) {
					$this->upload->do_upload('form_integrasi');
					$form_integrasi = $this->upload->data();
					$form_integrasi = $form_integrasi['file_name'];
				}
				$data = [
					'id' => $id,
					'id_periode' => $id_periode,
					'judul_penelitian' => $judul_penelitian,
					'matkul_diampu' => $matkul_diampu,
					'kelompok_riset' => $kelompok_riset,
					'mhs_terlibat' => $mhs_terlibat,
					'id_status' => "3",
					'file_proposal' => $file_proposal,
					'file_rps' => $file_rps,
					'form_integrasi' => $form_integrasi,
				];
				$insert = $this->db->insert('tbl_penelitian', $data);
				if ($insert) {
					$this->session->set_flashdata('successalert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
						<strong>Data Usulan Penelitian Berhasil Disubmit.</strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>');
					redirect('dosen/daftarusulanpenelitian');
				}
			} else {
				$this->daftarusulanpenelitian();
			}
		} else {
			$this->daftarusulanpenelitian();
		}
	}

	// FOR DOWNLOAD FILE PDF USULAN PENELITIAN
	public function download_dpu_proposal($id)
	{
		$this->load->helper('download');
		$fileinfo = $this->penelitian_m->download($id);
		$file = 'upload/penelitian/' . $fileinfo['file_proposal'];
		force_download($file, NULL);
	}

	public function download_dpu_rps($id)
	{
		$this->load->helper('download');
		$fileinfo = $this->penelitian_m->download($id);
		$file = 'upload/penelitian/' . $fileinfo['file_rps'];
		force_download($file, NULL);
	}

	public function download_dpu_form($id)
	{
		$this->load->helper('download');
		$fileinfo = $this->penelitian_m->download($id);
		$file = 'upload/penelitian/' . $fileinfo['form_integrasi'];
		force_download($file, NULL);
	}

	public function arsippenelitian()
	{
		$arsip['row'] = $this->penelitian_m->get_penelitian_by_id();
		$this->load->view('templates/auth_header');
		$this->load->view('dosen/menu');
		$this->load->view('templates/topbar');
		$this->load->view('dosen/penelitian/arsip', $arsip);
		$this->load->view('templates/auth_footer');
	}


	// PENGABDIAN MASYARAKAT
	public function daftarusulanpengabdian()
	{
		$periode['row'] = $this->penelitian_m->get_periode();
		$this->load->view('templates/auth_header');
		$this->load->view('dosen/menu');
		$this->load->view('templates/topbar');
		$this->load->view('dosen/pengabdian_masyarakat/daftar_usulan_pengabdian', $periode);
		$this->load->view('templates/auth_footer');
	}

	public function proses_daftarusulanpengabdian()
	{
		if (isset($_POST['submit'])) {
			$this->load->library('form_validation');
			$this->form_validation->set_rules('periodepengajuan', 'Periode Pengajuan', 'required');
			$this->form_validation->set_rules('judul_pengabmas', 'Judul Penelitian', 'required');
			$this->form_validation->set_rules('matkul_diampu', 'Matkul Yang Diampu', 'required');
			$this->form_validation->set_rules('kelompok_riset', 'Kelompok Riset', 'required');
			$this->form_validation->set_rules('mhs_terlibat', 'Mahasiswa Yang Dilibatkan', 'required');
			$this->form_validation->set_message('required', '%s Masih Kosong!!');
			$this->form_validation->set_error_delimiters('<span class="help-block text-danger">', '</span>');

			$config['upload_path']          = './upload/pengabdian_masyarakat';
			$config['allowed_types']        = 'pdf';
			$config['max_size']            = 2048;
			$config['encrypt_name']         = TRUE;
			$this->load->library('upload', $config);
			if (!empty($_FILES['file_proposal']['name'])) {
				$this->upload->do_upload('file_proposal');
				$file_proposal = $this->upload->data();
				$file_proposal = $file_proposal['file_name'];
			}
			if (!empty($_FILES['file_rps']['name'])) {
				$this->upload->do_upload('file_rps');
				$file_rps = $this->upload->data();
				$file_rps = $file_rps['file_name'];
			}
			if (!empty($_FILES['form_integrasi']['name'])) {
				$this->upload->do_upload('form_integrasi');
				$form_integrasi = $this->upload->data();
				$form_integrasi = $form_integrasi['file_name'];
			}
			if ($this->form_validation->run()) {
				$id = $this->input->post('id');
				$id_periode = $this->input->post('periodepengajuan');
				$judul_pengabmas = $this->input->post('judul_pengabmas', TRUE);
				$matkul_diampu = $this->input->post('matkul_diampu', TRUE);
				$kelompok_riset = $this->input->post('kelompok_riset', TRUE);
				$mhs_terlibat = $this->input->post('mhs_terlibat', TRUE);
				$data = [
					'id' => $id,
					'id_periode' => $id_periode,
					'judul_pengabmas' => $judul_pengabmas,
					'matkul_diampu' => $matkul_diampu,
					'kelompok_riset' => $kelompok_riset,
					'mhs_terlibat' => $mhs_terlibat,
					'id_status' => "3",
					'file_proposal' => $file_proposal,
					'file_rps' => $file_rps,
					'form_integrasi' => $form_integrasi
				];
				$insert = $this->db->insert('tbl_pengabmas', $data);
				if ($insert) {
					$this->session->set_flashdata('successalert', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
						<strong>Data Pendaftaran Pangabdian Masyarakat Berhasil Disubmit.</strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>');
					redirect('dosen/daftarusulanpenelitian');
				}
			} else {
				$this->daftarusulanpenelitian();
			}
		} else {
			$this->daftarusulanpenelitian();
		}
	}

	// FOR DOWNLOAD FILE PDF PENGABDIAN MASYARAKAT
	public function downloadpengabmasproposal($id)
	{
		$this->load->helper('download');
		$fileinfo = $this->pengabmas_m->download($id);
		$file = 'upload/pengabdian_masyarakat/' . $fileinfo['file_proposal'];
		force_download($file, NULL);
	}

	public function downloadpengabmasrps($id)
	{
		$this->load->helper('download');
		$fileinfo = $this->pengabmas_m->download($id);
		$file = 'upload/pengabdian_masyarakat/' . $fileinfo['file_rps'];
		force_download($file, NULL);
	}

	public function downloadpengabmasform($id)
	{
		$this->load->helper('download');
		$fileinfo = $this->pengabmas_m->download($id);
		$file = 'upload/pengabdian_masyarakat/' . $fileinfo['form_integrasi'];
		force_download($file, NULL);
	}

	public function arsippengabdian()
	{
		$arsip['row'] = $this->pengabmas_m->get_pengabmas_by_id();
		$this->load->view('templates/auth_header');
		$this->load->view('dosen/menu');
		$this->load->view('templates/topbar');
		$this->load->view('dosen/pengabdian_masyarakat/arsip', $arsip);
		$this->load->view('templates/auth_footer');
	}

	public function profiledos()
	{
		$this->load->view('templates/auth_header');
		$this->load->view('dosen/menu');
		$this->load->view('templates/topbar');
		$this->load->view('profile/profiledos');
		$this->load->view('templates/auth_footer');
	}

	public function detail_profiledos()
	{
		$this->load->view('templates/auth_header');
		$this->load->view('dosen/menu');
		$this->load->view('templates/topbar');
		$this->load->view('profile/detail_profile');
		$this->load->view('templates/auth_footer');
	}

	public function editprofile()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nidn', 'Nidn', 'required');
		$this->form_validation->set_rules('id_sinta', 'ID sinta', 'required');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('programstudi', 'Program Studi', 'required');
		$this->form_validation->set_rules('fakultas', 'Fakultas', 'required');
		$this->form_validation->set_error_delimiters('<span class="help-block text-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$query = $this->user_m->get();
			if ($query->num_rows() > 0) {
				$user = $query->row();
				$data = array(
					'page' => 'submit_edit',
					'row' => $user,
				);
				$this->load->view('templates/auth_header');
				$this->load->view('dosen/menu');
				$this->load->view('templates/topbar');
				$this->load->view('profile/editprofile', $data);
				$this->load->view('templates/auth_footer');
			}
		} else {
			echo "<script>alert(Data tidak ditemukan!);";
			echo "window.location='" . site_url('dosen/editprofile') . "';</script>";
		}
	}

	public function proseseditprofile()
	{
		$config['upload_path']        = './assets/users/';
		$config['allowed_types']     = 'jpg|png|jpeg';
		$config['max_size']            = 2048;

		$this->load->library('upload', $config);

		$post = $this->input->post(null, TRUE);
		if (isset($_POST['submit_edit'])) {
			if (@$_FILES['image']['name'] != null) {
				if ($this->upload->do_upload('image')) {

					$dosen = $this->fungsi->user_login()->image;
					if ($dosen->image != null) {
						$target_file = './assets/users/' . $dosen->image;
						unlink($target_file);
					}

					$post['image'] = $this->upload->data('file_name');
					$this->user_m->edit_profile($post);
					if ($this->db->affected_rows() > 0) {
						$this->session->set_flashdata('successedit', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Data anda berhasil diupdate.</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>');
					}
					redirect('dosen/profiledos');
				} else {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('erroredit', $error);
					redirect('dosen/editprofile');
				}
			} else {
				$post['image'] = null;
				$this->user_m->edit_profile($post);
				if ($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('successedit', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Data anda berhasil diupdate.</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>');
				}
				redirect('dosen/profiledos');
			}
		}
	}

	public function delpenelitian($id)
	{
		// $this->load->helper('download');
		// $fileinfo = $this->penelitian_m->download($id);
		// $file = 'upload/penelitian/' . $fileinfo['file_proposal'];
		// force_download($file, NULL);

		$fileinfo = $this->penelitian_m->download($id);
		if ($fileinfo->file_proposal != null) {
			$file = 'upload/penelitian/' . $fileinfo['file_proposal'];
			unlink($file);
		}
		if ($fileinfo->file_rps != null) {
			$file = 'upload/penelitian/' . $fileinfo['file_rps'];
			unlink($file);
		}
		if ($fileinfo->form_integrasi != null) {
			$file = 'upload/penelitian/' . $fileinfo['form_integrasi'];
			unlink($file);
		}

		$this->penelitian_m->delete($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('successdel', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Data anda berhasil dihapus.</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>');
		} else {
			$this->session->set_flashdata('errordel', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Data anda gagal dihapus.</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>');
		}
		redirect('dosen/arsippenelitian');
	}

	public function insentif_publikasi()
	{
		$this->load->view('templates/auth_header');
		$this->load->view('dosen/menu');
		$this->load->view('templates/topbar');
		$this->load->view('dosen/insentif_publikasi/index');
		$this->load->view('templates/auth_footer');
	}

	public function submit_jurnal_prosiding()
	{
		$this->load->view('templates/auth_header');
		$this->load->view('dosen/menu');
		$this->load->view('templates/topbar');
		$this->load->view('dosen/insentif_publikasi/submit_prosiding');
		$this->load->view('templates/auth_footer');
	}

	public function arsip_jurnal_prosiding()
	{
		$this->load->view('templates/auth_header');
		$this->load->view('dosen/menu');
		$this->load->view('templates/topbar');
		$this->load->view('dosen/insentif_publikasi/arsip_prosiding');
		$this->load->view('templates/auth_footer');
	}

	public function edit_jurnal_prosiding()
	{
		$this->load->view('templates/auth_header');
		$this->load->view('dosen/menu');
		$this->load->view('templates/topbar');
		$this->load->view('dosen/insentif_publikasi/edit_prosiding');
		$this->load->view('templates/auth_footer');
	}

	public function detail_jurnal_prosiding()
	{
		$this->load->view('templates/auth_header');
		$this->load->view('dosen/menu');
		$this->load->view('templates/topbar');
		$this->load->view('dosen/insentif_publikasi/detail_prosiding');
		$this->load->view('templates/auth_footer');
	}

	public function submit_spesial_scopus()
	{
		$this->load->view('templates/auth_header');
		$this->load->view('dosen/menu');
		$this->load->view('templates/topbar');
		$this->load->view('dosen/insentif_publikasi/submit_spesial_scopus');
		$this->load->view('templates/auth_footer');
	}
	public function arsip_spesial_scopus()
	{
		$this->load->view('templates/auth_header');
		$this->load->view('dosen/menu');
		$this->load->view('templates/topbar');
		$this->load->view('dosen/insentif_publikasi/arsip_spesial_scopus');
		$this->load->view('templates/auth_footer');
	}
	public function edit_spesial_scopus()
	{
		$this->load->view('templates/auth_header');
		$this->load->view('dosen/menu');
		$this->load->view('templates/topbar');
		$this->load->view('dosen/insentif_publikasi/edit_spesial_scopus');
		$this->load->view('templates/auth_footer');
	}
	public function detail_spesial_scopus()
	{
		$this->load->view('templates/auth_header');
		$this->load->view('dosen/menu');
		$this->load->view('templates/topbar');
		$this->load->view('dosen/insentif_publikasi/detail_spesial_scopus');
		$this->load->view('templates/auth_footer');
	}

	public function ganti_password()
	{
		$this->load->view('templates/auth_header');
		$this->load->view('dosen/menu');
		$this->load->view('templates/topbar');
		$this->load->view('profile/ganti_pass');
		$this->load->view('templates/auth_footer');
	}
}
