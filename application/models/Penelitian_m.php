<?php defined('BASEPATH') or exit('No direct script access allowed');

class Penelitian_m extends CI_Model
{
    public function get_periode($id_periode = null)
    {
        $this->db->from('periode_pengajuan', $id_periode);
        if ($id_periode != null) {
            $this->db->where('id_periode', $id_periode);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_log_book($id)
    {
        $this->db->from('log_book_penelitian');
        $this->db->order_by('id_log_book', 'asc');
        $this->db->where('id_penelitian', $id);
        $query = $this->db->get();
        return $query;
    }

    public function log_book($id = null)
    {
        $this->db->from('log_book_penelitian', $id);
        if ($id != null) {
            $this->db->where('id_penelitian', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_penelitian($id = null)
    {
        $this->db->from('tbl_penelitian');
        $this->db->join('users', 'users.id = tbl_penelitian.id');
        $this->db->join('periode_pengajuan', 'periode_pengajuan.id_periode = tbl_penelitian.id_periode');
        $this->db->join('status_penelitian_pengabdian', 'status_penelitian_pengabdian.id_status = tbl_penelitian.id_status');
        if ($id != null) {
            $this->db->where('id_penelitian', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_penelitian_by_id()
    {
        $this->db->from('tbl_penelitian');
        $this->db->join('users', 'users.id = tbl_penelitian.id');
        $this->db->join('periode_pengajuan', 'periode_pengajuan.id_periode = tbl_penelitian.id_periode');
        $this->db->join('status_penelitian_pengabdian', 'status_penelitian_pengabdian.id_status = tbl_penelitian.id_status');
        $this->db->where('tbl_penelitian.id', $this->session->userdata('id'));
        $query = $this->db->get();
        return $query;
    }

    public function get_by_id($id_penelitian)
    {
        $this->db->where("id_penelitian", $id_penelitian);
        return $this->db->get('tbl_penelitian')->row();
    }

    public function edit($post)
    {
        if ($post['laporan_akhir'] != null) {
            $params['laporan_akhir'] = $post['laporan_akhir'];
        }

        if ($post['laporan_keuangan'] != null) {
            $params['laporan_keuangan'] = $post['laporan_keuangan'];
        }

        if ($post['artikel_ilmiah'] != null) {
            $params['artikel_ilmiah'] = $post['artikel_ilmiah'];
        }

        if ($post['sertifikat_hki'] != null) {
            $params['sertifikat_hki'] = $post['sertifikat_hki'];
        }

        if ($post['laporan_akhir']) {
            $this->db->set('tgl_upload_la', 'NOW()', FALSE);
        } else if ($post['laporan_keuangan']) {
            $this->db->set('tgl_upload_lk', 'NOW()', FALSE);
        } else if ($post['artikel_ilmiah']) {
            $this->db->set('tgl_upload_ai', 'NOW()', FALSE);
        } else if ($post['sertifikat_hki']) {
            $this->db->set('tgl_upload_sh', 'NOW()', FALSE);
        }

        $this->db->where('id_penelitian', $post['id_penelitian']);
        $this->db->update('tbl_penelitian', $params);
    }

    public function editurl($post)
    {
        $params = [
            'url_artikel_ilmiah' => $post['url_artikel_ilmiah'],
        ];

        $this->db->where('id_penelitian', $post['id_penelitian']);
        $this->db->update('tbl_penelitian', $params);
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
        $this->db->where('id_penelitian', $post['id_penelitian']);
        $this->db->update('tbl_penelitian', $params);
    }

    public function update($id, $post)
    {
        $this->db->where('id_penelitian', $id);
        $this->db->update('tbl_penelitian', $post);
    }

    function delete($id)
    {
        $sql = "DELETE tbl_penelitian,log_book_penelitian 
        FROM tbl_penelitian,log_book_penelitian 
        WHERE log_book_penelitian.id_penelitian=tbl_penelitian.id_penelitian
        AND tbl_penelitian.id_penelitian= ?";

        $this->db->query($sql, array($id));
    }

    public function download($id)
    {
        $query = $this->db->get_where('tbl_penelitian', array('id_penelitian' => $id));
        return $query->row_array();
    }
}
