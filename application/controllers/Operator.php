<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Operator extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_not_login();
		check_dosen();
		$this->load->model('user_m');
		$this->load->model('pengabmas_m');
		$this->load->model('jurpros_m');
		$this->load->model('specscop_m');
	}
	public function index()
	{
		$this->load->view('templates/auth_header');
		$this->load->view('operator/home');
		$this->load->view('templates/auth_footer');
	}

	// USULAN PENELITIAN
	public function penelitian()
	{
		$data['row'] = $this->penelitian_m->get_penelitian();
		$this->load->view('templates/auth_header');
		$this->load->view('operator/menu');
		$this->load->view('templates/topbar');
		$this->load->view('operator/penelitian/daftarusulanpenelitian', $data);
		$this->load->view('templates/auth_footer');
	}

	public function changestat_penelitian()
	{
		$id_penelitian = $this->input->post("id_penelitian", TRUE);
		$check = $this->penelitian_m->get_by_id($id_penelitian);
		$newstat = $check->id_status == 1 ? 2 : 1;
		$data = array(
			'id_status' => $newstat
		);
		$this->penelitian_m->update($id_penelitian, $data);
		$res['msg'] = "Status Pengabdian Masyarakat dengan judul penelitian " . $check->judul_penelitian . " telah berhasil di update";
		echo json_encode($res);
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

	// FOR EXPORT EXCEL USULAN PENELITIAN
	public function exportexcel_penelitian()
	{
		$data['row'] = $this->penelitian_m->get_penelitian()->result();
		require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel.php');
		require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

		$object = new PHPExcel();
		$object->getProperties()->setCreator("LP3M");
		$object->getProperties()->setLastModifiedBy("LP3M");
		$object->getProperties()->setTitle("JURNAL PENELITIAN LP3M");

		$object->setActiveSheetIndex(0);
		$object->getActiveSheet()->setCellValue('A1', 'No');
		$object->getActiveSheet()->setCellValue('B1', 'Judul Penelitian');
		$object->getActiveSheet()->setCellValue('C1', 'Periode Pengajuan');
		$object->getActiveSheet()->setCellValue('D1', 'Tanggal Submit');
		$object->getActiveSheet()->setCellValue('E1', 'Mahasiswa Yang Dilibatkan');
		$object->getActiveSheet()->setCellValue('F1', 'Status');

		$baris = 2;
		$no = 1;

		foreach ($data['row'] as $data) {
			$object->getActiveSheet()->setCellValue('A' . $baris, $no++);
			$object->getActiveSheet()->setCellValue('B' . $baris, $data->judul_penelitian);
			$object->getActiveSheet()->setCellValue('C' . $baris, $data->tahun_periode);
			$object->getActiveSheet()->setCellValue('D' . $baris, date('d-m-Y', strtotime($data->tgl_submit)));
			$object->getActiveSheet()->setCellValue('E' . $baris, $data->mhs_terlibat);
			$object->getActiveSheet()->setCellValue('F' . $baris, $data->status);

			$baris++;
		}

		$filename = "Daftar Usulan Penelitian" . ".xlsx";
		$object->getActiveSheet()->setTitle("LP3M");

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $filename . '"');
		header('Cache-Control: max-age=0');

		$writer = PHPExcel_IOFactory::createwriter($object, 'Excel2007');
		$writer->save('php://output');

		exit;
	}



	// PENGABDIAN MASYARAKAT
	public function pengabdian_masyarakat()
	{
		$data['row'] = $this->pengabmas_m->get_pengabmas();
		$this->load->view('templates/auth_header');
		$this->load->view('operator/menu');
		$this->load->view('templates/topbar');
		$this->load->view('operator/pengabdian_masyarakat/pengabdian_masyarakat', $data);
		$this->load->view('templates/auth_footer');
	}

	public function changestat_pengabmas()
	{
		$id_pengabmas = $this->input->post("id_pengabmas", TRUE);
		$check = $this->pengabmas_m->get_by_id($id_pengabmas);
		$newstat = $check->id_status == 1 ? 2 : 1;
		$data = array(
			'id_status' => $newstat
		);
		$this->pengabmas_m->update($id_pengabmas, $data);
		$res['msg'] = "Status Pengabdian Masyarakat dengan judul penelitian " . $check->judul_pengabmas . " telah berhasil di update";
		echo json_encode($res);
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

	// FOR EXPORT EXCEL PENGABDIAN MASYARAKAT
	public function exportexcel_pengabmas()
	{
		$data['row'] = $this->pengabmas_m->get_pengabmas()->result();
		require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel.php');
		require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

		$object = new PHPExcel();
		$object->getProperties()->setCreator("LP3M");
		$object->getProperties()->setLastModifiedBy("LP3M");
		$object->getProperties()->setTitle("PENGABDIAN MASYARAKAT LP3M");

		$object->setActiveSheetIndex(0);
		$object->getActiveSheet()->setCellValue('A1', 'No');
		$object->getActiveSheet()->setCellValue('B1', 'Nama');
		$object->getActiveSheet()->setCellValue('C1', 'Judul Penelitian');
		$object->getActiveSheet()->setCellValue('D1', 'Periode Pengajuan');
		$object->getActiveSheet()->setCellValue('E1', 'Matkul Diampu');
		$object->getActiveSheet()->setCellValue('F1', 'Tanggal Submit');
		$object->getActiveSheet()->setCellValue('G1', 'Mahasiswa Yang Dilibatkan');
		$object->getActiveSheet()->setCellValue('H1', 'Kelompok Riset');
		$object->getActiveSheet()->setCellValue('I1', 'Status');

		$baris = 2;
		$no = 1;

		foreach ($data['row'] as $data) {
			$object->getActiveSheet()->setCellValue('A' . $baris, $no++);
			$object->getActiveSheet()->setCellValue('B' . $baris, $data->name);
			$object->getActiveSheet()->setCellValue('C' . $baris, $data->judul_penelitian);
			$object->getActiveSheet()->setCellValue('D' . $baris, $data->tahun_periode);
			$object->getActiveSheet()->setCellValue('E' . $baris, $data->matkul_diampu);
			$object->getActiveSheet()->setCellValue('F' . $baris, date('d-m-Y', strtotime($data->tgl_submit)));
			$object->getActiveSheet()->setCellValue('G' . $baris, $data->mhs_terlibat);
			$object->getActiveSheet()->setCellValue('H' . $baris, $data->kelompok_riset);
			$object->getActiveSheet()->setCellValue('I' . $baris, $data->status);

			$baris++;
		}

		$filename = "Pengabdian Masyarakat" . ".xlsx";
		$object->getActiveSheet()->setTitle("LP3M");

		ob_end_clean();
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $filename . '"');
		header('Cache-Control: max-age=0');

		$writer = PHPExcel_IOFactory::createwriter($object, 'Excel2007');
		$writer->save('php://output');

		exit;
	}



	// KELOLA DATA DOSEN
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
				$this->session->set_flashdata('successadd', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Data dosen berhasil ditambahkan.</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>');
			}
			redirect('operator/datadosen');
		}
	}

	public function editdosen($id)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nidn', 'Nidn', 'required');
		$this->form_validation->set_rules('id_sinta', 'ID sinta', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('programstudi', 'Program Studi', 'required');
		$this->form_validation->set_rules('fakultas', 'Fakultas', 'required');
		$this->form_validation->set_rules('role', 'Role', 'required');
		$this->form_validation->set_error_delimiters('<span class="help-block text-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$query = $this->user_m->get($id);
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
			}
		} else {
			echo "<script>alert('Data tidak ditemukan');";
			echo "window.location='" . site_url('operator/datadosen') . "';</script>";
		}
	}

	public function prosesedit()
	{
		$config['upload_path']        = './assets/users/';
		$config['allowed_types']     = 'jpg|png|jpeg';
		$config['max_size']            = 2048;

		$this->load->library('upload', $config);

		$post = $this->input->post(null, TRUE);
		if (isset($_POST['submit_edit'])) {
			if (@$_FILES['image']['name'] != null) {
				if ($this->upload->do_upload('image')) {

					$dosen = $this->user_m->get($post['id'])->row();
					if ($dosen->image != null) {
						$target_file = './assets/users/' . $dosen->image;
						unlink($target_file);
					}

					$post['image'] = $this->upload->data('file_name');
					$this->user_m->edit_dosen($post);
					if ($this->db->affected_rows() > 0) {
						$this->session->set_flashdata('successedit', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Data dosen berhasil diupdate.</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>');
					}
					redirect('operator/datadosen');
				} else {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('erroredit', $error);
					redirect('operator/editdosen');
				}
			} else {
				$post['image'] = null;
				$this->user_m->edit_dosen($post);
				if ($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('successedit', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Data dosen berhasil diupdate.</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>');
				}
				redirect('operator/datadosen');
			}
		}
	}

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


	//INSENTIF PUBLIKASI
	public function insentif_publikasi()
	{
		$this->load->view('templates/auth_header');
		$this->load->view('operator/menu');
		$this->load->view('templates/topbar');
		$this->load->view('operator/insentif_publikasi/index');
		$this->load->view('templates/auth_footer');
	}

	// JURNAL ATAU PROSIDING
	public function arsip_jurnal_prosiding()
	{
		$data['row'] = $this->jurpros_m->get_jurpros();
		$this->load->view('templates/auth_header');
		$this->load->view('operator/menu');
		$this->load->view('templates/topbar');
		$this->load->view('operator/insentif_publikasi/arsip_prosiding', $data);
		$this->load->view('templates/auth_footer');
	}

	public function changestat_jurpros()
	{
		$id_insentif_jurpros = $this->input->post("id_insentif_jurpros", TRUE);
		$check = $this->jurpros_m->get_by_id($id_insentif_jurpros);
		$newstat = $check->id_status == 1 ? 2 : 1;
		$data = array(
			'id_status' => $newstat
		);
		$this->jurpros_m->update($id_insentif_jurpros, $data);
		$res['msg'] = "Status Jurnal atau Prosiding dengan judul " . $check->judul_artikel . " telah berhasil di update";
		echo json_encode($res);
	}

	public function upload_file_berita_acara_jurpros($id)
	{
		$query = $this->jurpros_m->get_jurpros($id);
		if ($query->num_rows() > 0) {
			$insentif_jurpros = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $insentif_jurpros,
			);
			$this->load->view('templates/auth_header');
			$this->load->view('operator/menu');
			$this->load->view('templates/topbar');
			$this->load->view('operator/insentif_publikasi/file_berita_acara_jurpros', $data);
			$this->load->view('templates/auth_footer');
		}
	}

	public function proses_upload_file_berita_acara_jurpros()
	{
		if (isset($_POST['edit'])) {
			$this->load->library('form_validation');
			$this->form_validation->set_rules('file_berita_acara', 'File Berita Acara', 'required');

			$this->form_validation->set_message('required', '%s Masih Kosong!!');
			$this->form_validation->set_error_delimiters('<span class="help-block text-danger">', '</span>');

			$config['upload_path']          = './upload/insentif_publikasi/file_berita_acara_jurnal_prosiding/';
			$config['allowed_types']        = 'pdf';
			$config['max_size']            = 2048;
			$config['encrypt_name']         = TRUE;
			$this->load->library('upload', $config);

			if ($this->form_validation->run()) {
				$id = $this->input->post('id');
				if (!empty($_FILES['file_berita_acara']['name'])) {
					$this->upload->do_upload('file_berita_acara');
					$file_berita_acara = $this->upload->data();
					$file_berita_acara = $file_berita_acara['file_name'];
				}
				$data = [
					'id' => $id,
				];
				if ($file_berita_acara != null) {
					$data['file_berita_acara'] = $file_berita_acara;
				}
				$update = $this->db->update('insentif_jurpros', $data);
				if ($update) {
					$this->session->set_flashdata('successalert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Data Insentif Jurnal Prosiding Berhasil Diupdate.</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
					redirect('operator/arsip_jurnal_prosiding');
				}
			} else {
				$id = $this->jurpros_m->get_by_id();
				$this->upload_file_berita_acara_jurpros($id);
			}
		} else {
			$id = $this->jurpros_m->get_by_id();
			$this->upload_file_berita_acara_jurpros($id);
		}
	}

	public function detail_jurnal_prosiding($id)
	{
		$detail['row'] = $this->jurpros_m->get_jurpros($id);

		$this->load->view('templates/auth_header');
		$this->load->view('operator/menu');
		$this->load->view('templates/topbar');
		$this->load->view('operator/insentif_publikasi/detail_prosiding', $detail);
		$this->load->view('templates/auth_footer');
	}


	// SPECIAL SCOPUS
	public function arsip_special_scopus()
	{
		$data['row'] = $this->specscop_m->get_scopus();

		$this->load->view('templates/auth_header');
		$this->load->view('operator/menu');
		$this->load->view('templates/topbar');
		$this->load->view('operator/insentif_publikasi/arsip_special_scopus', $data);
		$this->load->view('templates/auth_footer');
	}

	public function changestat_scopus()
	{
		$id_insentif_scopus = $this->input->post("id_insentif_scopus", TRUE);
		$check = $this->specscop_m->get_by_id($id_insentif_scopus);
		$newstat = $check->id_status == 1 ? 2 : 1;
		$data = array(
			'id_status' => $newstat
		);
		$this->specscop_m->update($id_insentif_scopus, $data);
		$res['msg'] = "Status special scopus dengan judul " . $check->judul_artikel . " telah berhasil di update";
		echo json_encode($res);
	}

	public function detail_special_scopus($id)
	{
		$detail['row'] = $this->specscop_m->get_scopus($id);

		$this->load->view('templates/auth_header');
		$this->load->view('operator/menu');
		$this->load->view('templates/topbar');
		$this->load->view('operator/insentif_publikasi/detail_special_scopus', $detail);
		$this->load->view('templates/auth_footer');
	}
}
