<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pembatasan_m extends CI_Model
{
    // PEMBATASAN PENELITIAN
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

    function delete($id)
    {
        $this->db->where('id_pembatasan', $id);
        $this->db->delete('pembatasan_submit_penelitian');
        return true;
    }
    // END OF PEMBATASAN PENELITIAN

    // PEMBATASAN PENGABDIAN MASYARAKAT
    public function get_pembatasan_pengabmas($id = null)
    {
        $this->db->from('pembatasan_submit_pengabmas');
        if ($id != null) {
            $this->db->where('id_pembatasan', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function insert_pengabmas($post)
    {
        $params = [
            'tanggal_mulai' => $post['tanggal_mulai'],
            'tanggal_selesai' => $post['tanggal_selesai'],
        ];
        $this->db->where('id_pembatasan', $post['id_pembatasan']);
        $this->db->insert('pembatasan_submit_pengabmas', $params);
    }

    function delete_pengabmas($id)
    {
        $this->db->where('id_pembatasan', $id);
        $this->db->delete('pembatasan_submit_pengabmas');
        return true;
    }
    // END OF PEMBATASAN PENGABDIAN MASYARAKAT
}
