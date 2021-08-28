<?php defined('BASEPATH') or exit('No direct script access allowed');

class Specscop_m extends CI_Model
{

    public function get_pilih_scopus($id = null)
    {
        $this->db->from('pilih_scopus', $id);
        $this->db->order_by('id_scopus', 'asc');
        if ($id != null) {
            $this->db->where('id_scopus', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_scopus($id = null)
    {
        $this->db->from('insentif_specscop');
        $this->db->join('users', 'users.id = insentif_specscop.id');
        $this->db->join('pilih_scopus', 'pilih_scopus.id_scopus = insentif_specscop.id_scopus');
        $this->db->join('status_insentif', 'status_insentif.id_status = insentif_specscop.id_status');
        if ($id != null) {
            $this->db->where('id_insentif_scopus', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_scopus_by_id()
    {
        $this->db->from('insentif_specscop');
        $this->db->join('users', 'users.id = insentif_specscop.id');
        $this->db->join('pilih_scopus', 'pilih_scopus.id_scopus = insentif_specscop.id_scopus');
        $this->db->join('status_insentif', 'status_insentif.id_status = insentif_specscop.id_status');
        $this->db->where('insentif_specscop.id', $this->session->userdata('id'));
        $query = $this->db->get();
        return $query;
    }

    public function get_by_id($id)
    {
        $this->db->where("id_insentif_scopus", $id);
        return $this->db->get('insentif_specscop')->row();
    }

    public function edit($post)
    {
        $params = [
            'id_scopus' => $post['nama_jurnal'],
            'judul_artikel' => $post['judul_artikel'],
            'impact_factor_jurnal' => $post['impact_factor_jurnal'],
            'url_artikel' => $post['url_artikel'],
            'matkul_diampu' => $post['matkul_diampu'],
            'kelompok_riset' => $post['kelompok_riset'],
            'mhs_terlibat' => $post['mhs_terlibat'],
        ];
        if ($post['file_luaran'] != null) {
            $params['file_luaran'] = sha1($post['file_luaran']);
        }
        if ($post['file_dokumentasi_catatan'] != null) {
            $params['file_dokumentasi_catatan'] = sha1($post['file_dokumentasi_catatan']);
        }
        if ($post['file_laporan_akhir'] != null) {
            $params['file_laporan_akhir'] = sha1($post['file_laporan_akhir']);
        }
        if ($post['file_rpp_rps'] != null) {
            $params['file_rpp_rps'] = sha1($post['file_rpp_rps']);
        }
        $this->db->where('id_insentif_scopus', $post['id_insentif_scopus']);
        $this->db->update('insentif_specscop', $params);
    }

    public function update($id, $post)
    {
        $this->db->where('id_insentif_scopus', $id);
        $this->db->update('insentif_specscop', $post);
    }

    function delete($id)
    {
        $this->db->where('id_insentif_scopus', $id);
        $this->db->delete('insentif_specscop');
        return true;
    }

    public function download($id)
    {
        $query = $this->db->get_where('insentif_specscop', array('id_insentif_scopus' => $id));
        return $query->row_array();
    }
}
