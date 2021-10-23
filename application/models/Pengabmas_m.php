<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pengabmas_m extends CI_Model
{
    public function get_status($id_status = null)
    {
        $this->db->from('status_penelitian_pengabdian', $id_status);
        if ($id_status != null) {
            $this->db->where('id_status', $id_status);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_pengabmas($id = null)
    {
        $this->db->from('tbl_pengabmas');
        $this->db->join('users', 'users.id = tbl_pengabmas.id');
        $this->db->join('periode_pengajuan', 'periode_pengajuan.id_periode = tbl_pengabmas.id_periode');
        $this->db->join('status_penelitian_pengabdian', 'status_penelitian_pengabdian.id_status = tbl_pengabmas.id_status');
        if ($id != null) {
            $this->db->where('id_pengabmas', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_pengabmas_by_id()
    {
        $this->db->from('tbl_pengabmas');
        $this->db->join('users', 'users.id = tbl_pengabmas.id');
        $this->db->join('periode_pengajuan', 'periode_pengajuan.id_periode = tbl_pengabmas.id_periode');
        $this->db->join('status_penelitian_pengabdian', 'status_penelitian_pengabdian.id_status = tbl_pengabmas.id_status');
        $this->db->where('tbl_pengabmas.id', $this->session->userdata('id'));
        $query = $this->db->get();
        return $query;
    }

    public function get_by_id($id_pengabmas)
    {
        $this->db->where("id_pengabmas", $id_pengabmas);
        return $this->db->get('tbl_pengabmas')->row();
    }

    public function edit_laporan_akhir($post)
    {
        if ($post['laporan_akhir'] != null) {
            $params['laporan_akhir'] = $post['laporan_akhir'];
        }

        if ($post['laporan_akhir']) {
            $this->db->set('tgl_upload_la', 'NOW()', FALSE);
        }

        $this->db->where('id_pengabmas', $post['id_pengabmas']);
        $this->db->update('tbl_pengabmas', $params);
    }

    public function edit_laporan_keuangan($post)
    {
        if ($post['laporan_keuangan'] != null) {
            $params['laporan_keuangan'] = $post['laporan_keuangan'];
        }

        if ($post['laporan_keuangan']) {
            $this->db->set('tgl_upload_lk', 'NOW()', FALSE);
        }

        $this->db->where('id_pengabmas', $post['id_pengabmas']);
        $this->db->update('tbl_pengabmas', $params);
    }

    public function edit_artikel_ilmiah($post)
    {
        if ($post['artikel_ilmiah'] != null) {
            $params['artikel_ilmiah'] = $post['artikel_ilmiah'];
        }

        if ($post['artikel_ilmiah']) {
            $this->db->set('tgl_upload_ai', 'NOW()', FALSE);
        }

        $this->db->where('id_pengabmas', $post['id_pengabmas']);
        $this->db->update('tbl_pengabmas', $params);
    }

    public function edit_sertifikat_hki($post)
    {
        if ($post['sertifikat_hki'] != null) {
            $params['sertifikat_hki'] = $post['sertifikat_hki'];
        }

        if ($post['sertifikat_hki']) {
            $this->db->set('tgl_upload_sh', 'NOW()', FALSE);
        }

        $this->db->where('id_pengabmas', $post['id_pengabmas']);
        $this->db->update('tbl_pengabmas', $params);
    }

    public function edit_url_artikel_ilmiah($post)
    {
        $params = [
            'url_artikel_ilmiah' => $post['url_artikel_ilmiah'],
        ];

        $this->db->where('id_pengabmas', $post['id_pengabmas']);
        $this->db->update('tbl_pengabmas', $params);
    }

    public function edit2($post)
    {
        if ($post['hasil_review'] != null) {
            $params['hasil_review'] = $post['hasil_review'];
        }
        if ($post['surat_tugas'] != null) {
            $params['surat_tugas'] = $post['surat_tugas'];
        }
        if ($post['hasil_monev_internal'] != null) {
            $params['hasil_monev_internal'] = $post['hasil_monev_internal'];
        }
        if ($post['berita_acara_inspub'] != null) {
            $params['berita_acara_inspub'] = $post['berita_acara_inspub'];
        }
        $this->db->where('id_pengabmas', $post['id_pengabmas']);
        $this->db->update('tbl_pengabmas', $params);
    }

    public function update($id, $post)
    {
        $this->db->where('id_pengabmas', $id);
        $this->db->update('tbl_pengabmas', $post);
    }

    function delete($id)
    {
        $this->db->where('id_pengabmas', $id);
        $this->db->delete('tbl_pengabmas');
        return true;
    }

    public function download($id)
    {
        $query = $this->db->get_where('tbl_pengabmas', array('id_pengabmas' => $id));
        return $query->row_array();
    }
}
