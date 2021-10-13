<?php

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('index.php/auth');
    } else {
        $nama = $ci->session->userdata('nama');
    }
}

function redirectIfLoggedIn()
{
    $ci = get_instance();

    if ($ci->session->userdata('email')) {
        redirect('index.php/admin/dashboard');
    }
}
