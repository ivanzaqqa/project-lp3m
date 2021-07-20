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

    // public function arsip_penelitian($id)
    // {
    //     // $this->fungsi->user_login()->id;
    //     $this->db->select('*');
    //     $this->db->from('penelitian');
    //     $this->db->join('users', 'users.id = penelitian.id');
    //     if ($id != null) {
    //         $this->db->where('id', $id);
    //     }
    //     $query = $this->db->get($id);
    //     return $query;
    // }


    // public function daftarusulanpenelitian($post)
    // {
    // $params['id'] = $post['id'];
    // $params['id_periode'] = $post['periodepengajuan'];
    // $params['judul_p'] = $post['judulpenelitian'];
    // $params['matkul_diampu'] = $post['matkul'];
    // $params['kelompok_riset'] = $post['kelompokriset'];
    // $params['mhs_dilibatkan'] = $post['mhsdilibatkan'];
    // $params['file_proposal'] = $_FILES['fileproposal'];
    // $params['file_rps'] = $_FILES['filerps'];
    // $params['file_form_integrasi'] = $_FILES['formintegrasi'];
    // // if ($params['form_integrasi'] = null) {
    // // } else {
    // //     $config['upload_path'] = './assets/files/form_integrasi';
    // //     $config['allowed_types'] = 'pdf';

    // //     $this->load->library('upload', $config);
    // //     if (!$this->upload->do_upload('form_integrasi')) {
    // //         echo "Upload File Gagal!!";
    // //         die();
    // //     } else {
    // //         $params['form_integrasi'] = $this->upload->data('file_name');
    // //     }
    // // }
    // $config['upload_path']          = './upload/files/';
    // $config['allowed_types']        = 'jpg';
    // $config['file_name']            = '';
    // $config['overwrite']            = true;
    // $config['max_size']             = 1024; // 1MB
    // // $config['max_width']            = 1024;
    // // $config['max_height']           = 768;

    // $this->load->library('upload', $config);

    // if ($this->upload->do_upload('image')) {
    //     return $this->upload->data("file_name");
    // }
    // $this->db->insert('penelitian', $params);
    // }
}
