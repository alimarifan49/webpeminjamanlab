<?php

namespace App\Controllers;

class User extends BaseController
{
    public function index()
    {
        $session = session();

        // Cek apakah user sudah login dan role-nya 'user'
        if (!$session->get('logged_in') || $session->get('role') !== 'user') {
            return redirect()->to(base_url('login'));
        }

        // Ambil nama user dari session
        $data['nama'] = $session->get('nama') ?? 'User';

        // Panggil view yang ada di app/Views/user/dashboard_user.php
        return view('user/v_dashboard_user', $data);
    }
}
