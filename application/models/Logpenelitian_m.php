<?php defined('BASEPATH') or exit('No direct script access allowed');

class Logpenelitian_m extends CI_Model
{
    public function get_log_book($id = null)
    {
        $this->db->from('log_book_penelitian');
        $this->db->join('tbl_penelitian', 'tbl_penelitian.id_penelitian = log_book_penelitian.id_penelitian');
        $this->db->join('users', 'users.id = log_book_penelitian.id');
        if ($id != null) {
            $this->db->where('id_penelitian', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_log_book_by_id($id)
    {
        $this->db->from('log_book_penelitian');
        $this->db->order_by('id_log_book', 'asc');
        $this->db->where('id_penelitian', $id);
        $query = $this->db->get();
        return $query;
    }

    public function insert($post)
    {
        $params = [
            'id_penelitian' => $post['id_penelitian'],
            'id' => $post['id'],
            'tgl_kegiatan' => $post['tgl_kegiatan'],
            'uraian_kegiatan' => $post['uraian_kegiatan'],
        ];
        if ($post['dokumentasi'] != null) {
            $params['dokumentasi'] = $post['dokumentasi'];
        }
        $this->db->where('id_log_book', $post['id_log_book']);
        $this->db->insert('log_book_penelitian', $params);
    }
}
