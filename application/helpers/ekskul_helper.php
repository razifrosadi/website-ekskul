<?php

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('auth');
    } else {
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);

        $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
        $menu_id = $queryMenu['id'];

        $user_access = $ci->db->get_where('user_access_menu', ['role_id' => $role_id, 'menu_id' => $menu_id]);

        if ($user_access->num_rows() < 1) {
            redirect('auth/blocked');
        }
    }
}

function active_check($is_active, $submenu_id)
{
    $CI = get_instance();
    $CI->db->where('is_active', $is_active);
    $CI->db->where('id', $submenu_id);
    $result = $CI->db->get('user_sub_menu');
    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}
