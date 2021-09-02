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
		$this->load->model('pengabmas_m');
		$this->load->model('jurpros_m');
		$this->load->model('specscop_m');
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

	// DOWNLOAD FILE PDF USULAN PENELITIAN
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

	public function delpenelitian($id)
	{
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

			if ($this->form_validation->run()) {
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

	// DOWNLOAD FILE PDF PENGABDIAN MASYARAKAT
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

	// PROFILE DOSEN
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

	public function ganti_password()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'required|matches[password]');
		$this->form_validation->set_error_delimiters('<span class="help-block text-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$query = $this->user_m->get();
			if ($query->num_rows() > 0) {
				$user = $query->row();
				$data = array(
					'page' => 'edit',
					'row' => $user,
				);
				$this->load->view('templates/auth_header');
				$this->load->view('dosen/menu');
				$this->load->view('templates/topbar');
				$this->load->view('profile/ganti_pass', $data);
				$this->load->view('templates/auth_footer');
			}
		} else {
			echo "<script>alert('Data tidak ditemukan');";
			echo "window.location='" . site_url('dosen/profiledos') . "';</script>";
		}
	}

	public function proses_ganti_password()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['edit'])) {
			$this->user_m->ganti_password($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('successedit', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data dosen berhasil diupdate.</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>');
			}
			redirect('dosen/profiledos');
		} else {
			$this->session->set_flashdata('erroredit', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Password anda gagal diupdate.</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>');
		}
		redirect('dosen/profiledos');
	}


	// INSENTIF PUBLIKASI
	public function insentif_publikasi()
	{
		$this->load->view('templates/auth_header');
		$this->load->view('dosen/menu');
		$this->load->view('templates/topbar');
		$this->load->view('dosen/insentif_publikasi/index');
		$this->load->view('templates/auth_footer');
	}


	// JURNAL ATAU PROSIDING
	public function submit_jurnal_prosiding()
	{
		$pilih_jurpros['row'] = $this->jurpros_m->get_pilih_jurpros();
		$this->load->view('templates/auth_header');
		$this->load->view('dosen/menu');
		$this->load->view('templates/topbar');
		$this->load->view('dosen/insentif_publikasi/submit_prosiding', $pilih_jurpros);
		$this->load->view('templates/auth_footer');
	}

	public function proses_submit_jurnal_pros()
	{
		if (isset($_POST['submit'])) {
			$this->load->library('form_validation');
			$this->form_validation->set_rules('judul_artikel', 'Periode Pengajuan', 'required');
			$this->form_validation->set_rules('url_artikel', 'Judul Penelitian', 'required');

			$this->form_validation->set_message('required', '%s Masih Kosong!!');
			$this->form_validation->set_error_delimiters('<span class="help-block text-danger">', '</span>');

			$config['upload_path']          = './upload/insentif_publikasi/jurnal_prosiding/';
			$config['allowed_types']        = 'pdf';
			$config['max_size']            = 5000;
			$config['encrypt_name']         = TRUE;
			$this->load->library('upload', $config);

			if ($this->form_validation->run()) {
				$id = $this->input->post('id');
				$id_jurnal_pros = $this->input->post('pilih_jurpros');
				$judul_artikel = $this->input->post('judul_artikel', TRUE);
				$url_artikel = $this->input->post('url_artikel', TRUE);
				if (!empty($_FILES['file_publikasi']['name'])) {
					$this->upload->do_upload('file_publikasi');
					$file_publikasi = $this->upload->data();
					$file_publikasi = $file_publikasi['file_name'];
				}
				$data = [
					'id' => $id,
					'id_jurnal_pros' => $id_jurnal_pros,
					'judul_artikel' => $judul_artikel,
					'url_artikel' => $url_artikel,
					'id_status' => "3",
					'file_publikasi' => $file_publikasi,
					'file_berita_acara' => null,
				];
				$insert = $this->db->insert('insentif_jurpros', $data);
				if ($insert) {
					$this->session->set_flashdata('successadd', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Data Insentif Jurnal Prosiding Berhasil Disubmit.</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
					redirect('dosen/submit_jurnal_prosiding');
				}
			} else {
				$this->submit_jurnal_prosiding();
			}
		} else {
			$this->submit_jurnal_prosiding();
		}
	}

	// DOWNLOAD FILE PDF JURNAL ATAU PROSIDING
	public function download_dpu_publikasi($id)
	{
		$this->load->helper('download');
		$fileinfo = $this->jurpros_m->download($id);
		$file = '/upload/insentif_publikasi/jurnal_prosiding/' . $fileinfo['file_publikasi'];
		force_download($file, NULL);
	}

	public function arsip_jurnal_prosiding()
	{
		$arsip['row'] = $this->jurpros_m->get_jurpros_by_id();
		$this->load->view('templates/auth_header');
		$this->load->view('dosen/menu');
		$this->load->view('templates/topbar');
		$this->load->view('dosen/insentif_publikasi/arsip_prosiding', $arsip);
		$this->load->view('templates/auth_footer');
	}

	public function edit_jurnal_prosiding($id)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('judul_artikel', 'Judul Artikel', 'required');
		$this->form_validation->set_rules('url_artikel', 'URL Artikel', 'required');

		$this->form_validation->set_error_delimiters('<span class="help-block text-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$query = $this->jurpros_m->get_jurpros($id);
			if ($query->num_rows() > 0) {
				$jurpros = $query->row();
				$query_pilih_jurpros = $this->jurpros_m->get_pilih_jurpros();
				$nama_jurnal[null] = '- Pilih -';
				foreach ($query_pilih_jurpros->result() as $jurnal_pros_id) {
					$nama_jurnal[$jurnal_pros_id->id_jurnal_pros] = $jurnal_pros_id->nama_jurnal;
				}
				$data = array(
					'page' => 'edit',
					'row' => $jurpros,
					'nama_jurnal' => $query_pilih_jurpros,
					'pilih_jurnal_prosiding' => $nama_jurnal, 'selectednama_jurnal' => $jurpros->id_jurnal_pros,
				);
				$this->load->view('templates/auth_header');
				$this->load->view('dosen/menu');
				$this->load->view('templates/topbar');
				$this->load->view('dosen/insentif_publikasi/edit_prosiding', $data);
				$this->load->view('templates/auth_footer');
			}
		} else {
			echo "<script>alert('Data tidak ditemukan');";
			echo "window.location='" . site_url('dosen/arsip_prosiding') . "';</script>";
		}
	}

	public function proses_edit_jurnal_prosiding()
	{
		$config['upload_path']          = './upload/insentif_publikasi/jurnal_prosiding/';
		$config['allowed_types']        = 'pdf';
		$config['max_size']            = 5000;
		$config['encrypt_name']         = TRUE;

		$this->load->library('upload', $config);

		$post = $this->input->post(null, TRUE);
		if (isset($_POST['edit'])) {
			if (@$_FILES['file_publikasi']['name'] != null) {
				if ($this->upload->do_upload('file_publikasi')) {

					$jurpros = $this->jurpros_m->get_jurpros($post['id_insentif_jurpros'])->row();
					if ($jurpros->file_publikasi != null) {
						$target_file = './upload/insentif_publikasi/jurnal_prosiding/' . $jurpros->file_publikasi;
						unlink($target_file);
					}

					$post['file_publikasi'] = $this->upload->data('file_name');
					$this->jurpros_m->edit($post);
					if ($this->db->affected_rows() > 0) {
						$this->session->set_flashdata('successedit', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data insentif jurnal atau prosiding berhasil diupdate.</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>');
					}
					redirect('dosen/arsip_jurnal_prosiding');
				} else {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('erroredit', $error);
					redirect('dosen/edit_jurnal_prosiding');
				}
			} else {
				$post['file_publikasi'] = null;
				$this->jurpros_m->edit($post);
				if ($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('successedit', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data insentif jurnal atau prosiding berhasil diupdate.</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>');
				}
				redirect('dosen/arsip_jurnal_prosiding');
			}
		}
	}


	public function detail_jurnal_prosiding($id)
	{
		$detail['row'] = $this->jurpros_m->get_jurpros($id);

		$this->load->view('templates/auth_header');
		$this->load->view('dosen/menu');
		$this->load->view('templates/topbar');
		$this->load->view('dosen/insentif_publikasi/detail_prosiding', $detail);
		$this->load->view('templates/auth_footer');
	}

	public function del_jurnal_prosiding($id)
	{
		$fileinfo = $this->jurpros_m->get_jurpros_by_id($id);
		if ($fileinfo->file_publikasi != null) {
			$file = './upload/insentif_publikasi/jurnal_prosiding/' . $fileinfo['file_publikasi'];
			unlink($file);
		}

		$this->jurpros_m->delete($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('successdel', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data jurnal atau prosiding berhasil dihapus.</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>');
		} else {
			$this->session->set_flashdata('errordel', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Data jurnal atau prosiding gagal dihapus.</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>');
		}
		redirect('dosen/arsip_jurnal_prosiding');
	}


	// SPECIAL SCOPUS
	public function submit_special_scopus()
	{
		$pilih_scopus['row'] = $this->specscop_m->get_pilih_scopus();
		$this->load->view('templates/auth_header');
		$this->load->view('dosen/menu');
		$this->load->view('templates/topbar');
		$this->load->view('dosen/insentif_publikasi/submit_special_scopus', $pilih_scopus);
		$this->load->view('templates/auth_footer');
	}

	public function proses_submit_special_scopus()
	{
		if (isset($_POST['submit'])) {
			$this->load->library('form_validation');
			$this->form_validation->set_rules('judul_artikel', 'Periode Pengajuan', 'required');
			$this->form_validation->set_rules('impact_factor_jurnal', 'Impact Factor Jurnal', 'required');
			$this->form_validation->set_rules('url_artikel', 'URL Artikel', 'required');
			$this->form_validation->set_rules('matkul_diampu', 'Mata Kuliah Diampu', 'required');
			$this->form_validation->set_rules('kelompok_riset', 'Kelompok Riset', 'required');
			$this->form_validation->set_rules('mhs_terlibat', 'Mahasiswa Yang Terlibat', 'required');

			$this->form_validation->set_message('required', '%s Masih Kosong!!');
			$this->form_validation->set_error_delimiters('<span class="help-block text-danger">', '</span>');

			$config['upload_path']		= './upload/insentif_publikasi/special_scopus/';
			$config['allowed_types']	= 'pdf';
			$config['max_size']			= 5000;
			$config['encrypt_name']		= TRUE;
			$this->load->library('upload', $config);

			if ($this->form_validation->run()) {
				$id = $this->input->post('id');
				$id_scopus = $this->input->post('pilih_scopus');
				$judul_artikel = $this->input->post('judul_artikel', TRUE);
				$impact_factor_jurnal = $this->input->post('impact_factor_jurnal', TRUE);
				$url_artikel = $this->input->post('url_artikel', TRUE);
				if (!empty($_FILES['file_luaran']['name'])) {
					$this->upload->do_upload('file_luaran');
					$file_luaran = $this->upload->data();
					$file_luaran = $file_luaran['file_name'];
				}
				if (!empty($_FILES['file_proposal_penelitian']['name'])) {
					$this->upload->do_upload('file_proposal_penelitian');
					$file_proposal_penelitian = $this->upload->data();
					$file_proposal_penelitian = $file_proposal_penelitian['file_name'];
				}
				if (!empty($_FILES['file_dokumentasi_catatan']['name'])) {
					$this->upload->do_upload('file_dokumentasi_catatan');
					$file_dokumentasi_catatan = $this->upload->data();
					$file_dokumentasi_catatan = $file_dokumentasi_catatan['file_name'];
				}
				if (!empty($_FILES['file_laporan_akhir']['name'])) {
					$this->upload->do_upload('file_laporan_akhir');
					$file_laporan_akhir = $this->upload->data();
					$file_laporan_akhir = $file_laporan_akhir['file_name'];
				}
				if (!empty($_FILES['file_rpp_rps']['name'])) {
					$this->upload->do_upload('file_rpp_rps');
					$file_rpp_rps = $this->upload->data();
					$file_rpp_rps = $file_rpp_rps['file_name'];
				}
				$matkul_diampu = $this->input->post('matkul_diampu', TRUE);
				$kelompok_riset = $this->input->post('kelompok_riset', TRUE);
				$mhs_terlibat = $this->input->post('mhs_terlibat', TRUE);
				$data = [
					'id' => $id,
					'id_scopus' => $id_scopus,
					'id_status' => "3",
					'judul_artikel' => $judul_artikel,
					'impact_factor_jurnal' => $impact_factor_jurnal,
					'url_artikel' => $url_artikel,
					'file_luaran' => $file_luaran,
					'file_proposal_penelitian' => $file_proposal_penelitian,
					'file_dokumentasi_catatan' => $file_dokumentasi_catatan,
					'file_laporan_akhir' => $file_laporan_akhir,
					'file_rpp_rps' => $file_rpp_rps,
					'file_berita_acara' => null,
					'matkul_diampu' => $matkul_diampu,
					'kelompok_riset' => $kelompok_riset,
					'mhs_terlibat' => $mhs_terlibat,
				];
				$insert = $this->db->insert('insentif_specscop', $data);
				if ($insert) {
					$this->session->set_flashdata('successalert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Data Insentif Special Scopus Berhasil Disubmit.</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
					redirect('dosen/submit_special_scopus');
				}
			} else {
				$this->submit_special_scopus();
			}
		} else {
			$this->submit_special_scopus();
		}
	}

	// DOWNLOAD FILE PDF SPECIAL SCOPUS
	public function download_file_luaran($id)
	{
		$this->load->helper('download');
		$fileinfo = $this->specscop_m->download($id);
		$file = '/upload/insentif_publikasi/special_scopus/' . $fileinfo['file_luaran'];
		force_download($file, NULL);
	}

	public function download_file_proposal_penelitian($id)
	{
		$this->load->helper('download');
		$fileinfo = $this->specscop_m->download($id);
		$file = '/upload/insentif_publikasi/special_scopus/' . $fileinfo['file_proposal_penelitian'];
		force_download($file, NULL);
	}

	public function download_file_dokumentasi_catatan($id)
	{
		$this->load->helper('download');
		$fileinfo = $this->specscop_m->download($id);
		$file = '/upload/insentif_publikasi/special_scopus/' . $fileinfo['file_dokumentasi_catatan'];
		force_download($file, NULL);
	}

	public function download_file_laporan_akhir($id)
	{
		$this->load->helper('download');
		$fileinfo = $this->specscop_m->download($id);
		$file = '/upload/insentif_publikasi/special_scopus/' . $fileinfo['file_laporan_akhir'];
		force_download($file, NULL);
	}

	public function download_file_rpp_rps($id)
	{
		$this->load->helper('download');
		$fileinfo = $this->specscop_m->download($id);
		$file = '/upload/insentif_publikasi/special_scopus/' . $fileinfo['file_rpp_rps'];
		force_download($file, NULL);
	}

	public function arsip_special_scopus()
	{
		$arsip['row'] = $this->specscop_m->get_scopus_by_id();
		$this->load->view('templates/auth_header');
		$this->load->view('dosen/menu');
		$this->load->view('templates/topbar');
		$this->load->view('dosen/insentif_publikasi/arsip_special_scopus', $arsip);
		$this->load->view('templates/auth_footer');
	}

	public function edit_special_scopus($id)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama_scopus', 'Pilihan Scopus', 'required');
		$this->form_validation->set_rules('judul_artikel', 'Judul Artikel', 'required');
		$this->form_validation->set_rules('impact_factor_jurnal', 'Impact Factor Jurnal', 'required');
		$this->form_validation->set_rules('url_artikel', 'URL Artikel', 'required');
		$this->form_validation->set_rules('matkul_diampu', 'Matakuliah Yang Diampu', 'required');
		$this->form_validation->set_rules('kelompok_riset', 'Kelompok Riset', 'required');
		$this->form_validation->set_rules('mhs_terlibat', 'Mahasiswa Yang Terlibat', 'required');

		$this->form_validation->set_error_delimiters('<span class="help-block text-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$query = $this->specscop_m->get_scopus($id);
			if ($query->num_rows() > 0) {
				$scopus = $query->row();
				$query_pilih_scopus = $this->specscop_m->get_pilih_scopus();
				$nama_scopus[null] = '- Pilih -';
				foreach ($query_pilih_scopus->result() as $scopus_id) {
					$nama_scopus[$scopus_id->id_scopus] = $scopus_id->nama_scopus;
				}
				$data = array(
					'page' => 'edit',
					'row' => $scopus,
					'nama_scopus' => $query_pilih_scopus,
					'pilih_scopus' => $nama_scopus, 'selectednama_scopus' => $scopus->id_scopus,
				);
				$this->load->view('templates/auth_header');
				$this->load->view('dosen/menu');
				$this->load->view('templates/topbar');
				$this->load->view('dosen/insentif_publikasi/edit_special_scopus', $data);
				$this->load->view('templates/auth_footer');
			}
		} else {
			echo "<script>alert('Data tidak ditemukan');";
			echo "window.location='" . site_url('dosen/arsip_special_scopus') . "';</script>";
		}
	}

	public function proses_edit_special_scopus()
	{
		$config['upload_path']          = './upload/insentif_publikasi/special_scopus/';
		$config['allowed_types']        = 'pdf';
		$config['max_size']            = 5000;
		$config['encrypt_name']         = TRUE;

		$this->load->library('upload', $config);

		$post = $this->input->post(null, TRUE);
		if (isset($_POST['edit'])) {
			if (@$_FILES['file_luaran']['name']) {
				if ($this->upload->do_upload('file_luaran')) {

					$scopus = $this->specscop_m->get_scopus($post['id_insentif_scopus'])->row();
					if ($scopus->file_luaran != null) {
						$target_file = './upload/insentif_publikasi/special_scopus/' . $scopus->file_luaran;
						unlink($target_file);
					}

					$post['file_luaran'] = $this->upload->data('file_name');
					$this->specscop_m->edit($post);
					if ($this->db->affected_rows() > 0) {
						$this->session->set_flashdata('successedit', '<div class="alert alert-success alert-dismissible fade show" role="alert">
						<strong>Data insentif publikasi special scopus berhasil diupdate.</strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>');
					}
					redirect('dosen/arsip_special_scopus');
				} else {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('erroredit', $error);
					redirect('dosen/arsip_special_scopus');
				}
			} else {
				$post['file_luaran'] = null;
				$this->specscop_m->edit($post);
				if ($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('successedit', '<div class="alert alert-success alert-dismissible fade show" role="alert">
						<strong>Data insentif publikasi special scopus berhasil diupdate.</strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>');
				}
				redirect('dosen/arsip_special_scopus');
			}

			if (@$_FILES['file_proposal_penelitian']['name']) {
				if ($this->upload->do_upload('file_proposal_penelitian')) {

					$scopus = $this->specscop_m->get_scopus($post['id_insentif_scopus'])->row();
					if ($scopus->file_proposal_penelitian != null) {
						$target_file = './upload/insentif_publikasi/special_scopus/' . $scopus->file_proposal_penelitian;
						unlink($target_file);
					}

					$post['file_proposal_penelitian'] = $this->upload->data('file_name');
					$this->specscop_m->edit($post);
					if ($this->db->affected_rows() > 0) {
						$this->session->set_flashdata('successedit', '<div class="alert alert-success alert-dismissible fade show" role="alert">
						<strong>Data insentif publikasi special scopus berhasil diupdate.</strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>');
					}
					redirect('dosen/arsip_special_scopus');
				} else {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('erroredit', $error);
					redirect('dosen/arsip_special_scopus');
				}
			} else {
				$post['file_proposal_penelitian'] = null;
				$this->specscop_m->edit($post);
				if ($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('successedit', '<div class="alert alert-success alert-dismissible fade show" role="alert">
						<strong>Data insentif publikasi special scopus berhasil diupdate.</strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>');
				}
				redirect('dosen/arsip_special_scopus');
			}

			if (@$_FILES['file_dokumentasi_catatan']['name']) {
				if ($this->upload->do_upload('file_dokumentasi_catatan')) {

					$scopus = $this->specscop_m->get_scopus($post['id_insentif_scopus'])->row();
					if ($scopus->file_proposal_penelitian != null) {
						$target_file = './upload/insentif_publikasi/special_scopus/' . $scopus->file_dokumentasi_catatan;
						unlink($target_file);
					}

					$post['file_dokumentasi_catatan'] = $this->upload->data('file_name');
					$this->specscop_m->edit($post);
					if ($this->db->affected_rows() > 0) {
						$this->session->set_flashdata('successedit', '<div class="alert alert-success alert-dismissible fade show" role="alert">
						<strong>Data insentif publikasi special scopus berhasil diupdate.</strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>');
					}
					redirect('dosen/arsip_special_scopus');
				} else {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('erroredit', $error);
					redirect('dosen/arsip_special_scopus');
				}
			} else {
				$post['file_dokumentasi_catatan'] = null;
				$this->specscop_m->edit($post);
				if ($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('successedit', '<div class="alert alert-success alert-dismissible fade show" role="alert">
						<strong>Data insentif publikasi special scopus berhasil diupdate.</strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>');
				}
				redirect('dosen/arsip_special_scopus');
			}

			if (@$_FILES['file_laporan_akhir']['name']) {
				if ($this->upload->do_upload('file_laporan_akhir')) {

					$scopus = $this->specscop_m->get_scopus($post['id_insentif_scopus'])->row();
					if ($scopus->file_laporan_akhir != null) {
						$target_file = './upload/insentif_publikasi/special_scopus/' . $scopus->file_laporan_akhir;
						unlink($target_file);
					}

					$post['file_laporan_akhir'] = $this->upload->data('file_name');
					$this->specscop_m->edit($post);
					if ($this->db->affected_rows() > 0) {
						$this->session->set_flashdata('successedit', '<div class="alert alert-success alert-dismissible fade show" role="alert">
						<strong>Data insentif publikasi special scopus berhasil diupdate.</strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>');
					}
					redirect('dosen/arsip_special_scopus');
				} else {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('erroredit', $error);
					redirect('dosen/arsip_special_scopus');
				}
			} else {
				$post['file_laporan_akhir'] = null;
				$this->specscop_m->edit($post);
				if ($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('successedit', '<div class="alert alert-success alert-dismissible fade show" role="alert">
						<strong>Data insentif publikasi special scopus berhasil diupdate.</strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>');
				}
				redirect('dosen/arsip_special_scopus');
			}

			if (@$_FILES['file_rpp_rps']['name']) {
				if ($this->upload->do_upload('file_rpp_rps')) {

					$scopus = $this->specscop_m->get_scopus($post['id_insentif_scopus'])->row();
					if ($scopus->file_proposal_penelitian != null) {
						$target_file = './upload/insentif_publikasi/special_scopus/' . $scopus->file_dokumentasi_catatan;
						unlink($target_file);
					}

					$post['file_rpp_rps'] = $this->upload->data('file_name');
					$this->specscop_m->edit($post);
					if ($this->db->affected_rows() > 0) {
						$this->session->set_flashdata('successedit', '<div class="alert alert-success alert-dismissible fade show" role="alert">
						<strong>Data insentif publikasi special scopus berhasil diupdate.</strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>');
					}
					redirect('dosen/arsip_special_scopus');
				} else {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('erroredit', $error);
					redirect('dosen/arsip_special_scopus');
				}
			} else {
				$post['file_rpp_rps'] = null;
				$this->specscop_m->edit($post);
				if ($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('successedit', '<div class="alert alert-success alert-dismissible fade show" role="alert">
						<strong>Data insentif publikasi special scopus berhasil diupdate.</strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>');
				}
				redirect('dosen/arsip_special_scopus');
			}
		}
	}


	public function detail_special_scopus($id)
	{
		$detail['row'] = $this->specscop_m->get_scopus($id);
		$this->load->view('templates/auth_header');
		$this->load->view('dosen/menu');
		$this->load->view('templates/topbar');
		$this->load->view('dosen/insentif_publikasi/detail_special_scopus', $detail);
		$this->load->view('templates/auth_footer');
	}

	public function del_special_scopus($id)
	{
		$fileinfo = $this->specscop_m->download($id);
		if ($fileinfo->file_luaran != null) {
			$file = 'upload/insentif_publikasi/special_scopus/' . $fileinfo['file_luaran'];
			unlink($file);
		}

		if ($fileinfo->file_proposal_penelitian != null) {
			$file = 'upload/insentif_publikasi/special_scopus/' . $fileinfo['file_proposal_penelitian'];
			unlink($file);
		}

		if ($fileinfo->file_dokumentasi_catatan != null) {
			$file = 'upload/insentif_publikasi/special_scopus/' . $fileinfo['file_dokumentasi_catatan'];
			unlink($file);
		}

		if ($fileinfo->file_laporan_akhir != null) {
			$file = 'upload/insentif_publikasi/special_scopus/' . $fileinfo['file_laporan_akhir'];
			unlink($file);
		}

		if ($fileinfo->file_rpp_rps != null) {
			$file = 'upload/insentif_publikasi/special_scopus/' . $fileinfo['file_rpp_rps'];
			unlink($file);
		}

		$this->specscop_m->delete($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('successdel', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data special scopus berhasil dihapus.</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>');
		} else {
			$this->session->set_flashdata('errordel', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Data special scopus gagal dihapus.</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>');
		}
		redirect('dosen/arsip_special_scopus');
	}
}
