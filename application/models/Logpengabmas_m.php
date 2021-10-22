<?php defined('BASEPATH') or exit('No direct script access allowed');

class Logpengabmas_m extends CI_Model
{
    public function get_log_book($id)
    {
        $this->db->from('log_book_pengabmas');
        $this->db->join('tbl_pengabmas', 'tbl_pengabmas.id_pengabmas = log_book_pengabmas.id_pengabmas');
        $this->db->join('users', 'users.id = log_book_pengabmas.id');
        if ($id != null) {
            $this->db->where('id_pengabmas', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function insert($post)
    {
        $params = [
            'id_pengabmas' => $post['id_pengabmas'],
            'id' => $post['id'],
            'tgl_kegiatan' => $post['tgl_kegiatan'],
            'uraian_kegiatan' => $post['uraian_kegiatan'],
        ];
        if ($post['dokumentasi'] != null) {
            $params['dokumentasi'] = $post['dokumentasi'];
        }
        $this->db->where('id_log_book', $post['id_log_book']);
        $this->db->insert('log_book_pengabmas', $params);
    }
}
