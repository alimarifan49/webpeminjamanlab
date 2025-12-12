<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\M_Peminjaman;

class C_A_Peminjaman extends BaseController
{
    protected $peminjamanModel;

    public function __construct()
    {
        $this->peminjamanModel = new M_Peminjaman();
    }

    public function index()
    {
        $session = session();

        // Cek login & role admin
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return redirect()->to(base_url('login'));
        }

        // Ambil semua peminjaman
        $data['peminjaman'] = $this->peminjamanModel->findAll();

        $data['title'] = 'Peminjaman Admin';

        // Render view
        return view('admin/v_a_peminjaman', $data);
    }

    // Contoh fungsi setuju
    public function setuju($id)
    {
        $this->peminjamanModel->update($id, ['status' => 'approved']);
        return redirect()->to(base_url('admin/peminjaman'));
    }

    // Contoh fungsi tolak
    public function tolak($id)
    {
        $this->peminjamanModel->update($id, ['status' => 'rejected']);
        return redirect()->to(base_url('admin/peminjaman'));
    }
}
