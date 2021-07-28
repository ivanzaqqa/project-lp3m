<?php defined('BASEPATH') or exit('No direct script access allowed');

class User_m extends CI_Model
{

    public function get($user_id = null)
    {
        $this->db->from('users');
        $this->db->join('user_role', 'user_role.id_role = users.id_role');
        if ($user_id != null) {
            $this->db->where('id', $user_id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_role($id = null)
    {
        $this->db->from('user_role');
        if ($id != null) {
            $this->db->where('id_role', $id);
        }
        $query = $this->db->get();
        return $query;
    }


    public function tambah_dosen($post)
    {
        $params['nidn'] = $post['nidn'];
        $params['id_sinta'] = $post['id_sinta'];
        $params['username'] = $post['username'];
        $params['name'] = $post['nama'];
        $params['email'] = $post['email'];
        $params['password'] = sha1($post['password']);
        $params['image'] = $_FILES['image'];
        if ($params['image'] = null) {
        } else {
            $config['upload_path'] = './assets/users';
            $config['allowed_types'] = 'jpg|png|jpeg';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image')) {
                echo "Upload Image Gagal!!";
                die();
            } else {
                $params['image'] = $this->upload->data('file_name');
            }
        }
        $params['jk'] = $post['jk'];
        $params['program_studi'] = $post['programstudi'];
        $params['fakultas'] = $post['fakultas'];
        $params['alamat'] = $post['alamat'];
        $params['no_hp'] = $post['nohp'];
        $params['id_role'] = $post['role'];


        $this->db->insert('users', $params);
    }

    function deldos($user_id)
    {
        $this->db->where('id', $user_id);
        $this->db->delete('users');
        return true;
    }

    function edit_dosen($post)
    {
        $params = [
            'nidn' => $post['nidn'],
            'id_sinta' => $post['id_sinta'],
            'username' => $post['username'],
            'name' => $post['nama'],
            'email' => $post['email'],
            'password' => sha1($post['password']),
            'jk' => $post['jk'],
            'program_studi' => $post['programstudi'],
            'fakultas' => $post['fakultas'],
            'alamat' => $post['alamat'],
            'no_hp' => $post['nohp'],
            'id_role' => $post['role']
        ];
        if ($post['image'] != null) {
            $params['image'] = $post['image'];
        }
        $this->db->where('id', $post['id']);
        $this->db->update('users', $params);
    }
}
