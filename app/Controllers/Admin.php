<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Admin extends BaseController
{
    public function index()
    {
        $session = session();

        // Cek login & role admin
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to(base_url('login'));
        }

        // Data dikirimkan ke view
        $data = [
            'nama' => $session->get('nama') ?? 'Admin'
        ];

        // Pastikan view: app/Views/admin/dashboard_admin.php
        return view('admin/dashboard_admin', $data);
    }
}
