<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pengabmas_m extends CI_Model
{
    public function get_pengabmas($id_pengabmas = null)
    {
        $this->db->from('tbl_pengabmas');
        $this->db->join('users', 'users.id = tbl_pengabmas.id');
        $this->db->join('periode_pengajuan', 'periode_pengajuan.id_periode = tbl_pengabmas.id_periode');
        $this->db->join('status', 'status.id_status = tbl_pengabmas.id_status');
        if ($id_pengabmas != null) {
            $this->db->where('id_pengabmas', $id_pengabmas);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_by_id($id_pengabmas) {
        $this->db->where("id_pengabmas", $id_pengabmas);
        return $this->db->get('tbl_pengabmas')->row();
    }

    public function update($id,$post) {
        $this->db->where('id_pengabmas', $id);
        $this->db->update('tbl_pengabmas', $post);
    }

    public function download($id){
        $query = $this->db->get_where('tbl_pengabmas',array('id_pengabmas'=>$id));
        return $query->row_array();
       }
}
