<?php defined('BASEPATH') or exit('No direct script access allowed');

class Jurpros_m extends CI_Model
{

    public function get_pilih_jurpros($id = null)
    {
        $this->db->from('pilih_jurnal_prosiding', $id);
        $this->db->order_by('id_jurnal_pros', 'asc');
        if ($id != null) {
            $this->db->where('id_jurnal_pros', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_jurpros($id = null)
    {
        $this->db->from('insentif_jurpros');
        $this->db->join('users', 'users.id = insentif_jurpros.id');
        $this->db->join('pilih_jurnal_prosiding', 'pilih_jurnal_prosiding.id_jurnal_pros = insentif_jurpros.id_jurnal_pros');
        $this->db->join('status_insentif', 'status_insentif.id_status = insentif_jurpros.id_status');
        if ($id != null) {
            $this->db->where('id_insentif_jurpros', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_jurpros_by_id()
    {
        $this->db->from('insentif_jurpros');
        $this->db->join('users', 'users.id = insentif_jurpros.id');
        $this->db->join('pilih_jurnal_prosiding', 'pilih_jurnal_prosiding.id_jurnal_pros = insentif_jurpros.id_jurnal_pros');
        $this->db->join('status_insentif', 'status_insentif.id_status = insentif_jurpros.id_status');
        $this->db->where('insentif_jurpros.id', $this->session->userdata('id'));
        $query = $this->db->get();
        return $query;
    }

    public function get_by_id($id)
    {
        $this->db->where("id_insentif_jurpros", $id);
        return $this->db->get('insentif_jurpros')->row();
    }

    public function update($id, $post)
    {
        $this->db->where('id_insentif_jurpros', $id);
        $this->db->update('insentif_jurpros', $post);
    }

    function delete($id)
    {
        $this->db->where('id_insentif_jurpros', $id);
        $this->db->delete('insentif_jurpros');
        return true;
    }

    public function download($id)
    {
        $query = $this->db->get_where('insentif_jurpros', array('id_insentif_jurpros' => $id));
        return $query->row_array();
    }
}
