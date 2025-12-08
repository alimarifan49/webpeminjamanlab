<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        $session = session();

        // Cek apakah admin sudah login dan role-nya 'admin'
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to(base_url('login'));
        }

        // Ambil nama admin dari session
        $data['nama'] = $session->get('nama') ?? 'Admin';

        // Panggil view yang ada di app/Views/admin/dashboard_admin.php
        return view('admin/v_dashboard_admin', $data);
    }
}
