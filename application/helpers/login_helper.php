<?php

function check_already_login() {
    $ci =& get_instance();

    $user_session = $ci->session->userdata('id');
    if ($user_session) {
        redirect('dosen');
    }
} 

function check_not_login() {
    $ci =& get_instance();

    $user_session = $ci->session->userdata('id');
    if (!$user_session) {
        redirect('auth');
    }
}

    // else {
    //     $role_id = $ci->session->userdata('role_id');
    //     $menu = $ci->uri->segment(1);

    //     $queryMenu = $ci->db->get_where('user_menu',['menu' => $menu])->row_array();
    //     $menu_id = $queryMenu['id'];

    //     $userAccess = $ci->db->get_where('user_access_menu', [
    //         'role_id' => $role_id,
    //         'menu_id' => $menu_id
    //     ]);

    //     if ($userAccess->num_rows() < 1) {
    //         redirect('auth/blocked');
    //     }

    // }

?>