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

    public function get_penelitian($id = null)
    {
        $this->db->from('tbl_penelitian');
        $this->db->join('users', 'users.id = tbl_penelitian.id');
        $this->db->join('periode_pengajuan', 'periode_pengajuan.id_periode = tbl_penelitian.id_periode');
        $this->db->join('status', 'status.id_status = tbl_penelitian.id_status');
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
        $this->db->join('status', 'status.id_status = tbl_penelitian.id_status');
        $this->db->where('tbl_penelitian.id', $this->session->userdata('id'));
        $query = $this->db->get();
        return $query;
    }

    public function get_by_id($id_penelitian)
    {
        $this->db->where("id_penelitian", $id_penelitian);
        return $this->db->get('tbl_penelitian')->row();
    }

    public function update($id, $post)
    {
        $this->db->where('id_penelitian', $id);
        $this->db->update('tbl_penelitian', $post);
    }

    function delete($id)
    {
        $this->db->where('id_penelitian', $id);
        $this->db->delete('tbl_penelitian');
        return true;
    }

    public function download($id)
    {
        $query = $this->db->get_where('tbl_penelitian', array('id_penelitian' => $id));
        return $query->row_array();
    }
}
