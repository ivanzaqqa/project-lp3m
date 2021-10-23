<?php defined('BASEPATH') or exit('No direct script access allowed');

class Periode_m extends CI_Model
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

    public function insert($post)
    {
        $params = [
            'tahun_periode' => $post['tahun_periode'],
        ];

        $this->db->where('id_periode', $post['id_periode']);
        $this->db->insert('periode_pengajuan', $params);
    }

    public function update($post)
    {
    }

    function delete($id)
    {
        $this->db->where('id_periode', $id);
        $this->db->delete('periode_pengajuan');
        return true;
    }
}
