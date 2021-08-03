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
}
