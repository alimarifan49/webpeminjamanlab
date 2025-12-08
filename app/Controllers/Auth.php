<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    // Menampilkan halaman login
    public function login()
    {
        $session = session();

        // Jika sudah login, redirect sesuai role
        if ($session->get('logged_in')) {
            $role = $session->get('role');
            if ($role === 'superadmin') return redirect()->to(base_url('superadmin'));
            if ($role === 'admin') return redirect()->to(base_url('admin'));
            return redirect()->to(base_url('user'));
        }

        return view('auth/login'); // Pastikan file app/Views/auth/login.php ada
    }

    // Proses login menggunakan hash
    public function doLogin()
    {
        $session = session();
        $userModel = new UserModel();

        // Ambil input NIM atau Email dan password
        $nimOrEmail = trim($this->request->getPost('nim'));
        $password   = trim($this->request->getPost('password'));

        // Cari user berdasarkan NIM atau Email
        $user = $userModel
                ->where('nim', $nimOrEmail)
                ->orWhere('email', $nimOrEmail)
                ->first();

        // Debug sementara (hapus setelah berhasil)
        // echo '<pre>';
        // var_dump('Input Password:', $password);
        // var_dump('Hash DB:', $user['password'] ?? null);
        // var_dump('password_verify:', $user ? password_verify($password, $user['password']) : null);
        // echo '</pre>';
        // exit;

        // Cek password menggunakan password_verify
        if ($user && password_verify($password, $user['password'])) {
            // Login berhasil, simpan session
            $session->set([
                'user_id'   => $user['id'],
                'role'      => $user['role'],
                'logged_in' => TRUE
            ]);

            // Redirect sesuai role
            if ($user['role'] === 'superadmin') return redirect()->to(base_url('superadmin'));
            if ($user['role'] === 'admin') return redirect()->to(base_url('admin'));
            return redirect()->to(base_url('user'));
        } else {
            // Login gagal
            return redirect()->to(base_url('login'))->with('error', 'NIM/Email atau password salah');
        }
    }

    // Logout
    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('login'));
    }
}
