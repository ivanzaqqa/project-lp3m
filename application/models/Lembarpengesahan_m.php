<?php defined('BASEPATH') or exit('No direct script access allowed');

class Lembarpengesahan_m extends CI_Model
{
    public function get_lp($id = null)
    {
        $this->db->from('lembar_pengesahan');
        if ($id != null) {
            $this->db->where('id_lembar_pengesahan', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function insert($post)
    {
        if ($post['file_lembar_pengesahan'] != null) {
            $params['file_lembar_pengesahan'] = $post['file_lembar_pengesahan'];
        }
        $this->db->where('id_lembar_pengesahan', $post['id_lembar_pengesahan']);
        $this->db->insert('lembar_pengesahan', $params);
    }
}
