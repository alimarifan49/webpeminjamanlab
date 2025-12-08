<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\LaboratoriumModel;
use App\Models\PeminjamanModel;

class SuperAdmin extends BaseController
{
    protected $session;
    protected $userModel;
    protected $labModel;
    protected $peminjamanModel;

    public function __construct()
    {
        $this->session = session();
        $this->userModel = new UserModel();
        $this->labModel = new LaboratoriumModel();
        $this->peminjamanModel = new PeminjamanModel();
    }

    /**
     * Fungsi privat untuk cek login & role superadmin
     */
    private function checkLogin()
    {
        if (!$this->session->get('logged_in') || $this->session->get('role') !== 'superadmin') {
            // Redirect langsung ke halaman login jika tidak login atau bukan superadmin
            return redirect()->to(base_url('login'))->send();
        }
    }

    /**
     * Dashboard utama SuperAdmin
     */
    public function index()
    {
        $this->checkLogin();
        $data['nama'] = $this->session->get('nama') ?? 'SuperAdmin';
        return view('superadmin/v_dashboard', $data);
    }

    /**
     * Daftar laboratorium
     */
    public function laboratorium()
    {
        $this->checkLogin();
        $data['laboratorium'] = $this->labModel->findAll();
        return view('superadmin/v_laboratorium', $data); // pastikan view ada
    }

    /**
     * Daftar admin lab
     */
    public function adminlab()
    {
        $this->checkLogin();
        $data['admins'] = $this->userModel->where('role', 'admin')->findAll();
        return view('superadmin/v_adminlab', $data); // pastikan view ada
    }

    /**
     * Form tambah admin lab & proses simpan
     */
    public function tambahAdmin()
    {
        $this->checkLogin();

        if ($this->request->getMethod() === 'post') {
            $this->userModel->save([
                'nim'      => $this->request->getPost('nim'),
                'nama'     => $this->request->getPost('nama'),
                'email'    => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'role'     => 'admin'
            ]);

            return redirect()->to(base_url('superadmin/adminlab'));
        }

        return view('superadmin/v_tambah_admin'); // pastikan view ada
    }

    /**
     * Riwayat peminjaman
     */
    public function riwayat()
    {
        $this->checkLogin();
        $data['riwayat'] = $this->peminjamanModel->getRiwayat(); // Pastikan fungsi getRiwayat ada di model
        return view('superadmin/v_riwayat', $data); // pastikan view ada
    }
}
