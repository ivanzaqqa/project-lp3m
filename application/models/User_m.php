<?php defined('BASEPATH') or exit('No direct script access allowed');

class User_m extends CI_Model
{

    public function login($post)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('username', $post['username']);
        $this->db->where('password', sha1($post['password']));
        $query = $this->db->get();
        return $query;
    }

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
        $params['image'] = $_FILES['image']['name'];
        if ($params['image']) {
            $config['upload_path']        = './assets/users/';
            $config['allowed_types']     = 'jpg|png|jpeg';
            $config['max_size']            = 2048;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $new_image = $this->upload->data('file_name');
                $this->db->set('image', $new_image);
            } else {
                echo $this->upload->display_errors();
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

    public function edit_dosen($post)
    {
        $params = [
            'nidn' => $post['nidn'],
            'id_sinta' => $post['id_sinta'],
            'username' => $post['username'],
            'name' => $post['nama'],
            'email' => $post['email'],
            'jk' => $post['jk'],
            'program_studi' => $post['programstudi'],
            'fakultas' => $post['fakultas'],
            'alamat' => $post['alamat'],
            'no_hp' => $post['nohp'],
            'id_role' => $post['role']
        ];
        if (!empty($post['password'])) {
            $params['password'] = sha1($post['password']);
        }
        if ($post['image'] != null) {
            $params['image'] = $post['image'];
        }
        $this->db->where('id', $post['id']);
        $this->db->update('users', $params);
    }

    function edit_profile($post)
    {
        $params = [
            'nidn' => $post['nidn'],
            'id_sinta' => $post['id_sinta'],
            'username' => $post['username'],
            'name' => $post['nama'],
            'email' => $post['email'],
            'jk' => $post['jk'],
            'program_studi' => $post['programstudi'],
            'fakultas' => $post['fakultas'],
            'alamat' => $post['alamat'],
            'no_hp' => $post['nohp'],
        ];
        if ($post['image'] != null) {
            $params['image'] = $post['image'];
        }
        $this->db->where('id', $post['id']);
        $this->db->update('users', $params);
    }

    function ganti_password($post)
    {
        if (!empty($post['password'])) {
            $params['password'] = sha1($post['password']);
        }
        $this->db->where('id', $post['id']);
        $this->db->insert('users', $params);
    }
}
