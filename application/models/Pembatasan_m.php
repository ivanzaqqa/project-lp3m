<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pembatasan_m extends CI_Model
{
    public function get_pembatasan_penelitian($id = null)
    {
        $this->db->from('pembatasan_submit_penelitian');
        if ($id != null) {
            $this->db->where('id_pembatasan', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function insert($post)
    {
        $params = [
            'tanggal_mulai' => $post['tanggal_mulai'],
            'tanggal_selesai' => $post['tanggal_selesai'],
        ];
        $this->db->where('id_pembatasan', $post['id_pembatasan']);
        $this->db->insert('pembatasan_submit_penelitian', $params);
    }
}
