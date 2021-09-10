<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pengabmas_m extends CI_Model
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

    public function get_pengabmas($id = null)
    {
        $this->db->from('tbl_pengabmas');
        $this->db->join('users', 'users.id = tbl_pengabmas.id');
        $this->db->join('periode_pengajuan', 'periode_pengajuan.id_periode = tbl_pengabmas.id_periode');
        $this->db->join('status', 'status.id_status = tbl_pengabmas.id_status');
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
        $this->db->join('status', 'status.id_status = tbl_pengabmas.id_status');
        $this->db->where('tbl_pengabmas.id', $this->session->userdata('id'));
        $query = $this->db->get();
        return $query;
    }

    public function get_by_id($id_pengabmas)
    {
        $this->db->where("id_pengabmas", $id_pengabmas);
        return $this->db->get('tbl_pengabmas')->row();
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
