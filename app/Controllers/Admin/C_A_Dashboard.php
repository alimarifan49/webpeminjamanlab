<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class C_A_Dashboard extends BaseController
{
    public function index()
    {
        $session = session();

        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to(base_url('login'));
        }

        $data['nama'] = $session->get('nama') ?? 'Admin';

        return view('admin/v_a_dashboard', $data);
    }
}
